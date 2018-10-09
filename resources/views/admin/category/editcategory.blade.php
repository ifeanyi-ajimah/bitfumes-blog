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
                <h3 class="card-title">Edit categories</h3>
              </div>
              @include('includes.errormessage')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('category.update', $cate->id)}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">

                  <div class="col-lg-6 col-lg-offset-3">
                  		<div class="form-group">
	                    <label for="category">category</label>
	                    <input type="text" class="form-control" value="{{$cate->name}}" name="category" id="category" placeholder="Enter Category">
                 		 </div>
                  </div>

                  <div class="col-lg-6 col-lg-offset-3">
                  		<div class="form-group">
	                    <label for="slug">category Slug</label>
	                    <input type="text" class="form-control" value="{{$cate->slug}}" name="slug" id="slug" placeholder=" Enter Slug">
                 		 </div>
                  </div>

     
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

				<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
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