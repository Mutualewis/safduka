@extends ('layouts.plane')
<!-- @section ('logo') -->
@section ('body')
<?php
if (old('country') != NULL) {
    $cid = old('country');
}
if (!isset($cid)) {
    $cid = NULL;
}
echo "string";
?>
<a href="{{ url ('telextensions' ) }}"><strong>Telephone Extensions</strong></a>
<div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
            <br /><br /><br />
               @section ('login_panel_title','Sign In')
               @section ('login_panel_body')

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

                    <form role="form" method="POST" action="/auth/login">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail/Username" name="usr_email" type="text" autofocus value="{{ old('usr_email') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
			            <div class="form-group">
			                <label>Country</label>
			                <select class="form-control" name="country">
			                	<option value=''>---Select Country---</option> 
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
                            <div class="checkbox">
                                <label>
                                    <input name="usr_remember" type="checkbox" value="Remember Me" style="width:14px;height:14px;margin-top:2px;">&nbsp;Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            <a href="#">Forgot Your Password?</a>
                        </fieldset>
                    </form>                    
                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop





