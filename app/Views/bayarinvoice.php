<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Pembayaran Tagihan</h4>

                <div id="step-pembayaran">
                    <!-- Seller Details -->
                    <h3>Metode Pembayaran</h3>
                    <section>
                        <h5 class="font-size-14 mb-3">Metode Pembayaran :</h5>

                        <div class="row">

                            <div class="col-lg-3 col-sm-6">
                                <div data-bs-toggle="collapse">
                                    <label class="card-radio-label">
                                        <input type="radio" name="metode-transfer-bank" id="metode-transfer-bank" class="card-radio-input">
                                        <span class="card-radio text-center text-truncate">
                                            <i class="uil uil-postcard d-block h2 mb-3"></i>
                                            Transfer Bank
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <h3>Konfirmasi Pembayaran</h3>
                    <section>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nomor Invoice</h6>
                            </div>
                            <div class="col-sm-3 text-secondary" id="nomor-invoice"></div>
                            <div class="col-sm-3">
                                <h6 class="mb-0">Total Pembayaran</h6>
                            </div>
                            <div class="col-sm-3 text-secondary" id="total-pembayaran"> </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="basicpill-servicetax-input">Pilih Rekening Bank</label>
                                <select class="form-select" id="no_rekening">
                                    <option value=>Select</option>
                                    <?php foreach ($rekening as $key) : ?>
                                        <option value="<?= $key->id ?>"><?= $key->nama_bank . ' ' . $key->no_rekening; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="text-center">
                                    <label for="foto">Upload Bukti Transfer :</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="card-body">
                                            <div class="clearfix"></div>

                                            <div class="mb-4">
                                                <img src="assets/images/default.png" alt="" class="avatar-lg rounded img-thumbnail" id="preview">
                                                <input type="file" class="form-control-file" id="foto" onchange="preview()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <h3>Finish</h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Konfirmasi Terkirim (Pending)</h5>
                                        <p class="text-muted">Kami sedang mengecek konfirmasi yang anda kirim, mohon tunggu 1x24 jam</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->