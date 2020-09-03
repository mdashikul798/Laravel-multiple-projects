<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('asset/front') }}/css/style.css">
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
                        <a class="nav-link" href="{{ route('packageManage') }}">
                        	<button class="btn btn-danger">
                        		<span class="mr-1">Cart</span>
                        		<span class="badge badge-warning">
                        			{{ Cart::getTotalQuantity() }}
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
	<div class="container main-contain">
		
		<div class="row">
			<h2>Total Added Items</h2>
			<table class="table table-bordered table-stripe">
				<thead>
					<tr>
						<th>No.</th>
						<th>Product Title</th>
						<th>Product Image</th>
						<th>Product Quentity</th>
						<th>Unite Price</th>
						<th>Amout</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					
					@php
						$total_price = 0;
					@endphp
					@foreach( Cart::getContent() as $cart)

					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{$cart->model->title}}</td>
						<td>
							<img src="" alt="">
						</td>
						<td>
							<form class="form-inline" action="{{ route('update', $cart->id) }}" method="post">
								@csrf

								<input type="number" name="product_quentity" class="form-control mr-1" value="{{Cart::getContent()->count()}}">
								<button type="submit" class="btn btn-success">Update</button>
							</form>
						</td>
						<td>{{$cart->model->price}}</td>
						
						<td>
							price
						</td>
						<td>
							<form class="form-inline" action="{{ route('cartDelete', $cart->id) }}" method="post">
								@csrf

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					
					@endforeach
					<tr>
						<td colspan="4"></td>
						<td>Total Price :</td>
						<td colspan="2">
							<strong>Total</strong>
						</td>
					</tr>
				</tbody>	
			</table>
		</div>

		<div class="float-right">
			<a href="{{ route('cartHome') }}" class="btn btn-info">Continue Shoping..</a>
			<a href="{{ route('packageCheckout') }}" class="btn btn-warning">CheckOut</a>
		</div>
	</div>
</body>
</html>