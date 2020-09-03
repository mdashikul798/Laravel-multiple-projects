<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('asset/front') }}/css/style.css">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<div class="container-fluid main-contain">
		
		<div class="row">
			
			<div class="col-md-12 col-sm-12 col-xs-12 col-xl-12">
				<h2>Your Purchases Invoice</h2>
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
							<p>{{ $cart->product_quentity }}</p>
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
			<h3>Thank you for shopping with us!!</h3>
			<hr>
			</div>
			
			
			
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 col-xl-12 mt-3">
			<a href="{{ route('checkout') }}" class="btn btn-warning">CheckOut</a>
			<a href="{{ route('front-page') }}" class="btn btn-info">Continue Shoping..</a>
			<a href="{{ route('invoice') }}" class="btn btn-info">Create Invoice</a>
		</div>
	</div>
</body>
</html>