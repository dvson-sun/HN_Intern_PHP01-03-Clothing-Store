<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getAllWithUsers()
    {
        return $this->model->with(['user'])
            ->orderBy('created_at', 'desc')
            ->paginate(config('app.pagination.orderPagination'));
    }

    public function getOrderById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getOrderWithUser($id)
    {
        return $this->model->with(['user'])
            ->findOrFail($id);
    }

    public function getOrderByUserId($id)
    {
        return $this->model->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
    }
}
