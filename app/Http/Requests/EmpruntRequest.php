<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpruntRequest extends FormRequest
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
            'liver_id' => 'exists:livers,id',
            "date_emprunt" => 'date',
            "date_retour" => 'required|date|after:date_emprunt',
        ];
    }

    public function messages(): array
    {
        return [
            'date_retour.after' => 'The :attribute must be date after ' . date('Y-m-d') . " (today)",
        ];
    }
}
