<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActorRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:actors',
            'avatar' => 'nullable|sometimes|image|mimes:png,jpg,jpeg|max:2048'
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
            'name.required' => 'يرجي إدخال اسم الممثل',
            'name.string' => 'هذا الاسم لا يبدو صحيحا',
            'name.max' => 'الحد الأقصي لإسم الممثل لا يتعدي 255 حرفا',
            'name.unique' => 'هذا الاسم موجود بالفعل',
            'avatar.image' => 'هذا الملف غير صالح',
            'avatar.mimes' => 'الصيغ المقبولة للصورة jpg, png, jpeg',
            'avatar.max' => 'حجم الصورة كبير للغاية',
        ];
    }
}
