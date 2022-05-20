<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getAll();

    public function getProduct($id);

    public function getAllProductWithImages();

    public function getProductWithImages($id);
}
