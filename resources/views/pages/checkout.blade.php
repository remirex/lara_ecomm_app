@extends('layouts.app')

@section('title','checkout')

@section('content')

    <div class="checkout-section container">

        <div class="col-sm-3" style="padding: 0">
            <h1>Checkout</h1>
        </div>

        @if(Session::has('session_message'))
            <div class="alert alert-success"><em> {!! session('session_message') !!}</em></div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">

            <div class="col-sm-6">
                <h5 style="margin-bottom: 25px">Billing Details</h5>

                <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="province">Province</label>
                            <input type="text" id="province" name="province" class="form-control" value="{{ old('province') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" id="postalcode" name="postalcode" class="form-control" value="{{ old('postalcode') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="col-sm-12">
                            <h5>Payment Details</h5>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="name_on_card">Name on Card</label>
                            <input type="text" id="name_on_card" name="name_on_card" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element" class="StripeElement">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" id="complete-order" class="checkout-button">Complete Order</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <h5 style="margin-bottom: 30px">Your Order</h5>

                <table class="table">
                    @foreach(Cart::content() as $item)

                        <tr>
                            <td>
                                <img src="{{ asset('images/products/'.$item->model->slug.'.jpg') }}" width="80" height="40">
                            </td>
                            <td>
                                {{ $item->model->name }} <br>
                                <span style="color: #919191">{{ $item->model->details }}</span><br>
                                {{ presentPrice($item->model->price) }}
                            </td>
                            <td class="text-right"><span class="qty">{{ $item->qty }}</span></td>
                        </tr>

                        @endforeach

                    <tr>
                        <td>Subtotal</td>
                        <td></td>
                        <td class="text-right">{{ presentPrice(Cart::subtotal()) }}</td>
                    </tr>
                    <tr>
                        <td>Tax (20%)</td>
                        <td></td>
                        <td class="text-right">{{ presentPrice(Cart::tax()) }}</td>
                    </tr>
                    <tr style="background-color: #e9ecef">
                        <th>Total</th>
                        <th></th>
                        <th class="text-right">{{ presentPrice(Cart::total()) }}</th>
                    </tr>
                </table><!-- /.table -->

            </div><!-- order section -->

        </div>
    </div><!-- end checkout container -->

    @include('partials.about')

    @endsection