@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{ route('admin.create') }}"><button class="btn btn-primary">Register Admin</button></a>
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
            <h3 class="card-title">Admin List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Phone Numbers:</th>
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone_1 }} <br> {{ $admin->phone_2 }}</td>
                        <td><a href="{{ route('admin.edit',['admin'=>$admin]) }}">Edit</a></td>
                        {{-- <td>
                            <form action="{{ route('admin.destroy', ['admin'=>$admin]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-xs btn-danger show_confirm" type="submit" data-toggle="tooltip" title='Delete' >Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Phone Numbers:</th>
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
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