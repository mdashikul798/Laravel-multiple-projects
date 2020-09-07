@extends('layouts.app')

@section('content')
<div class="container">
  @if(Session::has('id'))
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2>User Profile</h2>
        <h4>Name : {{ Session::get('name')}}</h4>
      </div>
        <div class="col-md-8">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Stripe User Profile</h3>
                </div>
                <div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Quentity</th>
                          <th scope="col">Price</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @php
                            $totalPrice = 0;
                          @endphp
                        @foreach($urerOrders as $userOrder)
                        @foreach($userOrder->cart->items as $item)
                        <tr>
                          <td>
                            @php
                              $d = strtotime($userOrder->created_at);
                              $totalPrice += $item['price'] * $item['qty'];
                            @endphp
                            {{ date("d.m.y", $d) }}
                          </td>
                          <td>{{ $item['item']['title'] }}</td>
                          <td>{{ $item['qty'] }}</td>
                          <td>${{ number_format($item['price']) }}</td>
                          
                        </tr>
                        @endforeach
                        @endforeach
                        
                        <tr>
                          <td colspan="3" style="text-align:right"><strong>Total Price :</strong></td>
                          <td style="text-align:left"><strong>{{ number_format($totalPrice)}}</strong></td>
                        </tr>
                      </tbody>
                        
                    </table>
                </div>  
            </div>
            <a class="btn btn-info" href="{{ route('stripe.home') }}">Continue to Shopping..</a>
        </div>
    </div>
    @else
      <h4>There is no loged in user</h4>
    @endif
</div>
@endsection
