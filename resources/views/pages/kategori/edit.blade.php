@extends('layouts.template')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Edit Kategori Produk</h1>
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
                        <form action="{{ route('kategori.update',$data->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="nm_rule" class="form-label">Nama Kategori Produk<small class="text-danger"> *</small></label>
                                        <input type="text" name="nama" id="" class="form-control @error('nama') is_invalid @enderror" value="{{ old('nama',$data->name)}}" autofocus>
                                        @error('nama')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="deskripsi" class="control-label mb-1">Deskripsi<small class="text-danger"> *</small></label>
                                    <textarea id="deskripsi" name="deskripsi" type="text" cols="30" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi',$data->desc)}}">{{ $data->desc }}</textarea>
                                    @error('deskripsi')
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
