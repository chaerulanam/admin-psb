<?php if ($profil != null) : ?>
    <div class="card-body">
        <div class="invoice-title">
            <h4 class="float-end font-size-16">Invoice #<?= date('dmhis') . $profil->id ?> <span class="badge bg-danger font-size-12 ms-2">Not Paid</span></h4>
            <div class="mb-4">
                <img src="assets/images/logo-dark.png" alt="logo" height="20" />
            </div>
            <div class="text-muted">
                <p class="mb-1">Jl Raya Sudimampir-Balongan, Indramayu, Jawa Barat</p>
                <p class="mb-1"><i class="uil uil-envelope-alt me-1"> Panitia Penerimaan Santri Baru</i> </p>
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
                    <div>
                        <h5 class="font-size-16 mb-1">Invoice No:</h5>
                        <p class="no_invoice">INV<?= date('dmhis') . $profil->id ?></p>
                    </div>
                    <div class="mt-4">
                        <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                        <p><?= date('d - m - Y') ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-2">
            <h5 class="font-size-15">Rincian Pembayaran</h5>

            <table id="table-invoice" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tagihan</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>

            <div class="table-responsive">
                <table class="table table-nowrap table-centered mb-0">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                            <td class="border-0 text-end">
                                <h4 class="m-0" id="total"></h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-print-none mt-4">
                <div class="float-end">
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="button-bayar" data-bs-toggle="modal" data-bs-target=".modal-bayar"> <i class="uil uil-plus"> Bayar </i></button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>