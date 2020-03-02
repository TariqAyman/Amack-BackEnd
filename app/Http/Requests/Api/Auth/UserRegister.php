<?php
declare(strict_types=1);

namespace App\Http\Requests\Api\Auth;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UserRegister extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mobile' => 'required | unique:users,mobile',
            'email' => 'required | unique:users,email',
            'password' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator): JsonResponse
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
