<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['string', 'required', 'min:3'],
            'username' => ['alpha_num', 'required', 'min:3', 'unique:users,username'],
            'email' => ['email', 'required', 'unique:users,username'],
            'username' => ['required', 'min:6'],
        ];
    }
}
