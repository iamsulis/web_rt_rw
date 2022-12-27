<?php

namespace App\Controllers;

use App\Models\ModelLayananWarga;
use App\Models\ModelLayanan;

class Layananwarga extends BaseController
{
    public function __construct()
    {
        $this->ModelLayananWarga = new ModelLayananWarga();
        $this->ModelLayanan = new ModelLayanan();
        helper('form');
    }

    public function index()
    {
        $akses = session()->get('jabatan');
        $nama = session()->get('nama');
        $nik = session()->get('nik');
        $rt = session()->get('rt');
        $rw = session()->get('rw');
        $desakel = session()->get('desakel');
        $kec = session()->get('kec');
        $kab = session()->get('kab');
        $provinsi = session()->get('provinsi');

        if ($akses == "warga") {
            $data = [

                'judul' => 'Layanan Warga',
                'nik' => $nik,
                'layanan' => $this->ModelLayanan->allData($nik),
                'layananWrg' => $this->ModelLayananWarga->allData($nik),
            ];
        } else if ($akses == "rt") {
            $data = [

                'judul' => 'Layanan RT/RW ' . $rt . '/' . $rw . ' Desa/Kel.' . $desakel,
                'layanan' => $this->ModelLayanan->allData($nik),
                'layananWrg' => $this->ModelLayananWarga->allDataRT($rt, $rw, $desakel, $kec, $kab, $provinsi),
                'qr' => $this->ModelLayananWarga->prdb(),

            ];
        } else {
            $data = [

                'judul' => 'Layanan RW ' . $rw . ' Desa/Kel.' . $desakel,
                'layanan' => $this->ModelLayanan->allData($nik),
                'layananWrg' => $this->ModelLayananWarga->allDataRW($rw, $desakel, $kec, $kab, $provinsi),
                'qr' => $this->ModelLayananWarga->prdb(),
            ];
        }



        return view('v_layananwarga', $data);
    }
    public function insertData()
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'id_layanan' => $this->request->getPost('id_layanan'),
            'tanggal' => date('Y-m-d'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'permintaan',
        ];
        $this->ModelLayananWarga->insertData($data);
        //print_r($this->ModelLayananWarga->prdb());
        //session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        return redirect()->to('layananwarga');
    }
    public function verifikasirt($id)
    {

        $data = [
            'id' => $id,
            'status' => 'ver_by_rt',
        ];

        $this->ModelLayananWarga->verifikasi($data);
        print_r($this->ModelLayananWarga->prdb());
        //session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to('layananwarga');
    }
    public function verifikasirw($id)
    {

        $data = [
            'id' => $id,
            'status' => 'ver_by_rw',
        ];

        $this->ModelLayananWarga->verifikasi($data);
        print_r($this->ModelLayananWarga->prdb());
        //session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to('layananwarga');
    }
}
