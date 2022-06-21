<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">
    <?= $this->include('partials/head-css') ?>


</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <?php if ($profil != null) : ?>
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Invoice #<?= $_GET['id']; ?> <span
                                class="badge bg-success font-size-12 ms-2">Sudah Dibayar</span></h4>
                        <div class="mb-4">
                            <img src="assets/images/logo-dark.png" alt="logo" height="45" />
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Jl Raya Sudimampir-Balongan, Indramayu, Jawa Barat</p>
                            <p class="mb-1">Panitia Penerimaan Santri Baru
                            </p>
                            <p><i class="uil uil-phone me-1"></i> 0811 642 512</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Tagihan untuk:</h5>
                                <h5 class="font-size-15 mb-2"><?= $profil->nama_lengkap; ?></h5>
                                <p class="mb-1"><?= $profil->alamat_lengkap; ?></p>
                                <p><?= $profil->no_hp; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div class="mt-4">
                                    <h5 class="font-size-16 mb-1">Tanggal Invoice:</h5>
                                    <p><?= date('d - m - Y') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="py-2">
                        <h5 class="font-size-15">Rincian Pembayaran</h5>

                        <table id="table-invoice" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Tagihan</th>
                                    <th>Deskripsi</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($invoice as $key) : ?>
                                <tr>
                                    <td><?= $key->nama_tagihan; ?></td>
                                    <td><?= $key->deskripsi; ?></td>
                                    <td><?= number_to_currency($key->harga, 'IDR', null); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <div class="m-5 pb-2 px-3">
                            <div class="float-end">
                                <p class="text-justify"><b>Total :
                                        <?= number_to_currency($idusers->nominal, 'IDR', null); ?></b></p>
                            </div>
                        </div>
                        <div class="m-5 pb-5 px-3">
                            <div class="float-end">
                                <p class="text-center text-justify">Penerima
                                    <br><br><br><?= user()->nama; ?>
                                </p>
                            </div>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-start">
                                <a href="javascript:window.print()"
                                    class="btn btn-success waves-effect waves-light me-1"><i
                                        class="fa fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <?= $this->include('partials/right-sidebar') ?>

        <?= $this->include('partials/vendor-scripts') ?>


        <!-- jquery step -->
        <script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- toastr plugin -->
        <script src="assets/libs/toastr/build/toastr.min.js"></script>
        <!-- form wizard init -->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <script src="assets/js/app.js"></script>