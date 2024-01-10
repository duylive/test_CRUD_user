<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateUserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function edit($id): view
    {
        $user = $this->userRepository->getUserById($id);
        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = $this->userRepository->getUserById($id);
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                ],
                'status' => 'required|integer|in:' . implode(',', [
                        User::STATUS_ACTIVE,
                        User::STATUS_SUSPENDED,
                        User::STATUS_DELETED,
                    ]),
            ]);

            $this->userRepository->updateUser($id, $validatedData);
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            Log::info('Error updating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating user.');
        }
    }
}
