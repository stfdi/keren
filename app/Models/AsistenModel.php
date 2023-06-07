<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{

    protected $table = 'asisten';
    protected $allowedFields = ['NIM', 'NAMA', "PRAKTIKUM", "IPK"];

    public function simpan($record)
    {
        $this->save([
            'NIM' => $record['NIM'],
            'NAMA' => $record['NAMA'],
            'PRAKTIKUM' => $record['PRAKTIKUM'],
            'IPK' => $record['IPK'],
        ]);
    }

    public function ambil($nim)
    {
        return $this->where(['nim' => $nim])->first();
    }
}
