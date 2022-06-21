<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                        <div class="float-end button-checkout">

                                        </div>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="d-flex justify-content-center"><input class="form-check-input" type="checkbox" id="allcheck"></div>
                                            </th>
                                            <th>No</th>
                                            <th>Nomor Tagihan</th>
                                            <th>Nama Tagihan</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>
                                                <div class="d-flex justify-content-center"><input class="form-check-input" type="checkbox" id="allcheck"></div>
                                            </th>
                                            <th>No</th>
                                            <th>Nomor Tagihan</th>
                                            <th>Nama Tagihan</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <!--  Large modal example -->
                <div class="modal fade modal-checkout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= view('App\Views\invoice'); ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade modal-bayar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="no">
                                <?= view('App\Views\bayarinvoice'); ?>
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


<!-- toastr plugin -->
<script src="assets/libs/toastr/build/toastr.min.js"></script>
<!-- jquery step -->
<script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

<!-- Datatable init js -->
<script>
    $(document).ready(function() {
        $("#datatable").DataTable({
            "destroy": true,
        }).clear();

        $.ajax({
            url: "<?= route_to('tagihan-santri/datatable') ?>",
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
            url: "<?= route_to('tagihan-santri/invoice-add') ?>",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: data,
            type: "post",
            dataType: "json",
            method: "post",
            success: function(data) {
                // console.log(data.no_invoice);
                $('#nomor-invoice').text(data.no_invoice);
                // console.log(no_invoice);
                var page = 0;
                if (data.error != undefined) {
                    toastr.error(data.error);
                } else if (data.success != undefined) {
                    toastr.success(data.success);
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
                                    if (newIndex < currentIndex) {
                                        if (inv == 0) {
                                            return true;
                                        }
                                    } else {

                                        let foto = $('#foto').prop('files')[0];
                                        let fd = new FormData();
                                        fd.append('foto', foto);
                                        fd.append('no_invoice', $('#nomor-invoice').text());
                                        fd.append('rekening_id', $('#no_rekening').val());
                                        fd.append('csrf_token_name', $('input[name=csrf_token_name]').val());
                                        var a = $.ajax({
                                            url: "<?= route_to('pembayaran/invoice') ?>",
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
                                    return true;
                                }
                            }
                        },
                        onFinished: function() {
                            location.reload();
                        }
                    });

                }
                $('input[name=csrf_token_name]').val(data.csrf_token_name);
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
                url: "<?= route_to('tagihan-santri/invoice') ?>",
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

        $('#allcheck').click(function() {
            $('input:checkbox').prop('checked', this.checked);
            var no = $('#no').val();
            // console.log(no);
            var l = $('#check:checked').length;

            for (let i = 0; i < l; i++) {
                var first = $('.check' + (no - i) + ':checked').attr('data-id')
                tagihan_id[no - i] = $('.check' + (no - i) + ':checked').attr('data-id');
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
                $('.button-checkout').html('<button type="button" class="btn btn-primary waves-effect waves-light" id="button-checkout" data-bs-toggle="modal" data-bs-target=".modal-checkout"> <i class="uil uil-plus"> Checkout </i></button>')
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


    });
</script>

<script src="assets/js/app.js"></script>

</body>

</html>