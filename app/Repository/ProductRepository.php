<?php

namespace App\Repository;

use App\Models\Product;
use App\Repository\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function list()
    {
        return $this->model->with(['category:*']);
    }

    public function store($request)
    {
        DB::beginTransaction();
        $model = new $this->model;
        try {
            $model->create($request->all());

        } catch (\Throwable $th) {
            throw $th;
            return "error";
        }
        DB::commit();

        return "success";
    }

    public function update($request, $id)
    {
        $model = $this->find($id);
        DB::beginTransaction();
        try {
            $model->update($request->all());

        } catch (\Throwable $th) {
            throw $th;
            return "error";
        }
        DB::commit();

        return "success";
    }

    public function destroy($id)
    {
        try {
            $this->find($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
            return "error";
        }
        DB::commit();

        return "success";
    }
}
