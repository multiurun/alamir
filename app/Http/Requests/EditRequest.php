<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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

            'title'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'key_words'=>'required',
            'content'=>'required',
           
        ];
    }


    public function messages(): array
    {
        return [

            'title.required'=>'العنوان غير موجود',
            'category_id.required'=>'يجب اختيار قسم',
            'meta_title.required'=>'seo titleيجب ادخال ',
            'meta_description.required'=>'يجب ادخال',
            'key_words.required'=>' seo uk,hk ادخال',
            'content.required'=>'يجب ادخال محتوى',
        ];
    }

    
}
