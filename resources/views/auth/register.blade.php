<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon">
    <!-- Start Global Mandatory Style -->
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!-- <link href="http://bus-ticket.bdtask.com/bus365_demov2/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/> -->
    <!-- Pe-icon -->
    <link href="{{ asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Theme style -->
    <link href="{{ asset('css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!-- <link href="http://bus-ticket.bdtask.com/bus365_demov2/assets/css/custom-rtl.min.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
<div class="se-pre-con"></div>

<!-- Content Wrapper -->
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <h1> <i class="pe-7s-key"></i></h1>
                    </div>
                    <div class="header-title">
                        <h3></h3>
                        <small><strong>Register</strong></small>
                    </div>
                </div>
                <div class="">
                    <!-- alert message -->
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ route('register') }}" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="text" placeholder="Email Address" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password"  placeholder="Password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Confirm password
                        </label>
                        <input type="password"  placeholder="Confirm" name="password_confirmation" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Telephone</label>
                        <input type="number"  placeholder="Telephone" name="telephone" id="telephone" class="form-control">
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <button  type="reset" class="btn btn-info">Reset</button>

                        <button  type="submit" class="btn btn-danger">Register</button>

                    </div>
                    <br>
                    <a class="btn btn-block btn-social btn-facebook" href="{{ route('social.login',['provider'=>'facebook']) }}">
                        <span class="fa fa-facebook"></span> Sign in with Facebook
                    </a>
                    <a class="btn btn-block btn-social btn-google" href="{{ route('social.login',['provider'=>'google']) }}">
                        <span class="fa fa-google"></span> Sign in with Google
                    </a>
                    <a class="btn btn-block btn-social btn-twitter" href="{{ route('social.login',['provider'=>'twitter']) }}">
                        <span class="fa fa-twitter"></span> Sign in with Twitter
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //preloader
        $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
        });
    });
</script>
</body>
</html>