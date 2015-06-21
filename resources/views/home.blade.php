@extends('master')

@section('content')
<div class="box">
<div class="numberBox">{{ $totalMessages }}</div>
<div class="textBox">messages Sent</div>
</div>

<div class="box">
<div class="numberBox">{{ $totalDevices }}</div>
<div class="textBox">devices registered</div>
</div>

<div class="dashboardSumary">
<div class="titleSumary">Last message Sent</div>
<div class="contentSumary">"{{ $lastMessage->message }}" at {{ $lastMessage->created_at->diffForHumans() }} </div>
</div>

@endsection
