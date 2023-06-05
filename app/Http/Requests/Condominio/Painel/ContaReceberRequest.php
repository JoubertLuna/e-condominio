<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContaReceberRequest extends FormRequest
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
            'nome' => "required|string|min:3|max:255|unique:conta_recebers,nome,{$url},url",
            'categoria_id' => 'required|exists:categorias,id',
            'data' => 'required|min:5|max:10|',
            'bancaria_id' => 'required|exists:bancarias,id',
            'valor' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
            'pago' => 'required', Rule::in(['S', 'N']),
            'bloco_id' => 'required|exists:blocos,id',
            'unidade_id' => 'required|exists:unidades,id',
            'user_id' => 'required|exists:users,id',
            'obs' => 'nullable|min:3|max:5000|',
        ];
    }

    public function validationData()
    {
        $dados = $this->all();

        $dados['valor'] = $this->formataValorMonetario($dados['valor']);

        $this->replace($dados);
        return $dados;
    }

    /**
     * formatação dos valores monetários
     */
    protected function formataValorMonetario(string $valor)
    {
        return str_replace(['.', ','], ['', '.'], $valor);
    }
}
