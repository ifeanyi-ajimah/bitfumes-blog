<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user/layout/head')

  </head>

  <body>
    @include('user/layout/navigation')

				@if(Session::has('flash_message'))
				<div class="col-md-4">
				<p class="alert alert-success">{{Session::get('flash_message')}}</p>
				<div>
				@endif

    @section('content')
    
    @show
   @include('user/layout/footer')

  </body>

</html>
