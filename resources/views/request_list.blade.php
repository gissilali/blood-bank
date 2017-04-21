@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	@if (count($requests)>0)
	    		<form role="search">
				    <div class="input-group add-on">
				      <input class="form-control" placeholder="Search" name="search-term" id="search-term" type="text">
				      <div class="input-group-btn">
				        <button class="btn btn-default" type="submit">Search</button>
				      </div>
				    </div>
	  			</form>
	            <div class="donor-list" style="margin-top:20px">
	            	@foreach ($requests as $request)
		                <li class="panel panel-body clearfix" style="display: block">
                            @if ($request->approved)
                                <span style="color:green" class="label">approved</span>
                            @else
                                <span style="color:orange" class="label">approval pending</span>
                            @endif
		                	<p>Donor ID: {{ $request->id }}</p>
		                	<a href="{{ url('/view-request/'.$request->id) }}" style="display: block">{{ $request->user->name }}</a>
		                	<p style="color:crimson;font-weight:bold;float: right;display: block;">{{ App\BloodGroup::find($request->blood_group_id)->name }}</p>
                            
                            @if (!$request->approved)
                                <a href="{{ url('approve-request/'.$request->id) }}" class="btn btn-sm btn-success view-request">approve request</a>
                            @endif
		            	</li>
	            	@endforeach
	            	{{ $requests->links() }}
	            </div>
            @else
            	<div class="no-donors" style="height:200px;color: crimson;text-align: center;">
            		<i class="fa fa-meh-o" style="font-size:36px"></i>
            		<p style="font-size:16px">no requests for this blood group <strong><a href="{{ url('register-donation/') }}">go back</a></strong></p>
            	</div>
        	@endif
        </div>
        @if (isset($blood_groups))
        	<div class="col-md-4">
        	<div class="blood-group-list" style="position: fixed">
        			<li class="list-item"><a href="{{ url('blood-requests') }}">All Blood Groups</a></li>
        		@foreach ($blood_groups as $blood_group)
        			<li class="list-item"><a href="{{ url('blood-requests/blood-group/'.$blood_group->id) }}">{{ $blood_group->name }} ({{ $blood_group->blood_group }})</a></li>
        		@endforeach
        	</div>
        </div>
        @endif
    </div>
</div>

@endsection