@extends('new_layouts.be_master')

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4>
                            <i class="icon-box"></i>
                            Update Event {{ $data->event_name }}
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
                    <form id="formadd" enctype="multipart/form-data">@csrf
                        <div class="white" style="margin-top: 20px">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Event</label>
                                            <input type="hidden" value="{{ $data->id }}" name="id" id="id">
                                            <input type="text" name="event_name" value="{{ $data->event_name }}"
                                                class="form-control text-capitalize"
                                                placeholder="EPSILON 2022, Lomba Cipta Puisi 2022" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Penyelenggara Event</label>
                                            <input type="text" name="event_source" value="{{ $data->event_source }}"
                                                class="form-control text-capitalize"
                                                placeholder="DTNTF UGM, Kreasi Cipta Indonesia" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Deadline / Batas Akhir Pendaftaran</label>
                                            <input type="date" name="event_deadline" value="{{ $data->event_deadline }}"
                                                class="form-control text-capitalize" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Link Pendaftaran</label>
                                            <input type="text" name="event_link" value="{{ $data->event_link }}"
                                                class="form-control text-capitalize"
                                                placeholder="ugm.id/daftar-espilon-2022" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Tingkatan Event</label> <br>
                                            <input type="radio" id="nasional" name="event_rank" value="Nasional"
                                                @if ($data->event_rank == 'Nasional') checked @endif>
                                            <label for="nasional">Nasional</label><br>
                                            <input type="radio" id="internasional" name="event_rank" value="Internasional"
                                                @if ($data->event_rank == 'Internasional') checked @endif>
                                            <label for="internasional">Internasional</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Biaya Pendaftaran</label> <br>
                                            <input type="radio" id="gratis" name="event_cost" value="Gratis"
                                                @if ($data->event_cost == 'Gratis') checked @endif>
                                            <label for="gratis">Gratis</label><br>
                                            <input type="radio" id="berbayar" name="event_cost" value="Berbayar"
                                                @if ($data->event_cost == 'Berbayar') checked @endif>
                                            <label for="berbayar">Berbayar</label>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Tulis Deskripsi Event</label>
                                            <textarea name="event_desc" id="summernote" class="form-control" cols="30" rows="3">
                                                {{ $data->event_desc }}
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Pilih Kategori</label>
                                            <div class="form-check">
                                                @foreach ($kategori as $item)
                                                    <input class="form-check-input" type="checkbox" name="kategori[]"
                                                        value="{{ $item->id }}" id="{{ $item->id }}"
                                                        @foreach ($data->kategori as $k)
                                                                @if ($k->id == $item->id)
                                                                    checked
                                                                @endif @endforeach>
                                                    <label class="form-check-label" for="{{ $item->id }}">
                                                        {{ $item->kategori_name }}
                                                    </label>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Status </label>
                                            <select name="event_stat" class="form-control" id="">
                                                <option value="2">Tayang</option>
                                                <option value="1">Waiting List</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Url Event Share </label>
                                            <input type="text" class="form-control" name="event_url"
                                                value="{{ $data->event_url }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Upload Poster</label>
                                            <div class="custom-file">
                                                <input type="file" name="event_image" class="custom-file-input"
                                                    id="inputGroupFile01" accept="image/*"
                                                    onchange="showPreview(event);">
                                                <p class="custom-file-label" id="label_img" for="inputGroupFile01">Chose
                                                    Image</p>
                                            </div>
                                            <div class="preview" style="max-width: 100%; margin-top: 20px">
                                                <img style="max-width: 300px" id="inputGroupFile01-preview"
                                                    src="{{ $data->event_thumb }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 md-3">
                                            <input type="submit" class="btn btn-sm btn-primary" id="btnadd"
                                                value="SUBMIT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Today Tab End-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("inputGroupFile01-preview");
                preview.src = src;
                preview.style.display = "block";
                $('#label_img').html(src.substr(0, 30));
            }
        }

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });


            $('#formadd').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "/backend-event-store",
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
                            $("#formadd")[0].reset();
                            $('#btnadd').val('SUBMIT');
                            $('#btnadd').attr('disabled', false);
                            toastr.success(response.message);
                            swal({
                                title: "SUCCESS!",
                                text: response.message,
                                type: "success"
                            }).then(okay => {
                                if (okay) {
                                    window.location.href = "/backend-event";
                                }
                            });
                        } else {
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


        });
    </script>
@endsection
