<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class DeleteUserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function softDeleteUser($id): \Illuminate\Http\RedirectResponse
    {
        $user = $this->userRepository->getUserById($id);
        $dataStatus = ['status' => User::STATUS_DELETED];
        $this->userRepository->updateUser($id, $dataStatus);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $user = $this->userRepository->getUserById($id);
        $user->forceDelete();
        return redirect()->route('users.index');
    }
}
