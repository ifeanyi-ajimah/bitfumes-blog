@extends('admin/master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
              <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
              </div>
              @include('includes.errormessage')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('permission.update',$permission->id)}}" method="post">
                @csrf
                {{method_field('PATCH')}}
                <div class="card-body">

                  <div class="col-lg-4 col-lg-offset-4">
                  		<div class="form-group">
	                    <label for="permission">permission</label>
	                    <input type="text" class="form-control" value="{{$permission->name}}" name="name" id="permission" placeholder="Enter permission">
                 		 </div>

                    <div class="form-group">
                      <label for="permission_for"></label>
                      <select name="permission_for" id="permission_for" class="form-control">
                         <option selected disable> Select Permission for</option>
                        <option value="user">User</option>
                        <option value="post">Post</option>
                        <option value="other">Other</option>
                      </select>
                     </div>

                  </div>

                  
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

				        <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>

                </div>

              </form>
          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection