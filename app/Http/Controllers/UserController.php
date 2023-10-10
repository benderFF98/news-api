<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }

    public function getToken(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        $user = User::whereEmail($request->input('email'))->firstOrFail();

        if (!\Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'The password is incorrect.',
                    ],
                ],
            ], 422);
        }

        if ($user->tokens->count() > 0) {
            $user->tokens->each->delete();
        }

        $newToken = $user->createToken('api')->plainTextToken;

        return response()->json([
            'token' => $newToken,
        ]);
    }
}
