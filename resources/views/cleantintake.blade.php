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

	if (count($cbulkoutturn) > 0) {
		$cboutt_outturn_number = $cbulkoutturn->boutt_outturn_number;
		$cboutt_percentage = $cbulkoutturn->boutt_percentage;

	} else {
		$cboutt_outturn_number = '';
		$cboutt_percentage = '';
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




	        <form role="form" method="POST" action="cleanintake">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	<?php 
	        	if (count($pbulkoutturn) > 0) {
	        		?>
		        	<div class="row">
		        		<div class="form-group col-md-3">
		        			<button  type="submit" name="nextButton" style="margin-left: 0px;" class="glyphicon glyphicon-menu-left"></button>
		        		</div>
		        		<div class="form-group col-md-3 col-md-offset-3">
		        			<button  type="submit" name="previousButton" style="padding-right: 0px;" class="glyphicon glyphicon-menu-right"></button>
		        		</div>
		        	</div>
		        	<?php
		        }
		        ?>
	        	<div class="row">

	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" style="text-transform:uppercase; " placeholder="Search/Enter CB Outturn..."  value="{{ old('outt_number'). $pboutt_outturn_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="season">
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
		            <div class="form-group col-md-3">
		            	<label>DMP No.</label>
		                <input class="form-control" name="outt_dmp_number" style="text-transform:uppercase" value="{{ old('outt_dmp_number'). $pboutt_boutt_dmp_number }}">
		            </div> 	
		            <div class="form-group col-md-3">
		                <label>Warrant No.</label>
		                <input class="form-control" name="cwar_number" style="text-transform:uppercase" value="{{ old('cwar_number'). $cwar_number }}">
		            </div>	
		         </div>

<!-- 	        	<div class="row">


	        	    <div class="form-group col-md-3">
		                <label>PBulk Outturn No.</label>
		                <input class="form-control" name="pboutt_outturn_number" style="text-transform:uppercase" value="{{ old('pboutt_outturn_number'). $pboutt_outturn_number}}">
		            </div> 



		            <div class="form-group col-md-3">
		                <label>Percentage</label>
		                <input class="form-control" name="ppercentage" value="{{ old('ppercentage').$pboutt_percentage  }}">
		            </div> 

		        </div> -->

<!-- 	        	<div class="row">


	        	    <div class="form-group col-md-3">
		                <label>Clean Bulk Outturn No.</label>
		                <input class="form-control" name="cboutt_outturn_number" style="text-transform:uppercase" value="{{ old('cboutt_outturn_number'). $cboutt_outturn_number}}">
		            </div> 



		            <div class="form-group col-md-3">
		                <label>Percentage</label>
		                <input class="form-control" name="cpercentage" value="{{ old('cpercentage').$cboutt_percentage  }}">
		            </div> 

		        </div>		 --> 

	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Grower</label>
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
		            <div class="form-group col-md-3">
		                <label>Grade Kgs.</label>
		                <input class="form-control"  id="grade_kilograms"  name="grade_kilograms" oninput="myFunction()" value="{{ old('grade_kilograms').$cnetweight  }}">
		            </div>
		            <div class="form-group col-md-2">
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
		                <label>Sample Kgs. Deducted</label>
		                <input class="form-control"  id="sample_grade_kilograms"  name="sample_grade_kilograms" value="{{ old('sample_grade_kilograms').$sample_weight  }}">
		            </div>


		            <div class="form-group col-md-3">
		                <label>Total Kgs.</label>
		                <input class="form-control"  id="total_kilograms"  name="total_kilograms" value="<?php echo $cnetweight - $sample_weight ;?>" readonly>
		            </div>           
		        </div>


	        	<div class="row">


		            <div class="form-group col-md-3">
		                <label>Sale Status</label>
		                <select class="form-control" name="Sale_Status">
		                	<option></option>
							@if (count($SaleStatus) > 0)
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
							@if (count($SaleableStatus) > 0)
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
		                <label>Grade</label>
		                <select class="form-control" name="coffee_grade">
		                	<option></option>
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

		            <div class="form-group col-md-3">
		                <label>Class</label>
		                <select class="form-control" name="coffee_class">
		                	<option></option>
							@if (count($CoffeeClass) > 0)
										@foreach ($CoffeeClass->all() as $class)
											@if ($clas ===  $class->id)
												<option value="{{ $class->id }}" selected="selected">{{ $class->cc_name}}</option>
											@else
												<option value="{{ $class->id }}">{{ $class->cc_name}}</option>
											@endif
										@endforeach
									
							@endif
		                </select>	
		            </div>
		        </div>


<!-- 	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Parchment Type</label>
		                <select class="form-control" name="parchment">
		                	<option></option>
							@if (count($ParchmentType) > 0)
										@foreach ($ParchmentType->all() as $pType)
											@if ($pty_name ===  $pType->pty_name)
												<option value="{{ $pType->id }}" selected="selected">{{ $pType->pty_name}}</option>
											@else
												<option value="{{ $pType->id }}">{{ $pType->pty_name}}</option>
											@endif
										@endforeach
									
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-3">
		                <label>Parchment Delivery Kilograms</label>
		                <input class="form-control" name="outturn_gross_weight"  value="{{ old('outt_gross_weight').$outt_gross_weight  }}">
		            </div>
		        </div>
 -->


	        	<div class="row">


					<div class="form-group col-md-6">
						<label>Remarks</label>
						<textarea class="form-control" rows="3" name="outtgr_remarks" value="{{ old('remarks').$outtgr_remarks  }}"><?php echo htmlspecialchars($outtgr_remarks); ?></textarea>
					</div>
	            </div>

				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" class="btn btn-lg btn-success btn-block">Update/ Add</button>
						
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
				Type
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

					foreach ($outturn->all() as $boutturns) {
							// print_r($season->acat_id);
						$total_kilograms += $boutturns->outt_gross_weight;
						$total_percentage += $boutturns->outt_bulk_percent; 
						echo "<tr>";
							echo "<td>".$boutturns->outt_number."</td>";
							echo "<td>".$boutturns->pty_name."</td>";
							echo "<td>".$boutturns->cgr_grower."</td>";
							echo "<td>".$boutturns->outt_gross_weight."</td>";
							echo "<td>".$boutturns->outt_bulk_percent."</td>";
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
			  </tr>
		</tbody>
		</table>
	</div>


</div>
@stop

