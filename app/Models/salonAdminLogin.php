<?php

namespace App\Models;

use CodeIgniter\Model;

class salonAdminLogin extends Model
{

    protected $table = 'admin';
    protected $allowedFields = ['email', 'password'];

    public function simpan($record)
    {
        $this->save([
            'email' => $record['email'],
            'password' => $record['password'],
        ]);
    }

    public function ambil($email)
    {
        return $this->where(['email' => $email])->first();
    }
}
