<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="#hero"><img src="OnePage/assets/img/pinjemin-aja-logo-header.png" alt="" class="img-fluid"></a></h1>

      @include('layout.partials.navigator')
      <!-- .nav-menu -->
      @isset(Auth::user()->username)
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="drop-down">
            <a>Hi {{ Auth::user()->username }} !</a>
            <ul>
              <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
                  @csrf
                  <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                </form>
              </li>
            </ul>
          </li>
        <ul>
      </nav>
      @endisset

      @empty(Auth::user()->username)
      <a href="/login" class="get-started-btn scrollto">Login</a>
      @endempty
    </div>
  </header>