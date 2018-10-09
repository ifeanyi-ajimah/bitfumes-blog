@extends('admin/master')
@section('headlinks')
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/select2/select2.min.css')}}">

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
              

              <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              @include('includes.errormessage')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="row container">
                  <div class="col-sm-8">
                    <br>
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" value="{{$post->title}}" name="title" id="title" placeholder="Enter Title">
                  </div>

                  <div class="form-group">
                    <label for="title">Post Subtitle</label>
                    <input type="text" class="form-control" value="{{$post->subtitle}}" name="subtitle" id="subtitle" placeholder="Enter subtitle">
                  </div>

                  <div class="form-group">
                    <label for="title">Post Slug</label>
                    <input type="slug" class="form-control" value="{{$post->slug}}" name="slug" id="slug" placeholder="Slug">
                  </div>
                </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                    <br>
                    <div class="pull-left">
                    <div class="form-check ">
                    <input type="checkbox" value="1" class="form-check-input" @if($post->status==1) checked @endif name="status" id="status">
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                    </div>
                    </div>
                    <br>
                    <div class="pull-right">
                    <label for="image"  id="image">Select image</label>
                    <input type="file" name="image"  id="image">
                    </div>
                    
                  </div>

                  <div class="form-group" style="margin-top:3px;">
                  <label>Select tags</label>
                  <select class="form-control select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select tag(s)" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                      @foreach($post->tags as $postTag)
                      @if($postTag->id == $tag->id)
                        selected
                        @endif
                      @endforeach
                      >
                      {{$tag->name}}
                    </option>
                    @endforeach
                  </select>
                  </div>
                <!-- /.form-group -->
                <div class="form-group" style="margin-top:18px;">
                  <label>Select Categories</label>
                  <select class="form-control select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select tag(s)" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}"
                      @foreach($post->categories as $posCat)
                        @if($posCat->id == $cat->id)
                          selected                        
                        @endif
                      @endforeach
                      >
                      {{$cat->name}}
                    </option>
                    @endforeach
                  </select>
                  </div>
                <!-- /.form-group -->

                    <br>
                    
                </div>
                </div>
              
                <!-- /.card-body -->

          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Enter blog post here.
                
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea  name="body"  
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$post->body}}</textarea>
              </div>
              
              </p>
            </div>
          </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  @endsection
@section('footerlinks')


<script type="text/javascript" src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}" ></script>
<script type="text/javascript" "{{asset('admin/ckeditor/ckeditor.js')}}"></script>


<script>
$(document).ready(function(){
$(".select2").select2();
});
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>

@endsection
