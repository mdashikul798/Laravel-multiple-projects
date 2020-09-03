<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | eShop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/nalika')}}/img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="{{ asset('assets/admin/nalika') }}/fonts/robotoFont.css" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/normalize.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/main.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/form/all-type-forms.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO APP</h3>
                    <p>This is the best app ever!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Username / Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
                                        <input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="{{route('register')}}">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <p>Copyright © 2020 <a href="https://colorlib.com/wp/templates/">eShop</a> All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/tab.js"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/icheck/icheck.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/main.js"></script>
</body>

</html>