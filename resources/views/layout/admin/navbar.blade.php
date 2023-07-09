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
                    <a class="dropdown-item" data-toggle="modal" data-target="#update-profile" href="#" ><i class="fas fa-user fa-fw"></i> Profile</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#change-password" href="#" ><i class="fas fa-key fa-fw"></i>  Ubah Password</a>
                    <li class="divider"></li>
                    <a class="dropdown-item text-danger" href="/logout" > <i class="fas fa-power-off fa-fw text-danger"></i> Logout</a>
                </div>
            </form>
        </li>
    </ul>
</nav>

<!--  ===== Change Password ===== -->
<div class="modal fade" id="change-password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update-password">
                @csrf
                    <div class="mb-3">
                        <label for="old_password">Old Password</label>
                        <input id="old_password" type="password" 
                        class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1">New Password</label>
                        <input id="new_password" type="password" 
                        class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">New Password Confirmation</label>
                        <input id="password_confirmation" type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary col-12">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Change Password -->

<!--  ===== Update Profile ===== -->
<div class="modal fade" id="update-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update-profile">
                @csrf
                    <div class="mb-3">
                        <label for="old_password">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap" id="name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary col-12">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Update Profile -->