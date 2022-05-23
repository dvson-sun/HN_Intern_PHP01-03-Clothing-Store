<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUser($id);

    public function getAllUser();

    public function updateStatusUser($id, $data);
}
