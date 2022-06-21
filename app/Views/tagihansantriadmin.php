<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="float-end button-checkout">

                        </div>
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>

                <table id="datatable-tagihan" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>
                                <div class="d-flex justify-content-center"><input class="form-check-input"
                                        type="checkbox" id="allcheck"></div>
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
                                <div class="d-flex justify-content-center"><input class="form-check-input"
                                        type="checkbox" id="allcheck"></div>
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
<div class="modal fade modal-checkout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
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
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->