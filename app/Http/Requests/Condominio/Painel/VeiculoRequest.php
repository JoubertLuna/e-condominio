<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VeiculoRequest extends FormRequest
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
        $url = $this->segment(2);

        return [
            'user_id' => 'required|exists:users,id',
            'tipo_veiculo' => 'required', Rule::in(['C', 'M']),
            'marca' => "nullable|min:3|max:255|string",
            'modelo' => 'nullable|min:3|max:255|string',
            'placa' => "required|min:3|max:255|formato_placa_de_veiculo|unique:veiculos,placa,{$url},url",
            'unidade_id' => 'required|exists:unidades,id',
        ];
    }
}
