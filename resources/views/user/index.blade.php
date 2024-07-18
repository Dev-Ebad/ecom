<?php
$activebar = 'index';
?>

@include('user.header')


		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url('{{url('storage/app/uploads/slider1.jpg')}}');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Men's</h1>
					   					<h2 class="head-2">Shoes</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New trending shoes</span></p>
					   					<p><a href="#" class="btn btn-primary" style="background-color:#D44500;">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url('{{url('storage/app/uploads/slider 2.png')}}');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Huge</h1>
					   					<h2 class="head-2">Sale</h2>
					   					<h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
					   					<p class="category"><span>Big sale sandals</span></p>
					   					<p><a href="#" class="btn btn-primary" style="background-color:#D44500;">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url('{{url('storage/app/uploads/slider 3.jpg')}}');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">New</h1>
					   					<h2 class="head-2">Arrival</h2>
					   					<h2 class="head-3">up to <strong class="font-weight-bold">30%</strong> off</h2>
					   					<p class="category"><span>New stylish shoes for men</span></p>
					   					<p><a href="#" class="btn btn-primary" style="background-color:#D44500;">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="{{route('user.mens')}}" class="featured-img" style="background-image: url('{{url('storage/app/uploads/mens image.jpg')}}');"></a>
							<div class="desc">
								<h2><a href="{{route('user.mens')}}">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="{{route('user.womens')}}" class="featured-img" style="background-image: url('{{url('storage/app/uploads/womens images.jpg')}}');"></a>
							<div class="desc">
								<h2><a href="{{route('user.womens')}}">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>All Products</h2>
					</div>
				</div>
				<div class="row row-pb-md">
					@if(!empty($products))
						@foreach ($products as $item)
							@php
							$image = isset($item->images) && !empty($item->images) ? json_decode($item->images) : '';
							@endphp
							<div class="col-md-3 col-lg-3 mb-4 text-center">
								<div class="product-entry border">
									<a href="{{route('user.single_product',['id' => $item->id])}}" class="prod-img">
										@if($image)
											<img src="{{url('storage/app/uploads/' . $image[0])}}" class="img-fluid" alt="{{$image[0]}}">
										@else
											<img src="{{url('storage/app/uploads/no image icon.png')}}" class="img-fluid" alt="no Image">
										@endif
									</a>
									<div class="desc">
										<h2><a href="{{route('user.single_product',['id' => $item->id])}}">{{isset($item->description) && !empty($item->description) ? $item->description : ''}}</a></h2>
										<span class="price">${{isset($item->price) && !empty($item->price) ? $item->price : ''}}</span>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>



@include('user.footer')
