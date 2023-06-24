<?php

namespace App\Models;

use CodeIgniter\Model;

class salonBooking extends Model
{

    protected $table = 'booking';
    protected $allowedFields = ['nama', 'nohp', 'jasa', 'waktu', 'pembayaran', 'photo', 'status'];

    public function simpan($record)
    {
        $this->save([
            'nama' => $record['nama'],
            'nohp' => $record['nohp'],
            'jasa' => $record['jasa'],
            'waktu' => $record['waktu'],
            'pembayaran' => $record['pembayaran'],
            'photo' => $record['photo'],
            'status' => $record['status'],
        ]);
    }

    public function ambil($nohp)
    {
        return $this->where(['nohp' => $nohp])->first();
    }
}
