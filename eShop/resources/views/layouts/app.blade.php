<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Nalika - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin') }}/img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/font-awesome.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- nalika Icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/nalika-icon.css">
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
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/nalika') }}/css/meanmenu.min.css">
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

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{route('admin')}}"><img class="main-logo" src="{{ asset('assets/admin/nalika') }}/img/logo/logo.png" alt="" /></a>
                <strong><img src="{{ asset('assets/admin/nalika') }}/img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="{{route('admin')}}" class="{{request()->is('dashboard') ? 'active-item':''}}">

                        <h2><i class="icon nalika-home icon-wrap"></i> Dash <span class="min-dtn">Board</span></h2>
                    </a>
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <!-- Brand -->
                        <li class="{{request()->is('brand/*') ? 'active':''}}">
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa fa-list"></i> <span class="mini-click-non">Brand</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{request()->is('brand/add-brand') ? 'active':''}}"><a title="Inbox" href="{{route('add-brand')}}"><span class="mini-sub-pro">Add Brand</span></a></li>
                                <li class="{{request()->is('brand/all-brand') ? 'active':''}}"><a title="View Mail" href="{{route('all-brand')}}"><span class="mini-sub-pro">All Brand</span></a></li>
                            </ul>
                        </li>

                        <!-- Category -->
                        <li class="{{request()->is('category/*') ? 'active':''}}">
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa fa-list"></i> <span class="mini-click-non">Category</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{request()->is('category/manage-category') ? 'active':''}}"><a title="View Mail" href="{{route('manage-category')}}"><span class="mini-sub-pro">Category</span></a></li>
                                <li class="{{request()->is('category/sub-category') ? 'active':''}}"><a title="View Mail" href="{{route('sub-category')}}"><span class="mini-sub-pro">Sub Category</span></a></li>
                                <li class="{{request()->is('category/sub-subcategory') ? 'active':''}}"><a title="View Mail" href="{{route('sub-subcategory')}}"><span class="mini-sub-pro">Sub Sub-Category</span></a></li>
                            </ul>
                        </li>

                        <!-- Slider -->
                        <li class="{{request()->is('slider/*') ? 'active':''}}">
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa fa-list"></i> <span class="mini-click-non">Slider</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{request()->is('slider/manage-slider') ? 'active':''}}"><a title="View Mail" href="{{route('manage-slide')}}"><span class="mini-sub-pro">Manage Slider</span></a></li>
                                <li class="{{request()->is('slider/add-slider') ? 'active':''}}"><a title="View Mail" href="{{route('add-slider')}}"><span class="mini-sub-pro">Add Slider</span></a></li>

                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{route('admin')}}"><img class="main-logo" src="{{ asset('assets/admin/nalika') }}/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="icon nalika-menu-task"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                                <form role="search" class="">
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href=""><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                   
                                    <li class="nav-item">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                        <i class="icon nalika-user"></i>
                                        <span class="admin-name">{{Auth::User()->name}}</span>
                                        <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                    </a>
                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                    <li><a href="register.html"><span class="icon nalika-home author-log-ic"></span> Register</a>
                                    </li>
                                    <li><a href="#"><span class="icon nalika-user author-log-ic"></span> My Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon nalika-unlocked author-log-ic"></span> Log Out
                                        </a>

                                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display:none;">
                                            @csrf
                                        </form>
                                    </li>
                                    </ul>
                                    </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            @yield('content')
        
        <div class="footer-copyright-area" style="bottom:0;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2020 <a href="https://colorlib.com/wp/templates/">eShop</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Jquery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
        ========={{ asset('assets/admin/nalika') }}/=================================== -->
    <script src="{{ asset('assets/admin/nalika') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/metisMenu/metisMenu-active.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/calendar/moment.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/calendar/fullcalendar.min.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/calendar/fullcalendar-active.js"></script>
    <!-- float JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/flot/curvedLines.js"></script>
    <script src="{{ asset('assets/admin/nalika') }}/js/flot/flot-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/plugins.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('assets/admin/nalika') }}/js/main.js"></script>
    <!-- JS for delete conformation popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script>
    <!-- Own Script -->
    <script src="{{asset('assets/admin/nalika') }}/js/script.js"></script>

</body>

</html>