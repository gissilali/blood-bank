@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
                <li class="panel panel-heading clearfix" style="display: block">
                    <h4>your requests</h4>            
                </li>
                @if (count($requests)>0)
                <div class="donor-list" style="margin-top:20px">
                    @foreach ($requests as $request)
                        <li class="panel panel-body clearfix" style="display: block">
                            @if ($request->approved)
                                <span style="color:green" class="label">approved</span>
                            @else
                                <span style="color:orange" class="label">approval pending</span>
                            @endif
                            <p>Request ID: {{ $request->id }}</p>
                            <a href="{{ url('/view-request/'.$request->id) }}" style="display: block">{{ $request->user->name }}</a>
                            <p style="color:crimson;font-weight:bold;float: right;display: block;">{{ App\BloodGroup::find($request->blood_group_id)->name }}</p>
                        </li>
                    @endforeach
                    {{-- {{ $requests->links() }} --}}
                </div>
            @else
                <div class="no-donors" style="height:200px;color: crimson;text-align: center;">
                    <i class="fa fa-meh-o" style="font-size:36px"></i>
                    <p style="font-size:16px">you have made no request for blood<strong><a href="{{ url('request-blood/') }}">make a request</a></strong></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
