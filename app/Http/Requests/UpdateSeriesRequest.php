<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeriesRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', 'unique:movies,title,' . $this->movie->id],
            'category_id' => ['required', 'exists:categories,id'],
            'poster' => ['nullable', 'sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'watch_link' => ['required', 'url'],
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
            'title.required' => 'ادخل عنوان الفيلم',
            'title.string' => 'عنوان الفيلم يجب ان يكون نصا',
            'title.max' => 'الحد الاقصي لعنوان الفيلم 255 حرفا',
            'title.unique' => 'هذا الفيلم موجود مسبقا',
            'category_id.required' => 'حدد التصنيف الخاص بالفيلم رجاءاً',
            'category_id.exists' => 'التصنيف المحدد غير صحيح',
            'poster.required' => 'اضف بوستر الفيلم',
            'poster.image' => 'هذا الملف غير صالح',
            'poster.mimes' => 'الامتدادات المقبولة فقط jpg,jpeg,png',
            'watch_link.required' => 'اضف سيرفر المشاهدة',
            'watch_link.url' => 'هذا الرابط غير صحيح',
            'links.*.required' => 'رابط التحميل مطلوب',
            'links.*.url' => 'هذا الرابط غير صحيح',
            'actors.required' => 'اختر واحد من الممثلين علي الأقل',
            'actors.exists' => 'هذا الإختيار غير صحيح',
            'types' => 'حدد النوع الخاص بالفيلم',
            'quality.required' => 'يرجي تحديد جودة الفليم',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'dubbed_status' => 'لغة الفيديو'
        ];
    }
}
