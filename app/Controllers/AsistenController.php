<?php

namespace App\Controllers;

use App\Models\AsistenModel;
use App\Models\AsistenLogin;
use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class AsistenController extends BaseController
{
    protected $asistenController;

    public function __construct()
    {
        $this->asistenController = new AsistenModel();
    }

    public function index()
    {
        // $coba = ;
        if (session()->has('pengguna')) {
            $data = [
                'asisten' => $this->asistenController->findAll()
            ];

            return view('AsistenView', $data);
        } else {
            return view('/asisten/loginpages');
        }
    }

    public function simpan()
    {
        $session = session();
        if ($session->has('pengguna')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/asisten/simpan');
            }

            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'NIM', 'NAMA', "PRAKTIKUM",
                "IPK"
            ]);
            // Mengakses Model untuk menyimpan data
            $model = model(AsistenModel::class);
            $model->simpan($post);
            return view('/asisten/success');
        } else {
            return view('/asisten/loginpages');
        }
    }

    public function update()
    {
        $session = session();
        if (session()->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');


            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/update');
            }
            $data = [
                'nama' => [$this->request->getPost('NAMA')],
                'praktikum' => [$this->request->getPost('PRAKTIKUM')],
                'ipk' => [$this->request->getPost('IPK')],
            ];
            $Builder->where('NAMA', $this->request->getPost('NAMA'));
            $Builder->update($data);
            return view('/asisten/success');
        } else {
            return view('/asisten/loginpages');
        }
    }

    public function delete()
    {
        $session = session();
        if (session()->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/delete');
            }

            $nim = $this->request->getPost('NIM');

            $result = $Builder->getWhere(['NIM' => $nim])->getResult();
            if (count($result) == 0) {
                return "NIM tidak ditemukan.";
            }
            $Builder->where('NIM', $nim);
            $Builder->delete();
            return view('/asisten/success');
        } else {
            return view('/asisten/loginpages');
        }
    }

    public function search()
    {
        $session = session();
        if (session()->has('pengguna')) {
            if (!$this->request->is('post')) {
                return view('/asisten/search');
            }

            $nim = $this->request->getPost(['key']);
            $model = model(AsistenModel::class);
            $asisten = $model->ambil($nim['key']);

            $data = ['hasil' => $asisten];
            return view('asisten/search', $data);
        } else {
            return view('/asisten/loginpages');
        }
    }

    public function check()
    {
        $post = $this->request->getPost(['username', 'password']);

        $model = model(AsistenLogin::class);
        $asisten = $model->ambil($post['username']);

        if ($post['username'] == $asisten['username'] && $post['password'] == $asisten['password']) { // mengecek masukan dari user
            $session = session();
            $session->set('pengguna', $post['username']); //menyimpan hasil dari usr ke variable pengguna
            return view('asisten/home');
        } else {
            return view('asisten/gagal');
        }
    }


    public function logout() //remove attribut session pengguna
    {
        $session = session();
        // $session->destroy(); //destroy akan menghancurakn semua session
        $session->remove('pengguna'); //bisa menggunakan destroy. 
        return view('asisten/loginpages');
    }

    public function login()
    {
        return view('asisten/loginpages');
    }
}
