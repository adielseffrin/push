@extends('master')

@section('status')
<div class="statusBar" style="display: none;">
Status: <span id="messageStatus">{{ $status }}</span>
</div>
@endsection

@section('content')
	
	{!! Form::open(['url' => '/send-message', 'class' => "messageForm"]) !!}
	<div class="form-group">
	<span class="panel-title">Send messages to: </span>{!! Form::select('sendTo', $deviceNames, '',['class' => 'form-control messenger-field', 'id' => 'messengerSendSelect']) !!}
	</div>
	
	<div class="form-group extraOptions" style="display: none;">
	
	{!! Form::select('userId',$users,'',['class' => 'form-control messenger-field', 'id' => 'messengerUserSelect']) !!}
	
	</div>
	
	
	<div class="form-group">
	{!! Form::textarea('message','',['class' => 'form-control messenger-field']) !!}
	</div>
	<div class="submitButton form-group">
	{!! Form::submit('Send Message',['class' => 'btn btn-primary messenger-btn']) !!}
	</div>
	{!! Form::close() !!}
@endsection
