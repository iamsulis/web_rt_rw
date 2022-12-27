<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWarga;

class Login extends BaseController
{
    public function __construct()
    {
        $this->ModelWarga = new ModelWarga();
        helper('form');
    }
    public function index()
    {
        return view('v_login');
    }
    public function cekLogin()
    {
        if (
            $this->validate([
                'nik' => [
                    'label' => 'NIK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} masih kosong !!',
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} masih kosong !!',
                    ],
                ],
            ])
        ) {
            $nik = $this->request->getPost('nik');
            $password = $this->request->getPost('password');

            $cek_login = $this->ModelWarga->loginUser($nik, $password);

            if ($cek_login) {

                session()->set('nik', $cek_login['nik']);
                session()->set('nama', $cek_login['nama']);
                session()->set('jabatan', $cek_login['jabatan']);
                session()->set('rt', $cek_login['rt']);
                session()->set('rw', $cek_login['rw']);
                session()->set('desakel', $cek_login['desakel']);
                session()->set('kec', $cek_login['kec']);
                session()->set('kab', $cek_login['kab']);
                session()->set('provinsi', $cek_login['provinsi']);

                if ($cek_login['jabatan'] == 'warga') {
                    return redirect()->to(base_url('layananwarga'));
                } else {
                    return redirect()->to(base_url('admin'));
                }
            } else {
                session()->setFlashdata(
                    'gagal',
                    'nik atau password salah'
                );
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata(
                'errors',
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->to(base_url('home'))
                ->withInput('validation', \Config\Services::validation());
        }
    }
    public function logout()
    {
        session()->remove('nik');
        session()->remove('nama');
        session()->remove('jabatan');
        session()->remove('rt');
        session()->remove('rw');
        session()->remove('desakel');
        session()->remove('kec');
        session()->remove('kab');
        session()->remove('provinsi');
        session()->setFlashdata('pesan', 'anda Berhasil Logout');
        return redirect()->to(base_url('login'));
    }
}
