@extends('base')
@section('css')
<link rel="stylesheet" href="{{ asset('css/it.css') }}">
@endsection
@section('body')
    @include('nav')
    <div class="banner_it">
        <img src="{{ asset('images/banner/banner 12.jpg') }}" alt="">
        <div class="ptext">
            <span class="border">
              {{ $title }}
            </span>
        </div>
    </div>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <br> <br>
                    <p class="headers h2">About Us</p> <br>
                    <p class="details">
                        VMSL offers a full range of IT, ITES & Digital services to a wide range of businesses.
                        The world of online business is now highly competitive and VMSL ensures that you are one
                        step ahead of your competitors. Our profound technical knowledge and marketing strategies
                        can give our clients the perfect advice to achieve within your budget and get the attention
                        of your target audience. The rapidly growing VMSL envisions your company to operate more efficiently
                        and produce more value. We care for the culture, vision and goals of your business across the industry,
                        striving hard to bring you the best results. <br> <br> <br>

                        <b class="h4">Our Values</b> <br>
                        Our approach focuses on modernizing businesses by combining IT innovations and adapting to new trends while
                        keeping affordability in mind. Our team is committed to provide IT services with Quality | Technology | Innovation
                        | Customer Satisfaction | Win Togather. <br> <br> <br>

                        <b class="h4">Quality</b> <br> 
                        Our main emphasis is to deliver the best quality in every project we undertake. With our business methodology and
                        structured solutions, we ensure to maintain global business standards. <br> <br> <br>

                        <b class="h4">Technology</b> <br> 
                        Business and technology work hand in hand, hence technology leadership is the most successful strategy to challenge
                        competitors and consolidate your position. We value the security and information entrusted to our care, and will be
                        cautious in maintaining the integrity of these critical items. VMSL today is a new generation of innovators,
                        accelerating growth and helping you achieve a decisive, competitive advantage. <br> <br> <br>

                        <b class="h4">Innovation</b> <br>
                        In each project, we prioritize innovation. Our structured team works with tactical knowledge to innovate and deliver
                        excellent services. Our tech-support team is committed to provide a sense of uniqueness to companies with required
                        infrastructure. <br> <br> <br>

                        <b class="h4">Customer Satisfaction</b> <br>
                        We believe in long-term relationships with our associates and customers. It is the core of our values to give our
                        customers outstanding experience and meeting their diverse needs. <br> <br> <br>

                        <b class="h4">Win Together</b> <br>
                        We will work with you as a team to break down barriers for a mutually beneficial relationship. <br> <br> <br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('footer')
@endsection