<?php

namespace App\Http\Controllers\Web;

use App\Enums\TechnicalTest\AlgorithmEnum;
use App\Enums\TechnicalTest\CategoryEnum;
use App\Enums\TechnicalTest\GroupeEnum;
use App\Enums\TechnicalTest\TypesQuestionsEnum;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Candidate;
use App\Enums\Candidate\StatusEnum;
use App\Http\Controllers\Controller;
use App\Enums\Candidate\CivilityEnum;
use App\Enums\Candidate\GroupEnum;
use App\Enums\Candidate\LanguageEnum;
use App\Enums\Candidate\SituationEnum;
use App\Models\JobOffer;
use App\Models\Profile;
use App\Models\TestResult;
use App\Models\TestSubject;
use App\Models\TestTechnique;

class TechnicalTestController extends Controller
{
    protected $testTechnique;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle JobOffer et application des middlewares
     */
    public function __construct(TestTechnique $testTechnique)
    {
        // Injection du modèle TestTechnique
        $this->testTechnique = $testTechnique;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:test-technique-listing-gestion-candidats')->only(['listingCandidate']);
        $this->middleware('permission:test-technique-edit-candidats')->only(['editCandidate']);
        $this->middleware('permission:test-technique-create-candidats')->only(['createCandidate']);
        $this->middleware('permission:test-technique-detail-candidats')->only(['sheet']);
        $this->middleware('permission:test-technique-listing-fiche-candidat')->only(['sheetDetail']);
        $this->middleware('permission:test-technique-edit-details-candidat-fiche-candidat')->only(['editCandidate']);
        $this->middleware('permission:test-technique-listing-gestion-tests')->only(['listingTest']);
        $this->middleware('permission:test-technique-create-gestion-tests')->only(['createTest']);
    }

    public function listingCandidate()
    {
        $status = StatusEnum::getAll();
        $groups = GroupEnum::getAll();

        return view('technicalTest.listingCandidate', compact('status', 'groups'));
    }

    public function listingTest()
    {
        return view('technicalTest.listingTest');
    }


    public function createTest()
    {
        $typesQuestions = TypesQuestionsEnum::getAll();
        $testSubjects = TestSubject::all();
        $algorithms = AlgorithmEnum::getAll();
        $categories = CategoryEnum::getAll();
        $groups = GroupeEnum::getAll();
        return view('technicalTest.createTest', compact('typesQuestions', 'testSubjects', 'algorithms', 'categories', 'groups'));
    }

    public function editTest(int $id)
    {
        $test = TestTechnique::findOrFail($id)->load('questions', 'questions.answers');
        $typesQuestions = TypesQuestionsEnum::getAll();
        $testSubjects = TestSubject::all();
        $algorithms = AlgorithmEnum::getAll();
        $groups = GroupeEnum::getAll();
        $categories = CategoryEnum::getAll();

        return view('technicalTest.createTest', compact('test', 'typesQuestions', 'testSubjects', 'algorithms', 'groups', 'categories'));
    }

    public function previewTest(int $id)
    {
        $test = TestTechnique::findOrFail($id)->load('questions', 'questions.answers');
        $typesQuestions = TypesQuestionsEnum::getAll();
        $testSubjects = TestSubject::all();
        $algorithms = AlgorithmEnum::getAll();
        return view('technicalTest.previewTest', compact('test', 'typesQuestions', 'testSubjects', 'algorithms'));
    }
    public function createCandidate()
    {
        $cities = City::all();
        $situations = SituationEnum::getAll();
        $languages = LanguageEnum::getAll();
        $status = StatusEnum::getAll();
        $civilities = CivilityEnum::getAll();
        $countries = Country::all();
        $groups = GroupEnum::getAll();
        return view('technicalTest.createCandidate', compact('cities', 'situations', 'languages', 'status', 'civilities', 'countries', 'groups'));
    }

    public function editCandidate(int $id)
    {
        $cities = City::all();
        $situations = SituationEnum::getAll();
        $languages = LanguageEnum::getAll();
        $status = StatusEnum::getAll();
        $civilities = CivilityEnum::getAll();
        $countries = Country::all();
        $candidate =  Profile::findOrfail($id);
        $groups = GroupEnum::getAll();

        return view('technicalTest.createCandidate', compact('candidate', 'cities', 'situations', 'languages', 'status', 'civilities', 'countries', 'groups'));
    }

    public function sheet(int $id)
    {
        $candidate = Profile::findOrFail($id);
        $languages = LanguageEnum::getAll();
        $groups = GroupeEnum::getAll();
        $categories = CategoryEnum::getAll();
        $clients = Client::all();
        $jobOffers = JobOffer::all();
        return view('technicalTest.sheet', compact('candidate', 'languages', 'groups', 'categories', 'clients', 'jobOffers'));
    }

    public function sheetDetail($resultId,$testId,$profileId)
    {
        $result = TestResult::findOrFail($resultId);
        $test = TestTechnique::findOrFail($testId);
        $candidate = Profile::findOrFail($profileId);
        return view('technicalTest.sheetDetail', compact('result', 'test', 'candidate'));
    }

    public function result()
    {

        return view('technicalTest.result');
    }


    public function startTest($id, $candidateId)
    {
        $candidate = Profile::findOrFail($candidateId);
        $test = TestTechnique::findOrFail($id);
        $test->load('questions', 'questions.answers');
        return view('candidate_portal.technicalTest.startTest', compact('test', 'candidate'));
    }



}
