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
	<span class="infoBox"><strong>Request Devices List:</strong></span>
	<span class="infoBox"><a href="/simulator/fetchDevice/all"><img src='/img/device.svg' width='28px' />{{ $totalDevices }}</a></span>
	<span class="infoBox"><a href="/simulator/fetchDevice/android"><img src='/img/android.svg' width='28px' />{{ $androidDevices }}</a></span>
	<span class="infoBox"><a href="/simulator/fetchDevice/ios"><img src='/img/apple.svg' width='28px' />{{ $iosDevices }}</a></span>
	<span class="infoBox"><a href="/simulator/fetchDevice/winphone"><img src='/img/windows.svg' width='28px' />{{ $winPhoneDevices }}</a></span>
</div>
@endsection

@section('response')

@include('phone._response')

@endsection
