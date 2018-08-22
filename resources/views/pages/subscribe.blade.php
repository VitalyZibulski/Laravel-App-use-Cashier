@extends('layouts.app')

@section('content')

<div class="hero">
    <div class="hero-content">
        <h1>You're joning!</h1>
        <h2>Hooray!</h2>
    </div>
</div>

<section class="container">
    <div class="card-padded">
        @if(Auth::guest())
        <div class="section-header">
            <h2>User info</h2>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="section-header">
            <h2>Subscription info</h2>
        </div>
        <div class="section-header">
            <h2>Credit card info</h2>
        </div>
    </div>
    @endif
</section>
@endsection