@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('donor_exists'))
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> {{ Session::get('donor_exists') }}
                </div>
            @endif
            @if (Session::has('donor_added'))
                <div class="alert alert-success" role="alert">
                    <strong>Great!</strong> {{ Session::get('donor_added') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading" style="background: crimson;color:white">Blood Donation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/request-blood') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                            <label for="blood_group" class="col-md-4 control-label">Full blood_group</label>

                            <div class="col-md-6">
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value="">--Select Blood Group--</option>
                                    @foreach ($blood_groups as $blood_group)
                                        <option value="{{ $blood_group->id }}">{{ $blood_group->name." "."(".$blood_group->blood_group.")" }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('blood_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('blood_quantity') ? ' has-error' : '' }}">
                            <label for="blood_quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                               	<div class="input-group">
							      <input class="form-control" name="blood_quantity" id="blood_quantity" type="number">
							      <span class="input-group-addon">pints</span>
					   			</div>
                                @if ($errors->has('blood_quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Request Blood
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection