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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('admin') ?>" class="navbar-brand">
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
                                <a href="<?= base_url('admin') ?>" class="nav-link">Home</a>
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
                        <span class="float-sm-right"> Welcome <?= session()->get('nama') ?></span>
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
                            <h1 class="m-0 text-dark">Layanan <?= strtoupper(session()->get('jabatan')) ?></h1>
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
                                        <?= $judul ?>
                                    </h3>

                                    <button type="button" class="btn bg-primary float-sm-right" data-toggle="modal" data-target="#modal-add-layanan"><i class="fa fa-plus">Tambah Data</i></a>
                                    </button>
                                </div>
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">NO</th>
                                                <th>Nama Layanan</th>
                                                <th width="10%">Aksi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($layanan as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value['nama_layanan'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#modal-edit-layanan<?= $value['id_layanan'] ?>"><i class="fa fa-pencil-alt"></i></button>
                                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modal-hapus-layanan<?= $value['id_layanan'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                        <h4 class="modal-title">Input Data <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php echo form_open('layanan/insertData'); ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama layanan</label>
                            <input name="nama_layanan" class="form-control" placeholder="layanan" required>
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

        <!-- /.modal Edit Data layanan -->
        <?php foreach ($layanan as $key => $vl) { ?>
            <div class="modal fade" id="modal-edit-layanan<?= $vl['id_layanan'] ?>"">
            <div class=" modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php echo form_open('layanan/updateData/' . $vl['id_layanan']); ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama layanan</label>
                            <input name="nama_layanan" class="form-control" value="<?= $vl['nama_layanan'] ?>" placeholder="layanan" required>
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

<!-- /.modal Hapus Data layanan -->
<?php foreach ($layanan as $key => $vld) { ?>
    <div class="modal fade" id="modal-hapus-layanan<?= $vld['id_layanan'] ?>"">
            <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Apa anda Yakin Untuk menghapus data berikut ?</label>
                    <p> Nama layanan = <?= $vl['nama_layanan'] ?> </p>

                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url(
                                'layanan/deleteData/' . $vld['id_layanan']
                            ) ?>" class="btn btn-danger btn-flat">Hapus </a>
            </div>

        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal hapus Data layanan -->

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
<!-- DataTables -->
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
</body>

</html>