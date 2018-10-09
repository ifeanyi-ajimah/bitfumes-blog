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
              <form role="form" action="{{route('role.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-lg-6 col-lg-offset-3 centered">
                  	 <div class="form-group">
	                    <label for="role">role</label>
	                    <input type="" class="form-control" name="name" id="role" placeholder="Enter role">
                 		 </div>
                  </div>
                </div><!-- /.role input row -->

                <div class="row">
                  <div class="col-lg-4">
                    <label for="name">Posts Permission</label>
                    @foreach($permissions as $permission)
                    @if($permission->permission_for == "post")
                    <div class="checkbox">
                      <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endif
                    @endforeach
                  </div>

                  <div class="col-lg-4">
                    <label for="name">Users Permission</label>
                    @foreach($permissions as $permission)
                    @if($permission->permission_for == "user")
                    <div class="checkbox">
                      <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endif
                    @endforeach
                  </div>

                  <div class="col-lg-4">
                    <label for="name">Others Permission</label>
                    @foreach($permissions as $permission)
                    @if($permission->permission_for == "other")
                    <div class="checkbox">
                      <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endif
                    @endforeach
                  </div>

                </div>
          

				        <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>
                </div><!-- /.card-footer -->
                </div><!-- /.card-body -->

              </form>
          
        </div>
        <!-- /.cardprimary-->
      </div>
      <!-- ./container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->



@endsection