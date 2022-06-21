<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

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

                <?= $page_title ?>
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pembayaran Registrasi</h4>

                                <div id="step-pembayaran">
                                    <!-- Seller Details -->
                                    <h3>Metode Pembayaran</h3>
                                    <section>
                                        <h5 class="font-size-14 mb-3">Metode Pembayaran :</h5>

                                        <div class="row">
                                             <?php foreach ($rekening as $key) : ?>

                                            <div class="col-lg-5 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="metode-transfer-bank"
                                                            id="metode-transfer-bank" class="card-radio-input">
                                                        <span class="card-radio text-center text-truncate">
                                                            <i class="uil uil-postcard d-block h2 mb-3"></i>
                                                            Transfer Bank
                                                        <p class="text-secondary"> <?php  $a =str_replace("Sukaurip","Sukaurip<br>", $key->nama_bank . ' ' . $key->no_rekening);
echo str_replace("Tajug", "Tajug<br>", $a); ?></p>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <?php endforeach; ?>

                                        </div>
                                    </section>

                                    <h3>Detail Pembayaran</h3>
                                    <section>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-pancard-input">Nomor Pembayaran</label>
                                                        <input type="text" class="form-control"
                                                            value="<?= $bayar->no_tagihan; ?>"
                                                            id="basicpill-pancard-input">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-vatno-input">Nama Tagihan</label>
                                                        <input type="text" class="form-control"
                                                            value="<?= $bayar->nama_tagihan; ?>"
                                                            id="basicpill-vatno-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cstno-input">Total Pembayaran</label>
                                                        <input type="text" class="form-control"
                                                            value="<?= number_to_currency($bayar->nominal, 'IDR', null); ?>"
                                                            id="basicpill-cstno-input">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-servicetax-input">Pilih Rekening
                                                            Bank</label>
                                                        <select class="form-select" id="rekening">
                                                            <option value=>Select</option>
                                                            <?php foreach ($rekening as $key) : ?>
                                                            <option value="<?= $key->id ?>">
                                                                <?= $key->nama_bank . ' ' . $key->no_rekening; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>


                                    <h3>Konfirmasi Pembayaran</h3>
                                    <section>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nomor Pembayaran</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary"><?= $bayar->no_tagihan; ?></div>
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nama Pembayaran</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary"><?= $bayar->nama_tagihan; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Total Pembayaran</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary">
                                                <?= number_to_currency($bayar->nominal, 'IDR', null); ?> </div>
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nomor Rekening</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary nomor_rekening"></div>
                                        </div>
                                        <hr>

                                        <?php if ($bayar->deskripsi != '') : ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Keterangan</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary"><?= $bayar->deskripsi; ?></div>
                                        </div>
                                        <hr>
                                        <?php endif; ?>
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
                                                                <img src="assets/images/img-bukti.png" alt=""
                                                                    class="avatar-lg rounded img-thumbnail"
                                                                    id="preview">
                                                                <input type="file" class="form-control-file" id="foto"
                                                                    onchange="preview()">
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
                                                        <i
                                                            class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                    </div>
                                                    <div>
                                                        <?php if ($statusbayar == 1) : ?>
                                                        <h5>Konfirmasi Terkirim (Pending)</h5>
                                                        <p class="text-muted">Kami sedang mengecek konfirmasi yang anda
                                                            kirim, mohon tunggu 1x24 jam</p>
                                                        <?php else : ?>
                                                        <h5>Konfirmasi Terkirim (Berhasil)</h5>
                                                        <p class="text-muted">Pembayaran berhasil, silahkan mengisi
                                                            formulis <a href="\">Isi Formulir</a></p>
                                                        <?php endif; ?>
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


<!-- toastr plugin -->
<script src="assets/libs/toastr/build/toastr.min.js"></script>

<!-- jquery step -->
<script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

<script>
function preview() {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $("#preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
$(document).ready(function() {
    var inv = <?= $invoice; ?>;
    if (inv == 0) {
        page = 0;
    } else {
        if (<?= $statuskonfirm ?> == 1) {
            page = 3;

        } else {
            page = 2;
            $('.nomor_rekening').text("<?= $key->nama_bank . ' ' . $key->no_rekening; ?>");
        }
    }
    $("#step-pembayaran").steps({
        headerTag: "h3",
        bodyTag: "section",
        startIndex: page,
        transitionEffect: "slide",
        onStepChanging: function(e, currentIndex, newIndex) {
            var bank_transfer = $("input[name='metode-transfer-bank']:checked").val();
            if (currentIndex == 0) {
                if (bank_transfer == "on") {
                    return true;
                } else {
                    toastr.error("Pilih Metode Pembayaran");
                }
            } else if ($(this).steps("getCurrentIndex") == 1) {
                if (newIndex > currentIndex) {
                    var data = {
                        'no_tagihan': <?= $bayar->no_tagihan; ?>,
                        'rekening_id': $('#rekening').val(),
                        'csrf_token_name': $('input[name=csrf_token_name]').val()
                    }
                    // console.log(data);
                    var a = $.ajax({
                        url: "<?= route_to('pembayaran') ?>",
                        type: "POST",
                        data: data,
                        global: false,
                        async: false,
                        success: function(data) {
                            // console.log(data);
                            $('input[name=csrf_token_name]').val(data.csrf_token_name);

                            if (data.error != undefined) {
                                toastr.error(data.error);
                            } else if (data.rekening_id != undefined) {
                                toastr.error(data.rekening_id);
                            } else if (data.success != undefined) {
                                toastr.success(data.success);
                                location.reload();
                            }
                        }

                    }).responseText;
                    var data = JSON.parse(a);
                    if (data.success != undefined) {
                        return true
                    } else {
                        if (data.error == 'Invoice Sudah Dibuat') {
                            return true
                        }
                    }
                }
                if (newIndex < currentIndex) {
                    return true;
                }
            } else if (currentIndex == 2) {
                // return true;
                if (newIndex < currentIndex) {
                    if (inv == 0) {
                        return true;
                    }
                } else {

                    let foto = $('#foto').prop('files')[0];
                    let fd = new FormData();
                    fd.append('foto', foto);
                    fd.append('id', <?= $bayar->idbayar; ?>);
                    fd.append('csrf_token_name', $('input[name=csrf_token_name]').val());
                    var a = $.ajax({
                        url: "<?= route_to('pembayaran/bukti') ?>",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        global: false,
                        async: false,
                        success: function(data) {
                            console.log(data);
                            $('input[name=csrf_token_name]').val(data.csrf_token_name);

                            if (data.error != undefined) {
                                toastr.error(data.error);
                            } else if (data.foto != undefined) {
                                toastr.error(data.foto);
                            } else if (data.success != undefined) {
                                toastr.success(data.success);
                            }
                        }

                    }).responseText;
                    var data = JSON.parse(a);
                    if (data.success != undefined) {
                        return true
                        $("a[href$='finish']").hide();
                        $("a[href$='previous']").hide();
                    } else {
                        if (data.error == 'Invoice Sudah Dibuat') {
                            return true
                        }
                    }
                }
            }

            if (newIndex < currentIndex) {
                if (inv == 0) {
                    return true;
                }
            }

        }
    });

    if (page == 3) {
        $("a[href$='finish']").hide();
        $("a[href$='previous']").hide();
    }

    jQuery.extend({
        getValues: function() {
            var result = null;
            return result;
        }
    });

});
</script>

<script src="assets/js/app.js"></script>

</body>

</html>