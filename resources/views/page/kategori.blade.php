@extends('new_layouts.be_master')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Kategori
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                            <i class="icon icon-home2"></i>Today</a>
                    </li>
                </ul>
                {{-- <a class="btn-fab absolute fab-right-bottom btn-primary" data-toggle="control-sidebar">
                    <i class="icon icon-menu"></i>
                </a> --}}
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                <div class="row my-3">
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-note-list text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Kategori</div>
                                <h5 class="sc-counter mt-3" id="total_kategori">{{ $total }}</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="white">
                    <div class="card-body">
                        <div class="card-title" style="margin-left: 15px">
                            <button data-toggle="modal" data-target="#modaladd" class="btn btn-success btn-sm">Tambah Kategori</button>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Kategori</th>
                                        <th style="width: 15%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    {{-- data --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Today Tab End-->
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl-2" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">TAMBA KATEGORI BARU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formadd">@csrf
                <div class="modal-body">
                    <input type="text" class="form-control text-capitalize" name="kategori_name" placeholder="Nama Kategori" required>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="btnadd" class="btn btn-sm btn-primary" value="SUBMIT">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade bs-example-modal-xl-2" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">UPDATE KATEGORI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formedit">@csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control text-capitalize" name="id" id="id" placeholder="id" required>
                    <input type="text" class="form-control text-capitalize" name="kategori_name" id="kategori_name" placeholder="Nama Kategori" required>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="btnedit" class="btn btn-sm btn-primary" value="UPDATE">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade bs-example-modal-xl-2" id="modaldel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">HAPUS KATEGORI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formdel">@csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control text-capitalize" name="id" id="id" placeholder="id" required>
                    <p>Yakin akan menghapus kategori tersebut ?</p>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="btndel" class="btn btn-sm btn-primary" value="REMOVE">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('script')
        
    <!-- Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script>
    $(document).ready(function() {
            
            $('#modaledit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var kategori_name = button.data('kategori_name')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #kategori_name').val(kategori_name);
            })

            $('#modaldel').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            })


            $('#formadd').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "/backend-kategori-store",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#btnadd').attr('disabled', 'disabled');
                        $('#btnadd').val('Process...');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            var oTable = $('#example').dataTable();
                            oTable.fnDraw(false);
                            $('#modaladd').modal('hide');
                            $("#formadd")[0].reset();
                            $('#btnadd').val('SUBMIT');
                            $('#btnadd').attr('disabled', false);
                            toastr.success(response.message);
                            swal({
                                title: "SUCCESS!",
                                text: response.message,
                                type: "success"
                            });
                        } else {
                            $("#formadd")[0].reset();
                            $('#btnadd').val('SUBMIT!');
                            $('#btnadd').attr('disabled', false);
                            toastr.error(response.message);
                            $('#errList').html("");
                            $('#errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errList').append('<div>' + err_values + '</div>');
                            });
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $('#formedit').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "/backend-kategori-store",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#btnedit').attr('disabled', 'disabled');
                        $('#btnedit').val('Process...');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            var oTable = $('#example').dataTable();
                            oTable.fnDraw(false);
                            $('#modaledit').modal('hide');
                            $("#formedit")[0].reset();
                            $('#btnedit').val('UPDATE');
                            $('#btnedit').attr('disabled', false);
                            toastr.success(response.message);
                            swal({
                                title: "SUCCESS!",
                                text: response.message,
                                type: "success"
                            });
                        } else {
                            $("#formedit")[0].reset();
                            $('#btnedit').val('SUBMIT!');
                            $('#btnedit').attr('disabled', false);
                            toastr.error(response.message);
                            $('#errList').html("");
                            $('#errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errList').append('<div>' + err_values + '</div>');
                            });
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $('#formdel').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "/backend-kategori-delete",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#btndel').attr('disabled', 'disabled');
                        $('#btndel').val('Process...');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            var oTable = $('#example').dataTable();
                            oTable.fnDraw(false);
                            $('#modaldel').modal('hide');
                            $("#formdel")[0].reset();
                            $('#btndel').val('REMOVE');
                            $('#btndel').attr('disabled', false);
                            toastr.success(response.message);
                            swal({
                                title: "SUCCESS!",
                                text: response.message,
                                type: "success"
                            });
                        } else {
                            $("#formdel")[0].reset();
                            $('#btndel').val('REMOVE');
                            $('#btndel').attr('disabled', false);
                            toastr.error(response.message);
                            $('#errList').html("");
                            $('#errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errList').append('<div>' + err_values + '</div>');
                            });
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            var table = $('#example').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "/backend-kategori",
                columns: [{
                        "width":10,
                        "data": null,
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'kategori_name',
                        name: 'kategori_name'
                    },
                    {
                        data: 'opsi',
                        name: 'opsi',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
</script>
@endsection