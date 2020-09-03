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
                        <a class="nav-link" href="{{ route('cartHome') }}" target="_blank">
                        	<button class="btn btn-danger">
                        		<span class="mr-1">Package-Cart</span>
                        		</span>
                        	</button>
                        </a>
                    </li>
            	<li class="nav-item">
                        <a class="nav-link" href="{{ route('carts') }}" target="_blank">
                        	<button class="btn btn-danger">
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
			<div class="col-md-3 col-xl-3 col-sm-12 col-xs-12">
				<div class="list-group">
				  <a href="#" class="list-group-item list-group-item-action active">
				    Cras justo odio
				  </a>
				  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
				  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
				  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
				  <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
				</div>
			</div>

			<div class="col-md-9 col-xl-9 col-sm-12 col-xs-12">
				<div class="widget">
					<h1>Featured Product</h1>
					<div class="row">
						
							<div class="col-md-4">
								<form action="{{ route('cart.store') }}" method="post">
							@csrf
								<div class="card" style="margin-bottom:10px;">
								  <img width="70px" height="150px" src="{{ asset('asset/front/img') }}/main-product01.jpg" class="card-img-top" alt="...">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <input type="hidden" name="product_id" value="1">
								    <button value="" type="submit" class="btn btn-outline-warning fa fa-plus">Add to cart</button>
								  </div>
								</div>
								</form>
							</div>
							
							
							<div class="col-md-4">
								<form action="{{ route('cart.store') }}" method="post">
							@csrf
								<div class="card" style="margin-bottom:10px;">
								  <img width="70px" height="150px" src="{{ asset('asset/front/img') }}/product01.jpg" class="card-img-top" alt="...">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <input type="hidden" name="product_id" value="2">
								    <button value="" type="submit" class="btn btn-outline-warning fa fa-plus">Add to cart</button>
								  </div>
								</div>
								</form>
							</div>
							
							
							<div class="col-md-4">
								<form action="{{ route('cart.store') }}" method="post">
								@csrf
								<div class="card" style="margin-bottom:10px;">
								  <img src="{{ asset('asset/front/img') }}/product02.jpg" class="card-img-top" alt="...">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <input type="hidden" name="product_id" value="3">
								    <button type="submit" class="btn btn-outline-warning fa fa-plus">Add to cart</button>
								  </div>
								</div>
								</form>
							</div>
							
							
							<div class="col-md-4">
								<form action="{{ route('cart.store') }}" method="post">
								@csrf
								<div class="card" style="margin-bottom:10px;">
								  <img width="70px" height="150px" src="{{ asset('asset/front/img') }}/product06.jpg" class="card-img-top" alt="...">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <input type="hidden" name="product_id" value="4">
								    <button type="submit" class="btn btn-outline-warning fa fa-plus">Add to cart</button>
								  </div>
								</div>
								</form>
							</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>