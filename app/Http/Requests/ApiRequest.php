<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class ApiRequest extends FormRequest
{
    /**
     * Get the error messages for the defined validation rules.*
     *
     * @param Validator|\Illuminate\Contracts\Validation\Validator $validator
     * @return array
     */
    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator): array
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
