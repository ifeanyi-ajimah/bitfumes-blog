@extends('admin/master')
@section('headlinks')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admins Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Admin</h3>
            @include('includes.errormessage')
          <a class="col-lg-offset-6 btn btn-success" href="{{route('admin.create')}}">Add admin</a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Admin Name</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($admins as $admin)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$admin->name}}</td>
                  <td> @foreach($admin->roles as $admin_role)
                        {{$admin_role->name}},
                        @endforeach
                  </td>
                  <td> {{$admin->status==1 ? "Allowed" : "Not allowed"}} </td>
                  <td><a href="{{route('admin.edit',$admin->id)}}" ><i class="far fa-edit"></i></a></td>
                  
                  <td>
                    <form id="delete-form-{{$admin->id}}" method="post" action="{{route('admin.destroy',$admin->id)}}" style="display:none">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="
                    if(confirm('Are you sure you want to delete? '))
                    {
                    event.preventDefault();
                    document.getElementById('delete-form-{{$admin->id}}').submit();
                  }
                    else{
                    event.preventDefault();
                  }">
                  <i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Admin Name</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footerlinks')
<script type="text/javascript" src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection