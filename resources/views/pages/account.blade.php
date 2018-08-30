@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="card card-padded">

            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="section-header">
                <h2>Your Subscription</h2>
            </div>
            @if(!  Auth::user()->subscribed('main'))
                <div class="jumbotron text-center">
                    <p>You don't have a subscription.</p>
                    <a href="/subscribe" class="btn btn-success btn-lg"></a>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well text-center">
                            <strong>Current plan:</strong> {{ucfirst($user->subscription('main')->stripe_plan)}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4>Update subscription</h4>
                        <form action="/account/subscription" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <select name="plan" class="form-control">
                                    <option value="bronze"
                                            {{ ($user->subscription('main')->stripe_plan) == 'bronze' ? 'selected' : '' }}>
                                        Bronze ($5/mo)
                                    </option>
                                    <option value="silver"
                                            {{ ($user->subscription('main')->stripe_plan) == 'silver' ? 'selected' : '' }}>
                                        Silver ($10/mo)
                                    </option>
                                    <option value="gold"
                                            {{ ($user->subscription('main')->stripe_plan) == 'gold' ? 'selected' : '' }}>
                                        Gold ($15/mo)
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update plan
                            </button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="section-header">
                <h2>Update card</h2>
            </div>
                <form action="/account/card" method="POST" id="subscribe-form">
                    {!! csrf_field() !!}

                    <div class="form-group row">
                        <div class="col-xs-8">
                            <label>Credit Card Number</label>
                            <input type="text" class="form-control" placeholder="**** **** **** {{ $user->card_last_four }}" data-stripe="number">
                        </div>
                        <div class="col-xs-4">
                            <label>CVC</label>
                            <input type="text" class="form-control" placeholder="123" data-stripe="cvc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <label>Expiration Month</label>
                            <input type="text" class="form-control" placeholder="08" data-stripe="exp-month">
                        </div>
                        <div class="col-xs-3">
                            <label>Expiration Year</label>
                            <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
                        </div>
                    </div>
                    <div class="stripe-errors"></div>

                    <button type="submit" class="btn btn-primary">Update Card</button>
            </form>
            <div class="section-header">
                <h2>Billing history</h2>
            </div>
            <div class="section-header">
                <h2>Delete subscription</h2>
            </div>
        </div>
    </section>
@endsection