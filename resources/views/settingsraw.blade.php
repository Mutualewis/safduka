@extends ('layouts.dashboard')
@section('page_heading','Raw Settings')

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
	if (!isset($qid)) {
		$cid = NULL;
	}
	
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsraw">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


	        	 <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Country</label>
			                <select class="form-control" id="country" name="country" required>
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

		        </div>



		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Raw score</label>
		                <input class="form-control" placeholder="Raw score" name="rawscore" value="{{ old('cupscore') }}" required>
		            </div>		            

		        </div>

		         <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Raw Quality</label>
		                <input class="form-control" placeholder="Raw quality" name="quality" value="{{ old('quality') }}" required>
		            </div>		            

		        </div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Raw qualification</label>
		                <input class="form-control" placeholder="raw qualification" name="qualification" value="{{ old('qualification') }}" required>
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Raw description</label>
		                <input class="form-control" placeholder="cup description" name="description" value="{{ old('description') }}" required>
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
		<form role="form" method="POST" action="settingsraw">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Raw Settings</h3>
				<table class="table table-striped" id="raw-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Country
					</th>
					<th>
						Raw score
					</th>
					<th>
						Quality
					</th>
					<th>
						Qualification
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

						if (isset($rawscore) && count($rawscore) > 0) {
							foreach ($rawscore as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->ctr_name."</td>";
									echo "<td>".$value->rw_score."</td>";
									echo "<td>".$value->rw_quality."</td>";
									echo "<td>".$value->rw_qualification."</td>";
									echo "<td>".$value->rw_description."</td>";
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
									echo "</tr>";
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
var path= "{{URL::to('settingsraw')}}";
$(document).ready(function (){  
	var table = $('#raw-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
				e.preventDefault();

				var rawID=val.id;
	

	 var url = '{{ route('settingsraw.raw_delete',['id'=>":id"]) }}';
	 url = url.replace(':id', rawID);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
				console.log(data);
			  if (data.deletable) {
			  	//location.reload();
			  	$(location).attr('href',path)
			  }else{
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>This item cannot be deleted. It already has other details</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  }
			}).error(function(error) {
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>Error occured on attempt to delete</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  
			});

		}
</script>
@endpush