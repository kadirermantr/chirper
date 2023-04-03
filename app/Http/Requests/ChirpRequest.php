<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChirpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:255',
        ];
    }
}
