<?php

namespace App\Http\Controllers\api;

use App\Repository\CategoryProductRepository;

class CategoryProductController extends BaseController
{
    public function __construct(CategoryProductRepository $repository)
    {
        $this->repository = $repository;
        $this->successMessage = "Categoria de produto %s com sucesso!";
        $this->errorMessage = "Erro ao %s produto. Por favor entre em contato com o suporte!";
    }
}
