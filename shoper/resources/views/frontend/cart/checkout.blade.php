<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	{{-- jQuery for Stripe-gateway --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('asset/front') }}/css/style.css">
	<style>
		* {
		  box-sizing: border-box;
		}

		.row {
		  display: -ms-flexbox; /* IE10 */
		  display: flex;
		  -ms-flex-wrap: wrap; /* IE10 */
		  flex-wrap: wrap;
		  margin: 0 -16px;
		}

		.col-25 {
		  -ms-flex: 25%; /* IE10 */
		  flex: 25%;
		}

		.col-50 {
		  -ms-flex: 50%; /* IE10 */
		  flex: 50%;
		}

		.col-75 {
		  -ms-flex: 75%; /* IE10 */
		  flex: 75%;
		}

		.col-25,
		.col-50,
		.col-75 {
		  padding: 0 16px;
		}

		.container {
		  background-color: #f2f2f2;
		  padding: 5px 20px 15px 20px;
		  border: 1px solid lightgrey;
		  border-radius: 3px;
		}

		input[type=text] {
		  width: 100%;
		  margin-bottom: 20px;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 3px;
		}

		label {
		  margin-bottom: 10px;
		  display: block;
		}

		.icon-container {
		  margin-bottom: 20px;
		  padding: 7px 0;
		  font-size: 24px;
		}

		.btn {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px;
		  margin: 10px 0;
		  border: none;
		  width: 100%;
		  border-radius: 3px;
		  cursor: pointer;
		  font-size: 17px;
		}

		.btn:hover {
		  background-color: #45a049;
		}

		a {
		  color: #2196F3;
		}

		hr {
		  border: 1px solid lightgrey;
		}

		span.price {
		  float: right;
		  color: grey;
		}

		/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
		@media (max-width: 800px) {
		  .row {
		    flex-direction: column-reverse;
		  }
		  .col-25 {
		    margin-bottom: 20px;
		  }
		}
	</style>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		      </li>
		    </ul>

		    <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            	<li class="nav-item">
                        <a class="nav-link" href="{{ route('carts') }}">
                        	<button class="btn-danger">
                        		<span class="mr-1">Manual</span>
                        		<span class="badge badge-warning">
                        			{{ App\Cart::totalItems() }}
                        		</span>
                        	</button>
                        </a>
                    </li>
                <!-- Authentication Links -->
                @guest
                	
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        	<img class="img rounded-circle" src="{{ App\Helpers\ImgHelper::getUserImg(Auth::user()->id) }}" style="width:40px;height:40px">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

		  </div>
		</nav>
	</header>
	<div class="container-fluid main-contain">
		
		<div class="row">
			<div class="col-md-12"></div>
			<div class="col-md-8 col-sm-12 col-xs-12 col-xl-8">
				<form accept-charset="UTF-8" action="{{ route('stripe.payment') }}" class="require-validation"
				    data-cc-on-file="false"
				    data-stripe-publishable-key="stripe_api_key_would_be_here"
				    id="payment-form" method="post">
      				@csrf
			        <div class="row">
			          <div class="col-50">
			            <h3>Billing Address</h3>
			            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
			            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
			            <label for="email"><i class="fa fa-envelope"></i> Email</label>
			            <input type="text" id="email" name="email" placeholder="john@example.com">
			            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
			            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
			            <label for="city"><i class="fa fa-institution"></i> City</label>
			            <input type="text" id="city" name="city" placeholder="New York">

			            <div class="row">
			              <div class="col-50">
			                <label for="state">State</label>
			                <input type="text" id="state" name="state" placeholder="NY">
			              </div>
			              <div class="col-50">
			                <label for="zip">Zip</label>
			                <input type="text" id="zip" name="zip" placeholder="10001">
			              </div>
			            </div>
			          </div>

			          <div class="col-50">
			            <h3>Payment</h3>
			            <label for="fname">Accepted Cards</label>
			            <div class="icon-container">
			              <i class="fa fa-cc-visa" style="color:navy;"></i>
			              <i class="fa fa-cc-amex" style="color:blue;"></i>
			              <i class="fa fa-cc-mastercard" style="color:red;"></i>
			              <i class="fa fa-cc-discover" style="color:orange;"></i>
			            </div>

			            @if (Session::has('success'))
			                <div class="alert alert-success text-center">
			                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                    <p>{{ Session::get('success') }}</p>
			                </div>
			            @endif

			            <label for="cname">Name on Card</label>
			            <input type="text" id="cname" name="card_name" placeholder=" Enter your Cart Name">
			            <label for="ccnum">Credit card number</label>
			            <input type="text" id="ccnum" name="card_number" placeholder=" Enter your Cart Number">
			            <label for="expmonth">Exp Month</label>
			            <input type="text" id="expmonth" name="exp_month" placeholder="December">
			            <div class="row">
			              <div class="col-50">
			                <label for="expyear">Exp Year</label>
			                <input type="text" id="expyear" name="exp_year" placeholder="2024">
			              </div>
			              <div class="col-50">
			                <label for="cvv">CVV</label>
			                <input type="text" id="cvv" name="card_cvc" placeholder="123">
			              </div>
			            </div>
			          </div>
			          
			        </div>
			        <label>
			          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
			        </label>
			        <input type="submit" value="Make the Payment" class="btn">
			      </form>
				
			</div>

			

			<div class="col-md-4 col-sm-12 col-xs-12 col-xl-4">
				<h2>Confirm Items</h2>
				<table class="table table-bordered table-stripe">
				<thead>
					<tr>
						<th>Product Title</th>
						<th>Product Quentity</th>
						<th>Sub-Total</th>
					</tr>
				</thead>
				<tbody>
					
					@php
						$total_price = 0;
					@endphp
					@foreach( App\Cart::totalCarts() as $cart)

					<tr>
						<td>{{ $cart->product->title}}</td>
						
						<td>
							<form class="form-inline" action="{{ route('update', $cart->id) }}" method="post">
								@csrf

								<input type="number" name="product_quentity" class="form-control mr-1" value="{{ $cart->product_quentity }}" style="width:80px">
								<button type="submit" class="btn-success">Update</button>
							</form>
						</td>
						<td>
							@php
							$total_price += $cart->product->price * $cart->product_quentity;
						@endphp
							{{ $cart->product->price * $cart->product_quentity }}
						</td>
					</tr>
					
					@endforeach
					<tr>
						<td colspan="2" style="text-align: right">Sub-Total Price :</td>
						<td style="text-align: left">{{ $total_price }}</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right">Shipping Cost : ( 3 % of total price)</td>
						<td style="text-align: left">
							@php
								$shipping_cost = $total_price / 100 *3;
							@endphp
						{{ $shipping_cost }}
					</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right"><strong>Total Price :</strong></td>
						<td style="text-align: left"><strong>{{$shipping_cost + $total_price}}</strong></td>
					</tr>
				</tbody>	
			</table>
			</div>
			
			
			
		</div>

		<div class="float-right">
			<a href="{{ route('checkout') }}" ><button class="btn-warning">CheckOut</button></a>
			<a href="{{ route('front-page') }}"><button class="btn-info">Continue Shoping..</button></a>
			<a target="_blank" href="{{ route('invoice') }}"><button class="btn-info">Create Invoice</button></a>
		</div>
	</div>
	{{-- Script for Stripe payment-gateway --}}
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script>
		$(function() {
		  $('form.require-validation').bind('submit', function(e) {
		    var $form         = $(e.target).closest('form'),
		        inputSelector = ['input[type=email]', 'input[type=password]',
		                         'input[type=text]', 'input[type=file]',
		                         'textarea'].join(', '),
		        $inputs       = $form.find('.required').find(inputSelector),
		        $errorMessage = $form.find('div.error'),
		        valid         = true;
		 
		    $errorMessage.addClass('hide');
		    $('.has-error').removeClass('has-error');
		    $inputs.each(function(i, el) {
		      var $input = $(el);
		      if ($input.val() === '') {
		        $input.parent().addClass('has-error');
		        $errorMessage.removeClass('hide');
		        e.preventDefault(); // cancel on first error
		      }
		    });

		    $form.on('submit', function(e) {
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

		    function stripeResponseHandler(status, response) {
			    if (response.error) {
			        $('.error')
			            .removeClass('hide')
			            .find('.alert')
			            .text(response.error.message);
			    } else {
			        // token contains id, last4, and card type
			        var token = response['id'];
			        // insert the token into the form so it gets submitted to the server
			        $form.find('input[type=text]').empty();
			        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
			        $form.get(0).submit();
			    }
			}
		  });
		})
	</script>
</body>
</html>