@extends('user/main')

@section('background-img',asset('user/img/about-bg.jpg'))
@section('title', 'Contact Us')
@section('sub-heading', 'My blogs here')
@section('content')
            <div class="container">
              <div class="col-lg-8 col-md-10 mx-auto">
               @include('user.error'){{--we decided to make our errors external and include them here inorder to make it inheritable--}}
                    <div class="row">
                      
                        @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                          @else

            <form action="{{url('contactMailable')}}" method="POST">
                    @csrf
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message </button>
            </div>
          </form>
          @endif
        </div>
</div>
    <hr>
@endsection