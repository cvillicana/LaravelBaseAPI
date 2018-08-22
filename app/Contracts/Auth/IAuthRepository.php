<?php

namespace App\Contracts\Auth;

use App\Http\Requests\Auth\LoginUser;
use App\Http\Requests\Auth\SignUpUser;
use Illuminate\Http\Request;

interface IAuthRepository
{
	public function signup(SignUpUser $request);

	public function login(LoginUser $request);

	public function user(Request $request);

	public function logout(Request $request);
}

