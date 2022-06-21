<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

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

                <!--  Large modal example -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title"><?= $title_table ?></h4>
                                        <p class="card-title-desc">
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="float-end button-entri">
                                            <a href="javascript:void(0);" class="btn btn-outline-info fas fa-plus"
                                                id="entri" data-bs-toggle="modal" data-bs-target=".entri">
                                                Tambah Santri</a>
                                        </div>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>TTL</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>TTL</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="modal fade entri" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Manual Pendaftaran
                                    Santri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup">
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= view('App\formpsboffline'); ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Manual Pendaftaran
                                    Santri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup">
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="foto-before">
                                <input type="hidden" id="profilid">
                                <?= view('App\formpsboffline-edit'); ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade tagihan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tagihan Santri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup">
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= view('App\Views\tagihansantriadmin'); ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div class="modal fade checkout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup">
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= view('App\Views\invoiceadmin'); ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery step -->
<script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<!-- toastr plugin -->
<script src="assets/libs/toastr/build/toastr.min.js"></script>

<!-- Datatable init js -->
<script>
function ambil_data() {
    $("#datatable").DataTable({
        "destroy": true,
    }).clear();

    $.ajax({
        url: "<?= route_to('data-santri/datatable') ?>",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data: {
            'csrf_token_name': $('input[name=csrf_token_name]').val()
        },
        type: "post",
        dataType: "json",
        method: "post",
        success: function(data) {
            console.log(data);
            $('#no').val(data.posts.length);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.responce == "success") {
                $("#datatable").DataTable({
                    "destroy": true,
                    "data": data.posts,
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }],
                    "language": {
                        "emptyTable": "Tidak ada data tagihan"
                    },
                    "buttons": [{
                            extend: 'copy',
                            text: 'Copy to clipboard'
                        },
                        'excel',
                        'pdf'
                    ],
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo(
                    '#datatable_wrapper .col-md-6:eq(0)');
            } else {

            }
        }
    });
}
$(document).ready(function() {
    ambil_data();
});
</script>

<script>
function add() {
    let foto = $('#foto').prop('files')[0];
    let fd = new FormData();
    fd.append('user_id', $('#user_id').val());
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
        url: "<?= route_to('data-santri/add') ?>",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            // console.log(data);
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

function edit() {
    let foto = $('#foto_edit').prop('files')[0];
    let fd = new FormData();
    fd.append('id', $('#profilid').val());
    fd.append('user_id', $('#user_id_edit').val());
    fd.append('nama_lengkap', $('#nama_lengkap_edit').val());
    fd.append('sekolah_asal', $('#sekolah_asal_edit').val());
    fd.append('jenis_kelamin', $('#jenis_kelamin_edit').val());
    fd.append('nisn', $('#nisn_edit').val());
    fd.append('nik', $('#nik_edit').val());
    fd.append('no_kk', $('#no_kk_edit').val());
    fd.append('jenjang_pendidikan', $('#jenjang_pendidikan_edit').val());
    fd.append('tempat_lahir', $('#tempat_lahir_edit').val());
    fd.append('tanggal_lahir', $('#tanggal_lahir_edit').val());
    fd.append('alamat', $('#alamat_edit').val());
    fd.append('desa', $('#desa_edit :selected').text());
    fd.append('kecamatan', $('#kecamatan_edit :selected').text());
    fd.append('kabupaten', $('#kabupaten_edit :selected').text());
    fd.append('provinsi', $('#provinsi_edit :selected').text());
    fd.append('no_hp', $('#no_hp_edit').val());
    fd.append('foto', foto);
    fd.append('foto-before', $('#foto-before').val());
    fd.append('ukuran_baju', $('#ukuran_baju_edit').val());
    fd.append('nama_ayah', $('#nama_ayah_edit').val());
    fd.append('pendidikan_ayah', $('#pendidikan_ayah_edit').val());
    fd.append('pekerjaan_ayah', $('#pekerjaan_ayah_edit').val());
    fd.append('penghasilan_ayah', $('#penghasilan_ayah_edit').val());
    fd.append('nama_ibu', $('#nama_ibu_edit').val());
    fd.append('pekerjaan_ibu', $('#pekerjaan_ibu_edit').val());
    fd.append('pendidikan_ibu', $('#pendidikan_ibu_edit').val());
    fd.append('penghasilan_ibu', $('#penghasilan_ibu_edit').val());
    fd.append('nama_wali', $('#nama_wali_edit').val());
    fd.append('hubungan_sosial', $('#hubungan_sosial_edit').val());
    fd.append('pekerjaan_wali', $('#pekerjaan_wali_edit').val());
    fd.append('penghasilan_wali', $('#penghasilan_wali_edit').val());
    fd.append('csrf_token_name', $('input[name=csrf_token_name]').val());
    
    $.ajax({
        type: "post",
        url: "<?= route_to('data-santri/edit') ?>",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            // console.log(data);
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

    $("#mystep1").steps({
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
                    edit();
                }
            });
        },
    });
});
</script>

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

function preview_edit() {
    var file = $("#foto_edit").get(0).files[0];
    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $("#preview-edit").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
$(document).ready(function() {


});
</script>

<script>
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
                $('#kabupaten').append('<option value=' + data[i].id + '>' + data[i].name + '</option>')
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
                $('#kecamatan').append('<option value=' + data[i].id + '>' + data[i].name + '</option>')
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

<script>
$(document).on('click', '#editmodal', function(e) {
    var data = {
        'csrf_token_name': $('input[name=csrf_token_name]').val(),
        'id': $(this).attr('data-id'),
    }
    $.ajax({
        url: "<?= route_to('data-santri-detail') ?>",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data: data,
        type: "get",
        dataType: "json",
        method: "get",
        success: function(data) {
            console.log(data);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            $('#user_id_edit').val(data.profil.username);
            $('#nama_lengkap_edit').val(data.profil.nama_lengkap);
            $('#sekolah_asal_edit').val(data.profil.sekolah_asal);
            $('#jenis_kelamin_edit').val(data.profil.jenis_kelamin);
            $('#nisn_edit').val(data.profil.nisn);
            $('#tempat_lahir_edit').val(data.profil.tempat_lahir);
            $('#tanggal_lahir_edit').val(data.profil.tanggal_lahir);
            $('#nik_edit').val(data.profil.nik);
            $('#no_kk_edit').val(data.profil.kk);
            $('#jenjang_pendidikan_edit').val(data.profil.jenjang_pendidikan);
            $('#no_hp_edit').val(data.profil.no_hp);
            $('#ukuran_baju_edit').val(data.profil.ukuran_baju);
            $('#alamat_edit').val(data.profil.alamat_lengkap);
            $("#preview-edit").attr("src", 'assets/images/users/' + data.profil.foto);
            $("#foto-before").val(data.profil.foto);
            $('#nama_ayah_edit').val(data.profil.nama_ayah);
            $('#pendidikan_ayah_edit').val(data.profil.pendidikan_ayah);
            $('#pekerjaan_ayah_edit').val(data.profil.pekerjaan_ayah);
            $('#penghasilan_ayah_edit').val(data.profil.penghasilan_ayah);
            $('#nama_ibu_edit').val(data.profil.nama_ibu);
            $('#pendidikan_ibu_edit').val(data.profil.pendidikan_ibu);
            $('#pekerjaan_ibu_edit').val(data.profil.pekerjaan_ibu);
            $('#penghasilan_ibu_edit').val(data.profil.penghasilan_ibu);
            $('#nama_wali_edit').val(data.profil.nama_wali);
            $('#hubungan_sosial_edit').val(data.profil.hubungan_sosial);
            $('#pekerjaan_wali_edit').val(data.profil.pekerjaan_wali);
            $('#penghasilan_wali_edit').val(data.profil.penghasilan_wali);
            $('#profilid').val(data.profil.profilid);
        }
    });
});
</script>

<script>
$(document).on('click', '#hapus', function(e) {
    var data = {
        'profilid': $(this).attr('data-id'),
        'userid': $(this).attr('data-userid'),
        'csrf_token_name': $('input[name=csrf_token_name]').val(),
    }
    console.log(data);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, delete it!"
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url: "<?= route_to('data-santri/hapus') ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: data,
                type: "post",
                dataType: "json",
                method: "post",
                success: function(data) {
                    // console.log(data);
                    $('input[name=csrf_token_name]').val(data.csrf_token_name);
                    if (data.error != undefined) {
                        Swal.fire("Failed!", data.error, "error");
                    } else if (data.success != undefined) {
                        Swal.fire("Deleted!", data.success, "success");
                        ambil_data();
                    }
                }
            });
        }
    });
});
</script>

<script>
$(document).on('click', '#tagihan', function(e) {
    $("#datatable-tagihan").DataTable({
        "destroy": true,
    }).clear();

    var data = {
        'id': $(this).attr('data-id'),
        'csrf_token_name': $('input[name=csrf_token_name]').val()
    };

    console.log(data);
    $.ajax({
        url: "<?= route_to('data-santri/datatable-tagihan') ?>",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data: data,
        type: "post",
        dataType: "json",
        method: "post",
        success: function(data) {
            console.log(data);
            $('#no').val(data.posts.length);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.responce == "success") {
                $("#datatable-tagihan").DataTable({
                    "destroy": true,
                    "data": data.posts,
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }],
                    "language": {
                        "emptyTable": "Tidak ada data tagihan"
                    },
                    "buttons": [{
                            extend: 'copy',
                            text: 'Copy to clipboard'
                        },
                        'excel',
                        'pdf'
                    ],
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo(
                    '#datatable-tagihan_wrapper .col-md-6:eq(0)');
            } else {

            }
        }
    });

});
</script>

<script>
$(document).on('click', '#button-bayar', function(e) {
    $("#table-invoice").DataTable({
        "destroy": true,
    }).clear();

    var data = {
        'no_invoice': $('.no_invoice').text(),
        'tagihan_id': tagihan_id,
        'csrf_token_name': $('input[name=csrf_token_name]').val()
    };
    console.log(data);
    $.ajax({
        url: "<?= route_to('data-santri/invoice-add') ?>",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data: data,
        type: "post",
        dataType: "json",
        method: "post",
        success: function(data) {
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.error != undefined) {
                toastr.error(data.error);
            } else if (data.success != undefined) {
                toastr.success(data.success);
                $('.checkout').modal('hide');
                $('.tagihan').modal('hide');
            }
        }
    });
});
</script>

<script>
var tagihan_id = [];
$(document).ready(function() {
    $(document).on('click', '#button-checkout', function(e) {
        $("#table-invoice").DataTable({
            "destroy": true,
        }).clear();

        var data = {
            'id': tagihan_id,
            'csrf_token_name': $('input[name=csrf_token_name]').val()
        };

        $.ajax({
            url: "<?= route_to('data-santri/invoice') ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: data,
            type: "post",
            dataType: "json",
            method: "post",
            success: function(data) {
                console.log(data);
                $('#total').text(data.total);
                $('#total-pembayaran').text(data.total);
                $('.nama_lengkap').text(data.profil.nama_lengkap);
                $('.alamat_lengkap').text(data.profil.alamat);
                $('.no_hp').text(data.profil.no_hp);
                $('.no_invoice').text('INV<?= date('dmhis') ?>' + data.profil.profilid);
                $('#no_invoice').text('Invoice #<?= date('dmhis') ?>' + data.profil
                    .profilid);
                $('input[name=csrf_token_name]').val(data.csrf_token_name);
                if (data.responce == "success") {
                    $("#table-invoice").DataTable({
                        "destroy": true,
                        "data": data.posts,
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        "paging": false,
                        "ordering": false,
                        "searching": false,
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false,
                        }],
                        "language": {
                            "emptyTable": "Tidak ada data tagihan"
                        },
                    });
                } else {

                }
            }
        });
    });

    var l;
    $('#allcheck').click(function() {
        $('input:checkbox').prop('checked', this.checked);
        var no = $('#no').val();
        // console.log(no);
        if (this.checked) {
            l = $('#check:checked').length;
            for (let i = 0; i < l; i++) {
                var first = $('.check' + (no - i) + ':checked').attr('data-id')
                tagihan_id[no - i] = $('.check' + (no - i) + ':checked').attr('data-id');
            }
        } else {
            console.log(l);
            for (let i = 0; i < l; i++) {
                tagihan_id[no - i] = null;
            }
        }

        console.log(tagihan_id);
    });
    var no = 0;
    $(document).on('change', 'input[type="checkbox"]', function() {
        $idtagihan = $(this).attr('data-id');
        $no = $(this).attr('data-no');
        if (this.checked) {
            no++;
            tagihan_id[$no - 1] = $idtagihan;
            $('.button-checkout').html(
                '<button type="button" class="btn btn-primary waves-effect waves-light" id="button-checkout" data-bs-toggle="modal" data-bs-target=".checkout"> <i class="uil uil-plus"> Checkout </i></button>'
            )
        } else {
            no--;
            tagihan_id[$no - 1] = null;
            if (no <= 0) {
                $('.button-checkout').find('button').remove().end()
            }
        }
        console.log(tagihan_id);
    });
});
</script>

<script src="assets/js/app.js"></script>

</body>

</html>