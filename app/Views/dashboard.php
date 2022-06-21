<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

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

                <?= $page_title ?>

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <div id="total-revenue-chart"></div>
                                </div>
                                <div>
                                    <?php if ($uang->nominal == null) : ?>
                                    <h4 class="mb-1 mt-1"><span><?= number_to_currency(0, 'IDR', null); ?></span></h4>
                                    <?php else : ?>
                                    <?php if ($uang->nominal < 1000) : ?>
                                    <h4 class="mb-1 mt-1">
                                        <span><?= number_to_currency($uang->nominal, 'IDR', null); ?></span>
                                    </h4>
                                    <?php elseif ($uang->nominal >= 1000) : ?>
                                    <h4 class="mb-1 mt-1">
                                        <span><?= number_to_currency($uang->nominal / 1000, 'IDR', null); ?>K</span>
                                    </h4>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <p class="text-muted mb-0">Uang Masuk</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><a href="data-pembayaran">Lihat Detail</a><span
                                        class="text-primary me-1"><i class="mdi mdi-arrow-right-bold me-1"></i>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <div id="orders-chart"> </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $pendaftar; ?></span></h4>
                                    <p class="text-muted mb-0">Total Pendaftar</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><a href="data-santri">Lihat Detail</a><span
                                        class="text-primary me-1"><i class="mdi mdi-arrow-right-bold me-1"></i>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <div id="customers-chart"> </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $putra; ?></span></h4>
                                    <p class="text-muted mb-0">Santri Putra</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><a href="data-santri">Lihat Detail</a><span
                                        class="text-primary me-1"><i class="mdi mdi-arrow-right-bold me-1"></i>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">

                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <div id="growth-chart"></div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?= $putri; ?></span></h4>
                                    <p class="text-muted mb-0">Santri Putri</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><a href="data-santri">Lihat Detail</a><span
                                        class="text-primary me-1"><i class="mdi mdi-arrow-right-bold me-1"></i>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>