@extends('layouts.template-front')
@section('header')
<section class="header__section">
    <div class="container ">
        <div class="mx-auto d-flex flex-lg-row flex-column">
            <div class="header__left mx-auto flex-lg-grow-1 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center p-5"   >
                <span>Welcome</span>
                <h1 class="mb-4">{{ $masterBeranda->title_header }}</h1>
                <p class="">
                    {{ $masterBeranda->desc_header }}
                </p>
                <a href="" class="btn btn-primary mt-3">View All Product</a>
            </div>
            <div class="header__right d-flex justify-content-center justify-content-lg-end">
              <div class="d-flex justify-content-end" >
                <img src="{{ asset('frontend/img/pexels-ksu&eli-8681387.jpg') }}" class="w-fluid d-lg-block d-none" width="350px" alt="" srcset="">
              </div>
              <div class="d-flex align-items-right card-outer d-lg-block d-none">
                <div class="mx-auto d-flex flex-wrap align-items-center">
                  <div class="card border-0 position-relative d-flex flex-column">
                    <img width="250px"
                      src="{{ asset('images/product/'.$dataProduk[0]->photos ) }}"
                      alt="" />

                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</section>
<!-- end header -->
@endsection
@section('content')
    <!-- about -->
    <section class="about__section" id="about">
        <div class="container ">
            <h1 class="text-center mb-4 about__title">About Us</h1>
            <!-- <hr> -->
            <div class="row">
                <div class="col-lg-12 card p-4">
                <div class="container">
                    <p class="about__desc">
                        {{ $masterBeranda->desc_about }}
                    </p>
                </div>
                </div>
            </div>
        </div>
    </section>
      <!-- endabout -->
      <section class="features__section" id="features">
        <div class="container py-5">
          <h1 class="text-center mb-4 features__title">Why choose Alina Bana ?</h1>
          <div class="row">
            <div class="col-lg-12">
              <p class="features__desc">
                  {{ $masterBeranda->desc_features }}
              </p>
              <!-- Slider main container -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="swiper swiper_features mt-5">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach ($masterFeatures as $item)
                    <div class="swiper-slide d-flex" >
                        <div class="card">
                        <div class="card-body p-4 text-center">
                            <h4>{{ strtoupper($item->title) }}</h4>
                            <p>
                                {{ $item->desc }}
                            </p>
                        </div>
                        </div>
                    </div>

                  @endforeach

                </div>
                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->

                <!-- If we need navigation buttons -->
                <!-- <div class="swiper-button-prev"></div> -->
                <!-- <div class="swiper-button-next"></div> -->

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- product section -->
      <section class="product__section">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h1 >Our Product</h1>
                <div class="mb-4">
                  <span class="product__span" >Rattan Living Set</span>
                </div>
                <p class="container">
                    {{ $masterBeranda->desc_product }}
                </p>
              </div>
            </div>
            <div class="row">
              <div class="swiper swiper_product mt-5 ">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                    @foreach ($dataProduk as $item)
                        <div class="swiper-slide d-flex" >
                            <div class="col-sm-6 col-md-6 col-lg-8 mx-auto mt-5">
                            <div class="food-card food-card--vertical m-2">
                                <div class="food-card_img">
                                    <img src="{{ asset('images/product/'.$item->photos) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="food-card_content">
                                    <div class="food-card_title-section">
                                        <h1 class="food-card_title">{{ ucfirst($item->name) }}</h1>

                                        </div>
                                        <div class="food-card_bottom-section">
                                        <div class="space-between p-2">
                                           {!! substr($item->desc,0,100).'...' !!}
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
                    <div class="swiper-button-next btn btn-primary p-4 next"></div>
                    <div class="swiper-button-prev btn btn-primary p-4 prev"></div>

                </div>


              </div>
            </div>
        </div>
      </section>
      <!-- end section -->
      <!-- blog -->
      <section class="blog__section" id="blog" style="background-color: #f8f9fa">
        <div class="container ">
            <h1 class="text-center mb-4 blog__title">Newest Blog</h1>
            <!-- <hr> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <p class="blog__desc">
                            {{ $masterBeranda->desc_blog }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($data as $item)
                    <div class="col-lg-4 p-3">
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
                @endforeach
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <a href="{{ route('blogData.index') }}" class="btn btn-outline-secondary">View all blog</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dataUser->no_hp }}.&text=Hello%20Natural%20Rattan%20Furniture" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
    </div>
@endsection
