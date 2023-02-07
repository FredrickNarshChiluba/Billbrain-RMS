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
                <li class="breadcrumb-item active">Super User</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info" style="border-radius: 2em;">
                    <div class="inner">
                    <h3>{{$students->count()}}</h3>

                    <p>Students</p>
                    </div>
                    <a href="{{ route('student.index') }}" class="small-box-footer" style="border-radius: 2em;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success" style="border-radius: 2em;">
                    <div class="inner">
                    <h3>{{$accountants->count()}}</h3>

                    <p>Accountants</p>
                    </div>
                    <a href="{{ route('accountant.index') }}" class="small-box-footer" style="border-radius: 2em;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" style="border-radius: 2em;">
                    <div class="inner">
                    <h3>{{$admins->count()}}</h3>

                    <p>Admins</p>
                    </div>
                    <a href="{{ route('admin.index') }}" class="small-box-footer" style="border-radius: 2em;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger" style="border-radius: 2em;">
                    <div class="inner">
                    <h3>{{$courses->count()}}</h3>

                    <p>Courses</p>
                    </div>
                    <a href="{{ route('course.index') }}" class="small-box-footer" style="border-radius: 2em;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-6">
                    <div class="card" style="border-radius: 2em;">
                        <div class="card-header">
                            <h3 class="card-title">
                                Create Announcement
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('announcement.store') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="course">Title:</label>
                                            <input type="text" class="form-control" name="title" id="title" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="file" placeholder="Choose file" id="file">
                                                @error('file')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" style="border-radius: 2em;" class="btn btn-primary" id="submit">Submit</button>
                                    </div>
                                </div>     
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                
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
                                    <p><a class="btn btn-default" href="files/{{$announcement->name}}"><i class="fas fa-file-download"> Read Details here</i></a></p>
                                    <p>{{date_format($announcement->created_at,'D M Y')}}</p>
                                
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