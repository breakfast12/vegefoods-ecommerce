@extends('layouts/second')

@section('title', 'Product Page')

@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('/users/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="#" class="image-popup"><img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{ $product->name }}</h3>
    				<p class="price"><span>Rp {{ number_format($product->price) }}</span></p>
						<div class="row mt-4">
							<div class="w-100"></div>
          	</div>
          	<p><a href="{{ url('/add-to-cart/'.$product->id_products) }}" class="btn btn-black py-3 px-5">Add to Cart</a></p>
    			</div>
    			
    		</div>
    	</div>
    </section>
@endsection