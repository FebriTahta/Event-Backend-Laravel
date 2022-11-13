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
                            Edit Blog {{ $data->news_title }}
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
                    <a class="btn-fab absolute fab-right-bottom btn-primary" data-toggle="control-sidebar">
                        <i class="icon icon-menu"></i>
                    </a>
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
                                            <label>Judul Blog</label>
                                            <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                                            <input type="text" name="news_title" class="form-control text-capitalize"
                                                placeholder="Tips & Trick Menggait Partisipan Lomba" value="{{ $data->news_title }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Penulis Blog</label>
                                            <select name="user_id" class="form-control" id="">
                                                <option value="{{ auth()->user()->id }}">{{ auth()->user()->username }}
                                                </option>
                                                @foreach ($penulis as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($data->user_id == $item->id)
                                                            selected
                                                        @endif
                                                        >{{ $item->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Tulis Deskripsi Blog</label>
                                            <textarea name="news_desc" id="summernote" class="form-control" cols="30" rows="3">
                                                {{ $data->news_desc }}
                                            </textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status </label>
                                            <select name="news_stat" class="form-control" id="">
                                                <option value="2" 
                                                    @if ($data->news_stat == "2")
                                                        selected
                                                    @endif
                                                >Tayang</option>
                                                <option value="1"
                                                    @if ($data->news_stat == "1")
                                                        selected
                                                    @endif
                                                >Pending</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Url Event Share </label>
                                            <input type="text" class="form-control" name="news_url"
                                                placeholder="https://infolombaofficial.com/{{ $data->news_url }}"
                                                value="{{ $data->news_url }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Upload Poster</label>
                                            <div class="custom-file">
                                                <input type="file" name="news_image" class="custom-file-input"
                                                    id="inputGroupFile01" accept="image/*" onchange="showPreview(event);">
                                                <p class="custom-file-label" id="label_img" for="inputGroupFile01">Chose
                                                    Image</p>
                                            </div>
                                            <div class="preview" style="max-width: 100%; margin-top: 20px">
                                                <img style="max-width: 300px" id="inputGroupFile01-preview"
                                                 src="{{ asset('storage/news_image/thumbnail/'.$data->news_thumb) }}">
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
                    url: "/backend-blog-store",
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
                                    window.location.href = "/backend-blog";
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
