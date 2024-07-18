<?php
$activebar = 'checkout';
?>

@include('user.header')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default credit-card-box">
							<div class="panel-heading display-table" >
									<h3 class="panel-title" >Stripe checkout Form</h3>
							</div>
							<div class="panel-body">
				
								@if (Session::has('success'))
									<div class="alert alert-success text-center">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<p>{{ Session::get('success') }}</p>
									</div>
								@endif
				
								<form 
										role="form" 
										action="{{ route('stripe.post') }}" 
										method="post" 
										class="require-validation"
										data-cc-on-file="false"
										data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
										id="payment-form">
									@csrf
									{{-- <div class='form-row row'>
										<div class='col-xs-6 form-group required'>
											<label class='control-label'>Name </label> 
											<input class='form-control' type='text' name="name">
										</div>
										<div class='col-xs-6 form-group required'>
											<label class='control-label'>Email</label> 
											<input autocomplete='off' name="email" class='form-control'  type='text'>
										</div>
									</div>
				
									<div class='form-row row'>
										<div class='col-xs-6 form-group required'>
											<label class='control-label'>Address</label> 
											<input class='form-control'  type='text' name="address">
										</div>
										<div class='col-xs-6 form-group required'>
											<label class='control-label'>Phone</label> 
											<input autocomplete='off' name="phone" class='form-control' size='11' type='text'>
											<input autocomplete='off' name="price" class='form-control' value="{{isset($total) && !empty($total) ? $total : ''}}" type='hidden'>
										</div>
									</div> --}}

									<div class='form-row row m-5'>
										<div class='col-xs-12 form-group required'>
											<label class='control-label'>Name on Card</label> <input
												class='form-control' size='4' type='text'>
										</div>
									</div>
				
									<div class='form-row row m-5'>
										<div class='col-xs-12 form-group  required'>
											<label class='control-label'>Card Number</label> <input
												autocomplete='off' class='form-control card-number' size='20'
												type='text'>
										</div>
									</div>
				
									<div class='form-row row m-5'>
										<div class='col-xs-12 col-md-4 form-group cvc required'>
											<label class='control-label'>CVC</label> <input autocomplete='off'
												class='form-control card-cvc' placeholder='ex. 311' size='4'
												type='text'>
										</div>
										<div class='col-xs-12 col-md-4 form-group expiration required'>
											<label class='control-label'>Expiration Month</label> <input
												class='form-control card-expiry-month' placeholder='MM' size='2'
												type='text'>
										</div>
										<div class='col-xs-12 col-md-4 form-group expiration required'>
											<label class='control-label'>Expiration Year</label> <input
												class='form-control card-expiry-year' placeholder='YYYY' size='4'
												type='text'>
										</div>
									</div>
				
									<div class='form-row row m-5'>
										<div class='col-md-12 error form-group hide'>
											<div class='alert-danger alert'>Please correct the errors and try
												again.</div>
										</div>
									</div>
				
									<div class="row">
										<div class="col-xs-12">
											<input type="hidden" value="{{isset($name) && !empty($name) ? $name : ''}}" name="name" placeholder="Enter full name">
											<input type="hidden" value="{{isset($phone) && !empty($phone) ? $phone : ''}}" name="phone" placeholder="Enter phone">
											<input type="hidden" value="{{isset($address) && !empty($address) ? $address : ''}}" name="address" placeholder="Enter address">
											<input type="hidden" value="{{isset($products) && !empty($products) ? $products : ''}}" name="products" placeholder="Enter address">
											<input type="text" name="bill" value="{{isset($bill) && !empty($bill) ? $bill : ''}}">
											<button class="btn btn-primary btn-lg btn-block" style="background-color:#D44500;" type="submit">Pay Now ({{isset($bill) && !empty($bill) ? $bill : ''}})</button>
										</div>
									</div>
										
								</form>
							</div>
						</div>        
					</div>
				</div>
			</div>
		</div>
		
		
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		
	<script type="text/javascript">
	  
	$(function() {
	  
		/*------------------------------------------
		--------------------------------------------
		Stripe Payment Code
		--------------------------------------------
		--------------------------------------------*/
		
		var $form = $(".require-validation");
		 
		$('form.require-validation').bind('submit', function(e) {
			var $form = $(".require-validation"),
			inputSelector = ['input[type=email]', 'input[type=password]',
							 'input[type=text]', 'input[type=file]',
							 'textarea'].join(', '),
			$inputs = $form.find('.required').find(inputSelector),
			$errorMessage = $form.find('div.error'),
			valid = true;
			$errorMessage.addClass('hide');
		
			$('.has-error').removeClass('has-error');
			$inputs.each(function(i, el) {
			  var $input = $(el);
			  if ($input.val() === '') {
				$input.parent().addClass('has-error');
				$errorMessage.removeClass('hide');
				e.preventDefault();
			  }
			});
		 
			if (!$form.data('cc-on-file')) {
			  e.preventDefault();
			  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
			  Stripe.createToken({
				number: $('.card-number').val(),
				cvc: $('.card-cvc').val(),
				exp_month: $('.card-expiry-month').val(),
				exp_year: $('.card-expiry-year').val()
			  }, stripeResponseHandler);
			}
		
		});
		  
		/*------------------------------------------
		--------------------------------------------
		Stripe Response Handler
		--------------------------------------------
		--------------------------------------------*/
		function stripeResponseHandler(status, response) {
			if (response.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(response.error.message);
			} else {
				/* token contains id, last4, and card type */
				var token = response['id'];
					 
				$form.find('input[type=text]').empty();
				$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$form.get(0).submit();
			}
		}
		 
	});
	</script>


@include('user.footer')

