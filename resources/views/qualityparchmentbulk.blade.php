@extends ('layouts.dashboard')
@section('page_heading','Parchment Bulk Quality')
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
	$boutt_outturn_number = '';
	$cgr_grower = '';
	$pty_name = '';
	$outt_gross_weight = '';
	$outt_bags = '';
	$csn_season = '';
	$outt_delivery_date = '';
	$mst_name = '';
	$outt_grn_number = '';
	$outt_date_milled = '';




	if (isset($pbulkoutturn) && count($pbulkoutturn) > 0) {
		$boutt_outturn_number = $pbulkoutturn->boutt_outturn_number;
		$cgr_grower = $pbulkoutturn->cgr_grower;
		$pty_name = $pbulkoutturn->pty_name;
		$csn_season = $pbulkoutturn->csn_id;
		//$outt_gross_weight = $pbulkoutturn->csn_id;


		// $outt_gross_weight = $outturn->outt_gross_weight;
		// $outt_bags = $outturn->outt_bags;
		
		// $outt_delivery_date = $outturn->outt_delivery_date;
		// $mst_name = $outturn->mst_name;
		// $outt_grn_number = $outturn->outt_grn_number;
		// $outt_date_milled = $outturn->outt_date_milled;

		// $outt_date_milled = date("m/d/Y", strtotime($outt_date_milled));
		// $outt_delivery_date = date("m/d/Y", strtotime($outt_delivery_date));
		// echo $outturn->outt_number;
		//$date=DateTime::createFromFormat('Y-m-d',$outt_delivery_date);
		//print_r($date);
		//$outt_delivery_date = date_format($date,"d-m-Y");
	} 
// 'outturnquality', 'QualityAnalysis'


	if (isset($outturnquality) && count($outturnquality) > 0) {
		$oqlty_aqr_serial = $outturnquality->oqlty_aqr_serial;
		$ct_id = $outturnquality->ct_id;
		$cc_id = $outturnquality->cc_id;
		$oqlty_moisture = $outturnquality->oqlty_moisture;
		$oqlty_milling_loss = $outturnquality->oqlty_milling_loss;
		$oqlty_remarks = $outturnquality->oqlty_remarks;

	} else {
		$oqlty_aqr_serial = '';
		$ct_id = '';
		$cc_id = '';
		$oqlty_moisture = '';
		$oqlty_milling_loss = '';
		$oqlty_remarks = '';
	}				   
		$SC18p = '';
		$SC16p = '';
		$SC14p = '';
		$THESBp = '';
		$mbunip = '';
		$SC18p_cc_id = '';
		$SC16_cc_id = '';
		$SC14_cc_id = '';
		$THESB_cc_id = '';
		$mbuni_cc_id = '';
	if (isset($QualityAnalysis) && count($QualityAnalysis) > 0) {

		foreach ($QualityAnalysis->all() as $qanalysis) {
				// print_r($season->acat_id);

			if ($qanalysis->acat_id === 1){
				$SC18p = $qanalysis->qanl_value;
			}
			if ($qanalysis->acat_id === 2){
				$SC16p = $qanalysis->qanl_value;
			}
			if ($qanalysis->acat_id === 3){
				$SC14p = $qanalysis->qanl_value;
			}
			if ($qanalysis->acat_id === 4){
				$THESBp = $qanalysis->qanl_value;
			}
			if ($qanalysis->acat_id === 5){
				$mbunip = $qanalysis->qanl_value;
			}
			if ($qanalysis->acat_id === 6){
				$SC18p_cc_id = intval($qanalysis->qanl_value);
			}
			if ($qanalysis->acat_id === 7){
				$SC16_cc_id = intval($qanalysis->qanl_value);
			}
			if ($qanalysis->acat_id === 8){
				$SC14_cc_id = intval($qanalysis->qanl_value);
			}
			if ($qanalysis->acat_id === 9){
				$THESB_cc_id = intval($qanalysis->qanl_value);
			}
			if ($qanalysis->acat_id === 10){
				$mbuni_cc_id = intval($qanalysis->qanl_value);
			}

		}
	} 
?>
	        <form role="form" method="POST" action="qualityparchmentbulk">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">


	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="boutt_outturn_number"  style="text-transform:uppercase" placeholder="Search/Enter PB Outturn..."  value="{{ old('boutt_outturn_number'). $boutt_outturn_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="pbulkseason">
		               		<option>Season</option>
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
		            <?php echo "<strong>".$outt_gross_weight." KGS </strong>"; ?>

	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>AQR Serial No.</label>
		                <input class="form-control" name="aqr_serial" style="text-transform:uppercase" value="{{ old('aqr_serial'). $oqlty_aqr_serial }}">
		            </div>	 


		            <div class="form-group col-md-3">
		                <label>Crop Type</label>

		                <select class="form-control" name="crop_type">
		                	<option></option>
							@if (count($CropType) > 0)
										@foreach ($CropType->all() as $ctType)										
											@if ($ct_id ===  $ctType->id)
												<option value="{{ $ctType->id }}" selected="selected">{{ $ctType->ct_name}}</option>
											@else
												<option value="{{ $ctType->id }}">{{ $ctType->ct_name}}</option>
											@endif
										@endforeach
									
							@endif
		                </select>	
		            </div>
	        	</div>


	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Moisture</label>
		                <input class="form-control" name="moisture" value="{{ old('moisture'). $oqlty_moisture }}">
		            </div>	 
		            <div class="form-group col-md-3">
		                <label>Milling Loss</label>
		                <input class="form-control" name="milling_loss" value="{{ old('milling_loss'). $oqlty_milling_loss }}">
		            </div>	 
	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-7">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>SC18(AA,TT,E)</th>
									<th>SC16(AB,TT,B)</th>
									<th>SC14(C,T,B)</th>
									<th>(T,HE,SB)</th>
									<th>Mbuni</th>
								</tr>
							</thead> 
							<tbody>
								<tr class="success">
									<td><input class="form-control" placeholder="%" name="SC18p" value="{{ old('SC18p'). $SC18p }}"></td>
									<td><input class="form-control" placeholder="%" name="SC16p" value="{{ old('SC16p'). $SC16p }}"></td>
									<td><input class="form-control" placeholder="%" name="SC14p" value="{{ old('SC14p'). $SC14p }}"></td>
									<td><input class="form-control" placeholder="%" name="THESBp" value="{{ old('THESBp'). $THESBp }}"></td>
									<td><input class="form-control" placeholder="%" name="mbunip" value="{{ old('mbunip'). $mbunip }}"></td>
								</tr>
								<tr class="success">
									<td>
						                <select class="form-control" name="SC18p_cc_id">
						                	<option></option>
											@if (count($Class) > 0)
														@foreach ($Class->all() as $class)
															@if ($SC18p_cc_id ===  $class->id)
																<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
															@else
																<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
															@endif
														@endforeach
													
											@endif
						                </select>	
									</td>
									<td>
						                <select class="form-control" name="SC16_cc_id">
						                	<option></option>
											@if (count($Class) > 0)
														@foreach ($Class->all() as $class)
															@if ($SC16_cc_id ===  $class->id)
																<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
															@else
																<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
															@endif
														@endforeach
													
											@endif
						                </select>	
									</td>
									<td>
						                <select class="form-control" name="SC14_cc_id">
						                	<option></option>
											@if (count($Class) > 0)
														@foreach ($Class->all() as $class)
															@if ($SC14_cc_id ===  $class->id)
																<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
															@else
																<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
															@endif
														@endforeach
													
											@endif
						                </select>										
									</td>
									<td>
						                <select class="form-control" name="THESB_cc_id">
						                	<option></option>
											@if (count($Class) > 0)
														@foreach ($Class->all() as $class)
															@if ($THESB_cc_id ===  $class->id)
																<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
															@else
																<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
															@endif
														@endforeach
													
											@endif
						                </select>	
									</td>
									<td>
						                <select class="form-control" name="mbuni_cc_id">
						                	<option></option>

											@if (count($Class) > 0)
														@foreach ($Class->all() as $class)
															@if ($mbuni_cc_id ===  $class->id)
																<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
															@else
																<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
															@endif
														@endforeach
													
											@endif
						                </select>	
									</td>
								</tr>
							</tbody>
						</table>	
					</div>
				</div>



	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Overall Class</label>
		                <select class="form-control" name="overall_class">
		                	<option></option>
							@if (count($Class) > 0)
										@foreach ($Class->all() as $class)
											@if ($cc_id ===  $class->id)
												<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
											@else
												<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
											@endif
										@endforeach
									
							@endif
		                </select>	
		            </div>
		            <div class="form-group col-md-3">
						<label>Remarks</label>
						<textarea class="form-control" rows="3" name="remarks" value="{{ old('remarks') }}"><?php echo htmlspecialchars($oqlty_remarks); ?></textarea>
		            </div>
		        </div>


				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" class="btn btn-lg btn-success btn-block">Add/Update</button>
		            </div>
		        </div>

	        </form>
    </div>
</div>
@stop
