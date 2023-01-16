<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLayananWarga extends Model
{
    public function allData($nik)
    {
        return $this->db
            ->table('layanan_warga')
            ->join('tbl_layanan', 'tbl_layanan.id_layanan=layanan_warga.id_layanan')
            ->where('nik', $nik)
            ->get()
            ->getResultArray();
    }
    public function allDataRT($rt, $rw, $desakel, $kec, $kab, $provinsi)
    {
        return $this->db
            ->table('layanan_warga')
            ->join('tbl_layanan', 'tbl_layanan.id_layanan=layanan_warga.id_layanan')
            ->join('tbl_warga', 'layanan_warga.nik=tbl_warga.nik')
            ->where('rt', $rt)
            ->where('rw', $rw)
            ->where('desakel', $desakel)
            ->where('kec', $kec)
            ->where('kab', $kab)
            ->where('provinsi', $provinsi)
            ->get()
            ->getResultArray();
    }
    public function allDataRW($rw, $desakel, $kec, $kab, $provinsi)
    {
        return $this->db
            ->table('layanan_warga')
            ->join('tbl_layanan', 'tbl_layanan.id_layanan=layanan_warga.id_layanan')
            ->join('tbl_warga', 'layanan_warga.nik=tbl_warga.nik')
            ->where('rw', $rw)
            ->where('desakel', $desakel)
            ->where('kec', $kec)
            ->where('kab', $kab)
            ->where('provinsi', $provinsi)
            ->get()
            ->getResultArray();
    }
    public function prdb()
    {
        return  $this->db->getLastQuery();
    }
    public function insertData($data)
    {
        $this->db->table('layanan_warga')->insert($data);
    }
    public function verifikasi($data)
    {
        $this->db
            ->table('layanan_warga')
            ->where('id', $data['id'])
            ->update($data);
    }
    public function data_layanan_warga_by_id($id)
    {
        return $this->db
            ->table('tbl_layanan')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }
}
