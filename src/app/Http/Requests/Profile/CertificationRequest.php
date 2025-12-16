<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'nullable|image|max:10048',
            'organisme' => 'required|string|max:255',
            'numero_accreditation' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            // 'ville' => 'nullable|integer|max:255',
            // 'pays' => 'nullable|integer|max:255',
            'telephone_1' => 'nullable|string|max:20',
            'telephone_2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'nom_certification' => 'required|string|max:255',
            'criteres_evaluation' => 'nullable|string',
            'theme_certification' => 'nullable|string|max:255',
            'score_resultat' => 'nullable|string|max:255',
            'niveau_certification' => 'nullable|string|max:255',
            'date_obtention' => 'nullable|date',
            'volume_horaire' => 'nullable|string|max:255',
            'date_expiration' => 'nullable|date',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    
    public function messages(): array
    {
        return [
            'logo.image' => __('generated_validation.logo_image'),
            'logo.max' => __('generated_validation.logo_max'),

            'organisme.required' => __('generated_validation.organisme_required'),
            'organisme.string' => __('generated_validation.organisme_string'),
            'organisme.max' => __('generated_validation.organisme_max'),

            'numero_accreditation.string' => __('generated_validation.numero_accreditation_string'),
            'numero_accreditation.max' => __('generated_validation.numero_accreditation_max'),

            'adresse.string' => __('generated_validation.adresse_string'),
            'adresse.max' => __('generated_validation.adresse_max'),

            'city_id.exists' => __('generated_validation.city_id_exists'),

            'pays.string' => __('generated_validation.pays_string'),
            'pays.max' => __('generated_validation.pays_max'),

            'telephone_1.string' => __('generated_validation.telephone_1_string'),
            'telephone_1.max' => __('generated_validation.telephone_1_max'),

            'telephone_2.string' => __('generated_validation.telephone_2_string'),
            'telephone_2.max' => __('generated_validation.telephone_2_max'),

            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),

            'nom_certification.required' => __('generated_validation.nom_certification_required'),
            'nom_certification.string' => __('generated_validation.nom_certification_string'),
            'nom_certification.max' => __('generated_validation.nom_certification_max'),

            'criteres_evaluation.string' => __('generated_validation.criteres_evaluation_string'),

            'theme_certification.string' => __('generated_validation.theme_certification_string'),
            'theme_certification.max' => __('generated_validation.theme_certification_max'),

            'score_resultat.string' => __('generated_validation.score_resultat_string'),
            'score_resultat.max' => __('generated_validation.score_resultat_max'),

            'niveau_certification.string' => __('generated_validation.niveau_certification_string'),
            'niveau_certification.max' => __('generated_validation.niveau_certification_max'),

            'date_obtention.date' => __('generated_validation.date_obtention_date'),

            'volume_horaire.string' => __('generated_validation.volume_horaire_string'),
            'volume_horaire.max' => __('generated_validation.volume_horaire_max'),

            'date_expiration.date' => __('generated_validation.date_expiration_date'),
        ];        
    }
}