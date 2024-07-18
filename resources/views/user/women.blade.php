<?php
$activebar = 'womens';
?>

@include('user.header')

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Women</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url('{{url('storage/app/uploads/womens images.jpg')}}');">
							<h2>Women's</h2>
						</div>
						<div class="menu text-center">
							<p><a href="#">New Arrivals</a> <a href="#">Best Sellers</a> <a href="#">Extended Widths</a> <a href="#">Sale</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 my-5">
						<div class="form-group">
							<input type="search" id="search_bar"  onkeyup="search(event)" class="form-control search" placeholder="Search">
						</div>
					</div>
					<div class="col-lg-3 col-xl-3">
						<div class="row">
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Brand</h3>
									<ul>
										<li><a href="javascript:void(0)" class="brand">Nike</a></li>
										<li><a href="javascript:void(0)" class="brand">Adidas</a></li>
										<li><a href="javascript:void(0)" class="brand">Puma</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1">
								<div class="block-26 mb-2">
									<h3>Size</h3>
					               <ul>
					                  <li><a href="javascript:void(0)" class="size btn btn-primary" style="background-color:#D44500;">small</a></li>
					                  <li><a href="javascript:void(0)" class="size btn btn-primary" style="background-color:#D44500;">medium</a></li>
					                  <li><a href="javascript:void(0)" class="size btn btn-primary" style="background-color:#D44500;">large</a></li>
					               </ul>

					            </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xl-9" id="appndProd">
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
											<img  src="{{url('storage/app/uploads/' . $image[0])}}" class="img-fluid" alt="{{$image[0]}}">
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
						<div class="d-felx justify-content-center">
			
							<li>{!! $products->links() !!}</li>
				
						</div>
					</div>
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
