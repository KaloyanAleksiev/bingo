<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class NumberRequest extends ApiRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'required|integer|between:1,100'
        ];
    }
}
