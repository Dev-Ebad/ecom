@include('user.header')

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
						@php
							$subtotal = 0;
						@endphp
						@foreach ($cart_data as $k => $item)
						<div class="product-cart d-flex" id="appndCart">
								<div class="one-forth">
									<div class="product-img" style="background-image: url(images/item-6.jpg);">
									</div>
									<div class="display-tc">
										<h3> {{isset($item->product_name) && !empty($item->product_name) ? $item->product_name : ''}} </h3>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">${{isset($item->price) && !empty($item->price) ? $item->price : ''}}</span>
									</div>
								</div>
								<div class="one-eight text-center">
										<div class="display-tc">
											<input type="number" id="tentacles{{$item->product_id}}" value="{{isset($item->quantity) && $item->quantity ? $item->quantity : ''}}" class="change_quantity" onclick="change_quantity('{{$item->product_id}}')" name="tentacles" min="0" max="10" />
										</div>
								</div>
								<div class="one-eight text-center">
									@php
									$total = $item->price * $item->quantity;
									$subtotal += $total;
									@endphp
									<div class="display-tc">
										@if(!empty($total))
										<span class="price" id="total_price{{$item->product_id}}">${{isset($total) && !empty($total) ? $total : ''}}</span>
										@else
										<span class="price" id="total_price{{$item->product_id}}">${{isset($item->price) && !empty($item->price) ? $item->price : ''}}</span>
										@endif
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<a href="javascript:void(0)" class="closed" id="remove_cart{{$item->product_id}}" onclick="Remove_cart('{{$item->product_id}}')"></a>
									</div>
								</div>
						</div>
							@endforeach
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
									{{-- <form action="{{route('user.checkout')}}" method="POST"> --}}
										{{-- @csrf --}}
										<div class="row form-group">
											<div class="col-sm-3">
												{{-- <input class="subtotal" type="text" value="{{$subtotal}}" name="total"> --}}
											</div>
										</div>
									{{-- </form> --}}
								</div>
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span class="subtotal">${{isset($subtotal) && !empty($subtotal) ? $subtotal : ''}}</span></p>
											
											{{-- <p><span>Delivery:</span> <span>$0.00</span></p>
											<p><span>Discount:</span> <span>$45.00</span></p> --}}
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span class="subtotal">${{isset($subtotal) && !empty($subtotal) ? $subtotal : ''}}</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong></strong></span> <span><a href="{{route('user.checkout-page' , ['total' => $subtotal])}}" class="btn btn-primary">Checkout</a>
											</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Related Products</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Boots Shoes Maca</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-2.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Minam Meaghan</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-3.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Men's Taja Commissioner</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-4.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Russ Men's Sneakers</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>

@include('user.footer')

