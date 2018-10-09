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
                          <h3 class="card-title">Update Admin</h3>
                        </div>
                      </div>
                        @include('includes.errormessage')
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.update',$admins->id)}}" method="post">
                          @csrf
                          {{method_field('PATCH')}}
                          <div class="card-body">

                            <div class="col-lg-4 col-offset-4 centered">
                            		<div class="form-group">
          	                    <label for="tag">User name</label>
          	                    <input type="" class="form-control" name="name" id="name" placeholder="Enter New User Name" value="@if(old('name')) {{old('name')}} @else{{$admins->name}} @endif">
                           		 </div>
                            

                            
                            		<div class="form-group">
          	                    <label for="email">Email name</label>
          	                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter new email" value="@if(old('email')) {{old('email')}} @else{{$admins->email}} @endif">
                           		  </div>
                            
                                <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="@if(old('name')) {{old('phone')}} @else{{$admins->phone}} @endif">
                                </div>
                            
                                 <div class="form-group">
                                    <label>Status</label>
                                    <div class="checkbox">
                                      <label><input type="checkbox" name="status"  value="1" @if($admins->status ==1) || old('status')==1 checked @endif></label>
                                    </div>
                                 </div>
                            
                                <div class="form-group ">
                                  <label> Assign roles</label>
                                  <div class="row">
                                       @foreach($roles as $role)
                                <div class="col-lg-4">
                                  <div class="checkbox">
                                    <label><input type="checkbox" name="role[]" value="{{$role->id}}"
                                        @foreach ($admins->roles as $admin_role)
                                        @if($admin_role->id == $role->id)
                                        checked
                                        @endif
                                        @endforeach
                                      > {{$role->name}}</label>
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