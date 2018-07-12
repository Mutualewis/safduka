@extends ('layouts.dashboard')
@section('page_heading','Region Settings')

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
	

	        <form role="form" method="POST" action="/settingsregion">
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

		            <div class="form-group col-md-6 ">
		                <label>Region name</label>
		                <input class="form-control" placeholder="region" name="region" value="{{ old('region') }}" required>	
		            </div>

	        	</div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Description</label>
		                <input class="form-control" placeholder="Description" name="description" value="{{ old('description') }}" required>
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
		<form role="form" method="POST" action="settingsregion">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Regions</h3>
				<table class="table table-striped">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Region
					</th>
					<th>
						Description
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

						if (isset($region) && count($region) > 0) {
							foreach ($region as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->rgn_name."</td>";
									echo "<td>".$value->rgn_description."</td>";
									echo "<td>".$value->ctr_name."(".$value->ctr_initial.")</td>";
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-warning' data-toggle='modal' data-target='#regionModalCenter' onclick='getwarehouses(event, this)'>Delete</a>";
								echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>

<!-- Modal -->
<div class="modal fade" id="regionModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-danger" role="alert">
		  <h4 class="alert-heading">Confirm Deletion!</h4>
		  <p>Below warehouses linked to this region will be deleted.</p>
		  <hr>
		  <p class="mb-0">Are you sure you want to delete?.</p>
		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href='' class='btn btn-danger confirm-delete'>Delete</a>
      </div>
    </div>
  </div>
</div>

</div>
@stop

@push('scripts')
<script>
function getwarehouses(e, value){
	 e.preventDefault();
	 $('.modal-body').html('')

	 var regionID=value.id;
	 var url = '{{ route('settingsregion.getwarehouses',['regionID'=>":id"]) }}';
	 url = url.replace(':id', regionID);

	 var urlconfirmdelete = '{{ route('settingsregion.region_delete',['id'=>":id"]) }}';
	 urlconfirmdelete = urlconfirmdelete.replace(':id', regionID);

	 $("a.confirm-delete").attr("href", urlconfirmdelete);
	 console.log(url)

	 $('.modal-body').html('<table id="warehouses-table" class="table table-condensed table-striped" width="100%">'+
						'<thead bgcolor="#086b36">'+
							'<tr>'+				  
								'<th>'+
									'<font color="white"> Warehouse Name</font>'+
								'</th>'+
								'<th>'+
									'<font color="white"> Initials</font>'+
								'</th>'+
								'<th>'+
									'<font color="white"> Description</font>'+
								'</th>'+
								
							  '</tr>'+						
						'</thead>'+
				'</table>')

	var table = $('#warehouses-table').DataTable({
		dom: 'Bfrtip',  
		type: 'POST',
   		url: '',
        processing: true,
        deferRender: true,
        ajax: url,
     	
        columns: [
            { data: 'wr_name', name: 'wr_name' },
            { data: 'wr_initials', name: 'wr_initials'},
            { data: 'wr_description', name: 'wr_description'},

        ], 


        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },

		'order': [0, 'asc'],



	});

}

</script>
@endpush