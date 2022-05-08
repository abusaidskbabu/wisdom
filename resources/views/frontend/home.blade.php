@extends('frontend.base')
@section('body')
{{--<div class="hero" id="hero">--}}
{{--  <img src="{{asset('images/new/white.png')}}"  height="110" width="110" alt="" class="mid_logo" id="blink">--}}
{{--	<a href="#nav_part" class="scroll-down">--}}
{{--		<p class="shining">Click Here to Continue</p>--}}
{{--		<span class="scroll-btn11"></span>--}}
{{--	</a>--}}
{{--</div>--}}

<div id="hero1122">
	<div class="hero" id="hero">
		<img src="{{asset('images/new/WISDIM-LOGO.png')}}"  height="100" width="150" alt="" class="mid_logo" id="blink">
		<a href="#nav_part" class="scroll-down">
			{{--		<p class="shining">Click Here to Continue</p>--}}
			<span class="scroll-btn11"></span>
		</a>

	</div>
	@include('frontend.nav')
	<section id="portfolio">
		<div class="container-fluid img_fluid">
			<div class="row">
				@foreach ($data as $dt)
					<div class="col-sm-6 col-md-6 col-lg-6 no_pad">
						<a href="{{ route('service.view', $dt->id) }}">
							<div class="port_img">
								<img src="{{ asset($dt->wallpaper) }}" alt="" class="image">
								<div class="texts text-center">
									{{ $dt->name }}
								</div>
								<div class="middle text-center">
									<h2 class="text h2">{!! $dt->description !!}</h2>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>
</div>

@include('frontend.footer')
@endsection