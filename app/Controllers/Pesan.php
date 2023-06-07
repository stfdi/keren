<?php

namespace App\Controllers;

class Pesan extends BaseController
{
    public function index()
    {
        return view('inputpesan');
    }

    public function tmpil()
    {
        return view('tampilpesan');
    }
}
