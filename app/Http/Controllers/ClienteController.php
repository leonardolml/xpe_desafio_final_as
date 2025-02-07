<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClienteService as Service;

class ClienteController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new Service;
    }

    public function post(Request $request)
    {
        $response = $this->service->post($request);
        return response()->json($response->data, $response->statusCode);
    }

    public function get(Request $request, $id)
    {
        $response = $this->service->get($id);
        return response()->json($response->data, $response->statusCode);
    }

    public function patch(Request $request, $id)
    {
        $response = $this->service->patch($request, $id);
        return response()->json($response->data, $response->statusCode);
    }

    public function delete(Request $request, $id)
    {
        $response = $this->service->delete($id);
        return response()->json($response->data, $response->statusCode);
    }
}
