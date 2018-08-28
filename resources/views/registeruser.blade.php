@extends ('layouts.dashboard')
@section('page_heading','Register User')

@section('section')

<?php
	if (!isset($cid)) {
		$cid = NULL;
	}
?>

<div class="col-sm-12">
<div class="row">
	<div class="col-md-6 col-md-offset-1">

			<div class="row">
				<div class="col-md-12">
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
			</div>
			</div>
			
	        <form role="form" method="POST" action="registeruser">
	        	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>First Name</label>
		                <input class="form-control" name="first_name" type="text"  value="{{ old('first_name') }}">
		            </div>
		            <div class="form-group col-md-6">
		                <label>Second Name</label>
		                <input class="form-control" name="second_name" type="text"  value="{{ old('second_name') }}">
		            </div>
				</div>
	            <div class="row">
		            <div class="form-group col-md-6">
		                <label>Country</label>
		                <select class="form-control" name="country"  onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($country) && count($country) > 0)
										@foreach ($country->all() as $countries)
											@if ($cid ==  $countries->id)
												<option value="{{ $countries->id }}" selected="selected">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@else
												<option value="{{ $countries->id }}">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>			
		            </div>	
		            <div class="form-group col-md-6">
		                <label>Department</label>
		                <select class="form-control" name="department_name">
		                	<option></option>
							@if (isset($Department))
										@foreach ($Department->all() as $values)
											@if ($cid ==  $values->id)
												<option value="{{ $values->id }}" selected="selected">{{ $values->dprt_namea}}</option>
											@else
												<option value="{{ $values->id }}">{{ $values->dprt_name}}</option>
											@endif
										@endforeach									
							@endif
		                </select>		
		            </div>	
		        </div> 

	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Email</label>
		                <input class="form-control" name="email" type="text"  value="{{ old('email') }}">
		            </div>
		            <div class="form-group col-md-6">
		                <label>Extension</label>
		                <input class="form-control" name="extension" type="text"  value="{{ old('extension') }}">
		            </div>
				</div>



	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>User Name</label>
		                <input class="form-control" name="user_name" type="text"  value="{{ old('user_name') }}">
		            </div>
		            <div class="form-group col-md-6">
		                <label>Role</label>
		                <select class="form-control" name="role">
		                	<option></option>
							@if (count($roles) > 0)
										@foreach ($roles->all() as $role)
											<option value="{{ $role->id }}">{{ $role->display_name. " (".$role->description.")"}}</option>
										@endforeach
									
							@endif
		                </select>		
		            </div>	


				</div>
				<div class="row">
		            <div class="form-group col-md-6">
		                <label>Password</label>
		                <input class="form-control" type="password" name="password"  value="{{ old('password') }}">
		            </div>
		            <div class="form-group col-md-6">
		                <label>Confirm Password</label>
		                <input class="form-control" type="password" name="cnpassword"  value="{{ old('cnpassword') }}">
		            </div>

				</div>

		        <div class="row">
		            <div class="form-group col-md-12">
		            <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>

		            </div>
		        </div>
	        </form>
    </div>
</div>
</div>
@stop