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
						<?php echo $process_type ."-Chops"; ?> <br>
					</td>
				</tr>
				
			</table>
			<p>
				Please do <b><?php echo strtolower($process_type); ?></b> to the following coffee <?php echo strtolower($process_instructions); ?>.<?php echo $process_other_instructions; ?>
			</p>

			<?php
				$total_bags    = 0;
				$total_pkts    = 0;
				$count         = 0;
				$total         = 0;

				if (isset($StockView) && count($StockView) > 0) {

				    foreach ($StockView->all() as $value) {

				        $total += $value->weight;

				    }
				}
			?>
			<table class="table table-striped" style="position: inherit;">
				<thead>
					<tr>
						<th>
							Season
						</th>						
						<th>
							Outturn
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
						<?php
					        $total_bags += $total/60;
							$total_others = 0;


							$chops = ceil($total_bags/360);
							for ($i=1; $i <= $chops ; $i++) { 
								echo "<th>".$i.substr(date('jS', mktime(0,0,0,1,($i%10==0?9:($i%100>20?$i%10:$i%100)),2000)),-2)."</th>";
							}
					        $total_others += ceil($total_bags/$chops);

						?>
					  
					</tr>
				</thead>
					<?php
						$total_bags    = 0;
						$total_bags_sum = 0;
						$total_pkts    = 0;
						$count         = 0;
						$total         = 0;
						$total_first = 0;
						$total_others_chop = 0;

						$chops_array = array();
						if (isset($StockView) && count($StockView) > 0) {

						    foreach ($StockView->all() as $value) {

						        $total += $value->weight;
						        $count += 1;
						        $id = $value->id;
						        $total_bags += $value->bags;
						        $total_bags_sum += $value->bags;
						        $total_pkts += $value->pockets;


						        $bag_count = $value->bags;
						        
						        // $total_others += ceil($bag_count/$chops);

								for ($i=2; $i <= $chops ; $i++) { 
									$total_others_chop += ceil($bag_count/$chops);
								}

								$total_first += ($total_bags_sum - $total_others_chop); 



						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }
						        $name = substr($value->name, 0, 8);
						        echo "<td>" . $value->csn_season . "</td>";						        
						        echo "<td>" . $value->outturn . "</td>";
						        echo "<td>" . $value->grade . "</td>";						        
						        echo "<td>" . $value->bags . "</td>";
						        echo "<td>" . $value->pockets . "</td>";
						        echo "<td>" . $value->weight . "</td>";
						        echo "<td>" . ($total_bags_sum - $total_others_chop) . "</td>";
								for ($i=2; $i <= $chops ; $i++) { 
									echo "<td>".ceil($bag_count/$chops)."</td>";
								}

						        echo "</tr>";
						        $total_bags_sum = 0;
						        $total_others_chop = 0;

						    }
						}
						?>
					    <tr  style='background-color: #f2f2f2'>
							    <?php
								echo "<td>" . $count . " Lots</td>";
								?>
														<td></td>
														<td></td>
													    <?php
								echo "<td>" . $total_bags . "</td>";
								?>
													    <?php
								echo "<td>" . $total_pkts . "</td>";
								echo "<td>" . $total . " Kgs</td>";
								echo "<td>" . $total_first . "</td>";
								for ($i=2; $i <= $chops; $i++) { 
									echo "<td>".$total_others."</td>";
								}

								?>
								<td></td>
								<td></td>

					  </tr>
					  <tr>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<?php
					  			echo "<td>+" . $total_pkts . "Kgs</td>";
								for ($i=2; $i <= $chops; $i++) { 
									echo "<td></td>";
								}
							?>
					  </tr>
					  <tr style='background-color: #f2f2f2'>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<?php
					  			echo "<td>" . ceil($total_first + ($total_pkts/60)) . "</td>";
								for ($i=2; $i <= $chops; $i++) { 
									echo "<td>".$total_others."</td>";
								}
							?>
					  </tr>

			</table>







		<div class="push"></div>



		<br>



		</div>



		<footer class="footer">
			<p>
				<strong>Total Number of Bags <?php echo $total_bags; ?></strong><br><br>
				<strong>Total Number of Chops <?php echo $chops; ?></strong><br><br>
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