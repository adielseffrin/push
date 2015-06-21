@extends('master')

@section('content')


{!! Form::open(['url' => 'settings/'.$setting->slug, 'method' => 'PATCH']) !!}
	

	<div class="form-group">
	{!! Form::label('value',$setting->config.":") !!}	
	{!! Form::input('text','value',$setting->value,['class' => 'config-input']) !!}
	</div>
	
	
	
	<div class="submitButton form-group">
	{!! Form::submit('Save',['class' => 'btn btn-primary messenger-btn']) !!}
	</div>
	{!! Form::close() !!}

@endsection
