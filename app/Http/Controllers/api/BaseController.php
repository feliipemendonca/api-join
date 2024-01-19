<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $repository;
    public $successMessage;
    public $errorMessage;

    public function list()
    {
        $items = $this->repository->list()->get();
        return response()->json($items, 200);
    }

    public function find($id)
    {
        $model = $this->repository->find($id);
        return response()->json($model, 200);
    }

    public function store(Request $request)
    {
        $status = $this->repository->store($request) ? 'success' : 'error';
             $message = $status == 'error' ? ['message' => sprintf($this->errorMessage, 'cadastrar'), 'status' => 500] : ['message' =>sprintf($this->successMessage, 'cadastrado'), 'status' =>200];

        return response()->json($message);
    }

    public function update(Request $request, $id)
    {
        $status = $this->repository->update($request, $id) ? 'success' : 'error';
             $message = $status == 'error' ? ['message' => sprintf($this->errorMessage, 'atualizar'), 'status' => 500] : ['message' =>sprintf($this->successMessage, 'atualizado'), 'status' =>200];

        return response()->json($message);
    }

    public function destroy($id)
    {
        $status = $this->repository->destroy($id) ? 'success' : 'error';
        $message = $status == 'error' ? ['message' => sprintf($this->errorMessage, 'apagar'), 'status' => 500] : ['message' =>sprintf($this->successMessage, 'apagada'), 'status' =>200];

        return response()->json($message);
    }
}
