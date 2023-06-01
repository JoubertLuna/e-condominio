<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|unique:pets,nome,{$id},id",
            'especie' => 'nullable|min:3|max:255|string',
            'raca' => 'nullable|min:3|max:255|string',
            'sexo' => 'required', Rule::in(['F', 'M']),
            'user_id' => 'required|exists:users,id',
        ];
    }
}
