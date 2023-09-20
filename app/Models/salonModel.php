<?php

namespace App\Models;

use CodeIgniter\Model;

class salonModel extends Model
{

    protected $table = 'user';
    protected $allowedFields = ['nama', 'email', "nohp", "password", "role"];

    public function simpan($record)
    {
        $this->save([
            'nama' => $record['nama'],
            'email' => $record['email'],
            'nohp' => $record['nohp'],
            'password' => $record['password'],
            'role' => $record['role']
        ]);
    }

    public function ambil($email)
    {
        return $this->where(['email' => $email])->first();
    }
}
