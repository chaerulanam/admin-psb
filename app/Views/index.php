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

                <?= $page_title ?>
                <?= csrf_field() ?>
                <?php if ($bayar == 1) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="text-center mb-5">
                            <h4>Untuk Melanjutkan Pendaftaran</h4>
                            <p class="text-muted mb-4">Silakan Melakukan Pembayaran Registrasi Terlebih Dahulu. Klik
                                link di bawah ini.</p>
                            <a href="/pembayaran-santri">
                                <b><i class="uil-money-insert"></i><span
                                        class="badge rounded-pill bg-primary float-end"></span>
                                    <span>Bayar Registrasi</span></b>
                            </a>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($state == 0) : ?>
                        <?= view('App\formpsb'); ?>
                        <!-- end col -->
                        <?php else : ?>
                        <div class="row mb-4">
                            <div class="col-xl-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="clearfix"></div>
                                            <div>

                                                <img src="assets/images/users/<?= $profil->foto; ?>" alt=""
                                                    class="avatar-xl rounded" height="113.38582677"
                                                    width="151.18110236">
                                            </div>
                                            <h5 class="mt-3 mb-1"><?= $profil->nama_lengkap; ?></h5>

                                        </div>

                                        <hr class="my-4">

                                        <div class="text-muted">
                                            <div class="table-responsive mt-4">
                                                <div>
                                                    <p class="mb-1">Name :</p>
                                                    <h5 class="font-size-16"><?= $profil->nama_lengkap; ?></h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">No. Hp :</p>
                                                    <h5 class="font-size-16"><?= $profil->no_hp; ?></h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Jawal Ujian Tulis :</p>
                                                    <?php if (strtotime($profil->created_at) >= strtotime('2021-12-1') and strtotime($profil->created_at) <= strtotime('2022/3/3')) : ?>
                                                    <div class="col-sm-8 text-secondary">Ahad, 6 Maret 2022 pukul 08.00
                                                        s.d
                                                        12.00 wib </div>
                                                    <?php elseif (strtotime($profil->created_at) >= strtotime('2022/3/4') and strtotime($profil->created_at) <= strtotime('2022/6/30')) : ?>
                                                    <div class="col-sm-8 text-secondary">Ahad, 3 Juli 2022 pukul 08.00
                                                        s.d 12.00
                                                        wib</div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Tempat Ujian Tulis :</p>
                                                    <?php if ($profil->id <= 20) : ?>
                                                    <div class="col-sm-8 text-secondary">Ruang : 01</div>
                                                    <?php elseif ($profil->id > 20 && $profil->id >= 40) : ?>
                                                    <div class="col-sm-8 text-secondary">Ruang : 02</div>
                                                    <?php elseif ($profil->id > 40 && $profil->id >= 60) : ?>
                                                    <div class="col-sm-8 text-secondary">Ruang : 03</div>
                                                    <?php elseif ($profil->id > 60 && $profil->id >= 80) : ?>
                                                    <div class="col-sm-8 text-secondary">Ruang : 04</div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <?= view('App\listformpsb'); ?>
                            </div>

                            <?php endif; ?>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <?php endif; ?>
                <!-- End Page-content -->
                <?= $this->include('partials/footer') ?>
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

        function add() {
            let foto = $('#foto').prop('files')[0];
            let fd = new FormData();
            fd.append('nama_lengkap', $('#nama_lengkap').val());
            fd.append('sekolah_asal', $('#sekolah_asal').val());
            fd.append('jenis_kelamin', $('#jenis_kelamin').val());
            fd.append('nisn', $('#nisn').val());
            fd.append('nik', $('#nik').val());
            fd.append('no_kk', $('#no_kk').val());
            fd.append('jenjang_pendidikan', $('#jenjang_pendidikan').val());
            fd.append('tempat_lahir', $('#tempat_lahir').val());
            fd.append('tanggal_lahir', $('#tanggal_lahir').val());
            fd.append('alamat', $('#alamat').val());
            fd.append('desa', $('#desa :selected').text());
            fd.append('kecamatan', $('#kecamatan :selected').text());
            fd.append('kabupaten', $('#kabupaten :selected').text());
            fd.append('provinsi', $('#provinsi :selected').text());
            fd.append('no_hp', $('#no_hp').val());
            fd.append('foto', foto);
            fd.append('ukuran_baju', $('#ukuran_baju').val());
            fd.append('nama_ayah', $('#nama_ayah').val());
            fd.append('pendidikan_ayah', $('#pendidikan_ayah').val());
            fd.append('pekerjaan_ayah', $('#pekerjaan_ayah').val());
            fd.append('penghasilan_ayah', $('#penghasilan_ayah').val());
            fd.append('nama_ibu', $('#nama_ibu').val());
            fd.append('pekerjaan_ibu', $('#pekerjaan_ibu').val());
            fd.append('pendidikan_ibu', $('#pendidikan_ibu').val());
            fd.append('penghasilan_ibu', $('#penghasilan_ibu').val());

            fd.append('nama_wali', $('#nama_wali').val());
            fd.append('hubungan_sosial', $('#hubungan_sosial').val());
            fd.append('pekerjaan_wali', $('#pekerjaan_wali').val());
            fd.append('penghasilan_wali', $('#penghasilan_wali').val());
            fd.append('csrf_token_name', $('input[name=csrf_token_name]').val());
            $.ajax({
                type: "post",
                url: "<?= route_to('profil/add') ?>",
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    $('input[name=csrf_token_name]').val(data.csrf_token_name);
                    if (data.user_id != undefined) {
                        toastr.error(data.user_id);
                    } else if (data.nama_lengkap != undefined) {
                        toastr.error(data.nama_lengkap);
                    } else if (data.sekolah_asal != undefined) {
                        toastr.error(data.sekolah_asal);
                    } else if (data.jenis_kelamin != undefined) {
                        toastr.error(data.jenis_kelamin);
                    } else if (data.tempat_lahir != undefined) {
                        toastr.error(data.tempat_lahir);
                    } else if (data.tanggal_lahir != undefined) {
                        toastr.error(data.tanggal_lahir);
                    } else if (data.alamat != undefined) {
                        toastr.error(data.alamat);
                    } else if (data.desa != undefined) {
                        toastr.error(data.desa);
                    } else if (data.kecamatan != undefined) {
                        toastr.error(data.kecamatan);
                    } else if (data.kabupaten != undefined) {
                        toastr.error(data.kabupaten);
                    } else if (data.provinsi != undefined) {
                        toastr.error(data.provinsi);
                    } else if (data.no_hp != undefined) {
                        toastr.error(data.no_hp);
                    } else if (data.ukuran_baju != undefined) {
                        toastr.error(data.ukuran_baju);
                    } else if (data.foto != undefined) {
                        toastr.error(data.foto);
                    } else if (data.nama_ayah != undefined) {
                        toastr.error(data.nama_ayah);
                    } else if (data.pendidikan_ayah != undefined) {
                        toastr.error(data.pendidikan_ayah);
                    } else if (data.pekerjaan_ayah != undefined) {
                        toastr.error(data.pekerjaan_ayah);
                    } else if (data.penghasilan_ayah != undefined) {
                        toastr.error(data.penghasilan_ayah);
                    } else if (data.nama_ibu != undefined) {
                        toastr.error(data.nama_ibu);
                    } else if (data.pendidikan_ibu != undefined) {
                        toastr.error(data.pendidikan_ibu);
                    } else if (data.pekerjaan_ibu != undefined) {
                        toastr.error(data.pekerjaan_ibu);
                    } else if (data.penghasilan_ibu != undefined) {
                        toastr.error(data.penghasilan_ibu);
                    } else if (data.error != undefined) {
                        Swal.fire("Failed!", data.error, "error");
                        location.reload();
                    } else if (data.success != undefined) {
                        Swal.fire("Submited!", data.success, "success");
                        location.reload();
                    }
                },
                error: function(error) {
                    console.log("Error:");
                    console.log(error);
                }
            });
        }

        $(document).ready(function() {
            $.ajax({
                method: "get",
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                success: function(data) {
                    // console.log(data[1]);
                    ldata = data.length;
                    for (let i = 0; i < ldata; i++) {
                        $('#provinsi').append('<option value=' + data[i].id + '>' + data[i].name +
                            '</option>')
                    }
                }
            });

            $("#mystep").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slide",
                preloadContent: true,
                labels: {
                    finish: "Submit",
                },
                onFinished: function() {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#34c38f",
                        cancelButtonColor: "#f46a6a",
                        confirmButtonText: "Yes, submit it!"
                    }).then(function(result) {
                        if (result.value) {
                            add();
                        }
                    });
                },
            });
        });

        function getKabupaten() {
            $('#kabupaten').find('option').remove().end()
            $('#kecamatan').find('option').remove().end()
            $('#desa').find('option').remove().end()
            var idprov = $('#provinsi').val();
            // console.log($('#provinsi :selected').text());
            $.ajax({
                method: "get",
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/" + idprov + ".json",
                success: function(data) {
                    ldata = data.length;
                    for (let i = 0; i < ldata; i++) {
                        $('#kabupaten').append('<option value=' + data[i].id + '>' + data[i].name +
                            '</option>')
                    }
                }
            });
        }

        function getkecamatan() {
            var idkota = $('#kabupaten').val();
            $('#kecamatan').find('option').remove().end()
            $('#desa').find('option').remove().end()
            $.ajax({
                method: "get",
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/districts/" + idkota + ".json",
                success: function(data) {
                    ldata = data.length;
                    for (let i = 0; i < ldata; i++) {
                        $('#kecamatan').append('<option value=' + data[i].id + '>' + data[i].name +
                            '</option>')
                    }
                }
            });
        }

        function getdesa() {
            var idkec = $('#kecamatan').val();
            $('#desa').find('option').remove().end()
            $.ajax({
                method: "get",
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/villages/" + idkec + ".json",
                success: function(data) {
                    ldata = data.length;
                    for (let i = 0; i < ldata; i++) {
                        $('#desa').append('<option value=' + data[i].id + '>' + data[i].name + '</option>')
                    }
                }
            });
        }
        </script>

        </body>

</html>