<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class ktp extends BaseController
{
    public function index()
    {
        return view('profile');
    }
}
