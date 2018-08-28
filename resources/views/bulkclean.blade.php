@extends ('layouts.dashboard')
@section('page_heading','Clean Bulk')

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


	<div class="col-md-8">



<?php 
		$outt_number = '';
		//$cgr_grower = '';
		$pty_name = '';
		$outt_gross_weight = '';
		$outt_bags = '';
		
		$outt_delivery_date = '';
		$mst_name = '';
		$outt_grn_number = '';
		$outt_date_milled = '';
		$outt_dmp_number = '';

		$csn_season_outt = '';

	if (count($pbulkoutturn) > 0) {
		$pboutt_outturn_number = $pbulkoutturn->boutt_outturn_number;
		$pboutt_boutt_dmp_number = $pbulkoutturn->boutt_dmp_number;
		$cgr_grower = $pbulkoutturn->cgr_id;
		$csn_season = $pbulkoutturn->csn_id;
		//echo $csn_season;


		$pboutt_percentage = $pbulkoutturn->boutt_percentage;
	} else {
		$pboutt_outturn_number = '';
		$pboutt_boutt_dmp_number = '';
		$csn_season = '';
		$cgr_grower = '';

		$pboutt_percentage = '';
	}

	if (count($outturns) > 0) {
		$outt_number = $outturns->outt_number;
		$csn_season_outt = $outturns->csn_season;
		if($outt_number == 0){
			$outt_number = $outturns->boutt_outturn_number;
			$csn_season_outt = $outturns->csn_id;			
		}

	} 


	if (count($cleancoffee) > 0 && isset($cleancoffee)) {
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




	        <form role="form" method="POST" action="bulkclean">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	
	        	<div class="row">

	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="pboutt_outturn_number" style="text-transform:uppercase; " placeholder="Search/Enter CB Outturn..."  value="{{ old('pboutt_outturn_number'). $pboutt_outturn_number }}"></input>

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


	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Mark/Grower</label>
		                <select class="form-control" name="coffee_grower">
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
		            <div class="form-group col-md-6">
			            <label>Add Outturn</label>
						
		            </div>
		        </div>

				<div class="row">

	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" style="text-transform:uppercase; " placeholder="Search Outturn..."  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButtonOutturn" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-2">
		            	
		                <select class="form-control" name="season">
		               		<option>Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season_outt ===  $season->csn_season) 
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@elseif ($csn_season_outt ===  $season->id)
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@else
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-2">
		                <select class="form-control" name="coffee_grade">
		                	<option>Grade</option>
							@if (count($CoffeeGrade) > 0)
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

		            <div class="form-group col-md-2">
		            	<button type="submit" name="submitOutturn" class="btn btn-lg btn-success btn-block">Add</button>
		            </div>


		        </div>

	

	        	
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submitPBOutturn" class="btn btn-lg btn-success btn-block">Update/ Add</button>
						<!-- <button type="submit" name="deletePBOutturn" class="btn btn-lg btn-success btn-block btn-danger">Delete</button> -->

		            </div>
		        </div>

	        </form>

    </div>
	<div class="col-md-3 col-md-offset-0" style="margin-left: -200px;">

		<h3>Outturns in Bulk</h3>
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
				Grower
			</th>
			<th>
				Weight
			</th>
			<th>
				Percentage
			</th>
		  </tr>
		</thead>
		<tbody>



			<?php
				$total_kilograms = 0;
				$total_percentage = 0;

				if (isset($outturn) && count($outturn) > 0) {
//print_r($outturn);
					foreach ($outturn->all() as $boutturns) {
						 //print_r($boutturns->outtgr_id);


						$total_kilograms += $boutturns->outtgr_net_weight;
						$total_percentage += $boutturns->outtgr_bulk_percentage; 
						$id = $boutturns->id;
						echo "<tr>";
							echo "<td>".$boutturns->outt_number.$boutturns->boutt_outturn_number."</td>";
							echo "<td>".$boutturns->cgrad_name."</td>";
							echo "<td>".$boutturns->cgr_grower."</td>";
							echo "<td>".$boutturns->outtgr_net_weight."</td>";
							echo "<td>".$boutturns->outtgr_bulk_percentage."</td>";
							echo "<td>"."<a href='/clean_delete/{$id}'  class='btn btn-success btn-danger'>Delete</a>";
						echo "</tr>";
					}
				}

			?>
			  <tr>
			    <td></td>
			    <td></td>
			    <td>Total:</td>
			    <?php
				    echo "<td>".$total_kilograms."</td>";
				    echo "<td>".$total_percentage."</td>";
				?>
				<td></td>
			  </tr>
		</tbody>
		</table>
	</div>


</div>
@stop

