@extends('user/main')
@section('background-img',Storage::disk('local')->url($post->image) )
@section('headlinks')
<link rel="stylesheet" type="text/css" href="{{asset('user/css/prism.css')}}">
@endsection
@section('title',$post->title )
@section('sub-heading', $post->subtitle)
@section('content')

 <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

            <small>Created at: {{$post->created_at}}</small>
            <small class="pull-right" > Categories: 
            @foreach($post->categories as $category)

             <a href="{{url('post/category',$category->slug)}}"> <small style="margin-right: 20px; border-radius:5px; border:1px solid gray; padding:5px;" >
              {{$category->name}} </small> </a>

            @endforeach
          </small>
            {!! htmlspecialchars_decode($post->body) !!}

            {{--Tag clouds--}}

            
            <h3> Tag Clouds</h3> 
            @foreach($post->tags as $tag)

             <a href="{{url('post/tag',$tag->slug)}}"> <small class="pull-left" style="margin-right: 20px; border-radius:5px; border:1px solid gray; padding:5px;">
              {{$tag->name}} </small> </a>

            @endforeach
          


          </div>
        </div>
      </div>
    </article>

    <hr>
@endsection

@section('footerlinks')
<script type="text/javascript" src="{{asset('user/js/prism.js')}}" ></script>

@endsection

