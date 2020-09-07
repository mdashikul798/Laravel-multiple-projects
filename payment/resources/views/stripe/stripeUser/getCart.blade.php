@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Stripe Check-out Cart</h3>
                </div>
                @if(Session::has('cart'))
                  <div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">S.L No.</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Unite-Price</th>
                          <th scope="col">Quentity</th>
                          <th scope="col">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                          <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $product['item']['title'] }}</td>
                            <td>{{ number_format($product['item']['price'])}}</td>
                            <td>{{ $product['qty']}} 
                              <a href="{{ route('stripe.addQty', ['id'=>$product['item']['id']]) }}" class="btn btn-info ml-1"><i style="font-size:10" class="fa fa-plus"></i></a>
                              <a href="{{ route('stripe.reduceQty', ['id'=>$product['item']['id']]) }}" class="btn btn-info ml-1"><i style="font-size:10" class="fa fa-minus"></i></a>
                            </td>
                            <td>
                              {{ number_format($product['price'])}}
                              
                            </td>
                          </tr>
                        @endforeach
                        <tr>
                          <td colspan="4" style="text-align:right"><strong>Total Price :</strong></td>
                          <td style="text-align:left"><strong>{{ number_format($totalPrice)}}</strong></td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div> 
                @else
                  <span><strong>There is no item in the shopping cart</strong></span>
                @endif
                 
            </div>
            <a class="btn btn-info" href="{{ route('stripe.checkout') }}">Checkout</a>
            <a class="btn btn-info" href="{{ route('stripe.home') }}">Continue to Shopping..</a>
        </div>
    </div>
</div>
@endsection
