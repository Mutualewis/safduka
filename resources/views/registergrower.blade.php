@extends ('layouts.dashboard')
@section('page_heading','Register Grower')

@section('section')
<div class="col-sm-12">
<div class="row">
	<div class="col-md-3 col-md-offset-3">

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div class="flash-message">
			    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))

			      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
			    @endforeach
			  </div> <!-- end .flash-message -->

	        <form role="form" method="POST" action="registergrower">
	       		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	            <div class="form-group">
	                <label>Name</label>
	                <input class="form-control" name="grower_name" value="{{ old('grower_name') }}"> 
	            </div>
	            <div class="form-group">
                    <label>
                        <input type="radio" name="grower_type" id="grower_type" value="Grower" checked="checked"> Grower/ </input>
                        <input type="radio" name="grower_type" id="grower_type" value="Factory">  Factory Code </input>
                    </label>
	                <input class="form-control" name="grower_code" value="{{ old('grower_code') }}">
	                <p class="help-block">Select either grower code or factory code.</p>
	            </div>
	            <div class="form-group">
	                <label>Mark</label>
	                <input class="form-control" name="grower_mark" value="{{ old('grower_mark') }}">
	            </div>
	            <div class="form-group">
	            <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>


	            </div>
	        </form>
    </div>
</div>
</div>
@stop