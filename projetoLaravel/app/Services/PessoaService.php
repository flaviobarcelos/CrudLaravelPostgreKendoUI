<?php
namespace App\Services;
use App\Pessoa;
use App\Repositories\PessoaRepository;

class PessoaService
{
    private $repository;

    public function __construct(PessoaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($request)
    {
        // data de nascimento não pode ser maior que data atual
        if(strtotime($request['nascimento']) > strtotime(date('Y-m-d')))
        {
            return response()->json(['Error' => 'Data nascimento não pode ser maior que data atual'], 403);
        }

        $requestPessoa = array(
            'id' => $request['id'],
            'nome' => $request['nome'],
            'nascimento' => $request['nascimento'],
            'genero' => $request['genero'],
            'pais_id' => $request['pais_id']
        );
        return $this->repository->update($requestPessoa);
    }

    public function delete($request)
    {
        return $this->repository->delete($request['id']);
    }

    public function create($request)
    {
        $insertQuery = "INSERT INTO pessoa
                        (id, nome, nascimento, genero, pais_id)
                        VALUES
                        (nextval('seq_pessoa'), '{$request['nome']}', '{$request['nascimento']}', '{$request['genero']}',
                        {$request['pais_id']})";
        // dd($insertQuery);
        // $requestPessoa = array(
        //     'id' => "nextval('public.seq_pessoa')",
        //     'nome' => $request['nome'],
        //     'nascimento' => $request['nascimento'],
        //     'genero' => $request['genero'],
        //     'pais_id' => $request['pais_id']
        // );
        return $this->repository->create($insertQuery);
    }
}