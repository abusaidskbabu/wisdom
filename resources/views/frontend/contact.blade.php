@extends('frontend.base')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/it.css') }}">
@endsection
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset('images/banner/banner 13.jpg') }}" alt="">
        <div class="ptext">
            <span class="border">
              {{ $title }}
            </span>
        </div>
    </div>
    <section class="main">
        <div class="container">
            <div class="row contact-row">
                <div class="col-md-7 col-sm-7 col-lg-7">
                    <form method="POST">
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
                          <label for="exampleFormControlInput1" class="h5">First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="h5">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1" class="h5">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1" class="h5">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                          </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="h5">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="9" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group submit">
                                <input type="submit" name="submit" id="submit" class="btn">
                            </div>
                      </form>
                </div>
                <div class="col-md-5 col-sm-5 col-lg-5 office">
                    <div class="row">
                        <p class="contact h4"><i class="fa fa-map-marker"></i> Office</p>
                    </div>
                    <div class="row">
                        <p class="contact h4">BANGLADESH</p>
                        <hr>
                        <p class="details">
                            Holding # 08, Road# 05,Sector# 01
Uttara Model Town, Uttara
Dhaka-1230,Bangladesh<br>
                            Tel: +88-02-48963506<br>
                            Fax: +88-02-48963843<br>
                            Email: <a href="mailto:bangladesh@wisdomvalley.net">bangladesh@wisdomvalley.net</a><br>
                            Web: <a href="http://wisdomvalley.net/">http://wisdomvalley.net/</a>
                        </p>
                    </div>
                    <div class="row">
                        <p class="contact h4">MALAYSIA</p>
                        <hr>
                        <p class="details">
                            Q Sentral, Level-32, Unit-32-BC-18,
2A Jalan Stesen Sentral 2, KL Sentral, 50470, Kuala Lumpur, Wilayah Persekutuan, Malaysia<br>
                            Tel: +60327121237 <br>
                            Fax: +60327121238<br>
                            Email: <a href="mailto:malaysia@wisdomvalley.net">malaysia@wisdomvalley.net</a><br>
                            Web: <a href="http://wisdomvalley.net/">http://wisdomvalley.net/</a>
                        </p>
                    </div>
                    
                    <div class="row">
                        <p class="contact h4">HOURS</p>
                        <hr>
                        <p class="details">Sat-Thu: 9am – 6pm</p>
                    </div>
                    <!--<div class="row">
                        <p class="contact h4">EMAIL US</p>
                        <hr>
                        <p class="details">
                            <a href="mailto:malaysia@wisdomvalley.net">malaysia@wisdomvalley.net</a>
                        </p>
                        <p class="details">
                            <a href="mailto:bangladesh@wisdomvalley.net">bangladesh@wisdomvalley.net</a>
                        </p>
                    </div>
                    <div class="row">
                        <p class="contact h4"><i class="fa fa-mobile"></i> CALL US</p>
                        <hr>
                        <p class="details">
                            HP: +88 01730577301-02 <br>
                            LP: +88 02 9888836
                        </p>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
@endsection
