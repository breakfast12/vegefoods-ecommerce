@extends('layouts/second')


@section('title', 'Cart Page')


@section('container')
<div class="hero-wrap hero-bread" style="background-image: url('/users/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
    					@if(session('success'))

					        <div class="alert alert-success">
					            {{ session('success') }}
					        </div>

					    @endif
	    				<table class="table" id="cart">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th style="width: 30%;">Product name</th>
						        <th style="width: 10%;">Price</th>
						        <th style="width: 8%;">Quantity</th>
						        <th style="width: 22%;">SubTotal</th>
                    <th style="width: 10%;"></th>
						      </tr>
						    </thead>
						    <tbody>
                   
						    	 @foreach( $items as  $t)
						      <tr class="text-center">
                  </td>
						        
						        <td class="image-prod" data-th="Product name"><img src="{{ URL::to('/') }}/images/{{ $t->options->has('image') ? $t->options->image : '' }}" class="img-responsive" width="100" height="100"><h3>{{ $t->name }}</h3>
						        <td class="price" data-th="Price">Rp {{ number_format($t->price) }}</td>
						        
						        <td class="quantity" data-th="Quantity">
						        	<div class="input-group mb-3">
                        {{   Form::open(['route' => ['update-cart', $t->rowId], 'method' => 'PUT']) }}
					             	<input type="number" name="qty" class="quantity form-control input-number" value="{{ $t->qty }}" max="100">
					          	</div>
                      
					          </td>
						        
						        <td class="total" data-th="SubTotal">Rp {{ number_format($t->subtotal) }} <input type="hidden" name="subtotal" value="{{ $t->subtotal }}"></td>

                    <td class="actions" data-th="">
                      <button type="submit"  class="btn btn-info btn-sm update-cart"><i class="fas fa-sync-alt"></i></button>
                        {{  Form::close() }}
                        <input type="hidden" name="qty" value="{{ $t->qty }}">
                        <form action="{{ route('remove_cart',$t->rowId) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger btn-sm remove-cart"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                    @endforeach

						      </tr><!-- END TR-->
						      
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp {{ Cart::total()  }} <input type="hidden" name="total" value="{{ Cart::total()  }}"></span>
    					</p>
    				</div>

            @if(Auth::check())
    				<p><a href="{{ url('/checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            @else
            <p><a href="{{ url('/user_login') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            @endif
    			</div>
          
    		</div>
			</div>
		</section>

@endsection