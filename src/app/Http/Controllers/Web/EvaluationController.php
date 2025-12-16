<?php

namespace App\Http\Controllers\Web;

use App\Models\Client;
use App\Models\Evaluation;
use App\Models\Evaluator;
use App\Models\Profile;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{

    public function preview(Profile $profile, JobOffer $jobOffer)
    {
        $clientEvaluators = is_array($jobOffer->client_evaluator) ? $jobOffer->client_evaluator : json_decode($jobOffer->client_evaluator, true);
        if (!is_array($clientEvaluators)) {
            $clientEvaluators = [];
        }
        $evaluator = Evaluator::whereIn('id', $clientEvaluators)->get();
        $evaluators_evaluation = $evaluator->flatMap(function ($ev) {
            return $ev->typeCoefficients->map(function ($evaluator) {
                $evaluator->id = $evaluator->evaluator->id;
                $evaluator->coefficient = $evaluator->coefficient;
                $evaluator->evaluation_type = $evaluator->evaluationType->name;
                $evaluator->evaluation_type_id = $evaluator->evaluationType->id;

                $evaluation = Evaluation::where('evaluator_id', $evaluator->evaluator->id)
                    ->where('evaluation_type_id', $evaluator->evaluation_type_id)->first();

                $evaluator->path_logo = $evaluator->evaluator->path_logo;
                $evaluator->first_name = $evaluator->evaluator->first_name;
                $evaluator->last_name = $evaluator->evaluator->last_name;
                $evaluator->mark = $evaluation->mark ?? '';
                $evaluator->evaluation = $evaluation->evaluation ?? '';
                $evaluator->ponderation = $evaluation->ponderation ?? '';
                return $evaluator;
            });
        });




        $evaluatorsCompany = Evaluator::whereNot('company_id', null)->get();
        $evaluatorsEvaluationCompany = $evaluatorsCompany->flatMap(function ($ev) {
            return $ev->typeCoefficients->map(function ($evaluator) {
                $evaluator->id = $evaluator->evaluator->id;
                $evaluator->coefficient = $evaluator->coefficient;
                $evaluator->evaluation_type = $evaluator->evaluationType->name;
                $evaluator->evaluation_type_id = $evaluator->evaluationType->id;

                $evaluation = Evaluation::where('evaluator_id', $evaluator->evaluator->id)
                    ->where('evaluation_type_id', $evaluator->evaluation_type_id)->first();

                $evaluator->path_logo = $evaluator->evaluator->path_logo;
                $evaluator->first_name = $evaluator->evaluator->first_name;
                $evaluator->last_name = $evaluator->evaluator->last_name;
                $evaluator->mark = $evaluation->mark ?? '';
                $evaluator->evaluation = $evaluation->evaluation ?? '';
                $evaluator->ponderation = $evaluation->ponderation ?? '';
                return $evaluator;
            });
        });

        $allEvaluators = $evaluators_evaluation->merge($evaluatorsEvaluationCompany);
        $marks = $allEvaluators->pluck('mark')->toArray();
        $average = count($marks) > 0 ? array_sum($marks) / count($marks) : 0;
        $average = round($average, 2);

        $client = Client::find($jobOffer?->client_id);

        return view('matching.inc.evaluationPreview', [
            'evaluators_evaluation' => $evaluators_evaluation,
            'evaluatorsEvaluationCompany' => $evaluatorsEvaluationCompany,
            'profile' => $profile,
            'client' => $client,
            'jobOffer' => $jobOffer,
            'average' => $average,
        ]);

   }
}
