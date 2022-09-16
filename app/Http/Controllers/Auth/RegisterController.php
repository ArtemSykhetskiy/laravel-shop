<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('admin/auth/register');
    }

    public function registration(CreateUserRequest $request)
    {
        $customer = Role::customer()->first();
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = $customer->users()->create($data);

        event(new Registered($user));

        Auth::login($user);

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect(RouteServiceProvider::HOME);



    }
}
