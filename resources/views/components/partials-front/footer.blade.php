<footer class="footer__section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <ul class="footer__contact text-white">
            <li class="pb-3">
                <!--<i class="fa-brands fa-whatsapp"></i> -->
                <span>+62 812-4163-587 <br> 085815313767</span>
            </li>
            <!--<i class="fa-solid fa-envelope"></i>-->
            <li>
                 <span>{{ $dataUser->email != '' ? $dataUser->email : '-'}}</span>
            </li>
          </ul>
          <!-- <h1>Test</h1> -->
        </div>
        <div class="col-lg-6 text-center d-flex justify-content-center align-self-end">

        </div>
        <div class="col-lg-3 footer__sosial__media">
          <!-- <h1>Test</h1> -->
          <ul>
            <li >
              <a class="btn btn-primary" aria-current="page" href="{{ $dataUser->instagram != '' ? $dataUser->instagram : '-'}}" >
                <i class="fa-brands fa-instagram"></i>
              </a>
            </li>
            <li >
              <a href="{{ $dataUser->facebook != '' ? $dataUser->facebook : '-'}}" class="btn btn-primary">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
            <li >
              <a href="{{ $dataUser->twitter != '' ? $dataUser->twitter : '-'}}" class="btn btn-primary">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <p class="" >© 2022 Ali Bana. Developed by <a href="https://www.instagram.com/seven_7tech/" class="text-white">Seventech</a></p>
        </div>
      </div>
    </div>
</footer>
