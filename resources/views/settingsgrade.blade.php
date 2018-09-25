@extends ('layouts.dashboard')
@section('page_heading','Grades Settings')

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
	

	        <form role="form" method="POST" action="/settingsgrades">
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
		            	<label>Grade</label>
		                <input class="form-control" placeholder="grade" name="grade" value="{{ old('grade') }}">
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
				<table class="table table-striped" id="grade-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Grade
					</th>
					<th>
						Country
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($grades) && count($grades) > 0) {

							foreach ($grades as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->cgrad_name."</td>";
									echo "<td>".$value->ctr_name."</td>";
								
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
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
			var table = $('#grade-table').DataTable({
			});//end datatable
		});//end doc ready

			function checkDeletable(e, val){
				e.preventDefault();

				var gradeID=val.id;
	 var url = '{{ route('settingsgrades.getcoffeegradedetails',['gradeID'=>":id"]) }}';
	 url = url.replace(':id', gradeID);

	 var urlconfirmdelete = '{{ route('settingsgrade.grade_delete',['id'=>":id"]) }}';
	 urlconfirmdelete = urlconfirmdelete.replace(':id', gradeID);

	 $("a.confirm-delete").attr("href", urlconfirmdelete);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
			  if (data.deletable) {
			  	window.location.href = urlconfirmdelete;
			  }else{
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>This item cannot be deleted. It already has coffee details</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									console.log("closed")
								}
							});

							// show the notification
							notification.show();
			  }
			});

		}
</script>
@endpush