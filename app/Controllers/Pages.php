<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Website Data Jaminan Sosial',
        ];
        return view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About DisnakerTrans'
        ];
        return view('pages/about', $data);
    }
}
