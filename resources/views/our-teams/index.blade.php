@extends('layouts.template-front')
@section('header')
<section class="contact__section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-8 text-center mx-auto">
                <h1 class="">Our Teams</h1>
                <p>
                    {!! $masterBeranda->desc_teams !!}
                </p>
            </div>
        </div>

        <div class="row justify-content-center mb-4 mt-5">
            @forelse ($data as $item)
                <div class="col-lg-4 col-sm-12 d-flex justify-content-lg-end">
                    <div class="shadow p-3 mb-5 bg-body rounded">
                        <div class="text-center">
                            <img src="{{ asset('images/our-teams/'.$item->photos) }}" class="img-fluid mb-4  img__profile"  alt="image profile">
                            <h4>{{ $item->name }}</h4>
                            <span>{{ $item->title }}</span>
                        </div>
                        <p>{!! $item->desc !!}</p>
                    </div>
                </div>

            @empty
                <h4 class="text-center">Tidak ada data.</h4>
            @endforelse
        </div>
    </div>
</section>
<div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
    <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
</div>
@endsection

