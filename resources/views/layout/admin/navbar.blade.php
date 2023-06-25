<nav class="main-header navbar navbar-expand navbar-cyan navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <form action="/logout" method="POST">
                @csrf
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assetadmin/docs/assets/img/default.png') }}" class="img-circle" alt="" width="30" height="28">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="" ><i class="fas fa-user fa-fw"></i> Profile</a>
                    <a class="dropdown-item" href="" ><i class="fas fa-key fa-fw"></i>  Ubah Password</a>
                    <li class="divider"></li>
                    <a class="dropdown-item" href="/logout" > <i class="fas fa-switch fa-fw "></i> Logout</a>
                </div>
            </form>
        </li>
    </ul>
</nav>