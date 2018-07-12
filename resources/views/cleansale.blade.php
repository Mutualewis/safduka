@extends ('layouts.dashboard')
@section('page_heading','Sale')
@section('section')
<div class="col-sm-12">
	<div class="col-md-9 col-md-offset-3">
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
		$sample_weight = NULL;
		$cnetweight = NULL;
		$cwar_number = NULL;
		$bags = 0;
		$pockets = 0;
		$grade = NULL;
// $cb_name = '';
	if (isset($outturn) && count($outturn) > 0) {
		$outt_number = $outturn->outt_number;
		$cgr_grower = $outturn->cgr_grower;
		$pty_name = $outturn->pty_name;
		$outt_gross_weight = $outturn->outt_gross_weight;
		$outt_bags = $outturn->outt_bags;
		$csn_season = $outturn->csn_season;
		$outt_delivery_date = $outturn->outt_delivery_date;
		$mst_name = $outturn->mst_name;
		$outt_grn_number = $outturn->outt_grn_number;
		$outt_date_milled = $outturn->outt_date_milled;

		$outt_date_milled = date("m/d/Y", strtotime($outt_date_milled));
		$outt_delivery_date = date("m/d/Y", strtotime($outt_delivery_date));
		// echo $outturn->outt_number;
		//$date=DateTime::createFromFormat('Y-m-d',$outt_delivery_date);
		//print_r($date);
		//$outt_delivery_date = date_format($date,"d-m-Y");

	} else {
		$outt_number = '';
		$cgr_grower = '';
		$pty_name = '';
		$outt_gross_weight = '';
		$outt_bags = '';
		$csn_season = '';
		$outt_delivery_date = '';
		$mst_name = '';
		$outt_grn_number = '';
		$outt_date_milled = '';
	}

	if (isset($outturns) && $outturns !== NULL && count($outturns) > 0) {
		$outt_number = $outturns->outt_number;
		$cgr_grower = $outturns->cgr_id;
		$csn_season = $outturns->csn_id;
		//echo $csn_season;
		$pboutt_percentage = $outturns->boutt_percentage;
	}

	if (count($pbulkoutturn) > 0) {
		$outt_number = $pbulkoutturn->boutt_outturn_number;
		$cgr_grower = $pbulkoutturn->cgr_id;
		$csn_season = $pbulkoutturn->csn_id;
		//echo $csn_season;


		$pboutt_percentage = $pbulkoutturn->boutt_percentage;
	} 


	if (isset($saleinfo) && count($saleinfo) > 0) {
		$sale_cb_id = $saleinfo->cb_id;
		$sif_sale_no = $saleinfo->sl_id;
		$sif_lot = $saleinfo->sif_lot;
		$sif_rate = $saleinfo->sif_rate;
		$sif_value = $saleinfo->sif_value;
		$weight_sold = $saleinfo->sif_weight_sold;
		$sale_csn_id = $saleinfo->csn_id;

	} else {
		$sale_cb_id = '';
		$weight_sold = '';
		$sif_sale_no = '';
		$sif_lot = '';
		$sif_rate = '';
		$sif_value = '';
		$sale_csn_id = '';
	}
	if (count($cleancoffee) > 0) {
		$cnetweight = $cleancoffee->outtgr_net_weight;
		$sellable_status = $cleancoffee->selst_id;
		$sale_status = $cleancoffee->sst_id;
		// $warrant_id = $cleancoffee->cwar_id;
		$grade = $cleancoffee->cgrad_id;
		$clas = $cleancoffee->cc_id;
		$bags = $cleancoffee->outtgr_bags;
		$pockets = $cleancoffee->outtgr_pkts;
		$sample_weight = $cleancoffee->outtgr_sample_weight;
		$outtgr_remarks = $cleancoffee->outtgr_remarks;

	} else {
		$cnetweight = '';
		$sellable_status = '';
		$sale_status = '';
		$cboutt_percentage = '';
		$grade = '';
		$clas = '';
		$bags = 0;
		$pockets = 0;
		$sample_weight = '';
		$outtgr_remarks = '';
		// $warrant_id = '';

	}
	if (count($coffeewarrant) > 0) {
		$cwar_number = $coffeewarrant->cwar_number;
		// echo "Lewis".$cwar_number;
		$cwar_id = $coffeewarrant->cwar_id;

	} else {
		$cwar_number = '';
		$cwar_id = '';
	}


?>
	        <form role="form" method="POST" action="cleansale">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	<div class="row">


	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" placeholder="Search Outturn..." style="text-transform:uppercase"  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="outt_season">
		               		<option>Outturn Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season ===  $season->id)
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
		            <div class="form-group col-md-3">
		                <label>Grade</label>
		                <select class="form-control" name="coffee_grade">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
										@foreach ($CoffeeGrade->all() as $cgrade)
											@if ($grade ===  $cgrade->id)
												<option value="{{ $cgrade->id }}" selected="selected">{{ $cgrade->cgrad_name}}</option>
											@else
												<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>


		            <div class="form-group col-md-3">
		                <label>Grower</label>
		                <select class="form-control" name="coffee_grower" readonly>
		                	<option></option>
							@if (count($growers) > 0)
										@foreach ($growers->all() as $grower)

											@if ($cgr_grower ===  $grower->id)
												<option value="{{ $grower->id }}" selected="selected">{{ $grower->cgr_grower}}  ({{ $grower->cgr_mark }})</option>
											@else
												<option value="{{ $grower->id }}">{{ $grower->cgr_grower}}  ({{ $grower->cgr_mark }})</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                
		            </div>   

		        </div>



	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Grade Kgs.</label>
		                <input class="form-control"  id="grade_kilograms"  name="grade_kilograms" oninput="myFunction()" value="{{ old('grade_kilograms').$cnetweight  }}" readonly>
		            </div>
		            <div class="form-group col-md-3">
			            <div class="row">
				            <div class="form-group col-md-3">
				                <label >Bags</label>
				                <label id="bags" name="bags"><?php echo $bags;?></label>
				            </div>
				            <div class="form-group col-md-3">
				                <label >Pockets</label>
				                <label id="pockets" name="pockets" ><?php echo $pockets;?></label>
				            </div>	
				        </div>
			        </div>	
		        </div>
	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Warrant No.</label>
		                <input class="form-control" name="cwar_number" style="text-transform:uppercase" value="{{ old('cwar_number'). $cwar_number }}">
		            </div>	
		            <div class="form-group col-md-3">
		                <label>Weight Sold</label>
		                <input class="form-control" name="weight_sold" id="weight_sold"  style="text-transform:uppercase" value="{{ old('weight_sold'). $weight_sold }}">
		            </div>	
		        </div>
				<div class="row">
		            <div class="form-group col-md-3">
		                <label>Sample Kgs. Deducted</label>
		                <input class="form-control"  id="sample_grade_kilograms" name="sample_grade_kilograms" oninput="calculateTotal()" value="{{ old('sample_grade_kilograms').$sample_weight  }}">
		            </div>


		            <div class="form-group col-md-3">
		                <label>Total Kgs.</label>
		                <label class="form-control"  id="total_kilograms"  name="total_kilograms" readonly><?php echo $cnetweight - $sample_weight ;?></label>
		            </div>           
		        </div>


	        	<div class="row">
		            <div class="form-group col-md-3">
		            	<label>Sale No.</label>
		                <select class="form-control" name="sif_sale_no">
		               		<option>Sale No.</option>
							@if (isset($sale) && count($sale) > 0)
										@foreach ($sale->all() as $sales)
										@if ($sif_sale_no  ===  $sales->id)
											<option value="{{ $sales->id }}" selected="selected">{{ $sales->sl_no}}</option>
										@else
											<option value="{{ $sales->id }}">{{ $sales->sl_no}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>

		                <!-- <label>Sale No.</label> -->
		                <!-- <input class="form-control" name="sif_sale_no"  value="{{ old('sif_sale_no').$sif_sale_no  }}"> -->
		            </div>	 

		            <div class="form-group col-md-3">
		            	
		               	<label>Sale Season</label>
		                <select class="form-control" name="sale_season">
		                	<option></option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($sale_csn_id ===  $season->id)
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
		            <div class="form-group col-md-3">
		                <label>Lot No.</label>
		                <input class="form-control" name="sif_lot"  value="{{ old('sif_lot').$sif_lot  }}">
		            </div>	 
		            <div class="form-group col-md-3">
		            	
		               	<label>Buyer</label>
		                <select class="form-control" name="coffee_buyer">
		               		<option></option>
							@if (isset($buyer) && count($buyer) > 0)										
										@foreach ($buyer->all() as $buyers)
										@if ($sale_cb_id ===  $buyers->id)
											<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->cb_name}}</option>
										@else
											<option value="{{ $buyers->id }}">{{ $buyers->cb_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div> 

	        	</div>


		        <div class="row">
		            <div class="form-group col-md-3">
		                <label>Sale Status</label>
		                <select class="form-control" name="Sale_Status">
		                	<option></option>
							@if (isset($SaleStatus) && count($SaleStatus) > 0)
										@foreach ($SaleStatus->all() as $sst)
											@if ($sale_status ===  $sst->id)
												<option value="{{ $sst->id }}" selected="selected">{{ $sst->sst_name}}</option>
											@else
												<option value="{{ $sst->id }}">{{ $sst->sst_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>


		            <div class="form-group col-md-3">
		                <label>Salable Status</label>
		                <select class="form-control" name="Saleable_Status">
		                	<option></option>
							@if (isset($SaleableStatus) && count($SaleableStatus) > 0)
										@foreach ($SaleableStatus->all() as $selst)
											@if ($sellable_status ===  $selst->id)
												<option value="{{ $selst->id }}" selected="selected">{{ $selst->selst_name}}</option>
											@else
												<option value="{{ $selst->id }}">{{ $selst->selst_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>


	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Rate</label>
		                <input class="form-control" id="sif_rate" name="sif_rate" oninput="calculateValue()"  value="{{ old('sif_rate').$sif_rate  }}">
		            </div>	 
		            <div class="form-group col-md-3">
		                <label>Value</label>
		                <label class="form-control"  id="sif_value1"  name="sif_value1" readonly><?php echo $sif_value;?></label>
		                <input class="form-control" type="hidden" id="sif_value" name="sif_value" value="<?php echo $sif_value;?>"></input>
		            </div>	 
	        	</div>	        	

				<div class="row">
		            <div class="form-group col-md-6">
		           		<button type="submit" class="btn btn-lg btn-success btn-block">Save/Update</button>
		            </div>
		        </div>

	        </form>
    </div>
</div>
@stop
