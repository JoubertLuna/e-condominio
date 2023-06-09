<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;

class VisitanteRequest extends FormRequest
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
            'nome' => "required|min:3|max:255|unique:visitantes,nome,{$url},url",
            'rg' => "nullable|min:9|max:10|unique:visitantes,rg,{$url},url",
            'cpf' => "nullable|min:14|max:14|cpf|formato_cpf",
            'bloco_id' => 'required|exists:blocos,id',
            'unidade_id' => 'required|exists:unidades,id',
            'user_id' => 'required|exists:users,id',
            'data_entrada' => 'nullable|min:10|max:10|',
            'hora_entrada' => 'nullable|min:5|max:8|',
            'data_saida' => 'nullable|min:10|max:10|',
            'hora_saida' => 'nullable|min:5|max:8|',
            'obs' => 'nullable|min:3|max:5000|',
            'image' => 'nullable|max:2048|',
        ];
    }
}
