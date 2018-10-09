  @extends('admin/master')

  @section('content')

     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">

                       <div class="panel panel-primary ">
                            <div class="panel-heading">
                              <h3 class="panel-title">Event Calendar</h3>
                            </div>
                        
                  <div class="panel-body">
                         @include('includes.errormessage')
                    
                    <form role="form" action="{{route('addevents')}}" method="post">
                      @csrf
                     <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="" class="form-control" name="event_name" id="event_name" placeholder="Event Name">
                           </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                            <label for="slug">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" >
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" >
                            </div>
                        </div>
                    </div>
                    </div>
                  

                      <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Add Event</button>
                      </div>
                    </form>
                     </div>
                    </div>
                      
           </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  

  @endsection