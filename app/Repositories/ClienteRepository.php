<?php

namespace App\Repositories;

use App\Models\Cliente as Model;
use Exception;

class ClienteRepository
{
    public function post($data)
    {
        try {
            throw new Exception("Error Processing Request", 1);
            
            $model =  Model::create([
                "nome" => $data["nome"],
                "email" => $data["email"],
                "telefone" => $data["telefone"],
                "endereco" => $data["endereco"]
            ]);
    
            return (object)[
                'data' => $model,
                'statusCode' => 201
            ];

        } catch (Exception $exception) {
            return $this->responseInternalServerError();
        }
    }

    public function get($id)
    {
        try {

            $model =  Model::find($id);

            if (!$model) {
                return (object)[
                    'data' => [
                        'error' => [ 'Not found' ]
                    ],
                    'statusCode' => 404
                ];
            }
    
            return (object)[
                'data' => $model,
                'statusCode' => 200
            ];

        } catch (Exception $exception) {
            return $this->responseInternalServerError();
        }
    }

    public function patch($data, $id)
    {
        try {

            $model =  Model::find($id);

            if (!$model) {
                return (object)[
                    'data' => [
                        'error' => [ 'Not found' ]
                    ],
                    'statusCode' => 404
                ];
            }

            foreach ($data as $key => $value) {
                $model->$key = $value;
            }

            $model->save();
    
            return (object)[
                'data' => $model,
                'statusCode' => 200
            ];

        } catch (Exception $exception) {
            return $this->responseInternalServerError();
        }
    }

    public function delete($id)
    {
        try {

            $model =  Model::find($id);

            if (!$model) {
                return (object)[
                    'data' => [
                        'error' => [ 'Not found' ]
                    ],
                    'statusCode' => 404
                ];
            }

            $model->delete();
    
            return (object)[
                'data' => null,
                'statusCode' => 204
            ];

        } catch (Exception $exception) {
            return $this->responseInternalServerError();
        }
    }

    protected function responseInternalServerError()
    {
        return (object)[
            'data' => [
                'error' => [ 'Internal server error' ]
            ],
            'statusCode' => 500
        ];
    }
}
