<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nm_usaha', 'slug_nm_usaha', 'nm_alamat', 'dt_alamat', 'no_telp', 'koordinat', 'foto_depan'];

    public function getAlamat($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug_nm_usaha' => $slug])->first();
    }

    public function getIdalamat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_alamat' => $id])->first();
    }
}
