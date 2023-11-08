<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

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

    public function hapus($id_jasa)
    {
        try {
            $this->db->query("DELETE FROM booking WHERE id_jasa = $id_jasa");
            $this->where('id_jasa', $id_jasa);
            return $this->delete();
        } catch (Exception $e) {
            return false;
        }
    }

    public function ambillSemua()
    {
        return $this->findAll();
    }
}
