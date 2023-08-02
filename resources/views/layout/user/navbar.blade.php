<header id="header" class="header fixed-top bg-warning">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      @auth
      @can("admin")
      <a href="/admin" class="logo d-flex align-items-center">
        <span>Diva Glam</span>
      </a>
      @endcan
      @can("user")
      <a href="/" class="logo d-flex align-items-center">
        <span>Diva Glam</span>
      </a>
      @endcan
      @else
      <a href="/" class="logo d-flex align-items-center">
        <span>Diva Glam</span>
      </a>
      @endauth
      <nav id="navbar" class="navbar">
        <ul>
          @auth
          @can("user")
          <li><a class="nav-link {{ request()->is('identitas') ? 'active' : '' }}" href="/identitas">Diagnosa</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('riwayat') ? 'active' : '' }}" href="/riwayat">Riwayat diagnosa</a></li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
          @endcan
          @else
            <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
            <li class="dropdown"><a class="nav-link {{ request()->is('informasi') ? 'active' : '' }}" href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a class="nav-link {{ request()->is('informasi-JenisKulit') ? 'active' : '' }}" href="/informasi-JenisKulit">Jenis Kulit</a></li>
                <li><a class="nav-link {{ request()->is('informasi-Treatment') ? 'active' : '' }}" href="/informasi-Treatment">Treatment</a></li>
                <li><a class="nav-link {{ request()->is('informasi-Diskon') ? 'active' : '' }}" href="/informasi-Diskon">Diskon</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a></li>
            <li><a class="nav-link scrollto nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
            <li><a class="getstarted scrollto-outline" href="/login">Login</a></li>
            @endauth

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>