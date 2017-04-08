@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	@if (count($donors)>0)
	    		<form  role="search">
				    <div class="input-group add-on">
				      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
				      <div class="input-group-btn">
				        <button class="btn btn-default" type="submit">Search</button>
				      </div>
				    </div>
	  			</form>
	            <div class="donor-list" style="margin-top:20px">
	            	@foreach ($donors as $donor)
	                <li class="panel panel-body clearfix" style="display: block">
	                	<a href="{{ url('/view-donor/'.$donor->id) }}" style="float: left">{{ $donor->name }}</a>
	                	<p style="color:crimson;font-weight:bold;float: right;">{{ App\BloodGroup::find($donor->blood_group_id)->name }}</p>
	            	</li>
	            	@endforeach
	            </div>
            @else
            	<div class="no-donors" style="height:200px;">
            		no donors
            	</div>
        	@endif
        </div>
    </div>
</div>

@endsection