<?php

namespace App\Controllers;

use App\Models\ModelLayanan;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->ModelLayanan = new ModelLayanan();
        helper('form');
    }
    public function index()
    {
        $data = [
            'judul' => 'Layanan',
            'layanan' => $this->ModelLayanan->allData(),
        ];
        return view('v_layanan', $data);
    }
    public function insertData()
    {
        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
        ];
        $this->ModelLayanan->insertData($data);

        //session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        return redirect()->to('layanan');
    }
    public function updateData($id_layanan)
    {

        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nama_layanan'),
        ];

        $this->ModelLayanan->updateData($data);
        //session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to('layanan');
    }
    public function deleteData($id_layanan)
    {
        $data = [
            'id_layanan' => $id_layanan,
        ];
        $this->ModelLayanan->deleteData($data);
        // session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('layanan');
    }
}
