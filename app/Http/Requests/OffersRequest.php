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
           'photo' => 'required|mimes:jpg,jpeg,png',
            'name_ar' => 'required|string|max:200',
            'name_en' => 'required|string|max:200|regex:/^[a-zA-Z0-9_ ]*$/',
            'price' => 'required|numeric|',
            'details_ar' => 'required|string|max:200|',
            'details_en' => 'required|string|max:200|',
        ];
    }

    public function messages()
    {
        return [
           'numeric' => __('messages.numeric val'),
            'required' => __('messages.required val'),
            'string' => __('messages.string val'),
            'name.max' => __('messages.name max val'),
            'details.max' => __('messages.details max val'),
        ];
    }
}
