@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{ route('accountant.create') }}"><button class="btn btn-primary">Register Accountant</button></a>
        @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
                {{Session::get('success')}}
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
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Accountant List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Accountant Name</th>
                    <th>Email</th>
                    <th>Phone Numbers:</th>
                    @if (Auth::user()->role !== 'Admin')
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($accountants as $accountant)
                    <tr>
                        <td>{{ $accountant->name }}</td>
                        <td>{{ $accountant->email }}</td>
                        <td>{{ $accountant->phone_1 }} / {{ $accountant->phone_2 }}</td>

                        @if (Auth::user()->role !== 'Admin')
                        <td><a href="{{ route('accountant.edit',$accountant->id) }}">Edit</a></td>
                        {{-- <td>
                            <form action="{{ route('accountant.destroy', ['accountant'=>$accountant]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                {{-- <button class="btn btn-sm btn-danger" type="submit">Delete</button> --}}
                            </form>
                        {{-- </td> --}} 
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Accountant Name</th>
                    <th>Email</th>
                    <th>Phone Numbers:</th>
                    @if (Auth::user()->role !== 'Admin')
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
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
@endsection