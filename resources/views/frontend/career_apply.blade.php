@extends('frontend.base')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/it.css') }}">
<style>
.elements{
    padding-top: 30px;
}
.date{
    color: #fff;
}
.form{
    background-image: url("images/room.jpg");
    background-color: #cccccc;
    width: 100%;
    background-attachment: fixed;
    color: #fff !important;
}
.pimg2{
    position:relative;
    opacity:0.9;
    background-position:center;
    background-size:cover;
    background-repeat:no-repeat;
    background-attachment:fixed;
  }
  .pimg2{
    background-image:  linear-gradient(
      rgba(255, 0, 0, 0.45), 
      rgba(255, 0, 0, 0.45)
    ),url("{{ asset('images/parallax.jpg') }}");
    min-height:400px;
    position: relative;
  }
  form input, textarea{
      opacity: 0.9;
  }
  input[type="text"], .form-control {
    background-color:rgba(255, 0, 0, 0.45);
}
.titlee{
    border-left: 5px solid #6ac5ec;
}
</style>
@endsection
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset($data->image) }}" alt="">
        <div class="ptext">
            <span class="border">
                BE OUR <br>
              {{ $title }}
            </span>
        </div>
    </div>
    <section class="main">
        <div class="elements">
            <div class="container">
                <div class="row date">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        Post Date: {{ date('d-M-Y', strtotime($data->date)) }}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        {!! $data->description !!}
                    </div>
                </div>
            </div>
            <div class="pimg2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 h3 titlee">
                            FILL UP THE FOLLOWING THINGS
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times</button>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li style="color:red;">{{$error}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                                
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times</button>
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="your first name" value="{{ old('first_name') }}" style="color: #fff">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="your last name" value="{{ old('last_name') }}" style="color: #fff">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email_address" placeholder="your email" value="{{ old('email_address') }}" style="color: #fff">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone_number" placeholder="your phone number" value="{{ old('phone_number') }}" style="color: #fff">
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1" class="h5">Upload Your Resume</label>
                                    <input type="file" name="resume" value="{{ old('resume') }}">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="letter" name="cover_letter" rows="9" placeholder="write your cover letter" style="color: #fff">{{ old('cover_letter') }}</textarea>
                                </div>
                                <div class="form-group submit">
                                    <button type="submit" class="btn">Apply Now</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
@endsection