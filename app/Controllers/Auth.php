<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Login',
            'config' => config('Auth'),
        ];
        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Halaman Register',
            'config' => config('Auth'),
        ];
        return view('auth/register', $data);
    }
}
