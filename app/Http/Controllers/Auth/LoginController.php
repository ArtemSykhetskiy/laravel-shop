<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('admin/auth/login');
    }

    public function login(LoginRequest $request)
    {
        $user = $request->validated();
        if(Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->route('welcome');
        }

        return redirect()->back()->with(['email' => 'Wrong password or email']);

    }
}
