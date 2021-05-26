<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="#hero"><img src="{{asset('OnePage')}}/assets/img/pinjemin-aja-logo-header.png" alt="" class="img-fluid"></a></h1>

      <!-- .nav-menu -->
      @include('layout.partials.navigator')

      @empty(Auth::user()->username)
      <a href="/login" class="get-started-btn scrollto">Login</a>
      @endempty
    </div>
  </header>