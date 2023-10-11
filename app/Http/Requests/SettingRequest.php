<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

            'phone'=>'required',
            'email'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instaram'=>'required',
            'youtube'=>'required',
            'linkedin'=>'required',
           
        ];
    }


    public function messages(): array
    {
        return [

            'phone'=>'الهاتف غير موجد',
            'email'=>'الاميل غير موجد',
            'facebook'=>'فيسبوك غير موجد',
            'twitter'=>'تويتر غير موجد',
            'instaram'=>'انستجرام غير موجد',
            'youtube'=>'يوتيوب غير موجد',
            'linkedin'=>'لينكدان غير موجد',
        ];
    }

}
