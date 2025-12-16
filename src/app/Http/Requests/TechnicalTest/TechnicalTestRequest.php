<?php

namespace App\Http\Requests\TechnicalTest;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalTestRequest extends FormRequest
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
            'test_name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_message' => 'nullable|string',
            'end_message' => 'nullable|string',
            'duration' => 'nullable|integer',
            'questions_number' => 'nullable|integer',
            'group'=> 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'global_score'=> 'nullable|integer',
            'average_score'=> 'nullable|integer',
            'language' => 'nullable|string|max:255',
            'ordered_questions' => 'nullable',
            'random_questions' => 'nullable',
            'question_navigation' => 'nullable',
            'show_question_list' => 'nullable',
            'show_read_question_button' => 'nullable',
            'is_active' => 'nullable',
            'questions.*' => 'nullable|array',
            'questions.*.type' => 'required|integer',
            'questions.*.point' => 'nullable|integer',
            'questions.*.id' => 'nullable|integer',
            'questions.*.question_text' => 'required|string',
            'questions.*.correct_answer' => 'nullable|string',
            'questions.*.options.*.answer_text' => 'nullable|string',
            'questions.*.options.*.is_correct' => 'nullable|boolean',
            'questions.*.options.*.order' => 'nullable|integer',
            'questions.*.options.*.right_item' => 'nullable|string',
            'questions.*.options.*.left_item' => 'nullable|string',
            'questions.*.options.*.option_id' => 'nullable|integer',


        ];
    }
}
