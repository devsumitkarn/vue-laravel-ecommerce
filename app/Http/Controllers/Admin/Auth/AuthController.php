<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function registerPage()
    {
        return view('admin.auth.register');
    }
}
