<?php

namespace App\Http\Controllers;

use App\Contracts\Auth\IAuthRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\UserResource;
use App\Http\Requests\Auth\LoginUser;
use App\Http\Requests\Auth\SignUpUser;
use Illuminate\Http\Request;

/**
 * @resource Auth
 *
 * Auth routes 
 */
class AuthController extends Controller
{
	protected $auth;

	public function __construct(IAuthRepository $auth)
	{
		$this->auth = $auth;
	}

	public function signup(SignUpUser $request)
	{
		return $this->auth->signup($request);
	}

	public function login(LoginUser $request)
	{
		return $this->auth->login($request);
	}

	public function logout(Request $request)
	{
		return $this->auth->logout($request);
	}

	public function user(Request $request)
	{
		return new UserResource($this->auth->user($request));
	}
}
