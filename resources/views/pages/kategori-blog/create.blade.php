@extends('layouts.template')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@endpush
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Tambah Kategori Blog</h1>
        <div class="row">
            <div class="col-lg-8">
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
                        <form action="{{ route('kategori-blog.store') }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name_kategori" class="form-label">Nama Kategori Blog<small class="text-danger"> *</small></label>
                                        <input type="text" name="name_kategori" id="" class="form-control @error('name_kategori') is_invalid @enderror" value="{{ old('name_kategori')}}" autofocus>
                                        @error('name_kategori')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
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
