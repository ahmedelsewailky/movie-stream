<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesEpisodeRequest extends FormRequest
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
            'series_id' => ['required', 'exists:series,id'],
            'episode' => ['required', 'numeric'],
            'watch_link' => ['required', 'url'],
            'links.*' => ['required', 'url'],
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
            'series.required' => 'يرجي تحديد المسلسل',
            'series.exists' => 'المسلسل المحدد غير صحيح',
            'episode.required' => 'حدد رقم الحلقة',
            'episode.numeric' => 'اختيار غير صحيح',
            'watch_link.required' => 'اضف رابط المشاهدة',
            'watch_link.url' => 'هذا الرابط غير صحيح',
            'links.*.required' => 'اضف رابط تحميل واحد علي الأقل',
            'links.*.url' => 'هذا الرابط غير صحيح',
        ];
    }
}
