<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWarga extends Model
{
    public function insertData($data)
    {
        $this->db->table('tbl_warga')->insert($data);
    }

    public function loginUser($nik, $password)
    {
        return $this->db
            ->table('tbl_warga')
            ->where([
                'nik' => $nik,
                'password' => $password,
            ])
            ->get()
            ->getRowArray();
    }
}
