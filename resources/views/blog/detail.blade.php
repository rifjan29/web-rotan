@extends('layouts.template-front')
@section('content')
<section class="blog__section">
    <div class="container">
          <div class="row">
              <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="border: none;">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">

                                    <img src="{{ asset('images/blog/'.$data->photos) }}" class="img-fluid w-100" alt="{{ $data->title }}">
                                </div>

                            </div>
                            <div class="card-body">
                                <span class="badge bg-info text-dark mb-3">{{ $data->name_kategori }}</span>
                                <h1>{{ $data->title }}</h1>
                                <div class="mt-5">
                                    {!! $data->desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row py-2" style="margin-top: 2rem">
              <div class="container">
                  <div class="card" style="border: none">

                      <div class="card-body">
                        <div class="swiper swiper_product mt-5">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                              <!-- Slides -->
                             @foreach ($blogLain as $item)
                             <div class="swiper-slide" >
                                 <div class="row">
                                     <div class="col-lg-8 col-sm-12 col-md-12 mx-auto p-4">
                                         <div class="card" >
                                             <img src="{{ asset('images/blog/'.$item->photos) }}" height="400px" class="card-img-top" alt="{{ $item->title }}"
                                             >
                                             <div class="card-body">
                                                 <div class="mb-2">
                                                     <span class="blog__span" >{{ $item->name_kategori }}</span>
                                                 </div>
                                             <h4 style="color: #003566">{{ $item->title }}</h4>

                                             <div class="card-text">
                                                 {!! substr($item->desc,3,50) !!}
                                             </div>
                                             <div class="mt-5">
                                                 <small class="text-muted">{{ $item->created_at }}</small>

                                             </div>
                                             </div>
                                             <div class="card-footer text-muted p-4">
                                                 <div class="d-flex justify-content-end">
                                                     <a href="{{ route('blog.detail',$item->slug) }}" class="btn btn-primary">Read More</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                               </div>
                             @endforeach

                            </div>
                            <!-- If we need pagination -->
                            <!-- <div class="swiper-pagination"></div> -->

                            <!-- If we need navigation buttons -->
                            <div class="d-lg-block d-none">
                                <div class="swiper-button-prev btn btn-primary p-4 prev""></div>
                                <div class="swiper-button-next btn btn-primary p-4 next""></div>
                            </div>


                        </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</section>
<!-- end header -->
<div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp ">
  <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success d-lg-block d-none"><i class="fab fa-whatsapp"></i></a>
</div>
@endsection
