@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	<div class="blood-group-list">
        		<h3>Select a Blood Group</h3>
        		@foreach ($blood_groups as $blood_group)
                	<li class="blood-group-list-item"><a href="{{ url('/blood-group/'.$blood_group->id) }}">{{ $blood_group->name }} ({{ $blood_group->blood_group }})</a></li>
            	@endforeach
        	</div>
        </div>
    </div>
</div>

@endsection