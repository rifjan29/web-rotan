@extends('layouts.template-front')
@section('content')
<section class="product__section">
    <div class="container">
          <div class="row">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-4 col-sm-12">
                          <img src="{{ asset('images/product/'.$detailProduk->photos) }}" class="img-fluid" alt="{{ $detailProduk->name }}">
                      </div>
                      <div class="col-lg-8 col-sm-12">
                          <div class="card shadow-sm mb-5 bg-body rounded" style="border: none;">
                              <div class="card-header">
                                  <h1>{{ $detailProduk->name }}</h1>
                                  <span class="product__span" >{{ $detailProduk->name_kategori }}</span>
                              </div>
                              <div class="card-body">
                                  <div class="mt-4">
                                     {!!  $detailProduk->desc  !!}
                                  </div>
                                  <div class="d-flex justify-content-end p-4">
                                      <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success d-lg-none d-block"><i class="fab fa-whatsapp"></i> Contact Whatsapp</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row py-5" style="margin-top: 5rem">
              <div class="container">
                  <h1>Another Product</h1>
              </div>
              <div class="row">
                  <div class="swiper swiper_product mt-5">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                      <!-- Slides -->
                     @foreach ($data as $item)
                        <div class="swiper-slide d-flex" >
                            <div class="col-sm-6 col-md-6 col-lg-8 mx-auto mt-5">
                            <div class="food-card food-card--vertical m-2 p-2">
                                <div class="food-card_img">
                                    <img src="{{ asset('images/product/'.$item->photos) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="food-card_content">
                                    <div class="food-card_title-section">
                                        <h1 class="food-card_title">{{ $item->name }}</h1>

                                        </div>
                                        <div class="food-card_bottom-section">
                                        <div class="space-between p-2">
                                            <p>
                                                {!! $item->desc !!}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('product.detail',$item->slug) }}" class="btn btn-primary">See Our Product</a>

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
</section>
<!-- end header -->
<div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp ">
  <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success d-lg-block d-none"><i class="fab fa-whatsapp"></i></a>
</div>
@endsection
