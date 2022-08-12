<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'from_address' => ['required','string'],
                'to_address' => ['required','string'],
                'price' => ['required','numeric'],
                'phone' => ['required','min:9','max:9'],
            ];
    }
}
