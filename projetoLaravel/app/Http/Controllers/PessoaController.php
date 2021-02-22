<?php

namespace App\Http\Controllers;
use App\Repositories\PessoaRepository;
use App\Services\PessoaService;
use App\Paises;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $repository;
    private $service;
    public $paises;

    public function __construct(PessoaRepository $repository,
                                PessoaService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->paises = Paises::get();
    }
    
    public function index()
    {
        return view('pessoa', ['paises' => $this->paises]);
    }

    public function getAllPessoa()
    {
        return $this->repository->getAllPessoa();
    }

    public function update(Request $request)
    {
        $request = json_decode($request->all()['models'], true);
        return $this->service->update($request[0]);
    }

    public function create(Request $request)
    {
        return $this->service->create($request->all());
        // return view('pessoa', ['paises' => $this->paises]);
    }

    public function delete(Request $request)
    {
        $request = json_decode($request->all()['models'], true);
        return $this->service->delete($request[0]);
    }
}