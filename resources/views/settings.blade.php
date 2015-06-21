@extends('master')

@section('content')


{!! Form::open() !!}
	
<div class="settingsTable">
{!! $table->render() !!}
</div>

@endsection
