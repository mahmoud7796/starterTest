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
           'numeric' => __('messages.numeric val'),
            'required' => __('messages.required val'),
            'string' => __('messages.string val'),
            'name.max' => __('messages.name max val'),
            'details.max' => __('messages.details max val'),
        ];
    }
}
