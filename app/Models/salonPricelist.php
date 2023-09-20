<?php

namespace App\Models;

use CodeIgniter\Model;

class salonPricelist extends Model
{

    protected $table = 'jasa';
    protected $allowedFields = ['nama_jasa', "harga"];

    public function simpan($record)
    {
        $this->save([
            'nama_jasa' => $record['nama_jasa'],
            'harga' => $record['harga'],
        ]);
    }

    public function ambillSemua()
    {
        return $this->findAll();
    }
}
