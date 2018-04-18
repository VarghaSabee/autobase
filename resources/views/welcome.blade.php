<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <a class="navbar-brand" href="http://bus-ticket.bdtask.com/bus365_demov2/website"><img src="{{ asset('images/553aa4b00ca138a9e2e6bfc5bae96316.png') }}" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="http://bus-ticket.bdtask.com/bus365_demov2/userlog"><i class="fa fa-print"></i> Print Ticket</a></li>
                <li><a href="http://bus-ticket.bdtask.com/bus365_demov2/userlog"><i class="fa fa-remove"></i> Cancel Ticket</a></li>
                <li>
                    <a href="{{ route('login') }}" >Login</a>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- End Navigation -->

<!-- Main content -->
<div class="content">
    <!-- load custom page -->
    <div class="clearfix"></div>
    <div class="main-search-container" style="background-image: url(http://bus-ticket.bdtask.com/bus365_demov2/application/modules/website/assets/images/bg.jpg)">
        <div class="main-search-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="home-form form-block">
                            <h3 class="form-block_title">Search Tours</h3>
                            <div class="form-block_des">Find your dream tour today!</div>

                            <form action="http://bus-ticket.bdtask.com/bus365_demov2/website/search"  style="padding:29px 0">
                                <div class="form-group custom-select">
                                    <select name="start_point" class="select2 form-control" data-placeholder="Start Point">
                                        <option value="" selected="selected"></option>
                                        <option value="6">Austin</option>
                                        <option value="3">Chicago</option>
                                        <option value="4">Houston</option>
                                        <option value="2">Los Angeles</option>
                                        <option value="1">New York</option>
                                        <option value="5">San Francisco</option>
                                    </select>

                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="form-group custom-select">
                                    <select name="form-control end_point" class="select2 form-control" data-placeholder="End Point">
                                        <option value="" selected="selected"></option>
                                        <option value="6">Austin</option>
                                        <option value="3">Chicago</option>
                                        <option value="4">Houston</option>
                                        <option value="2">Los Angeles</option>
                                        <option value="1">New York</option>
                                        <option value="5">San Francisco</option>
                                    </select>

                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="form-group">
                                    <input type='text' name="date" class='form-control datepicker-here' data-language='en' placeholder="Date" value="">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="form-group custom-select">
                                    <select name="form-control fleet_type" class="select2 form-control" data-placeholder="Fleet Type">
                                        <option value="" selected="selected"></option>
                                        <option value="1">Bus</option>
                                        <option value="2">Car</option>
                                        <option value="3">Ship</option>
                                        <option value="4">Taxi</option>
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
                    <div class="feedback_iner">
                        <div class="feedback_container">
                            <div class="feedback_stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            <p>Very Nice</p>
                        </div>
                        <div class="feedback_user">
                            <div class="feedback_useruser_title">
                                Michel
                                <span>(BGZOBJLZ)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- load messages -->
    <div id="output" class="hide col-sm-12 alert"></div>
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

                    <form action="http://bus-ticket.bdtask.com/bus365_demov2/ticket/feedback/form" id="ratingFrm" method="post" accept-charset="utf-8">
                        <input type="hidden" name="csrf_test_name" value="f6c8f049022f4595969cbe3460290c5d" />


                        <div class="form-group">
                            <input name="tkt_booking_id_no" class="form-control" type="text" placeholder="Booking ID."  value="">
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


<script type="text/javascript">
    $(document).ready(function() {
        //RATING FORM
        var output    = $("#output");
        var ratingFrm = $("#ratingFrm");
        ratingFrm.submit(function(e) {
            e.preventDefault();

            $.ajax({
                url    : $(this).attr('action'),
                method : $(this).attr('method'),
                dataType : 'json',
                data   : $(this).serialize(),
                success: function(data)
                {
                    if (data.status == true)
                    {
                        output.removeClass('hide alert-danger').addClass('alert-success').html(data.success);
                    } else {
                        output.removeClass('hide alert-success').addClass('alert-danger').html(data.exception);
                    }
                },
                error: function(xhr)
                {
                    alert('failed!');
                }
            });
        });

        //ENQUIRY FORM
        var enquiryFrm = $("#enquiryFrm");
        enquiryFrm.submit(function(e) {
            e.preventDefault();

            $.ajax({
                url    : $(this).attr('action'),
                method : $(this).attr('method'),
                dataType : 'json',
                data   : $(this).serialize(),
                success: function(data)
                {
                    if (data.status == true)
                    {
                        output.removeClass('hide alert-danger').addClass('alert-success').html(data.success);
                    } else {
                        output.removeClass('hide alert-success').addClass('alert-danger').html(data.exception);
                    }
                },
                error: function(xhr)
                {
                    alert('failed!');
                }
            });
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
