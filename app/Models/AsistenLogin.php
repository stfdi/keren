<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenLogin extends Model
{

    protected $table = 'login';
    protected $allowedFields = ['username', 'password'];

    public function simpan($record)
    {
        $this->save([
            'username' => $record['username'],
            'password' => $record['password'],
        ]);
    }

    public function ambil($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
