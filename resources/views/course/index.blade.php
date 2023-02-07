@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{ route('course.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Register Course</button></a>
        <a href="{{ route('course_unit.index') }}"><button class="btn btn-primary" style="border-radius: 2em;">Register Course unit</button></a>
        <a href="{{ route('finances.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Add Course Fees</button></a>
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
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Course Code</th>
                    <th>Duration</th>
                    <th>Financial Year</th>
                    <th>Semester-1 Fees</th>
                    <th>Semester-2 Fees</th>
                    <th>Edit</th>
                    @if (auth()->user()->role != 'Accountant')
                    <th>Delete</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($courses as $course)
                <?php
                $course_fees= App\Models\Finances::where('course_id', $course->id)->join('academic_years', 'academic_years.id', '=', 'finances.academic_year_id')->get();
                ?>
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->code }}</td>
                        <td>
                            <!-- {{ $course->duration }}  -->
                            @if($course->duration=='one')
                            1
                            @elseif($course->duration=='Two')
                            2
                            @elseif($course->duration=='Three')
                            3
                            @elseif($course->duration=='Four')
                            4
                            @elseif($course->duration=='Five')
                            5
                            @else
                            {{$course->duration}}
                            @endif
                            <br> {{ $course->phone_2 }}</td>
                        <td>
                            @foreach ($course_fees as $fees)
                              <p>{{ $fees->academic_years }}</p>
                            @endforeach
                            </td>  
                        <td>
                            @foreach ($course_fees as $fees)
                              <p>{{ $fees->semester_1 }}</p>
                            @endforeach
                            </td>
                        <td>
                            @foreach ($course_fees as $fees)
                            <p>{{ $fees->semester_2 }}</p>
                          @endforeach
                        </td>

                        <td><a href="{{ route('course.edit', ['course'=>$course]) }}">Edit</a></td>
                        @if (auth()->user()->role != 'Accountant')
                        <td>
                            <form action="{{ route('course.destroy', ['course'=>$course]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger show_confirm" style="border-radius: 2em;" data-toggle="tooltip" title='Delete' type="submit">Delete</button>
                            </form>
                        </td>
                        @endif 
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Course Code</th>
                    <th>Duration</th>
                    <th>Financial Year</th>                   
                     <th>Semester-1 Fees</th>
                    <th>Semester-2 Fees</th>
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
