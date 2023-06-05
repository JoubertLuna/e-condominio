<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BancariaRequest extends FormRequest
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
            'nome' => "required|min:3|max:255|string|unique:bancarias,nome,{$url},url",
            'tipo_conta' => 'required', Rule::in(['P', 'C', 'S']),
            'agencia' => "required|min:4|max:4",
            'numero' => "required|min:5|max:12|unique:bancarias,numero,{$url},url",
            'digito' => "required|min:1|max:1",
            'banco_id' => 'required|exists:bancos,id',
            'condominio_id' => 'required|exists:condominios,id',
        ];
    }
}
