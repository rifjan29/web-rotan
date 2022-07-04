@extends('layouts.template-front')
@section('header')
<section class="blog__section">
    <div class="container py-5">
          <div class="row">
              <div class="col-lg-12 text-center p-5">
              <h1 class="mb-4">Our Blog</h1>
              <p>
                {{ $masterBeranda->desc_blog }}
              </p>
              </div>
          </div>
          <div class="row">
                <div class="col-lg-8 col-sm-12">
                  <div class="row">
                      @foreach ($data as $item)
                        <div class="col-lg-12 col-sm-12 col-md-12 p-3">
                            <div class="card">
                                <img src="{{ asset('images/blog/'.$item->photos) }}" class="card-img-top" height="100%" alt="{{ $item->title }}">
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: #003566">{{ ucfirst($item->title) }}</h4>
                                        <span class="blog__span" style="font-size: 0.90rem" >{{ $item->name_kategori }}</span>

                                        <div class="mt-4">
                                            <p class="card-text">{!! substr($item->desc,0,100).'..' !!}</p>
                                        </div>
                                        <br>
                                        <a href="{{ route('blog.detail',$item->slug) }}"  class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                        </div>
                      @endforeach
                  </div>

                </div>
                <div class="col-lg-4 col-sm-12 ">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-light rounded">
                          <h4 class="fst-italic">About</h4>
                          <p class="mb-0">
                              {{ substr($masterBeranda->desc_about,0,189) }}
                          </p>
                          </div>

                        <div class="p-4">
                          <h4 class="fst-italic">Another Blog</h4>
                          <ol class="list-unstyled mb-0">
                              @foreach ($blogLain as $item)
                                <li><a href="{{ route('blog.detail',$item->slug) }}">{{ $item->title }}</a></li>
                              @endforeach
                          </ol>
                        </div>

                      </div>
                </div>
          </div>
    </div>
</section>
<div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
    <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
</div>
@endsection
