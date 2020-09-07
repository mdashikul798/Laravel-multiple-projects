@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-offset-8">
            <div class="login-panel panel panel-default">
                
                <div class="panel-content">
                  @if(Session::has('cart'))
                  <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                      <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                      </h4>
                      <ul class="list-group mb-3">
                        @foreach($products as $product)
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                              <h6 class="my-0">{{$product['item']['title']}}</h6>
                              <small class="text-muted">{{$product['item']['description']}}</small>
                            </div>
                            <span class="text-muted">{{ number_format($product['price'])}}</span>
                          </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                          </div>
                          <span class="text-success">-$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total (USD)</span>
                          <strong>{{ number_format($total) }}</strong>
                        </li>
                      </ul>

                      <form class="card p-2">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Promo code">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-8 order-md-1">
                      @include('admin.partials.message')
                      <h4 class="mb-3">Billing address</h4>
                      <form class="require-validation needs-validation was-validated" novalidate="" action="{{ route('stripe.payment') }}" method="post">
                        <form accept-charset="UTF-8" action="{{ route('stripe.payment') }}" class="require-validation" data-cc-on-file="false"
                        data-stripe-publishable-key="stripe_api_code_would_be_here"
                        id="payment-form" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                              Valid first name is required.
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                              Valid last name is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="username">Username</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                            <input type="text" name="user_name" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                              Your username is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="email">Email <span class="text-muted">(Optional)</span></label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                          <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required="">
                          <div class="invalid-feedback">
                            Please enter your shipping address.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                          <input type="text" name="address_2" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                          <div class="col-md-5 mb-3">
                            <label for="country">Division</label>
                            <input type="text" name="district" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                              Please select a valid country.
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="state">Street</label>
                            <input type="text" name="street" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                              Please provide a valid state.
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                              Zip code required.
                            </div>
                          </div>
                        </div>
                        <hr class="mb-4">

                        <h3>Streap Payment</h3>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" name="card_name" class="form-control" id="card-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                              Name on card is required
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" name="card_number" class="form-control" id="card_number" placeholder="" required="">
                            <div class="invalid-feedback">
                              Credit card number is required
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" name="exp_year" class="form-control" id="exp_year" placeholder=" YYYY" required="">
                            <div class="invalid-feedback">
                              Expiration year required
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="cc-expiration"></label>
                            <input style="margin-top:8px;" type="text" name="exp_month" class="form-control" id="exp_month" placeholder=" MM" required="">
                            <div class="invalid-feedback">
                              Expiration month required
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" name="card_cvc" class="form-control" id="card_cvc" placeholder="" required="">
                            <div class="invalid-feedback">
                              Security code required
                            </div>
                          </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Stripe Pay - {{ number_format($total)}}
                        </button>
                      </form>
                    </div>
                  </div>
                  @else
                  <h3>There is no item in you cart, add product first</h3>
                  @endif
                </div>
                 <br>
            </div>
            <a class="btn btn-info" href="{{ route('stripe.checkout') }}">Checkout</a>
            <a class="btn btn-info" href="{{ route('stripe.home') }}">Continue to Shopping..</a>
        </div>
    </div>
</div>
@endsection

