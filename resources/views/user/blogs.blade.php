@extends('user/main')

@section('background-img',asset('user/img/post-bg.jpg'))
@section('title', 'Enjoy our posts')
@section('sub-heading', 'My blogs here')
@section('headlinks')
 <style>
   .fa-thumbs-up:hover{
     color:red;
   }
 </style>
@endsection

@section('content')

<!-- Main Content -->
    <div class="container" >
      <div class="row" id="app">
        <div class="col-lg-8 col-md-10 mx-auto">
           
            
            
            <div class="post-preview" v-for="post in posts.data" :key="post.id">
                <a href="#">
                  <h2 class="post-title">
                    @{{ post.title}}
                  </h2>
                </a>
                  <a>
                  <h3 class="post-subtitle">
                    @{{ post.subtitle}}
                  </h3>
                </a>
                <p class="post-meta">Posted by
                  <a href="#">Start Bootstrap</a>
                  on @{{ post.created_at}}
                
                 <a href="#"> 
                   <small> 0 </small>
                   <i class="fa fa-thumbs-up" aria-hidden="true"></i> 
                  </a>
                </p>
        </div>
         

      

           {{-- @foreach($posts as $post)
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
              on {{$post->created_at->diffForHumans()}}
            
             <a href="#"> 
               <small> 0 </small>
               <i class="fa fa-thumbs-up" aria-hidden="true"></i> 
              </a>
            </p>
          </div> 
          @endforeach --}}
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


@section('scripts')

    
  <script>
    
  let url = window.location.href;
  let page = url.split('=')[1];
  console.log(page);
    
    const app = new Vue({
      el: '#app',

    
      data() {
        return{
          
          posts : {!! $posts->toJson() !!},
          food : 'eba',
          house: 'localer',
        }
    
    },
    
    methods:{
     
    
        loadAuth(){
                    axios.get('/profile')
                    .then((response)=> {
    
                    })
                    .catch((error)=>{
    
                    })
                    .finally(() => {
    
                    });
                },
    
          },
          
      components: {
  
      },
    
      mounted() {
        
      },
  
    
    });
   
  //}
  </script>
  

  <style >
  
  
  
  </style>
  
  
  

@endsection




