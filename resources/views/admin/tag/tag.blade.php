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
              <form role="form" action="{{route('tag.store')}}" method="post">
                @csrf
                <div class="card-body">

                  <div class="col-lg-4 col-lg-offset-4">
                  		<div class="form-group">
	                    <label for="tag">Tag</label>
	                    <input type="" class="form-control" name="tag" id="tag" placeholder="Enter Tag">
                 		 </div>
                  </div>

                  <div class="col-lg-4 col-lg-offset-4">
                  		<div class="form-group">
	                    <label for="slug">Tag Slug</label>
	                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                 		  </div>
                  </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

				        <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('tag.index')}}" class="btn btn-warning">Back</a>

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