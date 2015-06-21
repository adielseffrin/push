@extends('master')

@section('content')

<div class="box">
<div class="numberBox">{{ $totalMessages }}</div>
<div class="textBox">messages Sent</div>
</div>

<div class="sentTable">
{!! $table->render() !!}
</div>
@endsection
