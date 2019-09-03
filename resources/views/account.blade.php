@extends('layouts/second')


@section('title', 'Account Page')


@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('/users/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Account</span></p>
            <h1 class="mb-0 bread">My Account</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-4">
		    	<div class="list-group">
		    	<ul class="list-group list-group-flush">
            @if(Auth::check())
            <li class="list-group-item">{{ Auth::user()->name }}</li>
		    		<li class="list-group-item">Order</li>
            <li class="list-group-item"><a href="{{ route('user_logout') }}">Logout</a></li>
            @else
            <li class="list-group-item"><a href="{{ url('/user_login') }}">Login</a> | Register</li>
            <li class="list-group-item">Order</li>
            @endif
		    	</ul>
		    	</div>
    		</div>
    	</div>
    </div>

@endsection