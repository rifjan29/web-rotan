@extends('layouts.template')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@endpush
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Profile Administrator</strong></h1>
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
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update',$data->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama<small class="text-danger"> *</small></label>
                                        <input type="text" name="nama" id="" class="form-control @error('nama') is_invalid @enderror" value="{{ old('nama',$data->name)}}" autofocus>
                                        @error('nama')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email<small class="text-danger"> *</small></label>
                                        <input type="email" name="email" id="" class="form-control @error('email') is_invalid @enderror" value="{{ old('email',$data->email)}}" autofocus>
                                        @error('email')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP/Whatsapp<small class="text-danger"> *</small></label>
                                        <input type="text" name="no_hp" id="" class="form-control @error('no_hp') is_invalid @enderror" value="{{ old('no_hp',$data->no_hp)}}" autofocus>
                                        <small>628212XXXX</small>
                                        @error('no_hp')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Link Instagram<small class="text-info"> Optional</small></label>
                                        <input type="text" name="instagram" id="" class="form-control @error('instagram') is_invalid @enderror" value="{{ old('instagram',$data->instagram)}}" autofocus>
                                        <small>https://www.instagram.com/name_account/</small>
                                        @error('instagram')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Link Facebook<small class="text-info"> Optional</small></label>
                                        <input type="text" name="facebook" id="" class="form-control @error('facebook') is_invalid @enderror" value="{{ old('facebook',$data->facebook)}}" autofocus>
                                        <small>https://www.facebook.com/name_account</small>
                                        @error('facebook')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label">Link Twitter<small class="text-info"> Optional</small></label>
                                        <input type="text" name="twitter" id="" class="form-control @error('twitter') is_invalid @enderror" value="{{ old('twitter',$data->twitter)}}" autofocus>
                                        <small>https://twitter.com/name_account</small>
                                        @error('twitter')
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.password',$data->id ) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru<small class="text-danger"> *</small></label>
                                        <input type="password" name="password" id="" class="form-control @error('password') is_invalid @enderror" value="{{ old('password')}}" autofocus>
                                        @error('password')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmed" class="form-label">Ulangi Password<small class="text-danger"> *</small></label>
                                        <input type="password" name="password_confirmed" id="" class="form-control @error('password_confirmed') is_invalid @enderror" value="{{ old('password_confirmed',$data->password_confirmed)}}" autofocus>
                                        @error('password_confirmed')
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
