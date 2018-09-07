@extends ('layouts.dashboard')
@section('page_heading','Reset Password')

@section('section')
<?php
    use Ngea\User;
    use Ngea\Role;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    Auth::check();
            // $user_data = Confide::user();
            // $user = User::where('username', '=', $user_data ->username)->first();
    $user = Auth::user();
?>
<div class="col-sm-12">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<div class="col-md-6">
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

	        <form role="form" method="POST" action="reset">
	        	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>User Name</label>
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin')) {
                                ?>  		                
		               				<input class="form-control" name="user_name" type="text"  value="{{ old('user_name'). $user->usr_name }}">
                                <?php
                            } else {

                                ?>  		                
		               				<input class="form-control" name="user_name" type="text"  value="{{ old('user_name'). $user->usr_name }}" readonly>
                                <?php                            	
                            }

                        ?>		               				
		            </div>
				</div>
				<div class="row">
		            <div class="form-group col-md-6">
		                <label>Password</label>
		                <input class="form-control" type="password" name="password"  value="{{ old('password') }}">
		            </div>
				</div>

				<div class="row">
		            <div class="form-group col-md-6">
		                <label>Confirm Password</label>
		                <input class="form-control" type="password" name="cnpassword"  value="{{ old('cnpassword') }}">
		            </div>
				</div>

		        <div class="row">
		            <div class="form-group col-md-6">
		            <button type="submit" class="btn btn-lg btn-success btn-block">Update</button>

		            </div>
		        </div>
	        </form>
    </div>
</div>
</div>
@stop