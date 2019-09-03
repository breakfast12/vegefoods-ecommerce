@extends('layouts/main')


@section('title', 'Vegetables Page')


@section('container')
<div class="container">
	<br>
	<h3 align="center">Vegetables Data</h3>
	<br>
	@if($message = Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <p>{{ $message }}</p>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
	  Add Data
	</button>
	<br>
	<br>
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="product_table" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($product as $p)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><img src="{{ URL::to('/') }}/images/{{ $p['image'] }}" class="img-thumbnail" width="75" alt=""></td>
					<td>{{ $p['name'] }}</td>
					<td>{{ $p['price'] }}</td>
					<td>{{ $p['category'] }}</td>
					<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $p['id_products']?>"><i class="fas fa-edit"></i></a> | <a href="#" class="btn btn-info" data-toggle="modal" data-target="#viewModal<?= $p['id_products']?>"><i class="fas fa-eye"></i></a> | <form action="{{ route('vegetables.destroy', [$p['id_products']]) }}" method="post">
							@csrf
							@method('DELETE')
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></form></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


<!-- modal tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Add new data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"  action="{{ route('vegetables.store') }}" enctype="multipart/form-data">
        	@csrf
        	<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" name="name" required> 
			</div>
			<div class="form-group">
			    <label for="price">Price</label>
			    <input type="text" class="form-control" id="price" name="price" required>
			</div>
			<div class="form-group">
			    <label for="category">Category</label>
			    <input type="text" class="form-control" id="category" name="category" required>
			</div>
			<div class="form-group">
			    <label for="image">Image</label>
			    <input type="file" class="form-control" id="image" name="image" required>
			</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Add Data</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal edit -->
@foreach($product as $d)

<div class="modal fade" id="editModal<?= $d['id_products']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('vegetables.update', [$d['id_products']]) }}" enctype="multipart/form-data">
        	@csrf
        	@method('PATCH')
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" name="name" required value="{{ $d['name'] }}">
			</div>
			<div class="form-group">
			    <label for="price">Price</label>
			    <input type="text" class="form-control" id="price" name="price" required value="{{ $d['price'] }}">
			</div>
			<div class="form-group">
			    <label for="category">Category</label>
			    <input type="text" class="form-control" id="category" name="category" required value="{{ $d['category'] }}">
			</div>
			<div class="form-group">
			    <label for="image">Image</label>
			    <img src="{{ URL::to('/') }}/images/{{ $d['image'] }}" class="img-thumbnail" width="100">
			    <input type="file" name="image">
			    <input type="hidden" id="image" name="hidden_image" value="{{ $d['image'] }}">
			</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Edit</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal View -->
@foreach($product as $p)
<div class="modal fade" id="viewModal<?= $p['id_products'] ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">View Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ URL::to('/') }}/images/{{ $p['image'] }}"class="img-thumbnail">
        <h3>Name: {{ $p['name'] }}</h3>
        <h3>Price: {{ $p['price'] }}</h3>
        <h3>Category: {{ $p['category'] }}</h3>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection