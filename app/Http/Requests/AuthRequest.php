<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
            'name' => ['required','string'],
            'email' => ['required','email',Rule::unique(User::class,'email')],
            'phone' => ['required','min:12','max:12',Rule::unique(User::class,'phone')],
            'password' => ['required','confirmed','min:8']
        ];
    }
}
