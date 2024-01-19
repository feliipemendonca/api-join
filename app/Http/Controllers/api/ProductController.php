<?php

namespace App\Http\Controllers\api;

use App\Repository\ProductRepository;

class ProductController extends BaseController
{
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->successMessage = "Produto %s com sucesso!";
        $this->errorMessage = "Erro ao %s produto. Por favor entre em contato com o suporte!";
    }
}
