@extends('frontend.base')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/it.css') }}">
@endsection
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset('images/WhatsApp Image 2021-12-14 at 4.30.43 PM.jpeg') }}" alt="404 page not found">
    </div>
    @include('frontend.footer')
@endsection