@extends('layouts.template')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Edit Master Features</strong></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
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
                    <div class="card-body">
                        <form action="{{ route('master-features.update',$data->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title_features" class="form-label">Judul Features<small class="text-danger"> *</small></label>
                                        <input type="text" name="title_features" id="" class="form-control @error('title_features') is_invalid @enderror" value="{{ old('title_features',$data->title)}}" autofocus>
                                        @error('title_features')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="desc" class="control-label mb-1">Deskripsi<small class="text-danger"> *</small></label>
                                    <textarea id="desc" name="desc" type="text" cols="30" rows="5" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc',$data->desc)}}">{{ $data->desc }}</textarea>
                                    @error('desc')
                                    <div class="help-block form-text text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
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
