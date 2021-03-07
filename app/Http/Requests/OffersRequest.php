<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:200|',
            'price' => 'required|numeric|',
            'details' => 'required|string|max:200|',
        ];
    }

    public function messages()
    {
        return [
      /*      'numeric' => 'لابد من إدخال أرقام فقط',
            'required' => 'هذا الحقل مطلوب',
            'string' => ' لابد ان يكون احرف',
            'name.max' => 'الإسم لابد الا يزيد عن 200 احرف ',
            'details.max' => 'التفاصيل لابد الا تزيد عن 200 احرف ',*/
        ];
    }
}
