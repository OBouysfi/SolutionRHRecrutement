<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TechnicalTest\CreateTestResultRequest;
use App\Http\Requests\TechnicalTest\TechnicalTestRequest;
use App\Http\Requests\TechnicalTest\GetResultTestCandidateRequest;
use App\Models\Answer;
use App\Models\Client;
use App\Models\Profile;
use App\Models\Question;
use App\Models\TestResult;
use App\Models\User;
use App\Models\Candidate;
use App\Services\TestPerformanceResultService;
use App\Services\TestPerformanceService;
use Carbon\Carbon;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Candidate\CandidateRequest;
use App\Models\TestTechnique;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use setasign\Fpdi\Fpdi;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvitationTestMail;


class TechnicalTestController extends Controller
{
    protected $apiKey;
    protected $apiSecret;
    protected $authUrl;
    protected $apiUrl;

    private $testPerformanceResultService;
    private $testPerformanceService;
    protected $testTechnique;

    public function __construct(
        TestPerformanceResultService $testPerformanceResultService,
        TestPerformanceService       $testPerformanceService,
        TestTechnique $testTechnique
    ) {
        $this->testPerformanceResultService = $testPerformanceResultService;
        $this->testPerformanceService = $testPerformanceService;
        $this->apiKey = env('ISOGRAD_API_KEY');
        $this->apiSecret = env('ISOGRAD_API_SECRET');
        $this->authUrl = env('ISOGRAD_API_AUTH_URL');
        $this->apiUrl = env('ISOGRAD_API_URL_DEV');

        // Injection du modèle TestTechnique
        $this->testTechnique = $testTechnique;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:test-technique-listing-gestion-candidats')->only(['listingCandidate']);
        $this->middleware('permission:test-technique-create-candidats')->only(['storeCandidate']);
        $this->middleware('permission:test-technique-edit-candidats')->only(['updateCandidate']);
        $this->middleware('permission:test-technique-delete-candidats')->only(['destroyCandidate']);
        $this->middleware('permission:test-technique-create-test-fiche-candidat')->only(['inviteTestToCandidate']);
        $this->middleware('permission:test-technique-edit-details-candidat-fiche-candidat')->only(['updateCandidate']);

        $this->middleware('permission:test-technique-listing-gestion-tests')->only(['listingTests']);
        $this->middleware('permission:test-technique-create-gestion-tests')->only(['storeTechnicalTest']);
        $this->middleware('permission:test-technique-edit-gestion-tests')->only(['editTechnicalTest']);
        $this->middleware('permission:test-technique-delete-gestion-tests')->only(['destroyTechnicalTest']);
    }

    //
    public function listingCandidate(Request $request)
    {
        if ($request->ajax()) {
            $candidates = Profile::get();
            // Apply Search Filter
            if ($request->has('search') && !empty($request->search)) {
                $candidates->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->search . '%')
                        ->orWhere('last_name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            }

            // Apply Group Filter
            if ($request->has('group') && !empty($request->group)) {
                $candidates->where('group', $request->group);
            }

            // Apply Status Filter
            if ($request->has('status') && !empty($request->status)) {
                $candidates->where('status', $request->status);
            }

            // Apply Checkbox Filters
            if ($request->has('only_pending_tests') && $request->only_pending_tests == 'true') {
                $candidates->where('has_pending_tests', true);
            }

            if ($request->has('include_archived_groups') && $request->include_archived_groups == 'true') {
                $candidates->whereHas('groupRelation', function ($query) {
                    $query->where('archived', true);
                });
            }

            return DataTables::of($candidates)
                ->addColumn('select_check', function ($candidate) {
                    return '<input type="checkbox" class="checkbox_candidate" value="' . $candidate->id . '">';
                })
                ->addColumn('picture', function ($candidate) {
                    return '<img src="' . $candidate->getAvatarUrl() . '" alt="Picture" class="" width="40">';
                })
                ->addColumn('group', function ($candidate) {
                    return $candidate->group ?? '-';
                })
                ->addColumn('first_name', function ($candidate) {
                    return $candidate->first_name ?? '-';
                })
                ->addColumn('last_name', function ($candidate) {
                    return $candidate->last_name ?? '-';
                })
                ->addColumn('email', function ($candidate) {
                    return $candidate->email ?? '-';
                })
                ->addColumn('action', function ($candidate) {
                    return view('technicalTest.inc.candidate-action', compact('candidate'))->render();
                })
                ->rawColumns(['select_check', 'picture', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }


    public function storeCandidate(CandidateRequest $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cet email est déjé enregistré.',
            ], 400);
        }


        DB::beginTransaction();

        //Create User
        $userData = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($userData);
        // Handle logo upload

        $picture = null;
        if ($request->hasFile('path_picture')) {
            $picture = $request->file('path_picture')->store('candidates', 'public');
        }

        $cover = null;
        if ($request->hasFile('cover_photo')) {
            $cover = $request->file('cover_photo')->store('candidates', 'public');
        }

        // Create client with validated data
        $candidateData = $request->validated();
        $candidateData['path_picture'] = $picture;
        $candidateData['cover_photo'] = $cover;
        $candidateData['user_id'] = $user->id;
        $candidateData['is_candidate'] = 1;

        $candidate = Profile::create($candidateData);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Candidat ajouté avec succès.',
            'data' => new $candidate,
        ], 201);

        try {
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de Candidat : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de Candidat.');
        }
    }


    public function updateCandidate(CandidateRequest $request, int $id)
    {

        try {
            DB::beginTransaction();
            $candidate = Candidate::findOrFail($id);
            $user = $candidate->user;

            //Create User
            $userData = [
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];

            if ($request->password) {
                $user->update($userData);
            }

            // $user = User::update($userData);
            // Handle logo upload

            $logo = null;
            if ($request->hasFile('path_picture')) {
                $imageName = time() . '.' . $request->path_picture->extension();
                $request->path_picture->move(public_path('img'), $imageName);
                $logo = 'img/' . $imageName;
            }

            // Create client with validated data
            $clientData = $request->validated();
            $clientData['path_picture'] = $logo;
            $clientData['user_id'] = $user->id;

            $candidate->update($clientData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client ajouté avec succès.',
                'data' => new $candidate,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de client.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyCandidate(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['message' => 'Aucun candidat sélectionné.'], 400);
        }

        Profile::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Candidats supprimés avec succès.']);
    }


    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    private function errorResponse(string $message, int $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }


    public function listingTests(Request $request)
    {
        if ($request->ajax()) {
            $tests = TestTechnique::where('tag', 'manual')->get();

            // if ($request->has('name') && $request->name !== 'Tous') {
            //     $clients->where('id', $request->name);
            // }

            // if ($request->has('label') && $request->label !== 'Tous') {
            //     $clients->whereHas('activityArea', function ($query) use ($request) {
            //         $query->where('id', $request->label);
            //     });
            // }

            // if ($request->has('ville') && $request->ville !== 'Tous') {
            //     $clients->whereHas('city', function ($query) use ($request) {
            //         $query->where('name', 'like', '%' . $request->ville . '%');
            //     });
            // }

            // if ($request->has('pays') && $request->pays !== 'Tous') {
            //     $clients->whereHas('city.country', function ($query) use ($request) {
            //         $query->where('name', 'like', '%' . $request->pays . '%');
            //     });
            // }

            // if ($request->has('site_name') && $request->site_name !== 'Tous') {
            //     $clients->whereHas('clientSites', function ($query) use ($request) {
            //         $query->where('site_name', 'like', '%' . $request->site_name . '%');
            //     });
            // }


            return DataTables::of($tests)
                ->addColumn('ID', function ($test) {
                    return $test->id ?? '-';
                })
                ->addColumn('test_name', function ($test) {
                    return __($test->test_name) ?? '-';
                })
                ->addColumn('subject', function ($test) {
                    return __($test->subject) ?? '-';
                })
                ->addColumn('language', function ($test) {
                    return $test->language ?? '-';
                })
                ->addColumn('type', function ($test) {
                    return __($test->type) ?? '-';
                })
                ->addColumn('algorithm', function ($test) {
                    return $test->algorithm ?? '-';
                })
                ->addColumn('action', function ($test) {
                    return view('technicalTest.inc.test-action', compact('test'))->render();
                })

                // Autoriser HTML
                ->rawColumns(['action'])
                ->make(true);
        }

        // Pas AJAX -> ...
        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function storeTechnicalTest(TechnicalTestRequest $request)
    {
        DB::beginTransaction();

        $testData = $request->validated();

        $test = TestTechnique::create([
            'test_name' => $testData['test_name'],
            'group' => $testData['group'],
            'language' => $testData['language'],
            'category' => $testData['category'],
            'duration' => $testData['duration'],
            'questions_number' => $testData['questions_number'] ?? 0,
            'type' => $testData['type'] ?? '',
            'description' => $testData['description'] ?? '',
            'start_message' => $testData['start_message'] ?? '',
            'end_message' => $testData['end_message'] ?? '',
            'tag' => 'manual',
            'global_score' => $testData['global_score'] ?? 0,
            'average_score' => $testData['average_score'] ?? 0,
        ]);



        if ($request->questions) {


            // Parcourir et enregistrer les questions associées
            foreach ($testData['questions'] as $questionData) {
                $question = Question::create([
                    'test_id' => $test->id,
                    'type' => $questionData['type'],
                    'point' => $questionData['point'] ?? 0,
                    'question_text' => $questionData['question_text'],
                    'correct_answer' => $questionData['correct_answer'] ?? null,
                ]);

                // Ajouter les options de cette question
                if (isset($questionData['options']) && is_array($questionData['options'])) {



                    foreach ($questionData['options'] as $optionData) {
                        Answer::create([
                            'question_id' => $question->id,
                            'answer_text' => $optionData['answer_text'] ?? null,
                            'is_correct' => $optionData['is_correct'] ?? false,
                            'order' => $optionData['order'] ?? null,
                            'left_item' => $optionData['left_item'] ?? null,
                            'right_item' => $optionData['right_item'] ?? null,
                        ]);
                    }
                }
            }
        }
        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Test ajouté avec succès.',
            'data' => $test,
        ], 201);
        try {
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de client.');
        }
    }


    public function editTechnicalTest(TechnicalTestRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            // Récupérer le test existant
            $test = TestTechnique::findOrFail($id);

            // Mettre à jour les données du test
            $testData = $request->validated();
            $test->update([
                'test_name' => $testData['test_name'],
                'subject' => $testData['subject'],
                'language' => $testData['language'],
                'algorithm' => $testData['algorithm'],
                'duration' => $testData['duration'],
                'questions_number' => $testData['questions_number'] ?? 0,
                'type' => $testData['type'] ?? '',
                'description' => $testData['description'] ?? '',
            ]);

            // Vérifier les questions dans la requête
            if ($request->questions) {
                $existingQuestionIds = $test->questions->pluck('id')->toArray();
                foreach ($testData['questions'] as $questionData) {
                    if (isset($questionData['id']) && in_array($questionData['id'], $existingQuestionIds)) {
                        // Mettre à jour une question existante
                        $question = Question::findOrFail($questionData['id']);

                        $question->update([
                            'type' => $questionData['type'],
                            'question_text' => $questionData['question_text'],
                            'correct_answer' => $questionData['correct_answer'] ?? null,
                        ]);

                        // Mettre à jour ou ajouter les réponses associées
                        if (isset($questionData['options']) && is_array($questionData['options'])) {
                            $existingAnswerIds = $question->answers->pluck('id')->toArray();
                            foreach ($questionData['options'] as $optionData) {
                                if (isset($optionData['option_id']) && in_array($optionData['option_id'], $existingAnswerIds)) {
                                    $answer = Answer::findOrFail($optionData['option_id']);
                                    $answer->update([
                                        'answer_text' => $optionData['answer_text'],
                                        'is_correct' => $optionData['is_correct'],
                                        'order' => $optionData['order'],
                                        'left_item' => $optionData['left'] ,
                                        'right_item' => $optionData['right'],
                                    ]);
                                } else {
                                    Answer::create([
                                        'question_id' => $question->id,
                                        'answer_text' => $optionData['answer_text'],
                                        'is_correct' => $optionData['is_correct'] ?? false,
                                        'order' => $optionData['order'] ?? null,
                                        'left_item' => $optionData['left'] ?? null,
                                        'right_item' => $optionData['right'] ?? null,
                                    ]);
                                }
                            }

                            // Supprimer les réponses qui ne sont plus présentes
                            $newAnswerIds = collect($questionData['options'])->pluck('option_id')->toArray();
                            Answer::where('question_id', $question->id)
                                ->whereNotIn('id', $newAnswerIds)->delete();
                        }
                    } else {
                        // Ajouter une nouvelle question
                        $question = Question::create([
                            'test_id' => $test->id,
                            'type' => $questionData['type'],
                            'question_text' => $questionData['question_text'],
                            'correct_answer' => $questionData['correct_answer'] ?? null,
                        ]);

                        // Ajouter les réponses associées pour la nouvelle question
                        if (isset($questionData['options']) && is_array($questionData['options'])) {
                            foreach ($questionData['options'] as $optionData) {
                                Answer::create([
                                    'question_id' => $question->id,
                                    'answer_text' => $optionData['answer_text'],
                                    'is_correct' => $optionData['is_correct'] ?? false,
                                    'order' => $optionData['order'] ?? null,
                                ]);
                            }
                        }
                    }
                }

                // Supprimer les questions qui ne sont plus présentes
                $newQuestionIds = collect($testData['questions'])->pluck('id')->toArray();
                Question::where('test_id', $test->id)
                    ->whereNotIn('id', $newQuestionIds)
                    ->delete();
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Test modifié avec succès.',
                'data' => $test,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la modification du test : ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la modification du test.',
            ], 500);
        }
    }


    // Suppression d'un test
    public function destroyTechnicalTest(Request $request)
    {
        // Rechercher le test par ID
        $test = TestTechnique::findOrFail($request->ids);
        if (!$test) {
            return response()->json(['message' => 'Test introuvable'], 404);
        }

        // Supprimer le test
        $test->delete();

        return response()->json(['message' => 'Test supprimé avec succès']);
    }


    public function fetchTests(Request $request)
    {
        $request->validate([
            'language' => 'required|string',
            'group' => 'required|string',
            'category' => 'required|string',
        ]);

        $tests = TestTechnique::where('language', $request->language)
            ->where('group', $request->group)
            ->where('category', $request->category)
            ->where('tag', 'library')
            ->get(['id', 'test_name']);

        // Retour JSON
        return response()->json($tests);
    }



    public function fetchTestsManual(Request $request)
    {
        $request->validate([
            'language' => 'required|string',
            'group' => 'required|string',
            'category' => 'required|string',
        ]);

        $tests = TestTechnique::where('language', $request->language)
            ->where('group', $request->group)
            ->where('category', $request->category)
            ->where('tag', 'manual')
            ->get(['id', 'test_name']);

        // Retour JSON
        return response()->json($tests);
    }

    public function testTechniquesGetDetails(Request $request)
    {
        $request->validate([
            'testId' => 'required|integer|exists:test_techniques,id',
        ]);

        $test = TestTechnique::find($request->testId);

        return response()->json([
            'description' => $test->description,
            'questions_count' => $test->questions_number,
            'max_time' => $test->duration,
        ]);
    }


    public function listingTestsResults(Request $request)
    {
        if ($request->ajax()) {
            // Récupération des résultats des tests
            $testResults = TestResult::with(['test', 'profile']) // Charger les relations avec les tests et les candidats
                ->orderBy('created_at', 'desc'); // Trier les résultats par date

            // Appliquer des filtres si des paramètres sont envoyés
            if ($request->has('candidate_name') && $request->candidate_name !== 'Tous') {
                $testResults->whereHas('candidate', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->candidate_name . '%');
                });
            }

            if ($request->has('test_name') && $request->test_name !== 'Tous') {
                $testResults->whereHas('test', function ($query) use ($request) {
                    $query->where('test_name', 'like', '%' . $request->test_name . '%');
                });
            }

            if ($request->has('language') && $request->language !== 'Tous') {
                $testResults->where('language', $request->language);
            }

            if ($request->has('status') && $request->status !== 'Tous') {
                $testResults->where('status', $request->status);
            }

            // Construire les colonnes pour DataTables
            return DataTables::of($testResults)
                ->addColumn('test', function ($result) {
                    return __($result->test->test_name) ?? 'N/A';
                })
                ->addColumn('language', function ($result) {
                    return $result->language ?? '-';
                })
                ->addColumn('score', function ($result) {
                    return $result->score !== null ? $result->score : 'N/A';
                })
                ->addColumn('status', function ($result) {
                    return ucfirst($result->status) ?? '-';
                })
                ->addColumn('date_test', function ($result) {
                    return $result->date_test ? $result->date_test->format('Y-m-d H:i') : 'N/A';
                })
                ->addColumn('action', function ($result) {
                    return view('technicalTest.inc.test-result-action', compact('result'))->render();
                })

                // Autoriser HTML dans certaines colonnes
                ->rawColumns(['action'])

                // Générer la table pour DataTables
                ->make(true);
        }

        // Si ce n'est pas une requête AJAX
        return response()->json(['error' => 'Invalid request'], 400);
    }
    public function listingAllTestsResults(Request $request)
    {
        if ($request->ajax()) {
            // Récupération des résultats des tests
            $testResults = TestResult::with(['test', 'profile']) // Charger les relations avec les tests et les candidats
                ->orderBy('created_at', 'desc'); // Trier les résultats par date


            // Construire les colonnes pour DataTables
            return DataTables::of($testResults)
                ->addColumn('test', function ($result) {
                    return __($result->test->test_name) ?? 'N/A';
                })
                ->addColumn('language', function ($result) {
                    return $result->language ?? '-';
                })
                ->addColumn('score', function ($result) {
                    return $result->score !== null ? $result->score : 'N/A';
                })
                ->addColumn('status', function ($result) {
                    return ucfirst($result->status) ?? '-';
                })
                ->addColumn('date_test', function ($result) {
                    return $result->date_test ? $result->date_test->format('Y-m-d H:i') : 'N/A';
                })
                ->addColumn('action', function ($result) {
                    return view('technicalTest.inc.all-results-test-action', compact('result'))->render();
                })

                // Autoriser HTML dans certaines colonnes
                ->rawColumns(['action'])

                // Générer la table pour DataTables
                ->make(true);
        }

        // Si ce n'est pas une requête AJAX
        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function createTestResult(CreateTestResultRequest $request)
    {
        try {
         $this->testPerformanceResultService->create($request->validated());
         return response()->json(['message' => 'Brouillon enregistré avec succès.'], Response::HTTP_CREATED);

        } catch (\Throwable $e) {
            logger()->error('Error occurred while creating a test result', [
                'error.message' => $e->getMessage(),
                'error.trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => __('messages.error_occurred_while_creating_test_result'),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function inviteTestToCandidate(Request $request)
    {
        try {

            $request->validate([
                'profile_id' => 'required|integer|exists:candidates,id',
                'test_id' => 'required|integer|exists:test_techniques,id',
                'language' => 'required|string|max:255',
                'status' => 'required|string',
                'score' => 'nullable|integer',
                'date_test' => 'nullable|date',
                'nee_ful_scr' => 'nullable|boolean',
                'add_pro' => 'nullable|boolean',
            ]);

            $testId = $request->test_id;
            $candidate = Profile::findOrFail($request->profile_id);
            $tamplateMailId = '46634';


            $payload = [
                'act_id' => 8,
                'gen_id' => 3,
                'ema' => $candidate->email,
                'fst_nam' => $candidate->first_name,
                'lst_nam' => $candidate->last_name,
                'tst_frm_id' => $testId
            ];
            $result = $this->testPerformanceService->IsogradRequest($payload);


            if (!$result['success'] && $result['error_code'] == 107) {
                $payload['act_id'] = 9;
                $result = $this->testPerformanceService->IsogradRequest($payload);
            }

            if (!$result['success']) {
                throw new \Exception('Error in Isograd request: ' . $result['message']);
            }

            $payloadToSendEmail = [
                "act_id" => 42,
                "pla_tst_id" => $result['pla_tst_id'],
                "can_id" => $result['can_id'],
                "mai_tem_id" => $tamplateMailId,
            ];


            $emailResult = $this->testPerformanceService->IsogradRequest($payloadToSendEmail);
            if (!$emailResult['success']) {
                throw new \Exception('Error in sending email: ' . $emailResult['message']);
            }
            $data = [
                'profile_id' => $candidate->id,
                'test_id' => $testId,
                'language' => $request->language,
                'status' => $request->status,
                'score' => $request->score ?? null,
                'date_test' => Carbon::now()

            ];

            $this->createTestResult($data);


            return response()->json($result);
        } catch (\Throwable $e) {
            logger()->error('an error occurred while creating a new quiz', [
                'error.message' => $e->getMessage(),
                'error.trace' => $e->getTraceAsString(),
            ]);
        }
        return response()->json([
            'message' => __('messages.error_occurred_while_creating_quiz'),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }


    public function sendInvitation(Request $request){
        $validated = $request->validate([
            'profile_id' => 'required|integer|exists:profiles,id',
            'test_id' => 'required|integer|exists:test_techniques,id',
            'test_result_id' => 'required|integer|exists:test_results,id',
            'status' => 'required|string',
        ]);




        $testId = $request->test_id;
        $candidate = Profile::findOrFail($request->profile_id);
        $test = TestTechnique::findOrFail($testId);
        $testResult = TestResult::findOrFail($request->test_result_id);

        if (!$testResult) {
            return response()->json(['message' => 'Test result not found'], 404);
        }

        $url = env('APP_URL') . '/test-technique/start-test/' . $testId . '/' . $candidate->id;

        // send Email
        Mail::to($candidate->email)->send(new SendInvitationTestMail($candidate, $test, $url));

        $testResult->update([
            'status' => $validated['status'],
            'date_test' => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'Invitation sent successfully',
            'test_result' => $testResult,
            'success' => true,
        ]);




    }


    public function assignTestToCandidate(CreateTestResultRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $test = TestTechnique::findOrFail($request->test_id);
            $profileIds = $request->profile_id;

            foreach ($profileIds as $profileId) {
                $candidate = Profile::findOrFail($profileId);

               TestResult::create([
                    'profile_id' => $candidate->id,
                    'test_id' => $test->id,
                    'job_offer_id' => $validatedData['job_offer_id'] ?? null,
                    'language' => $validatedData['language'],
                    'status' => $validatedData['status'],
                    'score' => $validatedData['score'] ?? null,
                    'date_test' => $validatedData['date_test'] ?? null,
                    'nee_ful_scr' => $validatedData['nee_ful_scr'] ?? null,
                    'add_pro' => $validatedData['add_pro'] ?? null,
                ]);

                // Générer l'URL unique pour chaque candidat
                $url = env('APP_URL') . '/test-technique/start-test/' . $test->id . '/' . $candidate->id;

                // Envoyer l'e-mail
                Mail::to($candidate->email)->send(new SendInvitationTestMail($candidate, $test, $url));
            }




            return response()->json(['message' => 'Test envoyé aux candidats avec succès.'], Response::HTTP_CREATED);

        } catch (\Throwable $e) {
            logger()->error('Error occurred while creating a test result', [
                'error.message' => $e->getMessage(),
                'error.trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => __('messages.error_occurred_while_creating_test_result'),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    public function deleteTestResult(int $id)
    {
        //
        $testResult = TestResult::findOrfail($id);
        $testResult->delete();
        return response()->json(['message' => 'Test Result deleted successfully']);
    }


    public function getResultTestCandidate(GetResultTestCandidateRequest $request)
    {
        $inputs = $request->validated();
        $payload = [
            'act_id' => 4,
            'ema' => $inputs['ema'],
            'tst_frm_id' => $inputs['tst_frm_id'],
        ];

        $payloadToGetPDF = $payload;
        $payloadToGetPDF['act_id'] = 6;

        // Fetching results
        $result = $this->testPerformanceService->IsogradRequest($payload);
        $resultPdf = $this->testPerformanceService->IsogradRequest($payloadToGetPDF);
        $score_test = $result['txt_des'];
        $score_val = $result['num_val'];
        $score_max = $result['max_val'];
        $inputs_id = $inputs['id'];
        $pdf_url = $resultPdf['pdf_url'];
        $filename = basename(parse_url($pdf_url, PHP_URL_PATH));

        // Downloading the PDF
        $response = Http::get($pdf_url);


        if ($response->successful()) {
            $pdfContent = $response->body();
            $originalPath = public_path('storage/test_reports/' . $filename);

            // Ensure the directory exists
            if (!file_exists(public_path('storage/test_reports'))) {
                mkdir(public_path('storage/test_reports'), 0777, true);
            }

            // Store the PDF
            file_put_contents($originalPath, $pdfContent);



            return $this->manipulatePdf($filename, $score_test, $score_val, $score_max, $inputs_id);
        }

        return response()->json(['error' => 'Failed to download PDF'], 500);
    }



    public function manipulatePdf($originalFilename, $score_test, $score_val, $score_max, $inputs_id)
    {
        $pdf = new Fpdi();
        $filePath = public_path('storage/test_reports/' . $originalFilename);
        $pageCount = $pdf->setSourceFile($filePath);

        // Initialisation de la bibliothèque Smalot\PdfParser (extraction de texte)
        $parser = new Parser();

        // Charger et analyser uniquement une page à la fois
        $parsedPdf = $parser->parseFile($filePath);

        $pagesText = $parsedPdf->getPages(); // Récupérer les objets pages
        $extractedData = []; // Stocker les données extraites

        foreach ($pagesText as $pageIndex => $page) {
            // Lire le texte d'une seule page avec PdfParser
            $text = $page->getText();

            // Vérifier si cette page contient une table ou des données spécifiques
            if ($this->containsListeDesQuestions($text)) {
                $rows = explode("\n", $text); // Diviser les lignes
                foreach ($rows as $row) {
                    $columns = preg_split('/\t/', trim($row)); // Diviser en colonnes
                    $extractedData[] = $columns;
                }
            }

            // Libérer la mémoire après analyse (pour éviter des accumulations inutiles)
            unset($page, $text);
        }

        $pageWidth = 210; // A4 width in mm
        $pageHeight = 297; // A4 height in mm

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $pdf->AddPage();
            $pdf->useTemplate($pdf->importPage($pageNo));

            // header
            if ($pageNo === 1) {
                $pdf->SetFillColor(255, 255, 255);
                $pdf->Rect(0, 0, $pageWidth, 40, 'F');
                $pdf->Rect(0, $pageHeight - 15, $pageWidth, 25, 'F');
            } else {
                // Define page dimensions
                $pageWidth = 210;
                $pageHeight = $pdf->GetPageHeight();

                // Remove the logo area with rectangles
                $pdf->SetFillColor(255, 255, 255); // Set the fill color to white
                $pdf->Rect(0, 0, $pageWidth, 13, 'F');
                $pdf->Rect(80, $pageHeight - 15, $pageWidth - 150, 25, 'F');
            }

            // footer
        }

        $modifiedFilename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_modified.pdf';
        $modifiedPath = public_path('storage/test_reports/' . $modifiedFilename);

        if (!file_exists(public_path('storage/test_reports'))) {
            mkdir(public_path('storage/test_reports'), 0777, true);
        }

        $pdf->Output('F', $modifiedPath);

        $test_result = TestResult::findOrFail($inputs_id);
        $test_result->update([
            'score' => $score_test,
            'pdf_url' => 'storage/test_reports/' . $modifiedFilename, // Store relative path
        ]);

        return response()->json([
            'message' => 'PDF downloaded successfully',
            'score' => $score_test,
            'num_val' => $score_val,
            'max_val' => $score_max,
            'pdf_report' => 'storage/test_reports/' . $modifiedFilename,
            'list_questions' => $extractedData,
        ], 200);
    }


    private function containsListeDesQuestions(string $text): bool
    {
        return strpos($text, 'Liste des questions') !== false;
    }



    public function submitTest(Request $request){

        $validatedData = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'test_id' => 'required|exists:test_techniques,id',
            'job_offer_id' => 'required|exists:job_offers,id',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.question_type' => 'required|integer',
            'answers.*.point' => 'required|integer',
            'answers.*.selected_answers' => 'required|array',
        ]);

        $userId = $validatedData['profile_id'];
        $testId = $validatedData['test_id'];
        $answers = $validatedData['answers'];
        $score = 0;
        $points = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $answer) {
            $questionId = $answer['question_id'];
            $questionType = $answer['question_type'];
            $point = $answer['point'];
            $selectedAnswers = $answer['selected_answers'];

            if ($questionType == 1 || $questionType == 2) {
                $correctAnswers = Answer::where('question_id', $questionId)
                    ->where('is_correct', true)
                    ->pluck('id')
                    ->toArray();


                // Sort and compare
                sort($correctAnswers);
                sort($selectedAnswers);


                if ($correctAnswers == $selectedAnswers) {
                    $score += $point;
                }


            }elseif ($questionType == 3){
                $response = Question::where('id', $questionId)->first();
                $correctAnswers = $response->correct_answer;
                if (is_array($selectedAnswers)) {
                    $isCorrect = in_array($correctAnswers, $selectedAnswers);
                } else {
                    $isCorrect = ($correctAnswers == $selectedAnswers);
                }

                if($isCorrect){
                    $score += $point;
                }


            }
            elseif ($questionType == 4) {
                $correctOrder = Answer::where('question_id', $questionId)
                    ->orderBy('order')
                    ->pluck('id')
                    ->toArray();

                $submittedOrder = array_column($selectedAnswers, 'answer_id');

                if ($correctOrder == $submittedOrder) {
                    $score += $point;
                }

            } elseif ($questionType == 5) {
                $correctAnswers = Answer::where('question_id', $questionId)
                    ->get(['left_item', 'right_item'])
                    ->toArray();

                $matchedAnswersCount = 0;

                foreach ($selectedAnswers as $selectedPair) {
                    foreach ($correctAnswers as $correctPair) {
                        if (
                            $selectedPair['left_item'] === $correctPair['left_item'] &&
                            $selectedPair['right_item'] === $correctPair['right_item']
                        ) {
                            $matchedAnswersCount++;
                            break;
                        }
                    }
                }

                if ($matchedAnswersCount === count($correctAnswers)) {
                    $score += $point;
                }

            }
        }
        $testResult = TestResult::where('profile_id', $userId)->where('test_id', $testId)->first();
        $testResult->update([
             'score' => $score,
            'date_test' => Carbon::now(),
            'status' => 'Finished',
      ]);


        return response()->json([
            'message' => 'Test submitted successfully',
            'score' => $score,
            'status' => 'success',
        ]);

    }
}
