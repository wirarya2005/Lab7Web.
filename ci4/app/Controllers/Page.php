<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
{
    return view('about', [
        'title'   => 'Halaman About',
        'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
    ]);
}


    public function contact()
    {
        echo "Ini halaman Contact";
    }

    public function faqs()
    {
        echo "Ini halaman FAQ";
    }

    // Contoh method tambahan untuk autoroute
    public function tos()
    {
        echo "Ini halaman Term of Services";
    }
}
