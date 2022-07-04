@extends('layouts.template')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <style>
        .img__data img{
            background-color: gray;
            width: 300px;
            height: 300px;
            display: flex;
        }
    </style>
@endpush
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Edit Our Teams</strong></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('our-teams.update',$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="nm_rule" class="form-label">Nama Lengkap<small class="text-danger"> *</small></label>
                                        <input type="text" name="nama"  id="" class="form-control @error('nama') is_invalid @enderror" value="{{ old('nama',$data->name)}}" autofocus>
                                        @error('nama')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="select" class=" form-control-label">Title<small class="text-danger"> *</small></label>
                                <input type="text" name="title" id="" class="form-control @error('title') is_invalid @enderror" value="{{ old('title',$data->title)}}" autofocus>
                                @error('title')
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                    <label for="motivasi" class="control-label mb-1">Motivasi<small class="text-danger"> *</small></label>
                                    <textarea id="summernote" name="motivasi" type="text" cols="200" rows="10" class="form-control @error('motivasi') is-invalid @enderror" value="{{ old('motivasi',$data->desc)}}">{!! $data->desc !!}</textarea>
                                    @error('motivasi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-4 img__data">
                                    <img src="{{ asset('images/our-teams/'.$data->photos) }}" alt="" style="bg-dark img-fluid w-75"  id="photosPreview">
                                </div>
                                <div class="col-lg-8">
                                    <label for="gambar" class="control-label mb-1">Gambar<small class="text-danger"> *</small></label>
                                    <input id="gambar" type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                                    @error('gambar')
                                    <div class="help-block form-text text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection
@push('js')
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            // summernote
            $('#summernote').summernote({
                callbacks: {
                        onPaste: function (e) {
                            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                            e.preventDefault();

                            // Firefox fix
                            setTimeout(function () {
                                document.execCommand('insertText', false, bufferText);
                            }, 10);
                        }
                    }
            });
            // show gambar
            $('#gambar').change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $('#photosPreview')
                        .attr("src",event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            })
        });

    </script>
@endpush
