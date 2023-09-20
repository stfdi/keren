<?php

namespace App\Models;

use CodeIgniter\Model;

class salonLogin extends Model
{

    protected $table = 'user';
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
