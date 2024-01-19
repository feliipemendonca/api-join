<?php

namespace App\Repository\Interfaces;


interface CategoryProductRepositoryInterface 
{
    public function list();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}