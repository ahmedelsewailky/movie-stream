<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeRequest extends FormRequest
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
            'episode' => ['required', 'numeric'],
            'watch_link' => ['required', 'url'],
            'links.*' => ['sometimes', 'nullable', 'url'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'episode.required' => 'حدد رقم الحلقة',
            'episode.numeric' => 'اختيار غير صحيح',
            'watch_link.required' => 'اضف رابط المشاهدة',
            'watch_link.url' => 'هذا الرابط غير صحيح',
            'links.*.url' => 'هذا الرابط غير صحيح',
        ];
    }
}
