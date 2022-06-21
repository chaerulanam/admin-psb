<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">
    <!-- Lightbox css -->
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

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
                                        <div class="float-end button-checkout">

                                        </div>
                                    </div>
                                </div>

                                <table id="datatable-pendaftaran"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Tagihan</th>
                                            <th>Nama Tagihan</th>
                                            <th>Nominal</th>
                                            <th>Bukti</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Tagihan</th>
                                            <th>Nama Tagihan</th>
                                            <th>Nominal</th>
                                            <th>Bukti</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title"><?= $title_table_ ?></h4>
                                        <p class="card-title-desc">
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="float-end button-checkout">

                                        </div>
                                    </div>
                                </div>

                                <table id="datatable-tagihan"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Tagihan</th>
                                            <th>Nominal</th>
                                            <th>Bukti</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Tagihan</th>
                                            <th>Nominal</th>
                                            <th>Bukti</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="modal fade modal-tolak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Deskripsi Penolakan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="no">
                                <input type="hidden" id="idtagihan">
                                <input type="hidden" id="idpembayaran">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Deskripsi Penolakan"
                                        id="alasan-tolak">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary theme-bg gradient"
                                    id="button-tolak">Submit</button>
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

<!-- Magnific Popup-->
<script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>

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

<!-- toastr plugin -->
<script src="assets/libs/toastr/build/toastr.min.js"></script>

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Datatable init js -->
<script>
function getData() {
    $("#datatable-pendaftaran").DataTable({
        "destroy": true,
    }).clear();

    $.ajax({
        url: "<?= route_to('pembayaran-pendaftaran') ?>",
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
                $("#datatable-pendaftaran").DataTable({
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
                    '#datatable-pendaftaran_wrapper .col-md-6:eq(0)');
            } else {

            }
        }
    });
}

function getDataTagihan() {
    $("#datatable-tagihan").DataTable({
        "destroy": true,
    }).clear();

    $.ajax({
        url: "<?= route_to('pembayaran-tagihan') ?>",
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
                $("#datatable-tagihan").DataTable({
                    "destroy": true,
                    "data": data.posts,
                    "lengthChange": true,
                    "autoWidth": false,
                    "scrollX": true,
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
}
$(document).ready(function() {
    getData();
    getDataTagihan();
});
</script>

<script>
$(document).on('click', '#button-terima-tagihan', function(e) {
    var data = {
        'pembayaranid': $(this).attr('data-id'),
        'noinvoice': $(this).attr('data-inv'),
        'csrf_token_name': $('input[name=csrf_token_name]').val()
    };
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

            // console.log(data);
            $.ajax({
                url: "<?= route_to('konfirmasi-tagihan') ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: data,
                type: "post",
                dataType: "json",
                method: "post",
                success: function(data) {
                    console.log(data);
                    $('input[name=csrf_token_name]').val(data.csrf_token_name);

                    if (data.error != undefined) {
                        Swal.fire("Failed!", data.error, "error");
                    } else if (data.success != undefined) {
                        Swal.fire("Submited!", data.success, "success");
                        getDataTagihan();
                    }
                }
            });
        }
    });
});

$(document).on('click', '#button-terima', function(e) {
    var data = {
        'pembayaranid': $(this).attr('data-id'),
        'tagihanid': $(this).attr('data-tag'),
        'csrf_token_name': $('input[name=csrf_token_name]').val()
    };
    // console.log(data);
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

            $.ajax({
                url: "<?= route_to('konfirmasi') ?>",
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
                        Swal.fire("Submited!", data.success, "success");
                        getData();
                    }
                }
            });
        }
    });
});
</script>

<script>
$(document).on('click', '#modal-tolak', function(e) {
    $('#idtagihan').val($(this).attr('data-tag'));
    $('#idpembayaran').val($(this).attr('data-id'));
    $('#no').val($(this).attr('data-no'));
});

$(document).on('click', '#button-tolak', function(e) {
    if ($('#alasan-tolak').val() != '') {
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
                var data = {
                    'deskripsi': $('#alasan-tolak').val(),
                    'tagihanid': $('#idtagihan').val(),
                    'no_invoice': $('#no').val(),
                    'pembayaranid': $('#idpembayaran').val(),
                }

                console.log(data);

                if ($('#idtagihan').val() != '') {
                    $.ajax({
                        url: "<?= route_to('tolak') ?>",
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        data: data,
                        type: "post",
                        dataType: "json",
                        method: "post",
                        success: function(data) {
                            console.log(data);
                            $('input[name=csrf_token_name]').val(data.csrf_token_name);
                            $('#idtagihan').val('');
                            $('#idpembayaran').val('');
                            $('#no').val('');
                            if (data.error != undefined) {
                                Swal.fire("Failed!", data.error, "error");
                                $('.modal-tolak').modal('hide');
                            } else if (data.success != undefined) {
                                Swal.fire("Submited!", data.success, "success");
                                $('.modal-tolak').modal('hide');
                                getData();
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "<?= route_to('tolak-tagihan') ?>",
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        data: data,
                        type: "post",
                        dataType: "json",
                        method: "post",
                        success: function(data) {
                            console.log(data);
                            $('input[name=csrf_token_name]').val(data.csrf_token_name);
                            $('#idtagihan').val('');
                            $('#idpembayaran').val('');
                            $('#deskripsi').val('');
                            $('#no').val('');
                            if (data.error != undefined) {
                                Swal.fire("Failed!", data.error, "error");
                                $('.modal-tolak').modal('hide');
                            } else if (data.success != undefined) {
                                Swal.fire("Submited!", data.success, "success");
                                $('.modal-tolak').modal('hide');
                                getDataTagihan();
                            }
                        }
                    });

                }
            }
        });
    } else {
        toastr.error("Isi Deskripsi Penolakan Dulu !");
    }
});
</script>


<script src="assets/js/app.js"></script>

</body>

</html>