<header id="header" class="header fixed-top bg-info">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="user/assets/img/logo.png" alt=""> -->
        <span>Sipakar</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        @auth

        @can("user")
        <li><a class="nav-link {{ request()->is('identitas') ? 'active' : '' }}" href="/identitas">Diagnosa</a></li>
        <li class="nav-item"><a href="/riwayat">Riwayat diagnosa</a></li>
        @endcan
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
        @else
          <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
          <li class="dropdown"><a class="nav-link {{ request()->is('informasi') ? 'active' : '' }}" href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link {{ request()->is('informasi-JenisKulit') ? 'active' : '' }}" href="/informasi-JenisKulit">Jenis Kulit</a></li>
              <li><a class="nav-link {{ request()->is('informasi-Treatment') ? 'active' : '' }}" href="/informasi-Treatment">Treatment</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a></li>
          <li><a class="nav-link scrollto nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
          <li><a class="getstarted scrollto-outline" href="/login">Login</a></li>
          @endauth

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>