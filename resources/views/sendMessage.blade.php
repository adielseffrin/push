@extends('master')

@section('status')

Status: 

@endsection

@section('content')
	
	{!! Form::open() !!}
	<div class="form-group">
	Send messages to: {!! Form::select('systems', $deviceNames, '',['class' => 'form-control messenger-field', 'id' => 'messengerSendSelect']) !!}
	</div>
	
	<div class="form-group extraOptions" style="display: none;">
	
	{!! Form::select('users',$users,'',['class' => 'form-control messenger-field', 'id' => 'messengerUserSelect']) !!}
	
	</div>
	
	
	<div class="form-group">
	{!! Form::textarea('message','',['class' => 'form-control messenger-field']) !!}
	</div>
	<div class="submitButton form-group">
	{!! Form::submit('Send Message',['class' => 'btn btn-primary messenger-btn']) !!}
	</div>
	{!! Form::close() !!}
@endsection
