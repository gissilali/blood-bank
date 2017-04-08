@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @foreach ($blood_groups as $blood_group)
                <li class="form-control"><a href="{{ url('/blood-group/'.$blood_group->id) }}">{{ $blood_group->name }} ({{ $blood_group->blood_group }})</a></li>
            @endforeach
        </div>
    </div>
</div>

@endsection