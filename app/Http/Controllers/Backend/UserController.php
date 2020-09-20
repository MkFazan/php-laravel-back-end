<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\User;
use App\Services\Users\UserServiceInterface;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    private $userService;

    /**
     * UserController constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        try {
            $users = $this->userService->getAll(true);
            $paginate = $users->toArray();

            return view("backend.users.index", compact('users', 'paginate'));
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        try {
            return view("backend.users.create");
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $this->userService->store($request->all());
            Session::flash('message', 'Користувач успішно створений!');
            return redirect()->route('users.index');
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(User $user)
    {
        try {
            return view("backend.users.show", compact('user'));
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(User $user)
    {
        try {
            return view("backend.users.edit", compact('user'));
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $this->userService->update($user, $request->all());
            Session::flash('message', 'Дані користувача успішно оновлені!');
            return back();
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function destroy(User $user)
    {
        try {
            $this->userService->destroy($user);
            Session::flash('message', 'Користувач успішно видалений!');
            return back();
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
