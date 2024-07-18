<?php
$activebar = 'mens';
?>

@include('user.header')

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Men</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url('{{url('storage/app/uploads/mens image.jpg')}}');">
							<h2>Men's</h2>
						</div>
						<div class="menu text-center">
							<p><a href="#">New Arrivals</a> <a href="#">Best Sellers</a> <a href="#">Extended Widths</a> <a href="#">Sale</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- <div class="colorlib-featured">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 text-center">
						<div class="featured">
							<div class="featured-img featured-img-2" style="background-image: url(images/men.jpg);">
								<h2>Casuals</h2>
								<p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="featured">
							<div class="featured-img featured-img-2" style="background-image: url(images/women.jpg);">
								<h2>Dress</h2>
								<p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="featured">
							<div class="featured-img featured-img-2" style="background-image: url(images/item-11.jpg);">
								<h2>Sports</h2>
								<p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}

		<div class="colorlib-product">
			<div class="container">
				<div class="col-lg-3 col-xl-3">
					<div class="row">
						<div class="col-sm-12">
							<div class="side border mb-1">
								<h3>Brand</h3>
								<ul>
									<li><a href="javascript:void(0)" class="brand_man">Nike</a></li>
									<li><a href="javascript:void(0)" class="brand_man">Adidas</a></li>
									<li><a href="javascript:void(0)" class="brand_man">Puma</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="side border mb-1">
								<div class="block-26 mb-2">
									<h4>Size</h4>
							   <ul>
								  <li><a href="javascript:void(0)" class="size_man btn btn-primary" style="background-color:#D44500;">small</a></li>
								  <li><a href="javascript:void(0)" class="size_man btn btn-primary" style="background-color:#D44500;">medium</a></li>
								  <li><a href="javascript:void(0)" class="size_man btn btn-primary" style="background-color:#D44500;">large</a></li>
							   </ul>

							</div>
							</div>
						</div>
						{{-- <div class="col-sm-12">
							<div class="side border mb-1">
								<h3>Style</h3>
								<ul>
									<li><a href="#">Slip Ons</a></li>
									<li><a href="#">Boots</a></li>
									<li><a href="#">Sandals</a></li>
									<li><a href="#">Lace Ups</a></li>
									<li><a href="#">Oxfords</a></li>
								</ul>
							</div>
						</div> --}}
						{{-- <div class="col-sm-12">
							<div class="side border mb-1">
								<h3>Colors</h3>
								<ul>
									<li><a href="#">Black</a></li>
									<li><a href="#">White</a></li>
									<li><a href="#">Blue</a></li>
									<li><a href="#">Red</a></li>
									<li><a href="#">Green</a></li>
									<li><a href="#">Grey</a></li>
									<li><a href="#">Orange</a></li>
									<li><a href="#">Cream</a></li>
									<li><a href="#">Brown</a></li>
								</ul>
							</div>
						</div> --}}
						{{-- <div class="col-sm-12">
							<div class="side border mb-1">
								<h3>Material</h3>
								<ul>
									<li><a href="#">Leather</a></li>
									<li><a href="#">Suede</a></li>
								</ul>
							</div>
						</div> --}}
						{{-- <div class="col-sm-12">
							<div class="side border mb-1">
								<h3>Technologies</h3>
								<ul>
									<li><a href="#">BioBevel</a></li>
									<li><a href="#">Groove</a></li>
									<li><a href="#">FlexBevel</a></li>
								</ul>
							</div>
						</div> --}}
					</div>
				</div>
				<div class="row row-pb-md" id="appndProd">
					@if(!empty($products))
					@foreach ($products as $item)
					@php
					$image = json_decode($item->images);
					@endphp
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="{{url('storage/app/uploads/' . $image[0])}}" class="img-fluid" alt="{{$image[0]}}">
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
				<div class="d-felx justify-content-center">
			
					<li>{{ $products->links() }}</li>
		
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

