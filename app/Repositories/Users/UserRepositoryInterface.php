<?php


namespace App\Repositories\Users;


use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll(bool $paginate = false);

    public function store(array $data);

    public function update(User $user, array $data);

    public function destroy(User $user);
}
