@extends ('layouts.dashboard')
@section('page_heading','Country Settings')

@section('section')

<div class="col-md-14 col-md-offset-1">

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

<?php 
	
	// if (!isset($ref_no)) {
	// 	$ref = $ref_no;
	// } 

?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingscountry">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	
	        	<div class="row">

		            <div class="form-group col-md-6 ">
		                <label>Country</label>
		                <input class="form-control" placeholder="Country" name="country" value="{{ old('country') }}">	
		            </div>

	        	</div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Initials</label>
		                <input class="form-control" placeholder="Initials" name="initials" value="{{ old('initials') }}">
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Is Active?</label>
		                <input class="form-control" type="checkbox" placeholder="isActive" name="isActive" value="1">
		            </div>		            

		        </div>


	        	
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Update/ Add</button>						
		            </div>

		        </div>

	        </form>

    </div>
	<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">
		<form role="form" method="POST" action="settingscountry">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Countries</h3>
				<table class="table table-striped">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Country
					</th>
					<th>
						Initials
					</th>
					<th>
						Is Active
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($country) && count($country) > 0) {

							foreach ($country->all() as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->ctr_name."</td>";
									echo "<td>".$value->ctr_initial."</td>";
									echo "<td>".$value->ctr_is_active."</td>";
									echo "<td>"."<a href='country_delete/{$id}'  class='btn btn-success btn-danger' >Delete</a>";
								echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>


</div>
@stop

