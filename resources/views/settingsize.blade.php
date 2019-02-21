@extends ('layouts.dashboard')
@section('page_heading','Screens Settings')

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
	
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = NULL;
	}

?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsscreens">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Screen</label>
		                <input class="form-control" placeholder="screen" name="screen" value="{{ old('screen') }}">
		            </div>		            

		        </div>


	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Description</label>
		                <input class="form-control" placeholder="description" name="description" value="{{ old('description') }}">
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
				<h3>Grades</h3>
				<table class="table table-striped" id="screens-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Screen
					</th>
					<th>
						Description
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($screens) && count($screens) > 0) {

							foreach ($screens as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->scr_name."</td>";
									echo "<td>".$value->scr_description."</td>";
									echo "<td>"."<a href='screen_delete/{$id}'  class='btn btn-success btn-danger' >Delete</a>";
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

@push('scripts')
<script>

$(document).ready(function (){  
	var table = $('#screens-table').DataTable({
	});//end datatable
});//end doc ready
</script>
@endpush