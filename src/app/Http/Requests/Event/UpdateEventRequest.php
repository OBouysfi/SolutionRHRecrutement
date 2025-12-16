<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'event_url' => 'nullable|url',
            'location' => 'nullable|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required',
            'reminder' => 'integer|min:0',
            'high_importance' => 'boolean',
            'description' => 'nullable|string',
            'is_favorite' => 'boolean',
            'is_draft' => 'boolean',
            'participants' => 'nullable|array',
            'destinataires' => 'nullable|array',
            'attachments.*' => 'nullable|file|max:2048',
        ];
    }

    /**
     * Custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => __('generated_validation.title_required'),
            'title.string' => __('generated_validation.title_string'),
            'title.max' => __('generated_validation.title_max'),

            'event_type.required' => __('generated_validation.event_type_required'),
            'event_type.in' => __('generated_validation.event_type_in'),

            'event_url.url' => __('generated_validation.event_url_url'),

            'location.string' => __('generated_validation.location_string'),
            'location.max' => __('generated_validation.location_max'),

            'date.required' => __('generated_validation.date_required'),
            'date.date' => __('generated_validation.date_date'),
            'date.after_or_equal' => __('generated_validation.date_after_or_equal'),

            'start_time.required' => __('generated_validation.start_time_required'),
            'start_time.date_format' => __('generated_validation.start_time_date_format'),

            'end_time.required' => __('generated_validation.end_time_required'),
            'end_time.date_format' => __('generated_validation.end_time_date_format'),
            'end_time.after' => __('generated_validation.end_time_after'),

            'reminder.integer' => __('generated_validation.reminder_integer'),
            'reminder.in' => __('generated_validation.reminder_in'),
            'reminder.min' => __('generated_validation.reminder_min'),

            'high_importance.boolean' => __('generated_validation.high_importance_boolean'),

            'description.string' => __('generated_validation.description_string'),

            'is_favorite.boolean' => __('generated_validation.is_favorite_boolean'),
            'is_draft.boolean' => __('generated_validation.is_draft_boolean'),

            'participants.array' => __('generated_validation.participants_array'),
            'participants.*.exists' => __('generated_validation.participants_exists'),

            'destinataires.array' => __('generated_validation.destinataires_array'),
            'destinataires.*.exists' => __('generated_validation.destinataires_exists'),

            'attachments.array' => __('generated_validation.attachments_array'),
            'attachments.*.file' => __('generated_validation.attachments_file'),
            'attachments.*.max' => __('generated_validation.attachments_max'),
        ];
    }
}
