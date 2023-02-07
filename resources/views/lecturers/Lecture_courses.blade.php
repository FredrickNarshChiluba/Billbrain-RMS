@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <!-- <a href="{{ route('course.create') }}"><button class="btn btn-primary">Register course</button></a> -->
        </div>
       
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List Of Courses Units</h3>
            <div style='margin-left:860px'  class="col-sm-6">
            <!-- <a href="{{ route('course_unit.index') }}"><button class="btn btn-primary">Register course unit</button></a> -->
            </div>            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Academics year</th>
                    <th>Course code</th>
                    <th>Course</th>
                    <th>Course Unit Name</th>
                    <th>Course unit Code</th>
                    <!-- <th>Duration</th>
                    <th>Fees</th>
                    <th>Edit</th>
                    <th>Delete</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach ($asign as $course)
               
                    <tr>
                    <td>2021/2022</td>
                      
                    @foreach ($coursesunit as $unit)
                    @foreach ($courses as $code) 
                    @if($unit->course_code==$code->code)
                    @if($course->course_unit_code==$unit->course_unit_code)
                    <td>                   
                    {{$code->code}}                    
                    </td>
                    <td>                   
                    {{$code->name}}                    
                    </td>
                    
                    <td>                       
                    
                        {{ $unit->course_name }}                    
                        
                    </td>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                        <td>{{ $course->course_unit_code }}</td>
                        <!-- <td>{{ $course->fees }}</td> -->
                      
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Academics year</th>
                <th>Course code</th>
                    <th>Course</th>
                    <th>Course Unit Name</th>
                    <th>Course Unit Code</th>
                    <!-- <th>Duration</th> -->
                    
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, all student records associated with it will also be deleted.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
        });
    });
 
 </script>
@endsection