<?php

namespace App\Http\Requests\Api\Users\Licenses;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateLicense extends FormRequest
{
    public function rules()
    {
        return [
            'licenseNumber' => 'required',
            'frontPhoto' => 'required',
            'frontPhoto.name' => 'required',
            'frontPhoto.content' => 'required',
            'backPhoto' => 'required',
            'backPhoto.name' => 'required',
            'backPhoto.content' => 'required',
            'courseId' => 'exists:diving_courses,id',
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
