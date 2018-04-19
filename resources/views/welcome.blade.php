@extends('layouts.app')

@section('content')
<div class="clearfix"></div>
<div class="main-search-container" style="background-image: url(http://bus-ticket.bdtask.com/bus365_demov2/application/modules/website/assets/images/bg.jpg)">
    <div class="main-search-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="home-form form-block">
                        <h3 class="form-block_title">Search Tours</h3>
                        <div class="form-block_des">Find your dream tour today!</div>

                        <form action="{{ route('routes.find') }}" method="POST" style="padding:29px 0">
                            @csrf

                            <div class="form-group custom-select">
                                <select name="start_point" class="select2 form-control start_point" data-placeholder="Start Point">
                                    <option value="" selected="selected"></option>
                                </select>

                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="form-group custom-select">
                                <select name="end_point" class="select2 form-control end_point" data-placeholder="End Point">
                                    <option value="" selected="selected"></option>
                                </select>

                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="form-group">
                                <input type='text' name="date" class='form-control datepicker-here' data-language='en' placeholder="Date" value="">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="form-group custom-select">
                                <select name="fleet_type" class="select2 form-control" data-placeholder="Fleet Type">
                                    <option selected value="1">Bus</option>
                                </select>

                                <i class="fa fa-car"></i>
                            </div>

                            <button type="submit" class="btn btn-block">Find now!</button>
                        </form>
                    </div>
                </div>



                <div class="col-sm-8">
                    <div class="header-title-inner">
                        <h2>On the placess you'll go</h2>
                        <h4>It is not down in any map; true place naver are.</h4>
                    </div>
                    <div class="row counter-inner hidden-sm">
                        <div class="col-sm-4">
                            <div class="counter-content">
                                <div class="border">
                                    <div class="counter-icon">
                                        <i class="fa fa-users" style="line-height:34px;"></i>
                                    </div>
                                </div>
                                <h6>Total Passenger</h6>
                                <p class="count-number">
                                    19
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter-content">
                                <div class="border">
                                    <div class="counter-icon">
                                        <i class="flaticon-bus"></i>
                                    </div>
                                </div>
                                <h6>Total Fleet</h6>
                                <p class="count-number">
                                    5
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter-content">
                                <div class="border">
                                    <div class="counter-icon">
                                        <i class="flaticon-road-perspective-of-curves"></i>
                                    </div>
                                </div>
                                <h6>Today's Trip</h6>
                                <p class="count-number">
                                    1
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="offer" class="owl-carousel owl-theme">
                        <div class="item"><img src="{{ asset('images/c2ff3acdf7a4ede238532af1a85e13e7.jpg') }}" class="img-responsive" alt=""></div><div class="item"><img src="{{asset('images/9abdf3c800b1a2f782cc5c1ae8bd3421.jpg')}}" class="img-responsive" alt=""></div><div class="item"><img src="{{ asset('images/804d03909157ed6b4ad6e479328fbc7e.jpg') }}" class="img-responsive" alt=""></div><div class="item"><img src="{{ asset('images/0f8b154da2128d6da7fe024c83cbbf12.jpg') }}" class="img-responsive" alt=""></div><div class="item"><img src="{{asset('images/be9b8ff243b9b4178b37011051b17d39.png')}}" class="img-responsive" alt=""></div><div class="item"><img src="{{asset('images/1f6e0f2b592dd42fb0141f7e0b8aea19.png')}}" class="img-responsive" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="payment-system">
                <h2 class="block-title">About Section</h2>
                <p><h1 class="page-header" style="text-align: center;"><span style="color: #000000;">ANNUAIRE DES ASSOCIATIONS</span></h1>
                <div id="main_content" class="region region-content" style="text-align: center;">
                    <div id="block-system-main" class="block block-system"><header></header>
                        <div class="row article-summary no-childs content-image" style="text-align: justify;"><span style="color: #000000;">&nbsp;</span></div>
                        <p style="text-align: center;"><span style="color: #000000;"><strong>Vous souhaitez vous investir dans la vie associative? Trouvez&nbsp; l'association &eacute;tudiante qui vous ressemble ! Ou cr&eacute;ez la votre !</strong></span></p>
                        <p style="text-align: center;"><span style="color: #000000;"><br /><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumis simply dummy text of the printing and typesetting industry. </span></p>
                    </div>
                </div></p>
            </div>
        </div>
    </div>
</div>


<section class="testimonial_inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="block-title">Our Customers Say</h2>
                @foreach($rating as $r)
                    <div class="feedback_iner">
                        <div class="feedback_container">
                            <div class="feedback_stars">
                                @for($i = 0; $i < $r->rating; $i++)
                                    <i class="fa fa-star"></i>
                                    @endfor

                            </div>
                            <p>{{$r->comment}}</p>
                        </div>
                        <div class="feedback_user">
                            <div class="feedback_useruser_title">
                                {{$r->name}}
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>

        </div>
    </div>
</section>


<!-- load messages -->
<div id="output" class="hide col-sm-12 alert"></div>
@endsection