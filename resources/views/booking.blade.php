@extends ('layouts.dashboard')
@section('page_heading','Booking')

@section('section')

<div class="col-md-14 col-md-offset-0">

	<div class="row">
		<div class="col-md-8">
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


	<div class="col-md-7">



<?php 
	
	// $booking
		if (isset($ref_no)) {
			$ref = $ref_no;
		} else {
			$ref = 0;
			
		}
			$agt_id = NULL;
			$agt_name = NULL;
			$agt_code = NULL;		

		if (isset($booking)) {
			$ref = $booking->ref_no;
			$cgr_grower_mark = $booking->cgr_mark;
			$agt_id = $booking->agtid;
			$date = $booking->delivery_date;
			$date = date("m/d/Y", strtotime($date));
			//print_r($date);

		} else {
			// $ref_no = 0;
			$cgr_grower_mark = NULL;
			$date = NULL;
		}


		// if (isset($agent)) {
		// 	$agt_id = $agent->id;
		// 	$agt_name = $agent->agt_name;
		// 	$agt_code = $agent->agt_code;

		// } else {

			
		// }


		$cb_id = 0;





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

	if (isset($pbulkoutturn) ) {
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

	if (isset($outturns)) {
		$outt_number = $outturns->outt_number;
		$csn_season_outt = $outturns->csn_season;

	} else {
		$outt_number = '';
		$csn_season_outt = '';
	}


	if (isset($cleancoffee)) {
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

	if (isset($coffeewarrant)) {
		$cwar_number = $coffeewarrant->cwar_number;
		// echo "Lewis".$cwar_number;
		$cwar_id = $coffeewarrant->cwar_id;

	} else {
		$cwar_number = '';
		$cwar_id = '';
	}

	
?>




	        <form role="form" method="POST" action="booking">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	
	        	<div class="row">

	        		<div class="form-group col-md-4">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="ref" id ="ref" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{$ref }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
					<div class="form-group col-md-4">
						<!-- <label>Delivery Date</label> -->
						<input class="form-control" id="date" name="date" placeholder="Delivery Date (MM/DD/YYY)" type="text" value="{{ old('date').$date }}"/>
					</div>

	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-8">
		                <label>Producer/Grower</label>
		                <select class="form-control" name="coffee_grower">
		                	<option></option>
							@if (count($growers) > 0)
										@foreach ($growers->all() as $grower)

											@if ($cgr_grower_mark ===  $grower->cgr_mark)
												<option value="{{ $grower->id }}" selected="selected">{{ $grower->cgr_grower}}  ({{ $grower->cgr_mark }}) - {{ $grower->cgr_organization}}</option>
											@else
												<option value="{{ $grower->id }}">{{ $grower->cgr_grower}}  ({{ $grower->cgr_mark }}) - {{ $grower->cgr_organization}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                
		            </div>    
		            

		        </div>

	        	<div class="row">
		            <div class="form-group col-md-8">
		            	
		               	<label>Controller/Agent</label>
		                <select class="form-control" name="coffee_agent">
		                <!-- <?php // print_r($agent. "lewis");?> -->
		               		<option></option>
							@if (isset($agent) && count($agent) > 0)										
										@foreach ($agent->all() as $agents)
										@if ($agt_id ===  $agents->id)
											<option value="{{ $agents->id }}" selected="selected">{{ $agents->agt_name}}</option>
										@else

											<option value="{{ $agents->id }}">{{ $agents->agt_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div> 

	        	</div>

				<div class="row">
		            <div class="form-group col-md-8">
			            <label>Add Delivery Item</label>
						
		            </div>
		        </div>

				<div class="row">

		            <div class="form-group col-md-3">
		                <select class="form-control" name="delivery">
		                	<option>Delivery Type</option>
							@if (count($ParchmentType) > 0)
										@foreach ($ParchmentType->all() as $pType)
											<option value="{{ $pType->id }}">{{ $pType->pty_name }}</option>
										@endforeach
									
							@endif
		                </select>		
		            </div>
		            <div class="form-group col-md-3">
		                <input class="form-control" placeholder="BAGS" name="bags" value="{{ old('outt_bags') }}">
		            </div>

		            <div class="form-group col-md-2">
		            	<button type="submit" name="submitOutturn" class="btn btn-lg btn-success btn-block">Add</button>
		            </div>


		        </div>

	

	        	
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submitPBOutturn" class="btn btn-lg btn-success btn-block">Update/ Add</button>
						
		            </div>

		            <div class="form-group col-md-2">
		            	<button type="submit" name="printbutton" class="btn btn-lg btn-success btn-block">Print</button>
		            </div>
		        </div>

	        </form>

    </div>
	<div class="col-md-5 col-md-offset-0">
		<form role="form" method="POST" action="booking">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Items in Booking</h3>
				<table class="table table-striped">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Delivery Type
					</th>
					<th>
						Bags
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$total_bags = 0;
						$count = 0;

						if (isset($bookingitem) && count($bookingitem) > 0) {

							foreach ($bookingitem->all() as $bookingitems) {
									// print_r($season->acat_id);
								$total_bags += $bookingitems->bags; 
								$count += 1;
								$id = $bookingitems->id;

								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$bookingitems->pty_name."</td>";
									echo "<td>".$bookingitems->bags."</td>";
									echo "<input type='hidden' name ='itemId' value='$id'>";
									echo "<input type='hidden' name ='$count' value='$id'>";
									echo "<td>"."<a href='/booking_delete/{$id}'  class='btn btn-success btn-danger' >Delete</a>";
								echo "</tr>";

// <input type='submit' name='deletebutton' class='btn btn-lg btn-success btn-block' id= '$id' . ' value='Delete' >$id
							}
						}
					?>
					  <tr>
					  	<td></td>
					    <td>Total:</td>
					    <?php
						    echo "<td>".$total_bags."</td>";
						?>
						<td></td>
					  </tr>
				</tbody>
				</table>
		</form>
	</div>


</div>
@stop

