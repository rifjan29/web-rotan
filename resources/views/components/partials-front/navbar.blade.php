 <!-- navbar -->
 <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo_bgtransaprant.png') }}" class="img-fluid" width="80"  alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('home') }}#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#features">Features</a>
                </li>
              <!-- <li class="nav-item dropdown"> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">All Product</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($dataKategori as $item)
                        <li><a class="dropdown-item" href="{{ url('/product/'.$item->slug) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('blogData.index') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('ourteams.index') }}">Our Teams</a>
                </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item d-flex">
                  <div class="p-2">
                      <a class="nav-link btn-sosmed instagram" aria-current="page" href="{{ $dataUser->instagram != '' ? $dataUser->instagram : '-'}}" >
                        <i class="fa-brands fa-instagram mx-auto"></i>
                      </a>
                    </div>
                    <div class="p-2">
                        <a class="nav-link btn-sosmed facebook" aria-current="page" href="{{ $dataUser->facebook != '' ? $dataUser->facebook : '-'}}">
                          <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</header>
<!-- end navbar -->
