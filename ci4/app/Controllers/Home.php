<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Halaman Home';
        $data['content'] = 'Selamat datang di halaman utama!';
        return view('home', $data);
    }
}
