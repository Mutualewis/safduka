@extends ('layouts.dashboard')
@section('page_heading','Confirm Allocations')
@section('section')
<div class="col-sm-12 col-md-offset-0">
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
<?php 
	if(session('maincountry')!=NULL){
		$cidmain=session('maincountry');
	}
	$autosubmit=false;
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)){
		$cid=$cidmain;
		$autosubmit=true;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season)) {
		$csn_season  = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}	
	if (!isset($basket)) {
		$basket  = NULL;
	}
	if (!isset($hedge)) {
		$hedge  = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}

	if (!isset($contract )) {
		$contract   = NULL;
	}
	// if (!isset($warehouse )) {
	// 	$warehouse = NULL;
	// }

	
	$screen = 0;
	$process = 0;
	$weight = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;

?>
    <div class="col-md-6">
	        <form role="form" method="POST" action="confirmallocations" id="confirmallocationsform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-6">
		                <label>Country</label>
		                <select class="form-control" name="country" onchange="this.form.submit()">
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
	        			<label>Contract Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="contract" style="text-transform:uppercase; " placeholder="Search Contract..."  value="{{ old('contract'). $contract }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchButtonContract" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>
	                    </span>
	                    </div>
	                </div>	

		        </div>



			<div class="row">
		        <div class="form-group col-md-6">
		       		<button type="submit" name="confirmallocations" class="btn btn-lg btn-success btn-block">Update Allocation</button>
		        </div>

		    </div>

	        	


	</div>
	<div class="row">		
	<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 600px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Allocations</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					<th>
						No
					</th>
					<th>
						Contract
					</th>
					<th>
						Code
					</th>
					<th>
						Invoice From
					</th>
					<th>
						Bags
					</th>
					<th>
						Bric Bags
					</th>	
					<th>
						Value
					</th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;
						$total_value = 0;
						$total = 0;
						$btotal = 0;
						$contracts = array();
						
						if (isset($allocations) && count($allocations) > 0) {

							foreach ($allocations->all() as $value) {								

								$count += 1;

								$id = $value->stbid;

					    		$total_value += $value->value;

								$contracts[] = $value->id;

								$bags = round($value->weight/60);

								$total += $bags; 

								echo "<tr>";
								
									echo "<td>".$count."</td>";
									echo "<td>".$value->br_no."</td>";
									echo "<td>".$value->bs_code."</td>";
									echo "<td>".$value->cg_name."</td>";
									echo "<td>".$bags."</td>";

									if ($value->bric_bags == NULL) {

										$btotal += $bags; 

										echo "<td><input class='form-control' name='bricWeight$id' size='5' value='$bags'></td>";

									} else {

										$btotal += $value->bric_bags; 	

										echo "<td><input class='form-control' name='bricWeight$id' size='5' value='$value->bric_bags'></td>";	

									}

									echo "<td>".$value->value." $</td>";
					               
									echo "<input class='form-control' type='hidden' name='contracts[]' value='$id'>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					  	<!-- <td>Total:</td> -->
					    <?php
						    echo "<td>".$count." Contract(s)</td>";
						?>
						<td></td>
						<td></td>
						<td></td>
					    <?php
					    	echo "<td>".$total." Bags</td>";
						    echo "<td>".$btotal." Bags</td>";
						    echo "<td>".$total_value." $</td>";
						?>				
					  </tr>
				</tbody>
				</table>
			</div>


</form>

</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#confirmallocationsform" ).submit();
		}
	})
</script>
@endpush