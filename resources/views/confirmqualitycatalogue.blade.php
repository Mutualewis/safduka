@extends ('layouts.dashboard')
@section('page_heading','Confirm Catalogue Quality')
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
	if (!isset($saleid)) {
		$saleid  = NULL;
	}
	// if (old('sale_season')  != NULL) {
	// 	$csn_season = old('sale_season');		
	// }

	// if (old('sale')  != NULL) {
	// 	$sale = old('sale');		
	// }
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
	        <form role="form" method="POST" action="confirmqualitycatalogue" id="confirmqualitycatalogueform">

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
			                <select class="form-control" name="sale" onchange="this.form.submit()" id="sale">
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

		        <?php 
		        	if ($slr == NULL) {
		        		?>
							<div class="row">
					            <div class="form-group col-md-12">
					           		<button name="confirmqualitycatalogue" id="confirmqualitycataloguebtn" class="btn btn-lg btn-success btn-block"  class="btn btn-lg btn-success btn-block">Confirm Catalogue</button>
					            </div>

					        </div>
		        		<?php
		        	} else {
		        		?>
							<div class="row">
					            <div class="form-group col-md-12">

									<h3>You can only submit the whole catalogue! Unselect the seller.</h3>
					            </div>

					        </div>

		        		<?php		        		
		        	}
		        ?>

	        	<h3>Lots In Sale (Those in Red have empty fields or are bad/foul.)</h3>	
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row" >
					<div class="col-md-14 pre-scrollable " style="max-height: 600px;">
						<!-- <form role="form" method="POST" action="confirmqualitycatalogue"> -->
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
										Grade
									</th>
									<th>
										Green
									</th>

									<th>
										Kg
									</th>
									<th>
										Process
									</th>
									<th>
										Process(%)
									</th>					
									<th>
										Screen
									</th>
									<th>
										Screen(%)
									</th>
									<th>
										Raw
									</th>
									<th>
										Cup
									</th>
									<th>
										Keep Off
									</th>
									<th>
										Comments
									</th>
								  </tr>
								</thead>
								<tbody>



									<?php
										$total = 0;									
										$total_bags = 0;
										$count = 0;
										$count_green = 0;
										$count_process = 0;
										$count_screen = 0;
										$count_cup = 0;
										$count_raw = 0;

										$lot = array();

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {

												$total += $sale_lots->weight; 
												
												$count += 1;

												$id = $sale_lots->id;

												
												if ($sale_lots->greencomments != "Set" && $sale_lots->dnt != 1 ) {
													$count_green += 1;									
												}
												if ($sale_lots->prcss_name == NULL && $sale_lots->dnt != 1 ) {
													$count_process += 1;
												} 
												if ($sale_lots->scr_name == NULL && $sale_lots->dnt != 1 ) {
													$count_screen += 1;
												} 

												if ($sale_lots->cp_quality == NULL && $sale_lots->dnt != 1  || $sale_lots->cp_quality == "NA" ) {
													$count_cup += 1;
												} 					

												if ($sale_lots->rw_quality == NULL && $sale_lots->dnt != 1  || $sale_lots->rw_quality == "NA" ) {
													$count_raw += 1;
												} 

												if ($sale_lots->dnt != 0 || $sale_lots->greencomments != "Set" || $sale_lots->prcss_name == NULL || $sale_lots->scr_name == NULL || $sale_lots->cp_quality == NULL || $sale_lots->rw_quality == NULL ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

												
													echo "<td><input hidden='hidden' type='checkbox'></td>";

													 echo "<td><input class='form-control' name='lot[]' size='5' value='$id'></td>";

													echo "<td>".$sale_lots->lot."</td>";
													echo "<td>".$sale_lots->csn_season."</td>";
													echo "<td>".$sale_lots->outturn."</td>";
													echo "<td>".$sale_lots->mark."</td>";
													echo "<td>".$sale_lots->grade."</td>";
													echo "<td>".$sale_lots->green."</td>";
													echo "<td>".$sale_lots->weight."</td>";
													echo "<td>".$sale_lots->prcss_name."</td>";
													echo "<td>".$sale_lots->qltyd_prcss_value."</td>";
													echo "<td>".$sale_lots->scr_name."</td>";
													echo "<td>".$sale_lots->qltyd_scr_value."</td>";
													echo "<td>".$sale_lots->rw_score."</td>";
													echo "<td>".$sale_lots->cp_score."</td>";

													if ($sale_lots->dnt > 0) {
														echo "<td>Yes</td>";
													} else {
														echo "<td>No</td>";
													}
													echo "<td>".$sale_lots->final_comments."</td>";

													
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
									    <?php
										    echo "<td>".$count_green." NOT SET</td>";
										?>
										<td></td>
									    <?php
										    echo "<td>".$count_process." NOT SET</td>";
										?>
										<td></td>
									    <?php
										    echo "<td>".$count_screen." NOT SET</td>";
										?>
										<td></td>	
									    <?php
										    echo "<td>".$count_raw." NOT SET</td>";
										?>	

									    <?php
										    echo "<td>".$count_cup." NOT SET</td>";
										?>	
										<td></td>	
										<td></td>	



									    <?php
										    echo "<input class='form-control' type='hidden' name='count_green' value='".$count_green."'";
										    echo "<input class='form-control' type='hidden' name='count_process' value='".$count_process."'";
										    echo "<input class='form-control' type='hidden' name='count_screen' value='".$count_screen."'";
										    echo "<input class='form-control' type='hidden' name='count_raw' value='".$count_raw."'";
										    echo "<input class='form-control' type='hidden' name='count_cup' value='".$count_cup."'";
										?>	

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
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#confirmqualitycatalogueform" ).submit();
		}
	})
	$( "#confirmqualitycataloguebtn" ).click(function(event){
		event.preventDefault();
		confirmCatalogue()	
	})
function confirmCatalogue(){
				bootbox.confirm({
				title: "Confirm Catalogue?",
				message: "Are you sure you want to confirm this catalogue?.",
				buttons: {
					cancel: {
						label: '<i class="fa fa-times"></i> Cancel',
						className: 'btn-danger'
					},
					confirm: {
						label: '<i class="fa fa-check"></i> Confirm',
						className: 'btn-success'
					}
				},
				callback: function (result) {
					if(result){
					postConfirmCatalogue()
					}
				}
			});
		
		}
	function postConfirmCatalogue(){
		var t=null;
		var sale = $('#sale').val();
		console.log("post confirm")
				if(sale=='Sale No.'||sale=='')
				return
				sale = parseInt(sale);
				var confirmurl = '{{ route('confirmqualitycatalogue.confirmqualitycatalogueajax',['sale'=>":sale"]) }}';
				confirmurl = confirmurl.replace(':sale', sale);
				console.log(confirmurl)
				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape. We are escaping, we are the escapers, meant to escape, does that make us escarpments!"); },
  					backdrop: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
				});
						$.ajax({
						url: confirmurl,
						type: 'GET',
						}).success(function(response) {
						console.log(t)
						clearInterval(t)
						t=null
						dialog.find('.bootbox-body').html('<div class="progress">'+
									'<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Generating Excel 100% complete</div></div>'+
									'<hr><div class="text-center" style="color: green"><i class="fa fa-exclamation-triangle fa-2x">Process completed</i></div>');
						}).error(function(error) {
							clearInterval(t)
						t=null
						dialog.find('.bootbox-body').html('<div class="progress">'+
									'<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Generating Excel 100% complete</div></div>'+
									'<hr><div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">An error occured while attempting to complete process. Contact Database Team</i></div>');
						});
//progress
			var progressurl = '{{ route('confirmqualitycatalogue.confirmqualitygetprogress') }}';
							console.log(progressurl)
							t = setInterval(function(){
								$.ajax({
								url: progressurl,
								dataType: 'json',
								}).done(function(response) {
									//console.log(response)
								    if(t!=null){
													dialog.find('.bootbox-body').html('<div class="progress">'+
			'<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: '+response.percent+'%" aria-valuenow="'+response.percent+'" aria-valuemin="0" aria-valuemax="100">Generating Excel '+response.percent+'% complete</div>'+
			'</div>');
	console.log(parseInt(response.percent)==100)
									if(parseInt(response.percent)==100){
									dialog.find('.bootbox-body').html('<div class="progress">'+
									'<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: '+response.percent+'%" aria-valuenow="'+response.percent+'" aria-valuemin="0" aria-valuemax="100">Generating Excel '+response.percent+'% complete</div></div>'+
									'<hr><div class="text-center" style="color: blue; display: inline-block;"><i class="fa fa-spinner fa-spin fa-2x"></i>'+response.sendingmail+'</div>');
									}
									
								}	
								}).error(function(error) {
									dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  An error occurred while trying to process this request</i></div>');
								});
							}, 1000); 
					
	}
</script>
@endpush