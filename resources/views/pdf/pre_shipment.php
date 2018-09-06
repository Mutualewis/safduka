<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>

    </head>
    <?php
// $date = "Mar 03, 2011";
//$date2 = new DateTime($date2);

// $validdate = $date2->modify('friday');

//$validdate = strtotime("friday", $date2);

//$validdate = strtotime('next friday');
// $validdate = strtotime("+7 day", $validdate);
// $validdate =  date_format($validdate,"d D M Y");

// $friday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));

//echo date('M d, Y', $date);
?>
    <body>
		<!-- <htmlpageheader name="page-header"> -->
		    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt; margin-bottom: -20px;">
	    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombinedik.png'; ?>" width="206mm" />
		    </div>
		    <!-- <br> -->
		<!-- </htmlpageheader> -->
		<!-- <br> -->


		<div class="container" style="margin-top: 1cm;">
			<table>
				<tr>
					<td width="150px" align="right" style="font-weight:bold;">
						Contract Number:
					</td>
					<td align="left">
						<?php echo $contract; ?> <br>
					</td>

					<td width="10px" align="right" style="font-weight:bold;">
						Client:
					</td>
					<td align="left">
						<?php echo $client; ?> <br>
					</td>


				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Basket:
					</td>
					<td align="left">
						<?php echo $bskt; ?> <br>
					</td>

					<td width="10px" align="right" style="font-weight:bold;">
						Description:
					</td>
					<td align="left">
						<?php echo $description; ?> <br>
					</td>
				</tr>


				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Weight:
					</td>
					<td align="left">
						<?php echo $weight; ?> <br>
					</td>

					<td width="10px" align="right" style="font-weight:bold;">
						Packages:
					</td>
					<td align="left">
						<?php echo $packages; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Start Date:
					</td>
					<td align="left">
						<?php echo $start_date; ?> <br>
					</td>

					<td width="10px" align="right" style="font-weight:bold;">
						End Date:
					</td>
					<td align="left">
						<?php echo $end_date; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Contract Date:
					</td>
					<td align="left">
						<?php echo $contract_date; ?> <br>
					</td>
					<td width="10px" align="right" style="font-weight:bold;">
						Instruction:
					</td>
					<td align="left">
						<?php echo $ref_no; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Packaging Method:
					</td>
					<td align="left">
						<?php echo $packaging_method; ?> <br>
					</td>
					<td width="10px" align="right" style="font-weight:bold;">
						Bag Type:
					</td>
					<td align="left">
						<?php echo $packaging_name; ?> <br>
					</td>


				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Complimentary Condition:
					</td>
					<td align="left">
						<?php echo $complementary; ?> <br>
					</td>
					<td width="10px" align="right" style="font-weight:bold;">
						Status:
					</td>
					<td align="left">
						<?php echo $status; ?> <br>
					</td>
				</tr>

			</table>

			<table class="table table-striped" style="position: inherit;">
			<thead>
			  <tr>
					<th>
						Contract
					</th>
					<th>
						Code
					</th>
					<!-- <th>
						Quality
					</th> -->
		<!-- 			<th>
						Outturn
					</th>
					<th>
						Season
					</th> -->
					<!-- <th>
						Grade
					</th> -->
					<?php
					if ($status != 'Stuffed') {
						?>
							<th>
								Invoice From
							</th>
						<?php

					}
					?>

					<th>
						Weight
					</th>

				  </tr>
				</thead>



					<?php
						$total_bags    = 0;
						$total_pkts    = 0;
						$count         = 0;
						$count_green   = 0;
						$count_process = 0;
						$count_screen  = 0;
						$count_cup     = 0;
						$total_price   = 0;
						$total         = 0;

						if (isset($breakdown) && count($breakdown) > 0) {

						    foreach ($breakdown->all() as $value) {


						        $count += 1;

						        $id = $value->id;

						        $total_bags += $value->bags;

						        $total_pkts += $value->pockets;

						        $total_value = ($value->weight_total) / 50 * ($value->price);

						        $total_price += $total_value;

						        if ($value->status == 'Stuffed') {

						        	$total += $value->stuffed_weight;

						        } else {

						        	$total += $value->weight_total;

						        }

						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }

						        echo "<td>" . $value->br_no . "</td>";

						        echo "<td>" . $value->bs_code . "</td>";

						        // echo "<td>" . $value->bs_quality . "</td>";
						        // echo "<td>" . $value->st_outturn . "</td>";
						        // echo "<td>" . $value->csn_season . "</td>";
						        // echo "<td>" . $value->cgrad_name . "</td>";

						        if ($value->status != 'Stuffed') {

						        	echo "<td>" . $value->cg_name . "</td>";
						        							        	
						        } 

						        echo "<td>" . $value->weight_total . "</td>";

						        echo "</tr>";

						    }
						}
						?>
											  <tr  style='background-color: #f2f2f2'>
											  	<!-- <td>Total:</td> -->
											    <?php
						echo "<td>" . $count . " </td>";
						?>
												<!-- <td></td> -->
												<!-- <td></td> -->
												<!-- <td></td> -->

												<?php
												if ($status != 'Stuffed') {
													?>
														<td></td>
													<?php

												}
												?>

												
												<td></td>
											    <?php
						echo "<td>" . $total . " Kgs</td>";
						?>

					  </tr>
				<!-- </tbody> -->
			</table>


		<div class="push"></div>


		<br>


		</div>



		<footer class="footer">

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