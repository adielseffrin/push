@extends('master')

@section('content')
<div class="boxContainer">
	<div class="box sentBox">
	<div class="numberBox">{{ $totalMessages }}</div>
	<div class="textBox">messages already sent</div>
	</div>

	<div class="box deviceBox">
	<div class="numberBox">{{ $totalDevices }}</div>
	<div class="textBox">devices registered</div>
	</div>
	
	<div class="box deviceDetailsBox clean">
	<div class="infoBox"><img src='/img/android.svg' width='28px' />{{ $androidDevices }}</div>
	<div class="infoBox"><img src='/img/apple.svg' width='28px' />{{ $iosDevices }}</div>
	<div class="infoBox"><img src='/img/windows.svg' width='28px' />{{ $winPhoneDevices }}</div>
	</div>
</div>

<div class="dashboardSumary">
<div class="titleSumary">Last message Sent</div>
<div class="contentSumary">"{{ $lastMessage->message }}" at {{ $lastMessage->created_at->diffForHumans() }} </div>
</div>

@endsection
