@extends('layouts.template')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
<main class="content">
<div class="container-fluid p-0">
    <div class="row justify-content-between">
        <div class="col ">
            <h1 class="h3 "><strong>Data Produk</strong></h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{ route('produk.create')}}" class="btn btn-info mb-3" role="button">+ Tambah Data</a>
        </div>
    </div>
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
                        <table id="produk" class="table table-striped" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Nama Kategori</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td  class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center row">
                                            {{-- <div class="col-8"> --}}
                                                <img src="{{ asset( 'images/product/'.$item->photos) }}" class="rounded mr-4 img-fluid" width="200px" style="width: 200px" alt="" srcset="">

                                            {{-- </div> --}}
                                        </td>
                                        <td  class="text-center">{{ $item->name  }}</td>
                                        <td  class="">{!! substr($item->desc, 0, 100)!!}</td>
                                        <td class="align-middle"><center>
                                                <a href="{{ route('produk.edit',$item->id) }}" class="btn btn-sm btn-info btn-circle">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            |
                                            <form action="{{ route('produk.destroy',$item->id)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </center></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#produk').DataTable();
    } );
</script>
@endpush
