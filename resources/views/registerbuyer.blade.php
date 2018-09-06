@extends ('layouts.dashboard')
@section('page_heading','Register Buyer')

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


	        <form role="form" method="POST" action="registerbuyer">
	        	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	            <div class="form-group">
	                <label>Name</label>
	                <input class="form-control" name="buyer_name"  value="{{ old('buyer_name') }}">
	            </div>
	            <div class="form-group">
	                <label>Buyer Code</label>
	                <input class="form-control" name="buyer_code"  value="{{ old('buyer_code') }}">
	            </div>
	            <div class="form-group">
	            <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>

	            </div>
	        </form>
    </div>
</div>
</div>
@stop