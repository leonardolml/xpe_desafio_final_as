<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ProdutoRepository as Repository;

class ProdutoService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new Repository;
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nome" => "required|string|max:55",
            "descricao" => "required|string|max:100",
            "preco" => "required|decimal:2",
        ]);
 
        if ($validator->fails()) {
            return (object)[
                'data' => $validator->errors(),
                'statusCode' => 400
            ];
        }

        return $this->repository->post($validator->validated());
    }

    public function get($id)
    {
        return $this->repository->get($id);
    }

    public function patch(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nome" => "nullable|string|max:55",
            "descricao" => "nullable|string|max:100",
            "preco" => "nullable|decimal:2",
        ]);
 
        if ($validator->fails()) {
            return (object)[
                'data' => $validator->errors(),
                'statusCode' => 400
            ];
        }

        return $this->repository->patch($validator->validated(), $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function findByName($name)
    {
        return $this->repository->findByName($name);
    }

    public function count()
    {
        return $this->repository->count();
    }
}
