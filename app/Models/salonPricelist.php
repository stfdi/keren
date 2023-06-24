<?php

namespace App\Models;

use CodeIgniter\Model;

class salonPricelist extends Model
{

    protected $table = 'body';
    protected $allowedFields = ['no', 'jasa', "harga"];

    public function simpan($record)
    {
        $this->save([
            'no' => $record['no'],
            'jasa' => $record['jasa'],
            'harga' => $record['harga'],
        ]);
    }

    public function ambil($no)
    {
        return $this->where(['no' => $no])->first();
    }
}
