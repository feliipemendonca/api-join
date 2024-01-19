<?php

namespace App\Repository\Interfaces;


interface ProductRepositoryInterface 
{
    public function list();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}