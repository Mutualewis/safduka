@extends ('layouts.dashboard')
@section('page_heading','Growers Create')

@section('section')

<div class="col-md-14 col-md-offset-0">
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
	if (old('region') != NULL) {
		$rid = old('region');
	}
	if (!isset($rid)) {
		$rid = NULL;
	}
	if (old('county') != NULL) {
		$cnt_id = old('county');
	}
	if (!isset($cnt_id)) {
		$cnt_id = NULL;
	}
	if (old('growertype') != NULL) {
		$gt_id = old('growertype');
	}
	if (!isset($cnt_id)) {
		$gt_id = NULL;
	}

?>

<!-- Modal -->
<div class="modal fade" id="growerModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
       	ADD/UPDATE GROWER
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsgrowers">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


		       	 <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Country</label>
			                <select class="form-control" id="country" name="country" required>
			                	<option></option> 
								@if (isset($countrys) && count($countrys) > 0)
											@foreach ($countrys->all() as $country)
												@if ($cid ==  $country->id)
													<option value="{{ $country->id }}" selected="selected">{{ $country->ctr_name . " (".$country->ctr_initial.")"}}</option>
												@else
													<option value="{{ $country->id }}">{{ $country->ctr_name . " (".$country->ctr_initial.")"}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>	

		             <div class="form-group col-md-6">
		            	<label>Region</label>
			                <select class="form-control" id="region" name="region" required>
			                	<option></option> 
								@if (isset($regions) && count($regions) > 0)
											@foreach ($regions->all() as $region)
												@if ($rid ==  $region->id)
													<option value="{{ $region->id }}" selected="selected">{{ $region->rgn_name }}</option>
												@else
													<option value="{{ $region->id }}">{{ $region->rgn_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>	
	    	            

		        </div>

		        <div class="row">
	        		
		           	<div class="form-group col-md-6">
		            	<label>County</label>
			                <select class="form-control" id="region" name="region">
			                	<option></option> 
								@if (isset($countys) && count($countys) > 0)
											@foreach ($countys as $county)
												@if ($cnt_id ==  $county->id)
													<option value="{{ $county->id }}" selected="selected">{{ $county->cnt_name }}</option>
												@else
													<option value="{{ $county->id }}">{{ $county->cnt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>	

		             <div class="form-group col-md-6">
		            	<label>Grower Type</label>
			                <select class="form-control" id="grower_type" name="growertype" required>
			                	<option></option> 
								@if (isset($growerTypes) && count($growerTypes) > 0)
											@foreach ($growerTypes as $growerType)
												@if ($gt_id ==  $growerType->id)
													<option value="{{ $growerType->id }}" selected="selected">{{ $growerType->gt_name }}</option>
												@else
													<option value="{{ $region->id }}">{{ $growerType->gt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

		        <hr>
		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="name" name="name" value="{{ old('name') }}" required>
		            </div>	
		             <div class="form-group col-md-6">
		            	<label>Organization</label>
		                <input class="form-control" placeholder="Organization" name="organization" value="{{ old('organization') }}" required>
		            </div>		            
	            

		        </div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Code</label>
		                <input class="form-control" placeholder="Code" name="code" value="{{ old('code') }}" required>
		            </div>
		             <div class="form-group col-md-6">
		            	<label>Mark</label>
		                <input class="form-control" placeholder="Mark" name="mark" value="{{ old('mark') }}" required>
		            </div>		            

		        </div>
		        <hr>
		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Email</label>
		                <input class="form-control" placeholder="email" name="email" value="{{ old('email') }}">
		            </div>	
		             <div class="form-group col-md-6">
		            	<label>Mobile</label>
		                <input class="form-control" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}">
		            </div>		            
	            

		        </div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Postal Address</label>
		                <input class="form-control" placeholder="Postal Address" name="postal_address" value="{{ old('postal_address') }}">
		            </div>
		             <div class="form-group col-md-6">
		            	<label>Physical Address</label>
		                <input class="form-control" placeholder="Physical Address" name="physical_address" value="{{ old('physical_address') }}">
		            </div>		            

		        </div>	        	
				

	       

    </div>
    </div>

         </div>
      <div class="modal-footer">
        <div class="row">
        	<div class="form-group col-md-6">
        		<button type="button" class="btn btn-lg btn-block btn btn-secondary" data-dismiss="modal">Close</button>
        	</div>
		            <div class="form-group col-md-6">
			            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Update/ Add</button>						
		            </div>

		        </div>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
	<a id='{$id}' class='btn btn-lg btn-warning' data-toggle='modal' data-target='#growerModalCenter'>ADD/UPDATE</a>
	<a class="btn btn-lg btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Upload Growers
  </a>
</div>
</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
<h4><strong>
	NB:The grower details should be uploaded in the correct format. Use the template provided as a guideline.
</strong></h4>		

<a href="{{ URL::to('downloadExcelGrower/xls') }}"><button class="btn btn-success">Download Template xls</button></a>

<div class="col-sm-12" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
<div class="row">
	<div class="col-md-6 col-md-offset-3" >

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
			<div class="container">
		        <form action="{{ URL::to('growerupload') }}" class="form-horizontal" method="post" enctype="multipart/form-data" id="groweruploadform">

		        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		        	<div class="row">
			            <div class="form-group col-md-6">
			                <label>Choose File</label>
			                <input class="form-control" type="file" name="import_file" />
			            </div>      		
		        	</div>




					<div class="row">
			            <div class="form-group col-md-6">
			            	<button type="submit" name="submitgrower" class="btn btn-lg btn-success btn-block">Import File</button>
			            </div>
			        </div>
		        </form>
	        </div>
    </div>
</div>
</div>
</div>
</div> <!---collapse -->

    <div class="row">

	<div class="col-md-10 col-md-offset-0">
		<form role="form" method="POST" action="settingsgrower">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Growers</h3>
				<table class="table table-striped table-responsive" id="growers-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Grower
					</th>
					<th>
						Organization
					</th>
					<th>
						Code
					</th>
					<th>
						Mark
					</th>
					<th>
						Email
					</th>
					<th>
						Mobile
					</th>
					<th>
						Postal Address
					</th>
					<th>
						County
					</th>
					<th>
						Region
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

						if (isset($growers) && count($growers) > 0) {
							foreach ($growers as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->cgr_grower."</td>";
									echo "<td>".$value->cgr_organization."</td>";
									echo "<td>".$value->cgr_code."</td>";
									echo "<td>".$value->cgr_mark."</td>";
									echo "<td>".$value->cg_email."</td>";
									echo "<td>".$value->cg_mobile."</td>";
									echo "<td>".$value->cg_postal_address."</td>";
									echo "<td>".$value->cnt_name."</td>";
									echo "<td>".$value->rgn_name."</td>";
									echo "<td>".$value->ctr_name."</td>";
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

</div>
@stop

@push('scripts')
<script>
var path= "{{URL::to('settingsgrowers')}}";
$(document).ready(function (){  
	var table = $('#growers-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var growerID=val.id;
	

	  var url = '{{ route('settingsgrowers.grower_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', growerID);
	 
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