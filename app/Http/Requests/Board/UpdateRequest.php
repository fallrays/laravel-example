<?php

namespace App\Http\Requests\Board;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    public $validator = null;

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
            'id' => 'bail|required|max:30',
            'name' => 'bail|required|max:30',
            'email' => 'bail|nullable|email|max:100',
            'password' => 'bail|required|max:100',
            'title' => 'bail|required|max:255',
            'content' => 'required',
            'attach' => 'file|nullable',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID값은 필수입력입니다',
            'name.required' => '이름은 필수입력입니다',
            'name.max:30' => '이름 최대 길이는 30자입니다 ',
            'email.email' => '이메일형식에 맞지않습니다',
            'password.required' => '비밀번호는 필수입력입니다',
            'title.required' => '제목은 필수입력입니다',
            'content.required' => '내용은 필수입력입니다',
        ];
    }

    /**
     * Override
     */
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}