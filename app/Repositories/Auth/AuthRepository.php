<?php

namespace App\Repositories\Auth;

use App\Contracts\Auth\IAuthRepository;
use App\Http\Requests\Auth\LoginUser;
use App\Http\Requests\Auth\SignUpUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements IAuthRepository
{
    public function signup(SignUpUser $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(50);

        $token->save();

        return [
            'data' => [
                'user' => [
                'name' => $user->name,
                'email' => $user->email
                    ],
                'token' => $tokenResult->accessToken
            ]
        ];
    }

    public function login(LoginUser $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            throw new AuthenticationException();       
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(50);

        $token->save();

        return [
            'data' => [
                'token' => $tokenResult->accessToken,
                'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
            ]
        ];

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}