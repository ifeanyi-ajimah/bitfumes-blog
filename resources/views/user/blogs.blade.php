@extends('user/main')

@section('background-img',asset('user/img/post-bg.jpg'))
@section('title', 'Enjoy our posts')
@section('sub-heading', 'My blogs here')
@section('content')

<!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
           @foreach($posts as $post)
          <div class="post-preview">
            
            <a href="{{route('post',$post->slug)}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
            </a>
              <a>
              <h3 class="post-subtitle">
                {{$post->subtitle}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on {{$post->created_at->diffForHumans()}}</p>
          </div>
          @endforeach
          <hr>
                    <!-- Pager -->
          <ul class="pager">
          <li class=" next float-right">
            {{ $posts->links() }}
            
          </li>
        </ul>
        </div>
      </div>
    </div>

    <hr>
@endsection