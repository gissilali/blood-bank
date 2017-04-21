@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="blood-group-list">
                <h3>Stock of blood</h3>
                @foreach ($blood_groups as $blood_group)
                    <li class="blood-group-list-item clearfix"><a href="{{ url('/blood-group/'.$blood_group->id) }}" style="float:left">{{ $blood_group->name }} ({{ $blood_group->blood_group }})</a>
                    <div class="quantity" style="float: right;
background: aquamarine;
padding: 10px;">{{ $blood_group->quantity }} :pints</div>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection