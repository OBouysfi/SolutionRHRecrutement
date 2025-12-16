<?php

namespace App\Http\Requests\TechnicalTest;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestResultRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Remplacez par une logique d'autorisation si nécessaire
    }

    /**
     * Définir les règles de validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'profile_id' => 'required|array',
            'profile_id.*' => 'required|integer|exists:profiles,id',
            'test_id' => 'required|integer|exists:test_techniques,id',
            'job_offer_id' => 'nullable|integer|exists:job_offers,id',
            'language' => 'required|string|max:255',
            'status' => 'required|string',
            'score' => 'nullable|integer',
            'date_test' => 'nullable|date',
            'nee_ful_scr' => 'nullable|boolean',
            'add_pro' => 'nullable|boolean',
        ];
    }

    /**
     * Messages d'erreur personnalisés si nécessaire.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'profile_id.required' => __('generated_validation.profile_id_required'),
            'profile_id.array' => __('generated_validation.profile_id_array'),
            'profile_id.*.required' => __('generated_validation.profile_id_each_required'),
            'profile_id.*.integer' => __('generated_validation.profile_id_each_integer'),
            'profile_id.*.exists' => __('generated_validation.profile_id_each_exists'),

            'test_id.required' => __('generated_validation.test_id_required'),
            'test_id.integer' => __('generated_validation.test_id_integer'),
            'test_id.exists' => __('generated_validation.test_id_exists'),

            'job_offer_id.integer' => __('generated_validation.job_offer_id_integer'),
            'job_offer_id.exists' => __('generated_validation.job_offer_id_exists'),

            'language.required' => __('generated_validation.language_required'),
            'language.string' => __('generated_validation.language_string'),
            'language.max' => __('generated_validation.language_max'),

            'status.required' => __('generated_validation.status_required'),
            'status.string' => __('generated_validation.status_string'),
            'status.in' => __('generated_validation.status_in'),

            'score.integer' => __('generated_validation.score_integer'),

            'date_test.date' => __('generated_validation.date_test_date'),

            'nee_ful_scr.boolean' => __('generated_validation.nee_ful_scr_boolean'),
            'add_pro.boolean' => __('generated_validation.add_pro_boolean'),
        ];
    }
}
