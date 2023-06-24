<?php

namespace App\Models;

use CodeIgniter\Model;

class salonModel extends Model
{

    protected $table = 'member';
    protected $allowedFields = ['nama', 'email', "nohp", "password"];

    public function simpan($record)
    {
        $this->save([
            'nama' => $record['nama'],
            'email' => $record['email'],
            'nohp' => $record['nohp'],
            'password' => $record['password'],
        ]);
    }

    public function ambil($email)
    {
        return $this->where(['email' => $email])->first();
    }
}
