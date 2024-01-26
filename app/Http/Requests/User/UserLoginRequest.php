<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'bail|required|email|max:100',
            'password' => 'bail|required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '이메일은 필수입력입니다',
            'email.email' => '이메일형식에 맞지않습니다',
            'email.max:100' => '이메일 최대 길이는 100자입니다 ',
            'password.required' => '비밀번호는 필수입력입니다',
            'password.max:100' => '비밀번호는 최대 길이는 100자입니다 '
        ];
    }
}
