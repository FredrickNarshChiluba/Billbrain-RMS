@extends('baselayout')

@section('content')
    
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Welcome {{auth()->user()->name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{auth()->user()->role }}</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
              <div class="col-md-6">
                <div class="card card-default" style="border-radius: 2em;">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-bullhorn"></i>
                        Announcements
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach ($announcements as $announcement)
                          <div class="callout callout-danger" style="border-left-color: #f4a02e">
                            <h5>{{$announcement->title}}</h5>
                            <i class="fas fa-bullhorn"></i>
                            <i class="fa-sharp fa-solid fa-xmark"></i>
                            <a class="btn btn-default" href="files/{{$announcement->name}}"><i class="fas fa-file-download"> Read Details here</i></a><br>
                            {{date_format($announcement->created_at,'D M Y')}}
                          </div>
                        @endforeach
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->

          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection