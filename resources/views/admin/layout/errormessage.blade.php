			@if(count($errors)>0)
              @foreach($errors->all() as $error)
              <p class="alert alert-danger" role="alert" data-auto-dismiss="1000">{{$error}}</p>
              @endforeach
              @endif