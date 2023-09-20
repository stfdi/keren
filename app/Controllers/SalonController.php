<?php

namespace App\Controllers;

use App\Models\salonBooking;
use App\Models\salonModel;
use App\Models\salonLogin;
use App\Models\salonPricelist;
use CodeIgniter\Files\File;

class SalonController extends BaseController
{
    protected $salonpriceController;
    protected $salonvalidasiBayar;

    public function __construct()
    {
        $this->salonpriceController = new salonPricelist();
        // membuat variabel salonpriceController dengan new salonPricelist yang diambil dari model
        $this->salonvalidasiBayar = new salonBooking();
    }

    public function list()
    {
        $price = [
            'body' => $this->salonpriceController->findAll(),
        ];

        return view('/salon/salonPricelist', $price);
    }

    public function listPriceAdmin()
    {
        $priceA = [
            'body' => $this->salonpriceController->findAll(),
        ];

        return view('/salon/salonPriceadmin', $priceA);
    }

    public function listLogin()
    {
        $priceM = [
            'body' => $this->salonpriceController->findAll(),
        ];

        return view('/salon/salonPricelistL', $priceM);
    }

    public function index()
    {
        return view('/salon/salonHome');
    }

    public function register()
    {
        return view('salon/salonRegister');
    }

    public function checkRegister()
    {
        // $session = session();
        // if ($session->has('pengguna')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/salon/salonHome');
        }

        // Mengambil data yang disubmit dari form
        $this->request->getPost([
            'nama', 'email', "nohp",
            "password"
        ]);
        $post = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'nohp' => $this->request->getVar('nohp'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => 'user'
        ];
        // Mengakses Model untuk menyimpan data
        $model = model(salonModel::class);
        $model->simpan($post);
        return view('/salon/salonSuccess');
        // } else {
        //     return view('/salon/salonRegister');
        // }

    }

    public function login()
    {
        return view('salon/salonLogin');
    }

    public function afterLogin()
    {
        return view('salon/salonHomeL');
    }

    public function checkLogin()
    {
        $post = $this->request->getPost(['email', 'password']);
        $model = model(salonLogin::class);
        $user = $model->ambil($post['email']);

        if ($user !== null && $post['email'] === $user['email'] && password_verify($post['password'], $user['password'])) { // mengecek masukan dari user
            $session = session();
            $session->set('pengguna', $post['email']); //menyimpan hasil dari usr ke variable pengguna
            if ($user['role'] == 'admin') {
                return view('salon/salonHomeAdmin');
            } else {
                return view('salon/salonHomeL');
            }
        } else {
            return view('salon/salonGagal');
        }
    }

    public function tambahJasa()
    {
        $session = session();
        if ($session->has('pengguna')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/salon/salonTambahJasa');
            }

            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'nama_jasa', 'harga'
            ]);
            // Mengakses Model untuk menyimpan data
            $model = model(salonPricelist::class);
            $model->simpan($post);
            return view('/salon/salonSuccessTambahJasa');
        } else {
            return view('/salon/salonGagalTambahJasa');
        }
    }

    public function hapusJasa()
    {
        $session = session();
        if (session()->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('jasa');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/salon/salonHapusJasa');
            }

            $nama_jasa = $this->request->getPost('nama_jasa');

            $result = $Builder->getWhere(['nama_jasa' => $nama_jasa])->getResult();
            if (count($result) == 0) {
                return view('/salon/salonGagalHapusJasa');
            }
            $Builder->where('nama_jasa', $nama_jasa);
            $Builder->delete();
            return view('/salon/salonSuccessHapusJasa');
        } else {
            return view('/salon/salonGagalHapusJasa');
        }
    }


    public function simpanRev()
    {
        $session = session();
        if ($session->has('pengguna')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/salon/salonReservasi', ['session' => $session, 'price_list' => model(salonPricelist::class)->ambillSemua()]);
            }

            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'nama', 'nohp', 'jasa',
                'waktu', 'pembayaran'
            ]);

            $img = null;

            if ($post['pembayaran'] != 'CASH') {
                $img = $this->request->getFile('photo');
                $post['photo'] = $img->getRandomName();
            } else {
                $post['photo'] = '-';
            }

            if ($post['pembayaran'] != 'CASH') {
                $post['status'] = 'Belum Lunas';
            } else {
                $post['status'] = 'Belum Lunas';
            }


            // Mengakses Model untuk menyimpan data
            $model = model(salonBooking::class);
            $model->simpan($post);

            if (!is_null($img)) {
                $img->move('../public/gambars', $post['photo']);
            }

            return view('/salon/salonSuccessReservasi');
        } else {
            return view('/salon/loginpages');
        }
    }

    public function ValidasiPembayaran()
    {
        $bayar = [
            'booking' => $this->salonvalidasiBayar->findAll(),
        ];

        return view('/salon/salonValidasiPembayaran', $bayar);
    }

    public function logout() //remove attribut session pengguna
    {
        $session = session();
        // $session->destroy(); //destroy akan menghancurakn semua session
        $session->remove('pengguna'); //bisa menggunakan destroy. 
        return view('salon/salonStart');
    }

    public function salonStart()
    {
        return view('salon/salonStart');
    }

    public function homeAdmin()
    {
        return view('salon/salonHomeAdmin');
    }
}
