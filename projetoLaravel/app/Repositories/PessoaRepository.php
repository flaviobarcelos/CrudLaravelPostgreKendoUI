<?php
namespace App\Repositories;
use App\Pessoa;
use DB;

class PessoaRepository
{
    public function getAllPessoa()
    {
        return Pessoa::selectRaw("pessoa.id, pessoa.nome, pessoa.nascimento,
                            pessoa.genero, 
                            case when pessoa.genero = 'M' then 'Masculino' 
                            else
                                case when pessoa.genero = 'F' then 'Feminino' 
                                else
                                'Não informado' end
                            end as genero_nome,
                            pessoa.pais_id, pais.nome as pais_nome")
            ->join('pais', 'pessoa.pais_id','=','pais.id')
            ->get();
    }

    public function getPessoa($id)
    {
        return Pessoa::where('id', $id)->get();
    }

    public function create($pessoa)
    {
        return DB::select($pessoa) ? true : false; 
    }
    public function update($request)
    {
        return Pessoa::where('id', $request['id'])
                ->update($request) ? true : false;
    }

    public function delete($id)
    {
        return Pessoa::where('id',$id)->delete() ? true : false;
    }
}