<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'USUARIO_NOME' => ['required', 'string', 'max:255'],
            'USUARIO_EMAIL' => ['required', 'string'],
            'USUARIO_SENHA' => ['required', 'string'],
            'USUARIO_CPF' => ['required']
        ];
    }
}
