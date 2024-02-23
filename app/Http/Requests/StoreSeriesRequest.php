<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', 'unique:movies'],
            'category_id' => ['required', 'exists:categories,id'],
            'poster' => ['required', 'image', 'mimes:png,jpg,jpeg'],
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
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}
