@extends('user/main')

@section('background-img',asset('user/img/about-bg.jpg'))
@section('title', 'Welcome Home')
@section('sub-heading', 'Home')
@section('content')
            <div class="container">
              <div class="col-lg-8 col-md-10 mx-auto">
               <p>Welcome DEAR, {{Auth::user()->name}}</p>


              </div>
            </div>
    <hr>
@endsection