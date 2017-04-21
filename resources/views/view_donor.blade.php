@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
        	 <div class="donor-info-panel clearfix">
        	 	<p class="donor-name">{{ $donor->name }}</p>
        	 	<p class="donor-id">Donor ID: {{ $donor->id }}</p>
        	 	<p>Quantity Donated: {{ $donation_quantity }} pints</p>
        	 	<div class="actions">
        	 		@if (Auth::guard('admin')->check())
        	 			@if ($errors->has('blood_quantity'))	
			      			<span class="help-block has-danger">
			      				<strong>{{ $errors->first('blood_quantity') }}</strong>
			      			</span>
				      	@endif
        	 			<div class="col-md-4">
        	 				<form action="{{ url('register-donation/'.$donor->id) }}" method="post">
	        	 				{{ csrf_field() }}
	        	 				<div class="form-group">
        	 					<div class="input-group">
							      <input class="form-control" name="blood_quantity" id="blood_quantity" type="number">
							      <span class="input-group-addon">pints</span>
					   			</div>
	        	 				</div>
	        	 				<div class="form-group">
	        	 					<button type="submit" class="btn btn-success">submit donation</button>
	        	 				</div>
    	 					</form>
        	 			</div>
        	 
        	 		@endif
        	 	</div>
        	 </div>
        </div>
    </div>
</div>

@endsection