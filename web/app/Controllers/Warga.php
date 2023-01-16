<?php

namespace App\Controllers;

use App\Models\ModelWarga;

class Warga extends BaseController
{
    public function __construct()
    {
        $this->ModelWarga = new ModelWarga();
        helper('form');
    }
    public function index()
    {

        $rt = session()->get('rt');
        $rw = session()->get('rw');

        $data = [
            'judul' => 'Warga',
            'warga' => $this->ModelWarga->data_warga($rt, $rw),
        ];

        return view('v_warga', $data);
    }
    public function insertData()
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'desakel' => $this->request->getPost('desakel'),
            'kec' => $this->request->getPost('kec'),
            'kab' => $this->request->getPost('kab'),
            'provinsi' => $this->request->getPost('provinsi'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];

        $this->ModelWarga->insertData($data);

        //session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        return redirect()->to('login');
    }
}
