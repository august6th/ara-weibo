<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * @author heng.li 2020/5/29
 * Class Register
 * @package App\Http\Requests\User
 * @property-read string $username
 * @property-read string $email
 * @property-read string $password
 */
class Register extends FormRequest
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
            'username' => 'required|max:30',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
