@extends('master')

@section('content')

{!! Form::open(['url' => '/register']) !!}
<div class="form-group">
{!! Form::label('system', 'Select the device system') !!}
{!! Form::select('system',$systems,'',['class' => 'form-control', 'id' => 'phoneSelect']) !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
{!! Form::label('email', 'Enter the email to register') !!}
{!! Form::text('email','',['class' => 'form-control']) !!}
{!! $errors->first('email', '<span class="help-block">:message</span>' ) !!}
</div>

{!! Form::hidden('phoneId', $phoneId) !!}

<div class="submitButton form-group">
	{!! Form::submit('Register Phone',['class' => 'btn btn-primary messenger-btn']) !!}
	</div>

{!! Form::close() !!}

<div class="simulatorDetails">
	<span class="infoBox"><img src='/img/android.svg' width='28px' />{{ $androidDevices }}</span>
	<span class="infoBox"><img src='/img/apple.svg' width='28px' />{{ $iosDevices }}</span>
	<span class="infoBox"><img src='/img/windows.svg' width='28px' />{{ $winPhoneDevices }}</span>
</div>
@endsection
