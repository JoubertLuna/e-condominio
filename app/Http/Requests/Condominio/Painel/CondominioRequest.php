<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;

class CondominioRequest extends FormRequest
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
            'nome' => "required|min:3|max:255|unique:condominios,nome,{$url},url",
            'email' => "required|string|email|max:255|unique:condominios,email,{$url},url",
            'cep' => 'nullable|min:9|max:10|',
            'logradouro' => 'nullable|max:200|',
            'numero' => 'nullable|numeric|',
            'uf' => 'nullable|min:2|max:2|uf|',
            'cidade' => 'nullable|max:200|',
            'complemento' => 'nullable|max:200|',
            'bairro' => 'nullable|max:200|',
            'cnpj' => 'required|min:18|max:18|cnpj|formato_cnpj|',
            'fone' => 'nullable||min:14|max:14|celular_com_ddd|',
            'image' => 'nullable|max:2048|',
            'facebook' => 'nullable|min:10|max:255|',
            'twitter' => 'nullable|min:10|max:255|',
            'linkedin' => 'nullable|min:10|max:255|',
            'instagram' => 'nullable|min:10|max:255|',
            'tiktok' => 'nullable|min:10|max:255|',
            'whatsapp' => 'nullable||min:15|max:15|celular_com_ddd|',
        ];
    }
}
