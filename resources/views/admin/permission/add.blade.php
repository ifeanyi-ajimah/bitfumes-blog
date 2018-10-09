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
                <h3 class="card-title">Titles</h3>
              </div>
              @include('includes.errormessage')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="card-body">

                  <div class="col-lg-6 col-lg-offset-3">
                  		<div class="form-group">
	                    <label for="permission">permission</label>
	                    <input type="" class="form-control" name="name" id="permission" placeholder="Enter permission">
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


                  
                
                </div>
            <!-- /.card body -->
                <div class="form-group">
				        <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
                </div>
                </div>

              </form>
          
        </div>
        <!-- /card primary-->
      </div>
      <!-- ./container fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection