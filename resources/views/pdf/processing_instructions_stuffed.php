<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>

    </head>
    <body>
		<!-- <htmlpageheader name="page-header"> -->
		    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt; margin-bottom: -20px;">
	    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombinedik.png'; ?>" width="206mm" />
		    </div>
		<!-- </htmlpageheader> -->
<?php
		$warehouse = null;
		if (isset($sale_lots) && count($sale_lots) > 0) {
		    foreach ($sale_lots->all() as $value) {
		    	$warehouse = $value->warehouse;
	    	}
		}
?>


		<div class="container" style="margin-top: 1cm;">
			<table>
				<tr>
					<td width="10px" align="right">
						To:
					</td>
					<td align="left">
						<?php echo $TO; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						<!-- Att: -->
					</td>
					<td align="left">
						<?php echo $ATTENTION ; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						From:
					</td>
					<td align="left">
						<?php echo $FROM; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="10px" align="right">
						Date:
					</td>
					<td align="left">
						<?php echo $date; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						Reference:
					</td>
					<td align="left">
						<?php echo $reference; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						No.:
					</td>
					<td align="left">
						<?php echo $ref_no . $contractNumber; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						Season:
					</td>
					<td align="left">
						<?php echo $seasonName; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						Instruction:
					</td>
					<td align="left">
						<?php echo $process_type; ?> <br>
					</td>
				</tr>
				
			</table>
			<p>
				Please do <b><?php echo strtolower($process_type); ?></b> to the following coffee <?php echo strtolower($process_instructions); ?>.<?php echo $process_other_instructions; ?>
			</p>


			<table class="table table-striped" style="position: inherit;">
			<thead>
			  <tr>
					<th>
						Sale
					</th>				
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
						Bags
					</th>
					<th>
						Pkts
					</th>
					<th>
						Kilos
					</th>	
					<th>
						Price
					</th>	
					<th>
						Value
					</th>	
					<th>
						Diff
					</th>	
					<th>
						Location
					</th>
				  </tr>
				</thead>



					<?php
						$total_bags    = 0;
						$total_pkts    = 0;
						$count         = 0;
						$total         = 0;
						$total_bags = 0;
						$total_pkts = 0;
						$count = 0;
						$count_green = 0;
						$count_process = 0;
						$count_screen = 0;
						$count_cup = 0;
						$total_price = 0;
						$diff = 0;
						$count_confirmed = 0;
						$total_cost = 0;
						$total_diff = 0;
						$total = 0;
						$total_fob = 0;

						$bric_value = 0;
						$total_bric_value = 0;


						if (isset($StockView) && count($StockView) > 0) {

						    foreach ($StockView->all() as $value) {

						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }


								$total += $value->weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($value->weight)/50 * ($value->price) ;

					    		$diff = ($value->price)/1.1023 - ($value->hedge);
					    		$diff = round( $diff, 2, PHP_ROUND_HALF_UP);

					    		$total_cost += ($value->weight) * ($value->price);
					    		$total_diff += ($value->weight) * ($diff);


								$bric_value = $value->price + $value->sl_margin;

								$bric_value = ($value->weight)/50 * $bric_value;


					    		if ($value->fobprice != null) {
					    			// $total_value = $total_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
					    			$bric_value = $bric_value + ($value->weight)/50 *$value->fobprice;
					    		}

					    		$value_ = str_replace( ',', '', $value->value );

								$total_price += $value_;

								$total_bric_value += $bric_value;

						        $name = substr($value->name, 0, 8);
						        echo "<td>" . $value->sale . "</td>";
						        echo "<td>" . $value->lot . "</td>";
						        echo "<td>" . $value->csn_season . "</td>";						        
						        echo "<td>" . $value->outturn . "</td>";
						        echo "<td>" . $value->mark . "</td>";
						        echo "<td>" . $value->grade . "</td>";						        
						        echo "<td>" . $value->bags . "</td>";
						        echo "<td>" . $value->pockets . "</td>";
						        echo "<td>" . $value->weight . "</td>";
						        echo "<td>" . $value->price . "</td>";
						        echo "<td>" . $value->value . "</td>";
						        echo "<td>" . $value->differential . "</td>";
						        echo "<td>" . $value->location . "</td>";
						        // echo "<td>" . $value->pending_process_all . "</td>";
						        echo "</tr>";

						    }
						}
						?>
					    <tr  style='background-color: #f2f2f2'>
											    <?php
						echo "<td>" . $count . " Lots</td>";
						?>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											    <?php
						echo "<td>" . $total_bags . "</td>";
						?>
											    <?php
						echo "<td>" . $total_pkts . "</td>";
						echo "<td>" . $total . " Kgs</td>";
				 
				    	if ($total_cost != NULL && $total != NULL) {
					   		echo "<td>".round($total_cost/$total, 3, PHP_ROUND_HALF_UP)." </td>";
				    	}

					    echo "<td>$".round($total_price, 2, PHP_ROUND_HALF_UP)."</td>";
					    

				    	if ($total_diff != NULL && $total != NULL) {
					   		echo "<td>".round($total_diff/$total, 2, PHP_ROUND_HALF_UP)." </td>";
				    	}						    
					    
						echo "<input type='hidden' name ='total_cost' value='".round($total_cost/$total, 3, PHP_ROUND_HALF_UP)."'>";
						echo "<input type='hidden' name ='total_kilos' value='$total'>";
					

						?>
						<td></td>
						<td></td>

					  </tr>
			</table>






		<div class="push"></div>



		<br>











		</div>



		<footer class="footer">
			<p>
				<strong>Number of Bags <?php echo number_format((float)$total/60, 2, '.', ''); ?></strong><br><br>
				Signed on behalf of Ibero Kenya Ltd. <br><br>
				<?php echo $person_fname." ".$person_sname. "_________________________"; ?><br><br>
									  <?php echo "Judith Murimi_________________________"; ?> 
				<br>
			</p>
			<br>
			<br>

		<!-- <htmlpagefooter name="page-footer" align="left"> -->
		    <div style="text-align: left; border-top: 1px solid #000000; font-size: 11pt;"><strong>Ibero Kenya Ltd</strong></div>
		    <div style="text-align: left; font-size: 10pt;">A Company of Neumann Kaffee Gruppe</div>
		    <div style="text-align: left; font-size: 10pt;">Sukari Industrial Estate - Northern Bypass Road - Ruiru/Nairobi</div>
		    <div style="text-align: left; font-size: 10pt;">P.O.BOX 47882-00100 - Nairobi - Kenya</div>
		    <div style="text-align: left; font-size: 10pt;">Tet +254 20 2343009/2066886</div>
		    <div style="text-align: left; font-size: 10pt;">Tel +254 733 893900/729407495</div>
		    <div style="text-align: left; font-size: 10pt;">Fax +254 20 2056428</div>
		    <div style="text-align: left; font-size: 10pt;">info.iberoke@ngea.com</div>

			<!-- <div style="text-align: center; font-weight: bold; font-size: 13pt;">Page {PAGENO}</div>
		</htmlpagefooter> -->
		</footer>



    </body>

		<style>

			html, body{
				height: 100%;
				margin: 0;
			    font-size: 10pt;

				/*position: fixed;*/

			}
			.container
			{

			/*width: 90%;*/
			margin-left:5%;
    		margin-right:5%;
			min-height: 100%;
			margin-bottom: -50px;
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
			    font-size: 11px;
			}

			tr {
				page-break-inside: avoid;
			}

			.push, .footer{
				position: fixed;
				height: 250px;
				bottom: 0;
				width: 100%;
			}
			/*tr:nth-child(even){background-color: #f2f2f2}*/
			/*h3   {color: blue;}*/
		</style>

</html>