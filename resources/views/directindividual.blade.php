@extends ('layouts.dashboard')
@section('page_heading','Add Outturn')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-5">
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
	if (!isset($certs )) {
		$certs = NULL;
	}

	if (!isset($saleid)) {
		$saleid = NULL;
	}

	if (!isset($warrant)) {
		$warrant = NULL;
	}

	if (!isset($warrant_date)) {
		$warrant_date = NULL;
	}

	$sif_lot = NULL;
	$outt_number = NULL;
	$ot_season = NULL;
	$coffee_grower = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$ot_season = NULL;
	$slr = NULL;
	$warehouse = NULL;
	$millid = NULL;
	$cgrw = NULL;

	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$grade = $cdetails->cgrad_id;
		$cnetweight = $cdetails->cfd_weight;
		$bags = $cdetails->cfd_bags;
		$pockets = $cdetails->cfd_pockets;

		$slr = $cdetails->slr_id;
		$cgrw = $cdetails->cg_id;
		$warehouse = $cdetails->wr_id;
		$millid = $cdetails->ml_id;

	}



?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="directindividual" id="directindividualform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-12">
			            <label>Select Sale</label>						
		            </div>
		        </div>

		        	<div class="row" >
			            <div class="form-group col-md-6 ">
			                <label>Country</label>
			                <select class="form-control" name="country"  onchange="this.form.submit()">
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

			            <div class="form-group col-md-6" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" name="sale_season"  onchange="this.form.submit()">
			               		<option>Sale Season</option>
								@if (count($Season) > 0)
											@foreach ($Season->all() as $season)
											@if ($csn_season ==  $season->id)
												<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
											@else
												<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>
			        </div>


		        	<div class="row">
			            <div class="form-group col-md-6">
			                <label>Sale</label>
			                <select class="form-control" name="sale" onchange="this.form.submit()">
			                	<option>Sale No.</option> 
								@if (isset($sale) && count($sale) > 0)
											@foreach ($sale->all() as $sales)
												@if ($saleid ==  $sales->id)
													<option value="{{ $sales->id }}" selected="selected">{{ $sales->sl_no}}</option>
												@else
													<option value="{{ $sales->id }}">{{ $sales->sl_no}}</option>
												@endif

											@endforeach
								@else
									<option>No Sale Found</option>		
								@endif
			                </select>		
			            </div>
		

			        </div>





				<div class="row">
		            <div class="form-group col-md-12">
			            <label>Add Outturn</label>
						
		            </div>
		        </div>



	        	<div class="row">
	        		<div class="form-group col-md-6">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" style="text-transform:uppercase; " placeholder="Search Outturn..."  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-6">
		                <select class="form-control" name="coffee_grade">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
										@foreach ($CoffeeGrade->all() as $cgrade)
											@if ($grade ==  $cgrade->id)
												<option value="{{ $cgrade->id }}" selected="selected">{{ $cgrade->cgrad_name}}</option>
											@else
												<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>

	        	<div class="row">


		            <div class="form-group col-md-6">
		                <label>Grade Kgs.</label>
		                <input class="form-control"  id="grade_kilograms"  name="grade_kilograms" oninput="myFunction()" value="{{ old('grade_kilograms').$cnetweight  }}">
		            </div>
		            <div class="form-group col-md-6">
			            <div class="row">
				            <div class="form-group col-md-2">
				                <label >Bags</label>
				                <label id="bags" name="bags"><?php echo $bags;?></label>
				            </div>
				            <div class="form-group col-md-2">
				                <label >Pockets</label>
				                <label id="pockets" name="pockets" ><?php echo $pockets;?></label>
				            </div>	
				        </div>
			        </div>	


	        	</div>


	        	<div class="row">

		            <div class="form-group col-md-6">
		                <label>Grower</label>
		                <select class="form-control" name="coffee_grower">
		                	<option></option> 
							@if (isset($Growers) && count($Growers) > 0)
										@foreach ($Growers->all() as $value)
											@if ($cgrw ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cg_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cg_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                                
		            </div>   

		            <div class="form-group col-md-6">
		                <label>Seller</label>
		                <select class="form-control" name="seller">
		                	<option></option> 
							@if (isset($seller) && count($seller) > 0)
										@foreach ($seller->all() as $sellers)
											@if ($slr ==  $sellers->id)
												<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
											@else
												<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>

	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Warehouse</label>
		                <select class="form-control" name="Warehouse" >
		                	<option></option>
							@if (count($Warehouse) > 0)
										@foreach ($Warehouse->all() as $Warehouses)

											@if ($warehouse ==  $Warehouses->wrid)
												<option value="{{ $Warehouses->wrid }}" selected="selected">{{ $Warehouses->wr_name}}  ({{ $Warehouses->rgn_name }})</option>
											@else
												<option value="{{ $Warehouses->wrid }}">{{ $Warehouses->wr_name}}  ({{ $Warehouses->rgn_name }})</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                
		            </div>   



		            <div class="form-group col-md-6">
		                <label>Mill</label>
		                <select class="form-control" name="mill" >
		                	<option></option>		                	
							@if (count($Mill) > 0)
										@foreach ($Mill->all() as $Mills)

											@if ($millid ==  $Mills->mlid)
												<option value="{{ $Mills->mlid }}" selected="selected">{{ $Mills->ml_name}}  ({{ $Mills->rgn_name }})</option>
											@else
												<option value="{{ $Mills->mlid }}">{{ $Mills->ml_name}}  ({{ $Mills->rgn_name }})</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                
		            </div> 

		        </div>


	        	<div class="row">

		            <div class="form-group col-md-6">
		                <label>Warrant No.</label>
		                <input class="form-control"  id="warrant"  name="warrant" value="{{ old('warrant').$warrant }}">	                
		            </div> 

		            <div class="form-group col-md-6">
		                <label>Warrant Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $warrant_date }}"/>	                
		            </div>  

		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
			            <label>Certification</label>
						
		            </div>
		        </div>

	            <div class="row">
	           		<div class="form-group col-md-12">
						@if (count($Certification) > 0)
								@foreach ($Certification->all() as $Certification)

								<?php $gid = 0 ;?>
								@if (count($certs) > 0)
										@foreach ($certs->all() as $value)
											@if ($value->crt_id == $Certification->id)
												<input type="checkbox" checked="checked" name="Certification[]" value="{{ $Certification->id }}"> {{ $Certification->crt_name}}&nbsp&nbsp
												<?php $gid = $Certification->id;?>
											@endif	
								@endforeach	
								@endif
								
								@if ($gid == 0)
									<input type="checkbox" name="Certification[]" value="{{ $Certification->id }}"> {{ $Certification->crt_name}}&nbsp&nbsp
								@endif
								
								<?php $gid = 0 ;?>

								@endforeach
								
						@endif	
					</div>
				</div> 
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Lot</button>
		            </div>

		        </div>

	        </form>
	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable">
		<form role="form" method="POST" action="directindividual">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Direct Sale</h3>
				<table class="table table-striped">
				<thead>
				  <tr>

					<th>
						Outturn
					</th>
					<th>
						Grade
					</th>
					<th>
						Mark
					</th>
					<th>
						KGS
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$total_bags = 0;
						$count = 0;
						$total = 0;

						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $sale_lots) {
									// print_r($season->acat_id);
								$total += $sale_lots->weight; 
								$count += 1;
								$id = $sale_lots->id;

								echo "<tr>";
									echo "<td>".$sale_lots->outturn."</td>";
									echo "<td>".$sale_lots->grade."</td>";

									echo "<td>".$sale_lots->mark."</td>";
									echo "<td>".$sale_lots->weight."</td>";
									echo "<input type='hidden' name ='itemId' value='$id'>";
									echo "<input type='hidden' name ='$count' value='$id'>";
									echo "<td>"."<a href='/outturn_delete/{$id}'  class='btn btn-success btn-danger' >Delete</a>";
								echo "</tr>";

// <input type='submit' name='deletebutton' class='btn btn-lg btn-success btn-block' id= '$id' . ' value='Delete' >$id
							}
						}
					?>
					  <tr>
					  	<td></td>
					  	<td></td>
					    <td>Total:</td>
					    <?php
						    echo "<td>".$total."</td>";
						?>
						<td></td>
					  </tr>
				</tbody>
				</table>
		</form>
	</div>
</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#directindividualform" ).submit();
		}
	})
</script>
@endpush