@extends('new_layouts.be_master')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Event Lomba <p id="gets"></p>
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
                    <div class="col-md-4">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-note-list text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Semua Event Lomba</div>
                                <h5 class="sc-counter mt-3">{{ $gets }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-note-list text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Menungggu</div>
                                <h5 class="sc-counter mt-3">{{ $wait }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-note-list text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Tayang</div>
                                <h5 class="sc-counter mt-3">{{ $acpt }}</h5>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="white">
                    <div class="card-body">
                        <div class="card-title" style="margin-left: 15px">
                            <a href="/backend-event-create" class="btn btn-success btn-sm">Buat Event Baru</a>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Image</th>
                                        <th>Event</th>
                                        <th>Sumber</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
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

<div class="modal fade bs-example-modal-xl-2" id="modaldel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">HAPUS LOMBA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formdel">@csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control text-capitalize" name="id" id="id" placeholder="id" required>
                    <p>Yakin akan menghapus Event / Lomba tersebut ?</p>
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
            
            $('#modaldel').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            })

            $('#formdel').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "/backend-event-delete",
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
                            toastr.warning(response.message);
                            swal({
                                title: "SUCCESS!",
                                text: response.message,
                                type: "warning"
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

            var table = $('#example').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "/backend-event",
                columns: [{
                        "width":10,
                        "data": null,
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'image',
                        name: 'event_image'
                    },
                    {
                        data: 'event_name',
                        name: 'event_name'
                    },
                    {
                        data: 'event_source',
                        name: 'event_source'
                    },
                    {
                        data: 'event_deadline',
                        name: 'event_deadline'
                    },
                    {
                        data: 'status',
                        name: 'event_stat'
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