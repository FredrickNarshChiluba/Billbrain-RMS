@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{ route('course_unit.create') }}"><button class="btn btn-primary">Register Course Unit</button></a>
        @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
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
        <div class="card" style="border-radius: 2em;">
            <div class="card-header">
            <h3 class="card-title">List Of Courses</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Course Name</th>
                    <th>Course Unit Name</th>
                    <th>Course Unit Code</th>
                    <th>L</th>
                    <th>P</th>
                    <th>CH</th>
                    <th>CU</th>
                    <th>Edit</th>
                     @if (auth()->user()->role != 'Accountant')
                    <th>Delete</th>
                    @endif
                </tr>
                </thead>
                <?php
                    $student=App\Models\Student::all();
                    $courses_id=App\Models\Course::all();
                    ?>
                <tbody>
                @foreach ($courses as $course)
                    <tr>
                    <td>
                        @foreach($courses_id as $courses_ids)
                        @if($courses_ids->code == $course->course_code)
                        {{ $courses_ids->name }}
                        @endif
                        @endforeach
                    </td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_unit_code }}</td>
                        <td>{{ $course->L }}</td>
                        <td>{{ $course->P }}</td>
                        <td>{{ $course->CH }}</td>
                        <td>{{ $course->CU}}</td>
                        <td><a href="{{ route('course_unit.edit',$course->id) }}">Edit</a></td>
                        @if (auth()->user()->role != 'Accountant')
                        <td>
                            <form action="{{ route('course_unit.destroy', ['course'=>$course]) }}" method="get">
                                @csrf
                                <input type="hidden" value="{{$course->id}}" name="id"/>
                                <input type="hidden" value="{{$course->course_name}}" name="course_name"/>
                                <button class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete' type="submit">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    
                <th>Course Name</th>
                    <th>Course Unit Name</th>
                    <th>Course Unit Code</th>
                    <th>L</th>
                    <th>P</th>
                    <th>CH</th>
                    <th>P</th>
                    <th>Edit</th>
                      @if (auth()->user()->role != 'Accountant')
                    <th>Delete</th>
                    @endif
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

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