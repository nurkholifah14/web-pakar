<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Data Gejala</li> -->
              <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $li_1 }}</a></li>
                    @if(isset($title))
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    @endif
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>