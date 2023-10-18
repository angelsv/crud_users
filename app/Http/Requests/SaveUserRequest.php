<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'lastname' => ['required', 'string', 'min:3', 'max:90'], // Asegura que lastname sea una cadena de al menos 3 caracteres y no más de 255 caracteres.
            'firstname' => ['required', 'string', 'min:3', 'max:90'], // Asegura que firstname sea una cadena de al menos 3 caracteres y no más de 255 caracteres.
            'birthday' => ['required', 'date_format:Y-m-d', 'before_or_equal:today'], // Asegura que birthday sea una fecha en el formato 'Y-m-d' y no sea en el futuro.
        ];
    }
}
