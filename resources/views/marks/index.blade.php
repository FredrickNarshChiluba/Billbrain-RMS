@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{ route('marks.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Add Student Exam Marks</button></a>
        <a href="{{ route('createTest') }}"><button class="btn btn-primary" style="border-radius: 2em;">Add Student Test Marks</button></a>
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
            <h3 class="card-title">List Of Student Marks</h3>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                    </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>student ID</th>
                    <th>Course Unit Code</th>
                    <th>Test Mark</th>
                    <th>Exam Mark</th>
                    <th>Score</th>
                    <th>Edit</th>
                    @if (auth()->user()->role != 'Admin')
                    <th>Delete</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if (auth()->user()->role != 'Lecturer')
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->studentID }}</td>
                        <td>{{ $course->course_unit_code }}</td>
                        <td>{{ $course->test}}</td>
                        <td>{{ $course->exam}}</td>
                        <td>
                        @if($course->total_score!='' && $course->total_score !==0  )
                            @if($course->total_score<'50')
                            <p style='color:red'> {{$course->total_score}}</p>
                            @else<p > {{$course->total_score}}</p>
                            @endif
                           
                            @else
                            --
                            @endif

                        </td>
                        <td><a href="{{ route('marks.edit', ['mark'=>$course]) }}">Edit</a></td>
                        @if (auth()->user()->role != 'Admin')
                        <td>
                        <form action="{{ route('mark_destroy', $course->id ) }}" method="get">
                                @csrf
                                <input type="hidden" value="{{$course->id}}" name="id"/>
                                <button class="btn btn-sm btn-danger show_confirm" style="border-radius: 2em;" data-toggle="tooltip" title='Delete' type="submit">Delete</button>
                            </form>
                        </td> @endif
                    </tr>
                @endforeach
                @elseif (auth()->user()->role != 'Super User'  && auth()->user()->role != 'Admin')
                <?php
                $asign=App\Models\Lecture_Course_units::where(['user_id'=>auth()->user()->id])->get();
                ?>
                @foreach($asign as $as)
                @foreach ($courses as $course)
                @if($as->course_unit_code==$course->course_unit_code)
                    <tr>
                        <td>{{ $course->studentID }}</td>
                        <td>{{ $course->course_unit_code }}</td>
                        <td>{{ $course->test}}</td>
                        <td>{{ $course->exam}}</td>
                        <td>
                            @if($course->total_score!='' && $course->total_score !==0  )
                            @if($course->total_score<'50')
                            <p style='color:red'> {{$course->total_score}}</p>
                            @else<p > {{$course->total_score}}</p>
                            @endif
                           
                            @else
                            --
                            @endif

                        </td>
                        <td><a href="{{ route('marks.edits',$course->id )}}">Edit</a></td>
                        @if (auth()->user()->role != 'Admin')
                        <td>
                        <form action="{{ route('mark_destroy', $course->id ) }}" method="get">
                                @csrf
                                <input type="hidden" value="{{$course->id}}" name="id"/>
                                <button class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete' type="submit">Delete</button>
                            </form>
                        </td> @endif
                    </tr>
                    @endif
                    @endforeach
                @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                <th>student ID</th>
                    <th>Course Unit Code</th>
                    <th>Test Marks</th>
                    <th>Exam Marks</th>
                    <th>Score</th>
                    <th>Edit</th>
                    @if (auth()->user()->role != 'Admin')
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