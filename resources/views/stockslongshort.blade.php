@extends('layouts.dashboard')
@section('page_heading','Stocks Long/ Short')
@section('section')

{!! $grid !!}
<form role="form" method="POST" action="stockslongshort">

	<div class="row">
	    <div class="form-group col-md-12">
	   		<button type="submit" name="printlongshort" class="btn btn-lg btn-success btn-block">Download</button>
	    </div>
	</div>

</form>

@stop
