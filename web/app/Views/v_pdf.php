<!DOCTYPE html>
<html>
<head></head>
<style type="text/css">
    .text-center{
        text-align: center;
    }

    .py-3{
        padding-top: 3px;
        padding-bottom: 3px;
    }

    .pb-1{
        padding-bottom: 1rem;
    }

    .pb-2{
        padding-bottom: 1.5rem;
    }

    .pb-3{
        padding-bottom: 2rem;
    }

    tr td{
        padding-bottom: 0.5rem;
    }

    .set-width{
        width: 50% !important;
    }
</style>
<body>
    <div class="py-3 px-3">
        <div class="text-center pb-3">
            <div class="text-center pb-2">
                <div class="pb-1">
                    <b>PEMERINTAH KABUPATEN / KOTA <?= $kab ?> </b>
                </div>

                <div class="pb-1">
                    <b>KECAMATAN <?= $kec ?></b>
                </div>

                <div class="pb-1">
                    <b>KELURAHAN <?= $desakel ?></b>
                </div>

                <div class="pb-1">
                    <b>RT/RW <?= $rt.' / '.$rw ?></b>
                </div>
            </div>

            <div class="text-center">
                <div class="pb-1">
                    <b>SURAT KETERANGAN</b>
                </div>
                <div class="pb-1">
                    <b>NO:</b> 
                </div>
            </div>
        </div>

        <div class="pb-3">
            Yang Bertanda tangan dibawah ini Ketua RT <?= $rt ?>  RW <?= $rw ?> Desa/Kel. <?= $desakel ?>  Kecamatan. <?= $kec ?>  Kab/Kota <?= $kab ?> Dengan ini menerangkan bahwa:

            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $nama ?></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $alamat ?></td>
                </tr>

                <tr>
                    <td>No. KTP</td>
                    <td>:</td>
                    <td><?= $nik ?></td>
                </tr>
            </table>

            <div class="py-3">
                adalah benar warga yang berdomisili di tempat kami
            </div>

            <div class="py-3">
                demikian surat ini kami buat sebagai syarat pengajuan ... dan atas perhatiannya kami ucapkan terima kasih
            </div>

        </div>

        <div class="">
            <div class="pb-3">
                Mengetahui
            </div>  

            <table width="100%">
                <tr>
                    <td class="set-width">Ketua RT </td>
                    <td>Ketua RW </td>
                </tr>

                <tr>
                    <td height="50"></td>
                    <td height=""></td>
                </tr>

                <tr>
                    <td>Nama RT</td>
                    <td>Nama RW</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>