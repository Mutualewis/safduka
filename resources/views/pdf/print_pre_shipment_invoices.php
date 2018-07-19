<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>
    </head>

    <body>
	    <?php
	    	foreach ($getQueryOrganisation as $key => $value) {
	    		$owner = null;
	    		if ($value->cg_id != "10000001") {
	    			$owner = "Ibero";
	    		}

	    		$date = date("d.m.y");

				$total_weight = 0;

				foreach ($getQuery as $keyg => $valueg) {

					if ($valueg->cg_organisation == $value->cg_organisation) {

						$total_weight += $valueg->weight_total;						
					}
				}

				if ($total_weight >= 60) {
		?>
				<div class="push">
				    <div style="text-align: center; font-weight: bold; font-size: 13pt; ">
				    	<?php
				    		echo $value->cg_organisation;
				    	?>
				    </div>

				    	</br>
				    <div style="text-align: center; border-bottom: 1px solid #000000;">
				    	PRE-SHIPMENT INVOICE
				    </div>
				    	
					<div class="container" style="margin-top: 1cm;  border-bottom: 1px solid #000000;">
					<!-- <div class="container"> -->
						<table>
							<tr>
								<td width="150px" align="left">
									Messers <br>
								</td>
								<td width="150px" align="left">
									Invoice No.:
									<?php
										echo "KI-".$value->inv_no;
									?>

								</td>
							</tr>

							<tr>
								<td width="300px" align="left">
									BERNHARD ROTHFOS INTERCAFE AG 
								</td>
								<td width="150px" align="left">
									Invoice Date :
									<?php
										echo $date;
									?>
								</td>
							</tr>

							<tr>
								<td align="left">
									POSTFACH 1357
								</td>
								<td width="150px" align="left">
									<?php
										// if ($owner == null) {
											echo "Reference : ".$contract;
										// } else {
										// 	echo "Buyer's Ctr. : CC".$value->br_no;
										// }
									?>
									
								</td>
							</tr>

							<tr>
								<td align="left">
									CH-6301 ZUG
								</td>
								<td width="150px" align="left">
									Shipment :
									<?php
										echo "SI-".$shipment;
									?>
								</td>
							</tr>

							<tr>
								<td align="left">
									SWITZERLAND
								</td>
								<td width="150px" align="left">
															
								</td>
							</tr>


							<tr>
								<td align="left">
									
								</td>
								<td width="150px" align="left">
									<?php
										if ($owner == null) {
											echo "";
										} else {
											echo "Part of Direct";
										}
									?>	
								</td>
							</tr>


							<tr>
								<td align="left">
									
								</td>
								<td width="150px" align="left">
									
									<?php
										if ($owner == null) {
											echo "";
										} else {
											echo "Code: ".$value->cg_code;
										}
									?>
								</td>
							</tr>

							<tr>
	<!-- 							<td align="left">
									
								</td>
								<td width="150px" align="left">
									VAT: Reg.No
								</td> -->
							</tr>

							<tr>
								<td align="left">
									
								</td>
								<td width="150px" align="left">
									PIN No:
									<?php
										echo $value->pin;
									?>	
								</td>
							</tr>
								
								
							</tr>
						</table>
					</div>

					<div class="container" style="margin-top: 1cm; border-bottom: 1px solid #000000;">
						<table>
							<tr>
								<td width="150px" align="left">
									Goods :<br>
								</td>
								<td width="250px" align="left">
									GREEN COFFEE<br>
								</td>
							</tr>

							<tr>
								<td width="150px" align="left">
									Shipment Per:
								</td>
								<td width="250px" align="left">
									<?php
										echo $value->vessel;
									?>	
								</td>
							</tr>

							<tr>
								<td align="left">
									Country of Origin
								</td>
								<td width="300px" align="left">
									<?php
										echo $value->ctr_name;
									?>	
								</td>
							</tr>
								
							</tr>
						</table>
					</div>

					<div class="container" style="margin-top: 1cm; border-bottom: 1px solid #000000;">
						<table>
							<tr>
								<td width="150px" align="left">
									Marks<br>
								</td>
								<td width="250px" align="left">
									<?php
										$total_bags = 0;

										$total_weight = 0;

										foreach ($getQuery as $keyg => $valueg) {

											if ($valueg->cg_organisation == $value->cg_organisation) {

												$approved_weight = $approved_weight;

												if($approved_weight == null){

													$approved_weight = $weight;

												}

												$total_weight = (($valueg->weight_total/60)/($sum_total/60)) * ($approved_weight/60);

												$total_bags += $total_weight;
												
											}
										}
										echo number_format($total_bags, 0, '', ',')
									?>								
									Bags<br>
								</td>
							</tr>

							<tr>
								<td width="150px" align="left">
									<?php
										echo $value->mark;
									?>	
								</td>
								<td width="150px" align="left">
									Washed Kenya Arabica Coffee
								</td>
							</tr>

							<tr>
								<td align="left">
									
								</td>
								<td width="250px" align="left">
									<?php
										echo $value->sct_description.", Crop ".$value->csn_season;
									?>	
								</td>
							</tr>

							<tr>
								<td align="left">
									COFFEE PRODUCE OF KENYA
								</td>
								<td width="250px" align="left">
									Weighing 
									<?php
										$weighing = $total_bags*60;
										echo number_format($weighing, 2, '.', ',');
									?>
									Kilos Nett
								</td>
							</tr>
								
							</tr>
						</table>
					</div>

					<div class="container" style="margin-top: 1cm;">
					<?php
						$total_bags = 0;
						$total_value = 0;
						$count = 0;
					?>
						<table>
							<tr>
								<th align="left">
									Contract<br>
								</th>
								<th align="left">
									Bags<br>
								</th>
								<th width="250px" align="left">
									Price<br>
								</th>
								<th width="250px" align="right">
									Value<br>
								</th>
							</tr>						
							<?php

								$total_weight = 0;

								foreach ($getQuery as $keyg => $valueg) {

									if ($valueg->cg_organisation == $value->cg_organisation) {

										$approved_weight = $approved_weight;

										if($approved_weight == null){

											$approved_weight = $weight;

										}

										$bags = (($valueg->weight_total/60)/($sum_total/60)) * ($approved_weight/60);

										$total_bags += $bags;


										// $total_weight = ($valueg->weight_total/$sum_total) * $approved_weight;

										//$bags = number_format($bags, 0, '', ',');

										if ($bags >= 1) {

											// $total_weight = round($total_weight/60);

											$total_weight = $bags * 60;

											// $total_bags += round($total_weight/60);

											$count += 1;
											
											$total_value += $valueg->price * ($total_weight/50);
											
											echo "<tr>";
												echo "<td align='left'>CC". $valueg->br_no."</td>";
												echo "<td align='left'>". number_format($bags, 0, '', ',') ." </td>";
												echo "<td align='left'>". number_format($valueg->price, 2, '.', ',')." per 50Kgs Instore Nrb</td>";
												echo "<td align='right'>". number_format($valueg->price * ($total_weight/50), 2, '.', ',')." </td>";
											echo "</tr>";		

										}								

									}

								}
							?>						
							<tr>
								<td align="left">
								</td>
								<td align="left">
									<br>
								</td>
								<td align="left">
									VAT 0%
								</td>
								<td align="right">
									0.00<br>
								</td>
							</tr>

							<tr>
								<td align="left">
									<?php
										echo $count;
									?>								
									<br>
								</td>
								<td align="left">
									<?php
										echo number_format($total_bags, 0, '', ','). " bags";
									?>							
									<br>
								</td>
								<td align="left">
									Total invoice value   US<br>
								</td>
								<td align="right" style="border-bottom: 1px solid #000000; border-top: 1px solid #000000;">
									<?php
										echo number_format($total_value, 2, '.', ',');
									?><br>
								</td>
							</tr>

								
						</table>
					</div>
				

					<div class="container" style="margin-top: 1cm;">
						<table>
							<tr>
								<td width="150px" align="left">
									Payment<br>
								</td>
							</tr>

							<tr>
								<td width="150px" align="left">
									PAYMENT AS PER CONTRACT
								</td>
							</tr>

							<tr>
								<td align="left">
									B/Landing no.: 
								</td>
								<td width="250px" align="left">
									Dated
								</td>
							</tr>

							<tr>
								<td align="left">
									ICO
								</td>
								<td width="250px" align="left">
									
								</td>
							</tr>

							<tr>
								<td align="left">
									Weight Note:
								</td>
								<td width="250px" align="left">								
								</td>
							</tr>
								
							</tr>
						</table>
						<div style="text-align: center;">
							<?php
								if ($owner == null) {
									echo $value->cg_organisation;
								} else {
									echo "Issued by <strong>Tropical Farm Management Kenya Ltd.</strong> <br> On Behalf of the Seller as Provided for by the Coffee Act";
								}
							?>
						</div>

					</div>


				
				</div>
				<br>

		<?php
			}

		}
		
		?>

    </body>



		<style>
			.footer, .space{
				position: fixed;
				height: 250px;
				bottom: 0;
				width: 100%;
				text-align: center;
			}

			html, body{
				height: 100%;
				margin: 0;
			    font-size: 10pt;

				/*position: fixed;*/

			}

/*			@page {				
			    header: page-header;
			    footer: page-footer;
			}

    #page-header { position: fixed; top: -50px; left: 0px; right: 0px; height: 50px; background-color: orange; padding: .5em; text-align: center; }
*/
			table {
			    border-collapse: collapse;
			    width: 100%;
			    position: inherit;

			}
		/*	tr:nth-child(even){
				background-color: #f2f2f2;
			}*/
			th, td {
			    text-align: left;
			    padding: 3px;

			}

			tr {
				page-break-inside: avoid;
			}


			.push {
				page-break-after: always;
			}


			
			/*tr:nth-child(even){background-color: #f2f2f2}*/
			/*h3   {color: blue;}*/
		</style>

</html>