<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demo Application - Home</title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootsnav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/rating.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/website.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="http://bus-ticket.bdtask.com/bus365_demov2/assets/datatables/css/dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
</head>
<body>
<div class="se-pre-con"></div>

<!-- Start Navigation -->
<nav class="navbar navbar-default bootsnav">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('images/553aa4b00ca138a9e2e6bfc5bae96316.png') }}" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="{{ route('bookings.user.dashboard') }}"><i class="fa fa-print"></i> Print Ticket</a></li>
                <li><a href="{{ route('bookings.user.dashboard') }}"><i class="fa fa-remove"></i> Cancel Ticket</a></li>
                @guest
                    <li><a href="{{ route('login') }}"><i class="pe-7s-settings"></i>Login</a></li>
                    @else
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('bookings.user.dashboard') }}"><i class="fa fa-ticket"></i><i class="pe-7s-users"></i> Tickets</a></li>
                                <li><a href="{{ route('users.profile') }}"><i class="fa fa-user-circle"></i><i class="pe-7s-settings"></i> Profile </a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
            </ul>
            </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- End Navigation -->

<!-- Main content -->
<div class="content">
    <!-- load custom page -->

@yield('content')


</div> <!-- /.content -->


<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="footer_box">
                    <h4 class="footer_title">Contact</h4>
                    <div class="address-inner">
                        <address>
                            <strong>Demo Application</strong>
                            <br>
                            123, demo street, demo-city, 0000                                    <br>
                            <abbr title="Phone">Phone:</abbr> 0123456789                                    <br>
                            Email Address: <a href="/cdn-cgi/l/email-protection#197b6c6a70777c6a6a596d7c6a6d377a7674"><span class="__cf_email__" data-cfemail="94f6e1e7fdfaf1e7e7d4e0f1e7e0baf7fbf9">[email&#160;protected]</span></a>
                        </address>
                    </div>
                </div>
            </div>


            <!-- RATING FORM  -->
            <div class="col-sm-3">
                <div class="footer_box">
                    <h4 class="footer_title">Rating</h4>
                    @include('flash::message')

                    <form action="{{route('ratings.store')}}" id="ratingFrm" method="POST" accept-charset="utf-8">
                            @csrf
                        <div class="form-group">
                            <input name="booking_id" class="form-control" type="text" placeholder="Booking ID."  value="">
                        </div>

                        <div class="form-group">
                            <input name="name" class="form-control" type="text" placeholder="Name" value="">
                        </div>

                        <div class="form-group">
                            <div id="rating"></div>
                            <input type="hidden" name="rating" value="3">
                        </div>

                        <div class="form-group">
                            <textarea name="comment" placeholder="Comment" class="form-control"></textarea>
                        </div>


                        <div class="form-group form-block ">
                            <button type="submit" class="btn btn-block btn-info">Submit</button>
                        </div>
                    </form>                        </div>
            </div>


            <div class="col-sm-3">
                <div class="footer_box">
                    <h4 class="footer_title">Google Map </h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29215.021939977993!2d90.40923229999999!3d23.75173875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1477987829881" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>                        </div>
            </div>
        </div>
    </div>
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p>{{ date('Y')  }} &copy;Autobase</p>
            </div>
            <div class="col-xs-12 col-sm-6 text-right">
                <div class="payments-method">
                    <img src="{{asset('images/payments-method.png')}}" alt="Payments">
                </div>
            </div>
        </div>
    </div>
</div>
<a name="customer_service"></a>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datepicker.en.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/waypoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/ion.rangeSlider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/rating.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/website.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="http://bus-ticket.bdtask.com/bus365_demov2/assets/datatables/js/dataTables.min.js" type="text/javascript"></script>



<script type="text/javascript">
    $(document).ready(function() {

        var Cities = {!! $cities !!};
        SetPoints();
        function SetPoints(selected) {
            $('.start_point').empty();
            $('.end_point').empty();
            $('.start_point').append('<option value=""></option>');
            $('.end_point').append('<option value=""></option>');

            for(var i = 0; i < Cities.length; i++){
                if (Cities[i].id == selected){
                    $('.start_point').append('<option selected value="' + Cities[i].id + '">' + Cities[i].name + '</option>');

                }else{
                    $('.start_point').append('<option value="' + Cities[i].id + '">' + Cities[i].name + '</option>');
                    $('.end_point').append('<option value="' + Cities[i].id + '">' + Cities[i].name + '</option>');
                }
            }
        }
        $('.start_point').on('change',function (e) {
            e.preventDefault();
            SetPoints($(this).val());
        });


        // select 2 dropdown
        $("select.select2:not(.dont-select-me)").select2({
            placeholder: "Select option",
            allowClear: true
        });

        //preloader
        $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");
        });


    });

    //print a div
    function printContent(el){
        var restorepage  = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }


</script>
</body>
</html>
