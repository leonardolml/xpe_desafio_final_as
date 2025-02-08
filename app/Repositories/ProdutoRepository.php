<?php

namespace App\Repositories;

use App\Models\Produto as Model;
use Exception;

class ProdutoRepository
{
    public function post($data)
    {
        try {

            $model =  Model::create([
                "nome" => $data["nome"],
                "descricao" => $data["descricao"],
                "preco" => $data["preco"],
            ]);
    
            return (object)[
                'data' => $model,
                'statusCode' => 201
            ];

        } catch (Exception $exception) {
            dd($exception->getMessage());
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

    public function findAll()
    {
        try {

            $model =  Model::all();

            if ($model->isEmpty()) {
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

    public function findById($id)
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

    public function findByName($name)
    {
        try {

            $model =  Model::where('nome', 'like', "%$name%")->get();

            if ($model->isEmpty()) {
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

    public function count()
    {
        try {

            return (object)[
                'data' => [
                    'count' => Model::all()->count()
                ],
                'statusCode' => 200
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
