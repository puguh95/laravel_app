<nav class="nav-menu d-none d-lg-block">
  <ul>
    <li class="active"><a href="/#hero">Home</a></li>
    <!-- <li><a href="#about">About</a></li> -->
    <!-- <li><a href="#services">Services</a></li> -->
    <!-- <li><a href="#portfolio">Portfolio</a></li> -->
    <!-- <li><a href="#team">Team</a></li> -->
    <li><a href="/#catalog">Katalog</a></li>
    <!-- <li class="drop-down"><a href="">Drop Down</a>
      <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="drop-down"><a href="#">Deep Drop Down</a>
          <ul>
            <li><a href="#">Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#">Deep Drop Down 5</a></li>
          </ul>
        </li>
        <li><a href="#">Drop Down 2</a></li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
      </ul>
    </li> -->
    <li><a href="/#contact">Kontak</a></li>
    @isset(Auth::user()->username)
    <li class="drop-down">
      <a>Hi {{ Auth::user()->username }} !</a>
      <ul>
        <li>
          <a href="/user-profile">Data Diri</a>
        </li>
        <li>
          <a href="/list-order">List Pemesanan</a>
        </li>
        <li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
            @csrf
            <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
          </form>
        </li>
      </ul>
    </li>
    @endisset
  </ul>
</nav>