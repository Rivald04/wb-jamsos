<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $adminModel;
    protected $tahunModel;

    public function index()
    {
        $data = [
            'title' => 'Halaman Admin',
        ];
        return view('admin/index', $data);
    }
}
