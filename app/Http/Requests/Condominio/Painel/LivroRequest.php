<?php

namespace App\Http\Requests\Condominio\Painel;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo' => "required|min:3|max:255|string|unique:livros,titulo,{$url},url",
            'descricao' => 'required|min:3|max:5000|',
            'data' => 'required|min:10|max:10|',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
