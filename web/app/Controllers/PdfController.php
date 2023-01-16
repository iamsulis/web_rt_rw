<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generate($id){

        $akses = session()->get('jabatan');
        $nama = session()->get('nama');
        $nik = session()->get('nik');
        $rt = session()->get('rt');
        $rw = session()->get('rw');
        $alamat = session()->get('alamat');
        $desakel = session()->get('desakel');
        $kec = session()->get('kec');
        $kab = session()->get('kab');
        $provinsi = session()->get('provinsi');

        $data = [
            'akses' => $akses,
            'nama' => $nama,
            'nik' => $nik,
            'rt' => $rt,
            'rw' => $rw,
            'alamat' => $alamat,
            'desakel' => $desakel,
            'kec' => $kec,
            'kab' => $kab,
            'provinsi' => $provinsi,
        ];

        $html = view('v_pdf', $data);


        $filename = 'Laporan RT RW';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml($html);

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}