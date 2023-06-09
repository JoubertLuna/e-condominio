<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resource::create([
            'nome' => 'Home Index',
            'resource' => 'home',
        ]);
        //Condominio
        Resource::create([
            'nome' => 'Condomínio Index',
            'resource' => 'condominio.index',
        ]);

        Resource::create([
            'nome' => ' Condomínio Create',
            'resource' => 'condominio.create',
        ]);

        Resource::create([
            'nome' => 'Condomínio Store',
            'resource' => 'condominio.store',
        ]);

        Resource::create([
            'nome' => 'Condomínio Show',
            'resource' => 'condominio.show',
        ]);

        Resource::create([
            'nome' => 'Condomínio Edit',
            'resource' => 'condominio.edit',
        ]);

        Resource::create([
            'nome' => ' Condomínio Update',
            'resource' => 'condominio.update',
        ]);

        Resource::create([
            'nome' => 'Condomínio Destroy',
            'resource' => 'condominio.destroy',
        ]);
        //Condominio

        //Bloco
        Resource::create([
            'nome' => 'Bloco Index',
            'resource' => 'bloco.index',
        ]);

        Resource::create([
            'nome' => ' Bloco Create',
            'resource' => 'bloco.create',
        ]);

        Resource::create([
            'nome' => 'Bloco Store',
            'resource' => 'bloco.store',
        ]);

        Resource::create([
            'nome' => 'Bloco Show',
            'resource' => 'bloco.show',
        ]);

        Resource::create([
            'nome' => 'Bloco Edit',
            'resource' => 'bloco.edit',
        ]);

        Resource::create([
            'nome' => ' Bloco Update',
            'resource' => 'bloco.update',
        ]);

        Resource::create([
            'nome' => 'Bloco Destroy',
            'resource' => 'bloco.destroy',
        ]);
        //Bloco

        //Unidade
        Resource::create([
            'nome' => 'Unidade Index',
            'resource' => 'unidade.index',
        ]);

        Resource::create([
            'nome' => ' Unidade Create',
            'resource' => 'unidade.create',
        ]);

        Resource::create([
            'nome' => 'Unidade Store',
            'resource' => 'unidade.store',
        ]);

        Resource::create([
            'nome' => 'Unidade Show',
            'resource' => 'unidade.show',
        ]);

        Resource::create([
            'nome' => 'Unidade Edit',
            'resource' => 'unidade.edit',
        ]);

        Resource::create([
            'nome' => ' Unidade Update',
            'resource' => 'unidade.update',
        ]);

        Resource::create([
            'nome' => 'Unidade Destroy',
            'resource' => 'unidade.destroy',
        ]);
        //Unidade

        //User
        Resource::create([
            'nome' => 'Morador Index',
            'resource' => 'user.index',
        ]);

        Resource::create([
            'nome' => ' Morador Create',
            'resource' => 'user.create',
        ]);

        Resource::create([
            'nome' => 'Morador Store',
            'resource' => 'user.store',
        ]);

        Resource::create([
            'nome' => 'Morador Show',
            'resource' => 'user.show',
        ]);

        Resource::create([
            'nome' => 'Morador Edit',
            'resource' => 'user.edit',
        ]);

        Resource::create([
            'nome' => ' Morador Update',
            'resource' => 'user.update',
        ]);

        Resource::create([
            'nome' => 'Morador Destroy',
            'resource' => 'user.destroy',
        ]);
        //User

        //Pet
        Resource::create([
            'nome' => 'Pet Index',
            'resource' => 'pet.index',
        ]);

        Resource::create([
            'nome' => ' Pet Create',
            'resource' => 'pet.create',
        ]);

        Resource::create([
            'nome' => 'Pet Store',
            'resource' => 'pet.store',
        ]);

        Resource::create([
            'nome' => 'Pet Show',
            'resource' => 'pet.show',
        ]);

        Resource::create([
            'nome' => 'Pet Edit',
            'resource' => 'pet.edit',
        ]);

        Resource::create([
            'nome' => ' Pet Update',
            'resource' => 'pet.update',
        ]);

        Resource::create([
            'nome' => 'Pet Destroy',
            'resource' => 'pet.destroy',
        ]);
        //Pet

        //Veículo
        Resource::create([
            'nome' => 'Veículo Index',
            'resource' => 'veiculo.index',
        ]);

        Resource::create([
            'nome' => ' Veículo Create',
            'resource' => 'veiculo.create',
        ]);

        Resource::create([
            'nome' => 'Veículo Store',
            'resource' => 'veiculo.store',
        ]);

        Resource::create([
            'nome' => 'Veículo Show',
            'resource' => 'veiculo.show',
        ]);

        Resource::create([
            'nome' => 'Veículo Edit',
            'resource' => 'veiculo.edit',
        ]);

        Resource::create([
            'nome' => ' Veículo Update',
            'resource' => 'veiculo.update',
        ]);

        Resource::create([
            'nome' => 'Veículo Destroy',
            'resource' => 'veiculo.destroy',
        ]);
        //Veículo

        //Área Comum
        Resource::create([
            'nome' => 'Área Comum Index',
            'resource' => 'area.index',
        ]);

        Resource::create([
            'nome' => ' Área Comum Create',
            'resource' => 'area.create',
        ]);

        Resource::create([
            'nome' => 'Área Comum Store',
            'resource' => 'area.store',
        ]);

        Resource::create([
            'nome' => 'Área Comum Show',
            'resource' => 'area.show',
        ]);

        Resource::create([
            'nome' => 'Área Comum Edit',
            'resource' => 'area.edit',
        ]);

        Resource::create([
            'nome' => ' Área Comum Update',
            'resource' => 'area.update',
        ]);

        Resource::create([
            'nome' => 'Área Comum Destroy',
            'resource' => 'area.destroy',
        ]);
        //Área Comum

        //Assembleia
        Resource::create([
            'nome' => 'Assembleia Index',
            'resource' => 'assembleia.index',
        ]);

        Resource::create([
            'nome' => ' Assembleia Create',
            'resource' => 'assembleia.create',
        ]);

        Resource::create([
            'nome' => 'Assembleia Store',
            'resource' => 'assembleia.store',
        ]);

        Resource::create([
            'nome' => 'Assembleia Show',
            'resource' => 'assembleia.show',
        ]);

        Resource::create([
            'nome' => 'Assembleia Edit',
            'resource' => 'assembleia.edit',
        ]);

        Resource::create([
            'nome' => ' Assembleia Update',
            'resource' => 'assembleia.update',
        ]);

        Resource::create([
            'nome' => 'Assembleia Destroy',
            'resource' => 'assembleia.destroy',
        ]);
        //Assembleia

        //Livro de Ocorrência
        Resource::create([
            'nome' => 'Livro de Ocorrência Index',
            'resource' => 'livro.index',
        ]);

        Resource::create([
            'nome' => ' Livro de Ocorrência Create',
            'resource' => 'livro.create',
        ]);

        Resource::create([
            'nome' => 'Livro de Ocorrência Store',
            'resource' => 'livro.store',
        ]);

        Resource::create([
            'nome' => 'Livro de Ocorrência Show',
            'resource' => 'livro.show',
        ]);

        Resource::create([
            'nome' => 'Livro de Ocorrência Edit',
            'resource' => 'livro.edit',
        ]);

        Resource::create([
            'nome' => ' Livro de Ocorrência Update',
            'resource' => 'livro.update',
        ]);

        Resource::create([
            'nome' => 'Livro de Ocorrência Destroy',
            'resource' => 'livro.destroy',
        ]);
        //Livro de Ocorrência

        //Anúncio
        Resource::create([
            'nome' => 'Anúncio Index',
            'resource' => 'anuncio.index',
        ]);

        Resource::create([
            'nome' => ' Anúncio Create',
            'resource' => 'anuncio.create',
        ]);

        Resource::create([
            'nome' => 'Anúncio Store',
            'resource' => 'anuncio.store',
        ]);

        Resource::create([
            'nome' => 'Anúncio Show',
            'resource' => 'anuncio.show',
        ]);

        Resource::create([
            'nome' => 'Anúncio Edit',
            'resource' => 'anuncio.edit',
        ]);

        Resource::create([
            'nome' => ' Anúncio Update',
            'resource' => 'anuncio.update',
        ]);

        Resource::create([
            'nome' => 'Anúncio Destroy',
            'resource' => 'anuncio.destroy',
        ]);
        //Anúncio

        //Reserva de Ambiente
        Resource::create([
            'nome' => 'Reserva de Ambiente Index',
            'resource' => 'reserva.index',
        ]);

        Resource::create([
            'nome' => ' Reserva de Ambiente Create',
            'resource' => 'reserva.create',
        ]);

        Resource::create([
            'nome' => 'Reserva de Ambiente Store',
            'resource' => 'reserva.store',
        ]);

        Resource::create([
            'nome' => 'Reserva de Ambiente Show',
            'resource' => 'reserva.show',
        ]);

        Resource::create([
            'nome' => 'Reserva de Ambiente Edit',
            'resource' => 'reserva.edit',
        ]);

        Resource::create([
            'nome' => ' Reserva de Ambiente Update',
            'resource' => 'reserva.update',
        ]);

        Resource::create([
            'nome' => 'Reserva de Ambiente Destroy',
            'resource' => 'reserva.destroy',
        ]);
        //Reserva de Ambiente

        //Banco
        Resource::create([
            'nome' => 'Banco Index',
            'resource' => 'banco.index',
        ]);

        Resource::create([
            'nome' => ' Banco Create',
            'resource' => 'banco.create',
        ]);

        Resource::create([
            'nome' => 'Banco Store',
            'resource' => 'banco.store',
        ]);

        Resource::create([
            'nome' => 'Banco Show',
            'resource' => 'banco.show',
        ]);

        Resource::create([
            'nome' => 'Banco Edit',
            'resource' => 'banco.edit',
        ]);

        Resource::create([
            'nome' => ' Banco Update',
            'resource' => 'banco.update',
        ]);

        Resource::create([
            'nome' => 'Banco Destroy',
            'resource' => 'banco.destroy',
        ]);
        //Banco

        //Categoria
        Resource::create([
            'nome' => 'Categoria Index',
            'resource' => 'categoria.index',
        ]);

        Resource::create([
            'nome' => ' Categoria Create',
            'resource' => 'categoria.create',
        ]);

        Resource::create([
            'nome' => 'Categoria Store',
            'resource' => 'categoria.store',
        ]);

        Resource::create([
            'nome' => 'Categoria Show',
            'resource' => 'categoria.show',
        ]);

        Resource::create([
            'nome' => 'Categoria Edit',
            'resource' => 'categoria.edit',
        ]);

        Resource::create([
            'nome' => ' Categoria Update',
            'resource' => 'categoria.update',
        ]);

        Resource::create([
            'nome' => 'Categoria Destroy',
            'resource' => 'categoria.destroy',
        ]);
        //Categoria

        //Conta Bancária
        Resource::create([
            'nome' => 'Conta Bancária Index',
            'resource' => 'bancaria.index',
        ]);

        Resource::create([
            'nome' => ' Conta Bancária Create',
            'resource' => 'bancaria.create',
        ]);

        Resource::create([
            'nome' => 'Conta Bancária Store',
            'resource' => 'bancaria.store',
        ]);

        Resource::create([
            'nome' => 'Conta Bancária Show',
            'resource' => 'bancaria.show',
        ]);

        Resource::create([
            'nome' => 'Conta Bancária Edit',
            'resource' => 'bancaria.edit',
        ]);

        Resource::create([
            'nome' => ' Conta Bancária Update',
            'resource' => 'bancaria.update',
        ]);

        Resource::create([
            'nome' => 'Conta Bancária Destroy',
            'resource' => 'bancaria.destroy',
        ]);
        //Conta Bancária

        //Fornecedor
        Resource::create([
            'nome' => 'Fornecedor Index',
            'resource' => 'fornecedor.index',
        ]);

        Resource::create([
            'nome' => ' Fornecedor Create',
            'resource' => 'fornecedor.create',
        ]);

        Resource::create([
            'nome' => 'Fornecedor Store',
            'resource' => 'fornecedor.store',
        ]);

        Resource::create([
            'nome' => 'Fornecedor Show',
            'resource' => 'fornecedor.show',
        ]);

        Resource::create([
            'nome' => 'Fornecedor Edit',
            'resource' => 'fornecedor.edit',
        ]);

        Resource::create([
            'nome' => ' Fornecedor Update',
            'resource' => 'fornecedor.update',
        ]);

        Resource::create([
            'nome' => 'Fornecedor Destroy',
            'resource' => 'fornecedor.destroy',
        ]);
        //Fornecedor

        //Conta a Pagar
        Resource::create([
            'nome' => 'Conta a Pagar Index',
            'resource' => 'conta_pagar.index',
        ]);

        Resource::create([
            'nome' => ' Conta a Pagar Create',
            'resource' => 'conta_pagar.create',
        ]);

        Resource::create([
            'nome' => 'Conta a Pagar Store',
            'resource' => 'conta_pagar.store',
        ]);

        Resource::create([
            'nome' => 'Conta a Pagar Show',
            'resource' => 'conta_pagar.show',
        ]);

        Resource::create([
            'nome' => 'Conta a Pagar Edit',
            'resource' => 'conta_pagar.edit',
        ]);

        Resource::create([
            'nome' => ' Conta a Pagar Update',
            'resource' => 'conta_pagar.update',
        ]);

        Resource::create([
            'nome' => 'Conta a Pagar Destroy',
            'resource' => 'conta_pagar.destroy',
        ]);
        //Conta a Pagar

        //Conta a Receber
        Resource::create([
            'nome' => 'Conta a Receber Index',
            'resource' => 'conta_receber.index',
        ]);

        Resource::create([
            'nome' => ' Conta a Receber Create',
            'resource' => 'conta_receber.create',
        ]);

        Resource::create([
            'nome' => 'Conta a Receber Store',
            'resource' => 'conta_receber.store',
        ]);

        Resource::create([
            'nome' => 'Conta a Receber Show',
            'resource' => 'conta_receber.show',
        ]);

        Resource::create([
            'nome' => 'Conta a Receber Edit',
            'resource' => 'conta_receber.edit',
        ]);

        Resource::create([
            'nome' => ' Conta a Receber Update',
            'resource' => 'conta_receber.update',
        ]);

        Resource::create([
            'nome' => 'Conta a Receber Destroy',
            'resource' => 'conta_receber.destroy',
        ]);
        //Conta a Receber

        //Visitante
        Resource::create([
            'nome' => 'Visitante Index',
            'resource' => 'visitante.index',
        ]);

        Resource::create([
            'nome' => ' Visitante Create',
            'resource' => 'visitante.create',
        ]);

        Resource::create([
            'nome' => 'Visitante Store',
            'resource' => 'visitante.store',
        ]);

        Resource::create([
            'nome' => 'Visitante Show',
            'resource' => 'visitante.show',
        ]);

        Resource::create([
            'nome' => 'Visitante Edit',
            'resource' => 'visitante.edit',
        ]);

        Resource::create([
            'nome' => ' Visitante Update',
            'resource' => 'visitante.update',
        ]);

        Resource::create([
            'nome' => 'Visitante Destroy',
            'resource' => 'visitante.destroy',
        ]);
        //Visitante

        //Patrimônio
        Resource::create([
            'nome' => 'Patrimônio Index',
            'resource' => 'patrimonio.index',
        ]);

        Resource::create([
            'nome' => ' Patrimônio Create',
            'resource' => 'patrimonio.create',
        ]);

        Resource::create([
            'nome' => 'Patrimônio Store',
            'resource' => 'patrimonio.store',
        ]);

        Resource::create([
            'nome' => 'Patrimônio Show',
            'resource' => 'patrimonio.show',
        ]);

        Resource::create([
            'nome' => 'Patrimônio Edit',
            'resource' => 'patrimonio.edit',
        ]);

        Resource::create([
            'nome' => ' Patrimônio Update',
            'resource' => 'patrimonio.update',
        ]);

        Resource::create([
            'nome' => 'Patrimônio Destroy',
            'resource' => 'patrimonio.destroy',
        ]);
        //Patrimônio

        //Estado
        Resource::create([
            'nome' => 'Estado Index',
            'resource' => 'estado.index',
        ]);

        Resource::create([
            'nome' => ' Estado Create',
            'resource' => 'estado.create',
        ]);

        Resource::create([
            'nome' => 'Estado Store',
            'resource' => 'estado.store',
        ]);

        Resource::create([
            'nome' => 'Estado Show',
            'resource' => 'estado.show',
        ]);

        Resource::create([
            'nome' => 'Estado Edit',
            'resource' => 'estado.edit',
        ]);

        Resource::create([
            'nome' => ' Estado Update',
            'resource' => 'estado.update',
        ]);

        Resource::create([
            'nome' => 'Estado Destroy',
            'resource' => 'estado.destroy',
        ]);
        //Estado

        //Perfil
        Resource::create([
            'nome' => 'Perfil Index',
            'resource' => 'role.index',
        ]);

        Resource::create([
            'nome' => ' Perfil Create',
            'resource' => 'role.create',
        ]);

        Resource::create([
            'nome' => 'Perfil Store',
            'resource' => 'role.store',
        ]);

        Resource::create([
            'nome' => 'Perfil Show',
            'resource' => 'role.show',
        ]);

        Resource::create([
            'nome' => 'Perfil Edit',
            'resource' => 'role.edit',
        ]);

        Resource::create([
            'nome' => ' Perfil Update',
            'resource' => 'role.update',
        ]);

        Resource::create([
            'nome' => 'Perfil Destroy',
            'resource' => 'role.destroy',
        ]);
        //Perfil

        //Permissão
        Resource::create([
            'nome' => 'Permissão Index',
            'resource' => 'resource.index',
        ]);

        Resource::create([
            'nome' => ' Permissão Create',
            'resource' => 'resource.create',
        ]);

        Resource::create([
            'nome' => 'Permissão Store',
            'resource' => 'resource.store',
        ]);

        Resource::create([
            'nome' => 'Permissão Show',
            'resource' => 'resource.show',
        ]);

        Resource::create([
            'nome' => 'Permissão Edit',
            'resource' => 'resource.edit',
        ]);

        Resource::create([
            'nome' => ' Permissão Update',
            'resource' => 'resource.update',
        ]);

        Resource::create([
            'nome' => 'Permissão Destroy',
            'resource' => 'resource.destroy',
        ]);
        //Permissão

        //Config Geral
        Resource::create([
            'nome' => 'Condominio Geral',
            'resource' => 'condominio.geral',
        ]);
        Resource::create([
            'nome' => 'Financeiro Geral',
            'resource' => 'financeiro.geral',
        ]);
        Resource::create([
            'nome' => 'Visitante Geral',
            'resource' => 'visitante.geral',
        ]);
        Resource::create([
            'nome' => 'Configurações Geral',
            'resource' => 'config.geral',
        ]);
        //Config Geral
    }
}
