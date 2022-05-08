@extends('frontend.base')
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset('images/banner/clients_banner.jpg') }}" alt="">
        <div class="ptext">
            <h1 class="border">
                CLIENTS
            </h1>
        </div>
    </div>
{{--    <section class="main container-fluid">--}}
{{--        <div class="elements">--}}
{{--            @foreach ($data as $dt)--}}
{{--                <div class="row services">--}}
{{--                    <div class="col2 col-md-6 col-lg-6 col-sm-6">--}}
{{--                        <div class="service-img">--}}
{{--                            <span class="services-img-span"></span>--}}
{{--                            <img src="{{ asset($dt->banner) }}" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col2 col-md-6 col-lg-6 col-sm-6 right-col-text">--}}
{{--                        <div class="infos">--}}
{{--                            <span class="header h3">{{ $dt->name }}</span>--}}
{{--                            <hr>--}}
{{--                            <p class="details" style="padding-left: 10px !important">--}}
{{--                            @php--}}
{{--                                $info = App\ServiceInformation::all()->where('parent', $dt->id);--}}
{{--                            @endphp--}}
{{--                            @foreach ($info as $in)--}}
{{--                                <div class="row sd">--}}
{{--                                <span class="names">--}}
{{--                                    @if ($in->icon != null)--}}
{{--                                        <img src="{{ asset($in->icon) }}" class="mr-2">--}}
{{--                                    @endif--}}
{{--                                    {{ $in->name }}</span>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
{{--                                </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="white-section">
        <section class="main container">
            <div class="elements">
                <div class="row portfolio-row">
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture1.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture2.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture3.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture18.png') }}" alt="">
                    </div>
                </div>
				<div class="row portfolio-row">
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture6.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture7.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture8.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture9.jpg') }}" alt="">
                    </div>
                </div>
                <div class="row portfolio-row">
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture10.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture11.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture13.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture14.jpg') }}" alt="">
                    </div>
                </div>
				<div class="row portfolio-row">
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture15.jpg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo3.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/Picture17.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo 1.jpeg') }}" alt="">
                    </div>
                </div>
				<div class="row portfolio-row">
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo 4.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo 5.png') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo 6.jpeg') }}" alt="">
                    </div>
                    <div class="col2 col-md-3 portfolio-col">
                        <img class="portfolio-img img-responsive" src="{{ asset('images/client_logos/logo2.png') }}" alt="">
                    </div>
                </div>
				
            </div>
        </section>
    </div>

    @include('frontend.footer')
@endsection