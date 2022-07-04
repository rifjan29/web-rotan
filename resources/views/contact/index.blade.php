@extends('layouts.template-front')
@section('header')
<section class="contact__section">
    <div class="container">

    <div class="row mb-5">
        <div class="col-lg-8 text-center mx-auto">
            <h1 class="">Contact Form</h1>
            <p>
                {!! $masterBeranda->desc_contact !!}
            </p>
        </div>
    </div>

<div class="row d-flex">
      <div class="col-lg-8 mx-auto">
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
              <div class="card-body p-5">
                  <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                          <div class="mb-3">
                              <div class="row">
                                  <div class="col-lg-6 col-md-12 col-sm-12">
                                      <label for="firstname" class="form-label">First Name</label>
                                      <input type="text" class="form-control @error('firstname') is_invalid @enderror " id="firstname" name="firstname" autofocus>
                                      @error('firstname')
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-lg-6 col-md-12 col-sm-12">
                                      <label for="lastname" class="form-label">Last Name</label>
                                      <input type="text" class="form-control @error('lastname') is_invalid @enderror" id="lastname" name="lastname" autofocus>
                                      @error('lastname')
                                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control @error('email') is_invalid @enderror"" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                              @error('email')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="no_hp" class="form-label">No HP/Whatsapp</label>
                              <input type="text" class="form-control @error('no_hp') is_invalid @enderror"" id="no_hp" name="no_hp" aria-describedby="no_hp">
                              <div id="no_hp" class="form-text">+62 894xxx</div>
                              @error('no_hp')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="subject" class="form-label">Subject</label>
                              <input type="text" class="form-control @error('subject') is_invalid @enderror"" id="subject" name="subject" autofocus>
                              @error('subject')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="lastname" class="form-label">Message</label>
                              <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                              @error('message')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
                              <label class="form-check-label" for="exampleCheck1">By selecting this you agree to our Privacy Policy and Cookie Policy</label>
                              @error('check')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary ">Let's Talk</button>
                          </div>
                  </form>
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

