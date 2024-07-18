<!DOCTYPE HTML>
<html>
	<head>
	<title> Shop at Home </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('public/asset/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('public/asset/css/icomoon.css')}}">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{asset('public/asset/css/ionicons.min.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('public/asset/css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('public/asset/css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('public/asset/css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('public/asset/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/asset/css/owl.theme.default.min.css')}}">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('public/asset/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('public/asset/fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('public/asset/css/style.css')}}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	{{-- for member profile --}}

	<style>
		label {
			display: block;
			font:
			1rem 'Fira Sans',
			sans-serif;
			}

			input,
			label {
			margin: 0.4rem 0;
		}

		/* member profile */
		body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
	</style>
	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="{{route('admin.index')}}">Website</a></div>
						</div>
						
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="<?= (isset($activebar) && $activebar == 'index') ? 'active' : '' ?>"><a href="{{route('admin.index')}}">Home</a></li>
								<li class="has-dropdown <?= (isset($activebar) && $activebar == 'mens') ? 'active' : '' ?>">
									<a href="{{route('user.mens')}}">Men</a>
									{{-- <ul class="dropdown">
										<li><a href="{{route('user.product_detail')}}">Product Detail</a></li>
										<li><a href="cart.html">Shopping Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="order-complete.html">Order Complete</a></li>
										<li><a href="{{route('user.wishlist')}}">Wishlist</a></li>
									</ul> --}}
								</li>
								<li class="<?= (isset($activebar) && $activebar == 'womens') ? 'active' : '' ?>"><a href="{{route('user.womens')}}">Women</a></li>
								<li class="<?= (isset($activebar) && $activebar == 'about') ? 'active' : '' ?>"><a href="{{route('user.about')}}">About</a></li>
								<li class="<?= (isset($activebar) && $activebar == 'contact') ? 'active' : '' ?>"><a href="{{route('user.contact')}}">Contact</a></li>
								<li class="cart <?= (isset($activebar) && $activebar == 'user_profile') ? 'active' : '' ?>">
									<a href="{{route('user.user_profile')}}" id="login_user"><b> {{isset(Auth::user()->name) && !empty(Auth::user()->name) ? Auth::user()->name : ''}} </b></a></li>
								<li class="cart">
									@if(Auth::id())
									<form action="{{ route('logout') }}" method="POST" id="logout-form">
										@csrf
									</form>
									<a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
									href="javascript:void(0)">Logout</a>
								</li>
								@endif
								<li class="cart <?= (isset($activebar) && $activebar == 'cart') ? 'active' : '' ?>"><i class="icon-shopping-cart"></i><a href="{{route('user.cart')}}" id="count_cart"> Cart [0]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

