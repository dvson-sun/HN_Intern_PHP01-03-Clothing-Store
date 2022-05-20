<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getAll()
    {
        return $this->model->orderBy('created_at', 'DESC');
    }

    public function getProduct($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getProductByName($name)
    {
        return $this->model->where('name', $name)->firstOrFail();
    }

    public function getAllProductWithImages()
    {
        return $this->model->with(['images'])
            ->orderBy('created_at', 'DESC')
            ->paginate(config('app.pagination.productPagination'));
    }

    public function getProductWithImages($id)
    {
        return $this->model->with(['images'])->findOrFail($id);
    }
}
