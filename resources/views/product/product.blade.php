@extends('layouts.template-front')
@section('header')
<section class="product__section">
    <div class="container py-5">
          <div class="row">
              <div class="col-lg-12 text-center">
              <h1 >Our Product</h1>
              <div class="mb-4">
                  <span class="product__span" >Rattan Living Set</span>
              </div>
              <p class="container">
                {{ $masterBeranda->desc_product }}
              </p>
              </div>
          </div>
          <div class="row product__all">
              @foreach ($data as $item)
                <div class="col-lg-4 col-sm-12 col-md-12 p-2">
                    <div class="card" >
                        <img src="{{ asset('images/product/'.$item->photos) }}" class="card-img-top" height="350px" alt="{{ $item->name }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ ucfirst($item->name) }}</h4>
                                <span class="product__span" style="font-size: 0.90rem" >{{ $item->name_kategori }}</span>

                                <div class="mt-4">
                                    <p class="card-text">{!! substr($item->desc,0,100).'..' !!}</p>
                                </div>
                                <br>
                                <a href="{{ route('product.detail',$item->slug) }}"  class="btn btn-primary">See Our Product</a>
                            </div>
                        </div>
                </div>

              @endforeach

          </div>
          {{-- <div class="row py-5 ">
              <div class="col-lg-12 d-flex justify-content-end">
                  <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                  </nav>
              </div>
          </div> --}}
    </div>
</section>
@endsection
