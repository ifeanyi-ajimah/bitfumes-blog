<!DOCTYPE html>
<html>
<head>
  @include('/admin/layout/header')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper" id="app">

  @include('admin/layout/navigation')

  @include('admin/layout/sidebar')

  
 @section('content')
 @show

 
 @include('admin/layout/footer')
</div>
</body>
</html>
