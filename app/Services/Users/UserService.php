<?php


namespace App\Services\Users;


use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;


class UserService implements UserServiceInterface
{
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param bool $paginate
     * @return mixed
     */
    public function getAll(bool $paginate = false)
    {
        return $this->userRepository->getAll($paginate);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $data['role_id'] = User::CUSTOMER;
            $status = $this->userRepository->store($data);

            DB::commit();
            return $status;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data)
    {
        DB::beginTransaction();
        try {
            $status = $this->userRepository->update($user, $data);

            DB::commit();
            return $status;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * @param User $user
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $status = $this->userRepository->destroy($user);

            DB::commit();
            return $status;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
}
