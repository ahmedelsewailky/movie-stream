<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:categories',
            'slug' => 'required|string|max:255|unique:categories',
            'parent_id' => 'nullable|sometimes|exists:categories,id'
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
            'name.required' => 'ادخل اسم القسم',
            'name.string' => 'ادخل رابط الوصول',
            'name.max' => 'اسم القسم طويل للغاية ، يجب ألا يتعدي الاسم عن 255 حرفا',
            'name.unique' => 'هذا الاسم موجود بالفعل ، فضلاً جرب اسم اخر',

            'slug.required' => 'لا يمكن ترك رابط الوصول فارغاً',
            'slug.string' => 'رابط الوصول لا بد ان يكون نصاً',
            'slug.max' => 'رابط الوصول طويل للغاية ، يجب ألا يتعدي الاسم عن 255 حرفا',
            'slug.unique' => 'هذا الاسم موجود بالفعل ، فضلاً جرب اسم اخر',

            'parent_id.required' => 'يجب تحديد القسم الرئيسي',
            'parent_id.exists' => 'القسم المحدد غير صحيح',
        ];
    }
}
