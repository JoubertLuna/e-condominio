<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FornecedorRequest extends FormRequest
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
            'razao_social' => "required|min:3|max:255|unique:fornecedors,razao_social,{$url},url",
            'nome_fantasia' => 'nullable|min:3|max:255|',
            'cpf' => 'nullable|min:14|max:14|cpf|formato_cpf|',
            'cnpj' => 'nullable|min:18|max:18|cnpj|formato_cnpj|',
            'data_cadastro' => 'required|min:10|max:10|',
            'ativo' => 'required', Rule::in(['S', 'N']),
            'fone' => 'nullable|min:14|max:14|celular_com_ddd|',
            'celular' => 'nullable|min:15|max:15|',
            'email' => "required|string|email|min:3|max:255|unique:fornecedors,email,{$url},url",
            'cep' => 'required|min:9|max:10|',
            'logradouro' => 'nullable|max:200|',
            'numero' => 'nullable|numeric',
            'uf' => 'nullable|min:2|max:2|uf|',
            'cidade' => 'nullable|max:200|',
            'complemento' => 'nullable|max:200|',
            'bairro' => 'nullable|max:200|',
            'rg' => 'nullable|min:9|max:10|',
        ];
    }
}
