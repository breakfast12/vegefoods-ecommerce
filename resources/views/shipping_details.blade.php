@extends('layouts/second')


@section('title', 'Shipping Details Page')


@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('users/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          @foreach($payment as $p)
			<form action="{{ route('address_fill', $p->id_payment) }}" method="POST" class="billing-form">
				@csrf
				{{ method_field('POST') }}

	          	<input type="hidden" name="id_payment" value="{{ $p->id_payment }}">
				@endforeach
				<h3 class="mb-4 billing-heading">Shipping Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-8">
	                <div class="form-group">
	                	<label>Address</label>
	                  <input type="text" name="address" class="form-control" style="width: 630px;" required>
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label>Country</label>
	                  <input type="text" class="form-control" style="width: 630px;" name="country" required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label>Province</label>
	                  <input type="text" class="form-control" style="width: 630px;" name="province" required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label>City</label>
	                  <input type="text" class="form-control" name="city" required>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label>PostCode / ZIP</label>
	                  <input type="text" name="postcode" class="form-control" required>
	                </div>
                </div>
	            </div>
	          		<div class="cart-detail p-3 p-md-4">
						<p><button type="submit" class="btn btn-primary py-3 px-4">Checkout</button></p>
					</div>
	          </form><!-- END -->
	          

					</div>
        </div>
      </div>
    </section> <!-- .section -->

@endsection