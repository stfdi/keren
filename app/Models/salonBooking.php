<?php

namespace App\Models;

use CodeIgniter\Model;

class salonBooking extends Model
{

    protected $table = 'booking';
    protected $allowedFields = ['email', 'id_jasa', 'waktu', 'pembayaran', 'photo', 'status'];

    public function simpan($record)
    {
        $this->save([
            'email' => $record['email'],
            'id_jasa' => $record['jasa'],
            'waktu' => $record['waktu'],
            'pembayaran' => $record['pembayaran'],
            'photo' => $record['photo'],
            'status' => $record['status'],
        ]);
    }

    public function ambil($id_booking)
    {
        return $this->where(['id_booking' => $id_booking])->first();
    }

    public function findAllByQuery()
    {
        return $this->db->query('SELECT a.id_booking id_booking, a.email email, 
        b.nama_jasa nama_jasa, a.waktu waktu, a.pembayaran pembayaran, a.status status from booking a 
        inner join jasa b on b.id_jasa = a.id_jasa')->getResultArray();
    }

    public function validation($id_booking)
    {
        return $this->query("update booking set status = 'Lunas' where id_booking = " . $id_booking);
    }
}
