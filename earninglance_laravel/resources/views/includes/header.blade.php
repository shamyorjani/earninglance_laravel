<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ url('assets/images/logo.png') }}" style="width: 150px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ url('/') }}">Home</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/#plans') }}">Plans</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/#about') }}">About</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/#contactus') }}">Contact</a></li>
                        @if (Auth::check())
                            <li class="scroll-to-section"><a href="{{ route('logout') }}">Logout</a></li>

                            <li class="scroll-to-section">
                                <div class="main-red-button"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                            </li>
                        @else
                            <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>

                            <li class="scroll-to-section">
                                <div class="main-red-button"><a href="{{ url('/register') }}">Register</a></div>
                            </li>
                        @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="{{ url('assets/images/fav.png') }}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="{{ url('vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ url('assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/templatemo-space-dynamic.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/animated.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/owl.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
