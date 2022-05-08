@extends('frontend.base')
@section('body')
    @include('frontend.nav')
    <div class="banner_it">
        <img src="{{ asset($info->banner) }}" alt="">
        <div class="ptext">
            <h1 class="border">
                {{ $title }}
            </h1>
        </div>
    </div>
    <section class="main container-fluid">
        <div class="elements">
            @foreach ($data as $dt)

                <div class="row services">
                    <div class="col2 col-md-6 col-lg-6 col-sm-6">
                        <div class="service-img">
                            <span class="services-img-span"></span>
                            <img src="{{ asset($dt->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col2 col-md-6 col-lg-6 col-sm-6 right-col-text" style="background:#ffffff2b;box-shadow: 0px 0px 10px 5px #525252;">
                        <div class="infos text-center">
                            <span class="header h3 mb-4">{{ $dt->name }}</span>
                            
							 <div style="margin-top: 20px;">{!! $dt->description !!}</div> 
                            <p class="details" style="padding-left: 10px !important">
                            @php
                                $info = App\ServiceInformation::all()->where('parent', $dt->id);
								
                            @endphp
							<!--
                            @foreach ($info as $in)
                                <div class="row sd">
									<span class="names">
                                    @if ($in->icon != null)
                                        <img src="{{ asset($in->icon) }}" class="mr-2">
                                    @endif
                                    {{ $in->name }}</span>
										
                                </div>
                            @endforeach-->
                            </p>
							
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @include('frontend.footer')
@endsection