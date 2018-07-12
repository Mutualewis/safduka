@extends('layouts.dashboard')
@section('page_heading',' Update Breakdown ')
@section('section')

<form role="form" method="POST" action="updatebreakdown">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button type="submit" name="updatecontract" class="btn btn-lg btn-danger btn-block" onclick="return confirm('Are you sure you want to update the breakdown?');">Update</button>
	
</form>


{!! $grid !!}
@stop
