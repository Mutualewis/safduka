@extends ('layouts.dashboard')
@section('page_heading','Processing Instruction Settings')

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
	
   if (old('pgid') != NULL) {
		$pgid = old('pgid');
	}
	if (!isset($pgid)) {
		$pgid = NULL;
	}
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsprocessinginstructions">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Processing Group</label>
			                <select class="form-control" id="group" name="group" required>
			                	<option></option> 
								@if (isset($processinggroups) && count($processinggroups) > 0)
											@foreach ($processinggroups->all() as $processinggroup)
												@if ($pgid ==  $processinggroup->id)
													<option value="{{ $processinggroup->id }}" selected="selected">{{ $processinggroup->prg_instruction}}</option>
												@else
													<option value="{{ $processinggroup->id }}">{{ $processinggroup->prg_instruction}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>
		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="name" name="name" value="{{ old('name') }}" required>
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
		<form role="form" method="POST" action="settingsprocessinginstructions">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Processing Instructions</h3>
				<table class="table table-striped" id="pri-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Instruction Name
					</th>
					<th>
						Processing Group
					</th>
					
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($processinginstructions) && count($processinginstructions) > 0) {
							foreach ($processinginstructions as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->pri_name."</td>";
									echo "<td>".$value->prg_instruction."</td>";
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
var path= "{{URL::to('settingsprocessinginstructions')}}";
$(document).ready(function (){  
	var table = $('#pri-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var packageID=val.id;
	

	  var url = '{{ route('settingsprocessinginstructions.pri_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', packageID);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
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