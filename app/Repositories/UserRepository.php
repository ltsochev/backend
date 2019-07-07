<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create(array $data = [])
    {
        return new User($data);
    }

    public function update(array $data, $id)
    {
        $model = $this->create();

        return User::where($model->getKeyName(), '=', $id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
