<?php

namespace App\Http\Requests\JobOffre;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobOfferRequest extends FormRequest
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
            // ------------------------------Partie Recrutement------------------------------
            'client_id'                         => 'required',
            'city_id'                           => 'required',
            'activity_area_id'                  => 'required',
            'contract_type_id'                  => 'required',
            'title'                             => 'required',
            // 'recruitment_officers'              => ['required', 'array'],
            // 'recruitment_officers.*'            => ['exists:users,id'],
            'profession_id'                     => 'required',
            // 'status_change_mode'                => 'required',
            // 'company_info'                      => 'required',
            // 'formation_details'                 => 'required',
            // 'experience_details'                => 'required',
            // 'mission_details'                   => 'required',
            // 'Responsibilities_details'          => 'required',
            // 'technical_skills_details'          => 'required',
            // 'personal_skills_details'           => 'required',
            'nbr_profiles'                      => 'required',
            'mission_started_at'                => 'required',
            'mission_finished_at'               => 'required',
            'client_evaluator'                  => 'required',
            'company_evaluator'                 => 'required',
            // 'status_id'                         => 'required',

            // ------------------------------Partie Echelle------------------------------
            // la partie Prétention salariale
            'salaires' => 'required|array',
            'salaires.*.montant_min'      => 'required',
            'salaires.*.montant_max'       => 'required',
            'salaires.*.weight'          => 'required',

            // la partie formation
            'formations' => 'required|array',
            'formations.*.diploma_id_job_offer_formations'      => 'required',
            'formations.*.option_id_job_offer_formations'       => 'required',
            'formations.*.weight_formation_job_offer_formations'          => 'required',
            'formations.*.weight_option_job_offer_formations'          => 'required',

            // la partie expérience
            'experiences' => 'required|array',
            'experiences.*.profession_id_job_offer_experiences' => 'required',
            'experiences.*.years_job_offer_experiences' => 'required',
            'experiences.*.weight_profession_job_offer_experiences' => 'required',
            'experiences.*.weight_experience_job_offer_experiences' => 'required',

            // la partie compétences techniques
            'technical_skills' => 'required|array',
            'technical_skills.*.label_skill_types' => 'required',
            'technical_skills.*.label_skills' => 'required',
            'technical_skills.*.level_job_offers_skills' => 'required',
            'technical_skills.*.weight_job_offers_skills' => 'required',

            // Validation pour les compétences personnelles
            'personal_skills' => 'required|array',
            'personal_skills.*.label_skill_types' => 'required',
            'personal_skills.*.label_skills' => 'required',
            'personal_skills.*.level_job_offers_skills' => 'required',
            'personal_skills.*.weight_job_offers_skills' => 'required',

            // Validation pour les Compétences Linguistiques
            'language_skills' => 'required|array',
            'language_skills.*.label_skill_types' => 'required',
            'language_skills.*.multiple_skills' => 'required|array',
            'language_skills.*.multiple_skills.*.label_skills' => 'required',
            'language_skills.*.multiple_skills.*.level_job_offers_skills' => 'required',
            'language_skills.*.multiple_skills.*.weight_job_offers_skills' => 'required',

            // Validation pour les Mobilité
            'mobilitys.availabilitys.type' => 'required',
            'mobilitys.availabilitys.notice_duration' => 'required_if:mobilitys.availabilitys.type,notice',
        ];
    }

    public function messages(): array
    {
        return [
            // ------------------------------Partie Recrutement------------------------------
            'client_id.required'                  => __('generated_validation.client_id_required'),
            'city_id.required'                    => __('generated_validation.city_id_required'),
            'activity_area_id.required'           => __('generated_validation.activity_area_id_required'),
            'contract_type_id.required'           => __('generated_validation.contract_type_id_required'),
            'title.required'                      => __('generated_validation.title_required'),
            'profession_id.required'              => __('generated_validation.profession_id_required'),
            'nbr_profiles.required'               => __('generated_validation.nbr_profiles_required'),
            'mission_started_at.required'         => __('generated_validation.mission_started_at_required'),
            'mission_finished_at.required'        => __('generated_validation.mission_finished_at_required'),
            'client_evaluator.required'           => __('generated_validation.client_evaluator_required'),
            'company_evaluator.required'          => __('generated_validation.company_evaluator_required'),

            // ------------------------------Partie Echelle------------------------------
            // Formation
            'formations.required' => __('generated_validation.formations_required'),
            'formations.array' => __('generated_validation.formations_array'),
            'formations.*.diploma_id_job_offer_formations.required' => __('generated_validation.formations_diploma_id_required'),
            'formations.*.option_id_job_offer_formations.required' => __('generated_validation.formations_option_id_required'),
            'formations.*.weight_formation_job_offer_formations.required' => __('generated_validation.formations_weight_formation_required'),
            'formations.*.weight_option_job_offer_formations.required' => __('generated_validation.formations_weight_option_required'),

            // Expérience
            'experiences.required' => __('generated_validation.experiences_required'),
            'experiences.array' => __('generated_validation.experiences_array'),
            'experiences.*.profession_id_job_offer_experiences.required' => __('generated_validation.experiences_profession_id_required'),
            'experiences.*.years_job_offer_experiences.required' => __('generated_validation.experiences_years_required'),
            'experiences.*.weight_profession_job_offer_experiences.required' => __('generated_validation.experiences_weight_profession_required'),
            'experiences.*.weight_experience_job_offer_experiences.required' => __('generated_validation.experiences_weight_experience_required'),

            // Compétences techniques
            'technical_skills.required' => __('generated_validation.technical_skills_required'),
            'technical_skills.array' => __('generated_validation.technical_skills_array'),
            'technical_skills.*.label_skill_types.required' => __('generated_validation.technical_skills_label_skill_types_required'),
            'technical_skills.*.label_skills.required' => __('generated_validation.technical_skills_label_skills_required'),
            'technical_skills.*.level_job_offers_skills.required' => __('generated_validation.technical_skills_level_required'),
            'technical_skills.*.weight_job_offers_skills.required' => __('generated_validation.technical_skills_weight_required'),

            // Compétences personnelles
            'personal_skills.required' => __('generated_validation.personal_skills_required'),
            'personal_skills.*.label_skill_types.required' => __('generated_validation.personal_skills_label_skill_types_required'),
            'personal_skills.*.label_skills.required' => __('generated_validation.personal_skills_label_skills_required'),
            'personal_skills.*.level_job_offers_skills.required' => __('generated_validation.personal_skills_level_required'),
            'personal_skills.*.weight_job_offers_skills.required' => __('generated_validation.personal_skills_weight_required'),

            // Compétences linguistiques
            'language_skills.required' => __('generated_validation.language_skills_required'),
            'language_skills.array' => __('generated_validation.language_skills_array'),
            'language_skills.*.label_skill_types.required' => __('generated_validation.language_skills_label_skill_types_required'),
            'language_skills.*.multiple_skills.required' => __('generated_validation.language_skills_multiple_skills_required'),
            'language_skills.*.multiple_skills.array' => __('generated_validation.language_skills_multiple_skills_array'),
            'language_skills.*.multiple_skills.*.label_skills.required' => __('generated_validation.language_skills_label_skills_required'),
            'language_skills.*.multiple_skills.*.level_job_offers_skills.required' => __('generated_validation.language_skills_level_required'),
            'language_skills.*.multiple_skills.*.weight_job_offers_skills.required' => __('generated_validation.language_skills_weight_required'),

            // Mobilité
            'mobilitys.availabilitys.type.required' => __('generated_validation.mobilitys_availabilitys_type_required'),
            'mobilitys.availabilitys.notice_duration.required_if' => __('generated_validation.mobilitys_availabilitys_notice_duration_required_if'),
        ];
    }
}
