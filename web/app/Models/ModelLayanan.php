<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLayanan extends Model
{
    public function allData()
    {
        return $this->db
            ->table('tbl_layanan')->get()
            ->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_layanan')->insert($data);
    }
    public function updateData($data)
    {
        $this->db
            ->table('tbl_layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->update($data);
    }
    public function deleteData($data)
    {
        $this->db
            ->table('tbl_layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->delete($data);
    }
}
