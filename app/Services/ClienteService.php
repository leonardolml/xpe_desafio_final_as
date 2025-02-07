<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ClienteRepository as Repository;

class ClienteService
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
            "email" => "required|unique:clientes,email|email:rfc|max:55",
            "telefone" => "required|string|unique:clientes,telefone|max:15",
            "endereco" => "required|string|max:100"
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
            "email" => "nullable|email:rfc|max:55",
            "telefone" => "nullable|string|max:15",
            "endereco" => "nullable|string|max:100"
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
}
