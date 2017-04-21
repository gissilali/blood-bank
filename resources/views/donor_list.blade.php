@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	@if (count($donors)>0)
	    		<form role="search">
				    <div class="input-group add-on">
				      <input class="form-control" placeholder="Search" name="search-term" id="search-term" type="text">
				      <div class="input-group-btn">
				        <button class="btn btn-default" type="submit">Search</button>
				      </div>
				    </div>
	  			</form>
	            <div class="donor-list" style="margin-top:20px">
	            	@foreach ($donors as $donor)
		                <li class="panel panel-body clearfix" style="display: block">
		                	<p>Donor ID: {{ $donor->id }}</p>
		                	<a href="{{ url('/view-donor/'.$donor->id) }}" style="display: block">{{ $donor->name }}</a>
		                	<p style="color:crimson;font-weight:bold;float: right;display: block;">{{ App\BloodGroup::find($donor->blood_group_id)->name }}</p>
                            <a href="{{ url('view-donor/'.$donor->id) }}" class="btn btn-sm view-donor">View Donor</a>
		            	</li>
	            	@endforeach
	            	{{ $donors->links() }}
	            </div>
            @else
            	<div class="no-donors" style="height:200px;color: crimson;text-align: center;">
            		<i class="fa fa-meh-o" style="font-size:36px"></i>
            		<p style="font-size:16px">no donors for this blood group <strong><a href="{{ url('register-donation/') }}">go back</a></strong></p>
            		<small><a href="#">find out how to donate blood</a></small>
            	</div>
        	@endif
        </div>
        @if (isset($blood_groups))
        	<div class="col-md-4">
        	<div class="blood-group-list" style="position: fixed">
        			<li class="list-item"><a href="{{ url('view-donors') }}">All Blood Groups</a></li>
        		@foreach ($blood_groups as $blood_group)
        			<li class="list-item"><a href="{{ url('view-donors/blood-group/'.$blood_group->id) }}">{{ $blood_group->name }} ({{ $blood_group->blood_group }})</a></li>
        		@endforeach
        	</div>
        </div>
        @endif
    </div>
</div>

@endsection