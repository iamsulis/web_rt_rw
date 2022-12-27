<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Top Navigation</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="index3.html" class="navbar-brand">
                    <img src="<?= base_url() ?>/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Layanan RT RW</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <?php
                        $akses = session()->get('jabatan');
                        if ($akses == "warga") { ?>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('layananwarga') ?>" class="nav-link">Layanan Warga</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('login/logout') ?>" class="nav-link">Logout </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('') ?>" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('layanan') ?>" class="nav-link">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('warga') ?>" class="nav-link">Data Warga</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('layananwarga') ?>" class="nav-link">Layanan Warga</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('login/logout') ?>" class="nav-link">Logout </a>
                            </li>
                        <?php }

                        ?>

                    </ul>
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <span class="float-sm-right"> Welcome <?= session()->get('nama')  ?></span>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Layanan <?= strtoupper(session()->get('jabatan')) ?> </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-text-width"></i>
                                        Data Layanan
                                    </h3>

                                    <button type="button" class="btn bg-primary float-sm-right" data-toggle="modal" data-target="#modal-add-layanan"><i class="fa fa-plus">Tambah Data</i></a>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <?= $qrw; ?>
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">NO</th>
                                                <?php
                                                if (session()->get('jabatan') != "warga") { ?>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Alamat</th>
                                                <?php } ?>
                                                <th>Layanan</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th width="10%">Aksi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($layananWrg as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <?php
                                                    if (session()->get('jabatan') != "warga") { ?>
                                                        <td><?= $value['nama'] ?></td>
                                                        <td><?= $value['nik'] ?></td>
                                                        <td><?= $value['alamat'] ?></td>
                                                    <?php } ?>
                                                    <td><?= $value['nama_layanan'] ?></td>
                                                    <td><?= $value['tanggal'] ?></td>
                                                    <td><?= $value['keterangan'] ?></td>
                                                    <td><?= $value['status'] ?></td>
                                                    <td>
                                                        <?php
                                                        if (session()->get('jabatan') == "warga") { ?>
                                                            <?php if ($value['status'] == "ver_by_rw") { ?>
                                                                <button type="button" class="btn bg-success float-sm-right" data-toggle="modal" data-target="#modal-print<?= $value['id'] ?>"><i class="fa fa-print">Print</i></a>
                                                                </button>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn bg-success float-sm-right" data-toggle="modal" data-target="#modal-verifikasi<?= $value['id'] ?>"><i class="fa fa-check">Verifikasi</i></a>
                                                            </button>
                                                        <?php } ?>





                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>


                        </div>
                        <!-- /.col-md-6 -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.modal Add Data layanan -->
        <div class="modal fade" id="modal-add-layanan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data <?= $judul  ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php echo form_open('layananwarga/insertData'); ?>
                    <input type="hidden" name="nik" class="form-control" value="<?= $nik ?>" required>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama layanan</label>
                            <select name="id_layanan" class="form-control">
                                <?php foreach ($layanan as $key => $vl) { ?>
                                    <option value="<?= $vl['id_layanan'] ?>"><?= $vl['nama_layanan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input name="keterangan" class="form-control" placeholder="keterangan" required>
                        </div>
                    </div>



                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat">Save </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.End modal Add Data layanan -->

        <!-- /.modal Virifikasi RT -->
        <!-- /.modal Edit verifikasi layanan -->
        <?php foreach ($layananWrg as $key => $vl) { ?>
            <div class="modal fade" id="modal-verifikasi<?= $vl['id'] ?>"">
            <div class=" modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Verifikasi <?= session()->get('jabatan')  ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php

                    echo form_open('layananwarga/verifikasi' . session()->get('jabatan') . '/' . $vl['id']); ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Apa anda Yakin Untuk Melakukan Verifikasi ?</label>

                        </div>
                    </div>




                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat">Save </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Edit Data layanan -->
<!-- /.modal Print -->
<?php foreach ($layananWrg as $key => $vl) { ?>
    <div class="modal fade" id="modal-print<?= $vl['id'] ?>"">
            <div class=" modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Print Surat Pengantar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php

            ?>

            <div class="modal-body">
                <div class="form-group text-center">
                    <label for="">PEMERINTAH KABUPATEN/KOTA <?= strtoupper(session()->get('kab')) ?></label><br>
                    <label for="">KECAMATAN <?= strtoupper(session()->get('kec')) ?></label><br>
                    <label for="">KELURAHAN <?= strtoupper(session()->get('kel')) ?></label><br>
                    <label for="">RT/RW <?= strtoupper(session()->get('rt')) ?>/<?= strtoupper(session()->get('rw')) ?></label><br>
                    <hr>
                    <label for="">SURAT KETERANGAN </label><br>
                    <label for="">NO: </label><br>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <table>
                        <tr>
                            <td colspan="3">Yang Bertanda tangan dibawah ini Ketua RT <?= session()->get('rt') ?> RW <?= session()->get('rt') ?> Desa/Kel. <?= ucwords(session()->get('desakel')) ?> Kecamatan. <?= ucwords(session()->get('kec')) ?> Kab/Kota <?= ucwords(session()->get('kab')) ?> Dengan ini menerangkan bahwa:</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= ucwords(session()->get('nama')) ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= ucwords(session()->get('alamat')) ?></td>
                        </tr>
                        <tr>
                            <td>No KTP</td>
                            <td>:</td>
                            <td><?= ucwords(session()->get('nik')) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">adalah benar warga yang berdomisili di tempat kami </td>

                        </tr>
                        <tr>
                            <td colspan="3">demikian surat ini kami buat sebagai syarat pengajuan ... dan atas perhatiannya kami ucapkan terima kasih </td>

                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td width="50%">Mengetahui</td>
                            <td width="50%"></td>

                        </tr>
                        <tr>
                            <td>Ketua RT <?= session()->get('rt') ?><br><br><br><br></td>
                            <td>Ketua RW <?= session()->get('rw') ?><br><br><br><br></td>

                        </tr>

                        <tr>
                            <td>Nama RT</td>
                            <td>Nama RW</td>

                        </tr>
                    </table>
                </div>
            </div>




            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">PRINT </button>
            </div>

        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Edit Data layanan -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>