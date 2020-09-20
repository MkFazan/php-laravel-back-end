<?php


namespace App\Repositories\Users;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param bool $paginate
     * @return mixed
     */
    public function getAll(bool $paginate = false)
    {
        if ($paginate){
            return User::orderBy('created_at', 'DESC')->paginate(config('app.paginate'));
        } else {
            return User::orderBy('created_at', 'DESC')->get();
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return User::create($data);
    }

    /**
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    /**
     * @param User $user
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }
}
