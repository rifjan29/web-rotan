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
            <h1 class="h3 "><strong>Master Beranda</strong></h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{ route('master-beranda.create')}}" class="btn btn-info mb-3" role="button">+ Tambah Data</a>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Data Kategori</h5> --}}
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
                        <table id="master" class="table table-striped" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Title Header</th>
                                    <th class="text-center">Desc Header</th>
                                    <th class="text-center">Desc About</th>
                                    <th class="text-center">Desc Features</th>
                                    <th class="text-center">Desc Product</th>
                                    <th class="text-center">Desc Blog</th>
                                    <th class="text-center">Desc Contact</th>
                                    <th class="text-center">Desc Our Teams</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td  class="text-center">{{ $loop->iteration }}</td>
                                        <td  class="text-center">{{ $item->title_header  }}</td>
                                        <td  class="text-center">{{ substr($item->desc_header,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_about,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_features,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_product,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_blog,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_contact,0,20) }}</td>
                                        <td  class="text-center">{{ substr($item->desc_teams,0,20) }}</td>
                                        <td  class="text-center">
                                                <a href="{{ route('change.status',$item->id) }}" class="btn btn-sm {{ $item->status != '0' ? ' btn-primary' : 'btn-warning' }} btn-circle" >
                                                    {{ $item->status != '0' ? 'tampil' : 'tidak tampil' }}
                                                </a>
                                        </td>
                                        <td class="align-middle"><center>
                                            <a href="{{ route('master-beranda.edit', $item->id ) }}" class="btn btn-sm btn-info btn-circle">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            |
                                            <form action="{{ route('master-beranda.destroy',$item->id)}}" method="POST" class="d-inline">
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
        $('#master').DataTable();
    } );
</script>
@endpush
