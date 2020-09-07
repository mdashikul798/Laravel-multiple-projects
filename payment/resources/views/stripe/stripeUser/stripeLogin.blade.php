@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In for Stripe</h3>
                </div>
                <div class="panel-body">
                    <p class="alert-danger">
                        <?php
                        $message = Session::get("message");
                            if($message){
                                echo $message;
                                Session::put("message", null);
                            }
                        ?>
                    </p>
                    <form role="form" action="{{route('stripe.login')}}" method="POST">
                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block">Login</button>
                            <p>Do not have an account ? <a href="{{ route('stripe.register') }}">Sugn-Up now</a></p>
                        </fieldset>
                    </form>
                </div>
            </div>
            <br>
            @include('admin.partials.message')
        </div>
    </div>
</div>
@endsection
