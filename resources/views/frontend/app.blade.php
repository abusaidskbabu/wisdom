@extends('frontend.base')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/it.css') }}">
@endsection
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset($page->banner) }}" alt="">
        <div class="ptext">
            <span class="border">
              {{ $page->title }}
            </span>
        </div>
    </div>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! $page->description !!}
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
@endsection