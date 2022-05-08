@extends('frontend.base')

@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset('images/banner/banner 5.jpg') }}" alt="">
        <div class="ptext">
            <span class="border">
              {{ $title }}
            </span>
        </div>
    </div>
    <section class="main">
        <div class="container">
            @php $num = 0; @endphp
            @foreach ($data as $dt)
            @php $num++ @endphp
            <div class="job_item">
                <div class="row">
                    <div class="col-md-2">
                        <p class="text-center"><span class="serial_text">{{ $num }}</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="post_title text-uppercase">{{ $dt->title }}</p>
                        <p class="date_item">Post Date: {{ date('d-M-Y', strtotime($dt->date)) }}</p>
                    </div>
                    <div class="col-md-2">
                        <a class="apply_button button" href="{{ route('career.apply', $dt->id) }}"><span>apply now</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @include('frontend.footer')
@endsection