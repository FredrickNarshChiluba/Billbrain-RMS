@extends('baselayout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          @if (auth()->user()->role != 'Accountant')
            <a href="{{ route('finances.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Register New Financial Structure</button></a>
        
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
                <h3 class="card-title">Fiancial Year List</h3>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  <div> {{Session::get('success')}}</div>
                  </div>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Academic Year</th>
                    <th>Course</th>
                    <th>Semester_1 Fees</th>
                    <th>Semester_2 Fees</th>
                     @if (auth()->user()->role != 'Accountant')
                     <th>Edit</th>
                    <th>Delete</th>
                    @endif
                  </tr>
                  </thead>
                  <?php
                    
                    $course=App\Models\Course::all();

                    ?>
      
                  <tbody>
                    
                  @foreach($finances as $finance)
                        <tr>
                            <td>{{ $finance->academic_years }}</td>
                            <td>{{ $finance->course_name }}</td>
                            <td>{{ $finance->semester_1 }}</td>
                            <td>{{ $finance->semester_2 }}</td>
                             @if (auth()->user()->role != 'Accountant')
                           
                            <td><a href="{{ route('finances.edit',$finance->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('finances.destroy', ['finance'=>$finance]) }}" method="post">
                                    @csrf
                                  
                                    <input type="hidden" value="{{$finance->id}}" name="id"/>
                                    <input type="hidden" value="{{$finance->course_name}}" name="course_name"/>
                                    <button  class="btn btn-xs btn-danger show_confirm" style="border-radius: 2em;" type="submit" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>


                    <th>Academic Year</th>
                    <th>Course</th>
                    <th>Semester_1 Fees</th>
                    <th>Semester_2 Fees</th>
                     @if (auth()->user()->role != 'Accountant')
                     <th>Edit</th>
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
   <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script
  <script type="text/javascript">
<script>
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
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
  <!-- /.content-wrapper -->

@endsection
