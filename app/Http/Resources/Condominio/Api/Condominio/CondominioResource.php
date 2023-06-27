<?php

namespace App\Http\Resources\Condominio\Api\Condominio;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CondominioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'url' => $this->url,
            'email' => $this->email,
            'cnpj' => $this->cnpj,
            'fone' => $this->fone,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'uf' => $this->uf,
            'cidade' => $this->cidade,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'image' => $this->image,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'whatsapp' => $this->whatsapp,
        ];
    }
}
