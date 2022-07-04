@extends('layouts.template')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Tambah Master Beranda</h1>
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
                        <form action="{{ route('master-beranda.store') }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title_header" class="form-label">Title Header<small class="text-danger"> *</small></label>
                                        <input type="text" name="title_header" id="" class="form-control @error('title_header') is_invalid @enderror" value="{{ old('title_header')}}" autofocus>
                                        @error('title_header')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="desc_header" class="control-label mb-1">Desc Header<small class="text-danger"> *</small></label>
                                    <textarea id="desc_header" name="desc_header" type="text" cols="30" rows="5" class="form-control @error('desc_header') is-invalid @enderror" value="{{ old('desc_header')}}"></textarea>
                                    @error('desc_header')
                                    <div class="help-block form-text text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_about" class="control-label mb-1">Desc About<small class="text-danger"> *</small></label>
                                <textarea id="desc_about" name="desc_about" type="text" cols="30" rows="5" class="form-control @error('desc_about') is-invalid @enderror" value="{{ old('desc_about')}}"></textarea>
                                @error('desc_about')
                                <div class="help-block form-text text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_features" class="control-label mb-1">Desc Features<small class="text-danger"> *</small></label>
                                <textarea id="desc_features" name="desc_features" type="text" cols="30" rows="5" class="form-control @error('desc_features') is-invalid @enderror" value="{{ old('desc_features')}}"></textarea>
                                @error('desc_features')
                                <div class="help-block form-text text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_product" class="control-label mb-1">Desc Product<small class="text-danger"> *</small></label>
                                <textarea id="desc_product" name="desc_product" type="text" cols="30" rows="5" class="form-control @error('desc_product') is-invalid @enderror" value="{{ old('desc_product')}}"></textarea>
                                @error('desc_product')
                                <div class="help-block form-text text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_blog" class="control-label mb-1">Desc Blog<small class="text-danger"> *</small></label>
                                <textarea id="desc_blog" name="desc_blog" type="text" cols="30" rows="5" class="form-control @error('desc_blog') is-invalid @enderror" value="{{ old('desc_blog')}}"></textarea>
                                @error('desc_blog')
                                <div class="help-block form-text text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_contact" class="control-label mb-1">Desc Contact<small class="text-danger"> *</small></label>
                                <textarea id="desc_contact" name="desc_contact" type="text" cols="30" rows="5" class="form-control @error('desc_contact') is-invalid @enderror" value="{{ old('desc_contact')}}"></textarea>
                                @error('desc_contact')
                                <div class="help-block form-text text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc_teams" class="control-label mb-1">Desc Our Teams<small class="text-danger"> *</small></label>
                                <textarea id="desc_teams" name="desc_teams" type="text" cols="30" rows="5" class="form-control @error('desc_teams') is-invalid @enderror" value="{{ old('desc_teams')}}"></textarea>
                                @error('desc_teams')
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
