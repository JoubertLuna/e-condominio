<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => "required|min:3|max:255|string|unique:users,name,{$url},url",
            'surname' => 'nullable|min:3|max:255|string',
            'email' => "required|email|max:255|string|unique:users,email,{$url},url",
            'password' => "required|min:8|max:36|confirmed|string|regex:/^(?=.*[A-Z])(?=.*[!#@$%&])(?=.*[0-9])(?=.*[a-z]).{8,36}$/",
            'cpf' => "nullable|min:14|max:14|cpf|formato_cpf|unique:users,cpf,{$url},url",
            'rg' => "nullable|min:9|max:10|unique:users,rg,{$url},url",
            'fone' => 'nullable|min:14|max:14|celular_com_ddd|',
            'celular' => 'nullable|min:15|max:15|celular_com_ddd|',
            'tipo_morador' => 'required', Rule::in(['P', 'I', 'F']),
            'image' => 'nullable|max:2048|',
            'condominio_id' => 'required|exists:condominios,id',
            'bloco_id' => 'required|exists:blocos,id',
            'unidade_id' => 'required|exists:unidades,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
