@extends ('layouts.dashboard')
@section('page_heading','Confirm Catalogue')
@section('section')
<div class="col-sm-14 col-md-offset-0">
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
	if (!isset($slr)) {
		$slr  = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	
	$screen = 0;
	$process = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		// print_r($cdetails."lewis");
	}

	if (isset($pdetails)){
		$sale_cb_id = $pdetails->cb_id;
		$price = $pdetails->prc_price;
		$bskt = $pdetails->bs_id;

		$sst = $pdetails->sst_id;
		$warrant_no = $pdetails->prc_warrant_no;
		$warrant_weight = $pdetails->prc_warrant_weight;
		$comments = $pdetails->qltyd_comments;
	}



	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="confirmcatalogue"
			id="confirmcatalogueform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-3 ">
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

			            <div class="form-group col-md-3" style="padding-left:20px;">
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

		           		<div class="form-group col-md-3">
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

			            <div class="form-group col-md-3">
			                <label>Seller</label>
			                <select class="form-control" name="seller" onchange="this.form.submit()">
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
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmcatalogue" onclick="return confirm('Are you sure you want to confirm this catalogue?');" class="btn btn-lg btn-success btn-block">Confirm Catalogue</button>
		            </div>

		        </div>

	        	<h3>Lots In Sale</h3>	
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row" >
					<div class="col-md-14 pre-scrollable " style="max-height: 600px;">
						<!-- <form role="form" method="POST" action="confirmcatalogue"> -->
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<table class="table table-striped">
								<thead>
								<tr>
<!-- 									<th>
										Add
									</th>	 -->			  
									<th>
										Lot
									</th>
									<th>
										Season
									</th>									
									<th>
										Outturn
									</th>
									<th>
										Mark
									</th>
									<th>
										Mill
									</th>
									<th>
										Warehouse
									</th>

									<th>
										Grade
									</th>
									<th>
										Bags
									</th>
									<th>
										Pkt
									</th>					
									<th>
										Kg
									</th>
									<th>
										Cert
									</th>
									<th>
										Seller
									</th>
									<th>
										Region
									</th>


								  </tr>
								</thead>
								<tbody>



									<?php
										$total_bags = 0;
										$count = 0;
										$count_green = 0;
										$count_process = 0;
										$count_screen = 0;
										$count_cup = 0;
										$total = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												$total += $sale_lots->weight; 
												$count += 1;
												$id = $sale_lots->id;

												

											
												if ($sale_lots->dnt > 0 ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

												
													// echo "<td><input type='checkbox'></td>";

													echo "<td>".$sale_lots->lot."</td>";
													echo "<td>".$sale_lots->csn_season."</td>";
													echo "<td>".$sale_lots->outturn."</td>";
													echo "<td>".$sale_lots->mark."</td>";
													echo "<td>".$sale_lots->ml_name."</td>";
													echo "<td>".$sale_lots->warehouse."</td>";
													echo "<td>".$sale_lots->grade."</td>";
													echo "<td>".$sale_lots->bags."</td>";
													echo "<td>".$sale_lots->pockets."</td>";
													echo "<td>".$sale_lots->weight."</td>";
													echo "<td>".$sale_lots->cert."</td>";
													echo "<td>".$sale_lots->seller."</td>";
													echo "<td>".$sale_lots->region."</td>";



													
												echo "</tr>";

											}
										}
									?>
									  <tr>
									    <?php
										    echo "<td>".$count." Lots</td>";
										?>

									    <?php
										    echo "<td>".$total." KGS</td>";
										?>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									  </tr>
								</tbody>
								</table>
						<!-- </form> -->
						</div>

		        </div>    



	        </form>
	</div>
	
</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#confirmcatalogueform" ).submit();
		}
	})
</script>
@endpush