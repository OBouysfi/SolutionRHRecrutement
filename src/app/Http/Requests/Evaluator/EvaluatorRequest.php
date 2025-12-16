<?php

namespace App\Http\Requests\Evaluator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EvaluatorRequest extends FormRequest
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
            //
            'logo_path' => 'nullable|array',
            'logo_path.*'=> 'nullable|image|mimes:jpeg,png,jpg',
            'evaluatorId' => 'nullable|array',
            'first_name' => 'nullable|array',
            'first_name.*' => 'nullable|string|max:255',
            'last_name' => 'nullable|array',
            'last_name.*' => 'nullable|string|max:255',
            'email' => 'nullable|array',
            'email.*' => 'nullable|email|max:255',
            'profession_id' => 'nullable|array',
            'profession_id.*' => 'nullable|exists:professions,id',
            'client_id' => 'nullable|exists:clients,id',
            'company_id' => 'nullable|exists:companies,id',
            'evaluator_id.*.*' => 'nullable',
            'evaluation_type_id.*.*' => 'nullable',
            'coefficient.*.*' => 'nullable'
        ];
    }

    public function messages(){
        return [
     // Logo
        'logo_path.*.image' => 'Chaque logo doit être une image.',
        'logo_path.*.mimes' => 'Les formats autorisés pour les logos sont : jpeg, png, jpg.',

        // Prénom
        'first_name.*.string' => 'Le prénom doit être une chaîne de caractères.',
        'first_name.*.max' => 'Le prénom ne doit pas dépasser 255 caractères.',

        // Nom
        'last_name.*.string' => 'Le nom doit être une chaîne de caractères.',
        'last_name.*.max' => 'Le nom ne doit pas dépasser 255 caractères.',

        // Email
        'email.*.email' => 'Chaque email doit être une adresse email valide.',
        'email.*.max' => 'Chaque email ne doit pas dépasser 255 caractères.',
        // si tu veux tester l'unicité par exemple sur une table evaluators
        // 'email.*.unique' => 'Cet email est déjà utilisé.',

        // Profession
        'profession_id.*.exists' => 'La profession sélectionnée est invalide.',

        // client et compagnie
        'client_id.exists' => 'Le client sélectionné est invalide.',
        'company_id.exists' => 'L\'entreprise sélectionnée est invalide.',

        // Champs imbriqués
        'evaluator_id.*.*.nullable' => 'Le champ évaluateur est invalide.',
        'evaluation_type_id.*.*.nullable' => 'Le type d\'évaluation est invalide.',
        'coefficient.*.*.nullable' => 'Le coefficient est invalide.',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $emails = $this->input('email', []);
            $evaluatorIds = $this->input('evaluatorId', []);

            foreach ($emails as $index => $email) {
                if (empty($email)) continue;

                $evaluatorId = $evaluatorIds[$index] ?? null;

                $query = \App\Models\User::where('email', $email);
                if ($evaluatorId) {
                    // Si c’est une mise à jour, on ignore l’utilisateur lié
                    $evaluator = \App\Models\Evaluator::find($evaluatorId);
                    if ($evaluator && $evaluator->user_related_id) {
                        $query->where('id', '!=', $evaluator->user_related_id);
                    }
                }

                if ($query->exists()) {
                    $validator->errors()->add("email.$index", "L'email « $email » est déjà utilisé.");
                }
            }
        });
    }

}
