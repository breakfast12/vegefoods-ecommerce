@extends('layouts/second')


@section('title', 'Checkout Page')


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
			<form action="{{ route('checkout_fill') }}" method="POST" class="billing-form">
				@csrf
				<h3 class="mb-4 billing-heading">Payment Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-8">
	                <div class="form-group">
	                	<label for="firstname">Name</label>
	                  <input type="text" name="name" id="firstname" class="form-control @error('name') is-invalid @enderror" placeholder="" style="width: 630px;" required value="{{ old('name') }}">
	                  @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label>CC Number</label>
	                  <input type="text" class="form-control @error('cc_number') is-invalid @enderror" style="width: 630px;" name="cc_number" required value="{{ old('cc_number') }}">
	                  @error('cc_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label>CVV</label>
	                  <input type="text" class="form-control @error('cvv') is-invalid @enderror" name="cvv" required>
	                @error('cvv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label>Exp Date</label>
	                  <input type="text" class="form-control @error('exp_date') is-invalid @enderror" name="exp_date" required>
	                @error('exp_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label>Type</label>
	                  <select name="type" class="form-control @error('type') is-invalid @enderror" required>
		                  	<option value="MasterCard">Master Card</option>
		                    <option value="Visa">Visa</option>
		                    <option value="Amex">Amex</option>
		                  </select>
	                @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	                </div>
                </div>
	            </div>
	          <!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>Rp {{ Cart::total() }}</span>
		    					</p>
								</div>

	          		<div class="cart-detail p-3 p-md-4">
						<p><button type="submit" class="btn btn-primary py-3 px-4 mt-4">Place an order</button></p>
					</div>
					</form>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

@endsection