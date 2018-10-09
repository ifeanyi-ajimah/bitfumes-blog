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
                          <h3 class="card-title">Add New Admin</h3>
                        </div>
                      </div>
                        @include('includes.errormessage')
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.store')}}" method="post">
                          @csrf
                          <div class="card-body">

                            <div class="col-lg-4 col-offset-4 centered">
                            		<div class="form-group">
          	                    <label for="tag">User name</label>
          	                    <input type="" class="form-control" name="name" id="name" placeholder="Enter New User Name" value="{{old('name')}}">
                           		 </div>
                            

                            
                            		<div class="form-group">
          	                    <label for="email">Email name</label>
          	                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter new email" value="{{old('email')}}">
                           		  </div>
                            
                                <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="{{old('phone')}}">
                                </div>
                            
                                <div class="form-group">
                                <label for="slug">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>
                          
                        
                                <div class="form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Enter Confirm password">
                                </div>
                            
                                 <div class="form-group">
                                    <label>Status</label>
                                    <div class="checkbox">
                                      <label><input type="checkbox" name="status" value="1" @if(old('status') == 1) checked @endif></label>
                                    </div>
                                 </div>
                            
                                <div class="form-group ">
                                  <label> Assign roles</label>
                                  <div class="row">
                                       @foreach($roles as $role)
                                <div class="col-lg-4">
                                  <div class="checkbox">
                                    <label><input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->name}}</label>
                                  </div>
                                </div>
                                   
                                  @endforeach
                                  </div>
                                 </div>

                            
                          <!-- /.card-body -->
                          </div>
                      <!-- /.card -->

          				        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('admin.index')}}" class="btn btn-warning">Back</a>
                          </div>

                        </form>
                    
                  <!-- /.col-->
                </div>
                <!-- ./row -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->



          @endsection