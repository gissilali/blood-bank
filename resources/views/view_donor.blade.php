@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
        	 <div class="donor-info-panel">
        	 	<p class="donor-name">{{ $donor->name }}</p>
        	 	<p class="donor-id">Donor ID: {{ $donor->id }}</p>
        	 </div>
        </div>
    </div>
</div>

@endsection