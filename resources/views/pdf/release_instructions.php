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
						<?php echo $warehouse. " - Warehouse Department"; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						Att:
					</td>
					<td align="left">
						<?php echo $att; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						CC:
					</td>
					<td align="left">
						<?php echo $cc; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="10px" align="right">
						From:
					</td>
					<td align="left">
						<?php echo "Trading Department"; ?> <br>
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

			</table>
		    <!-- <br> -->
		    <br>
		   		RE: Coffee Release Instructions No. <?php echo $release_no; ?>
			<p>
				Please release the following coffee to <strong><?php echo $cc; ?></strong> for delivery to <strong><?php echo /*$buyer*/'NKG Coffee Mills'; ?></strong>. Coffee should be strictly released only when coffee movement permits are forwarded to you from the following email address <i><?php echo $buyer_email; ?></i>.
			</p>

<!-- background-color: #f2f2f2 -->

			<!-- <h3>Items in Booking</h3> -->
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
						Outturn
					</th>
					<th>
						Grade
					</th>
					<th>
						Kilos
					</th>
					<th>
						Bags
					</th>
					<th>
						Pkts
					</th>
					<th>
						Warrant
					</th>
					<th>
						Remarks
					</th>

				  </tr>
				</thead>
				<!-- <tbody> -->



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

						if (isset($sale_lots) && count($sale_lots) > 0) {

						    foreach ($sale_lots->all() as $value) {
						        // print_r($season->acat_id);
						        $total += $value->warrant_weight;
						        $count += 1;
						        $id = $value->id;

						        $total_bags += $value->bags;

						        $total_pkts += $value->pockets;

						        // var values = parseInt(total)/50 * rate;
						        $total_value = ($value->weight) / 50 * ($value->price);

						        $total_price += $total_value;
						        // $total_price += $sale_lots->price;

						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }

						        echo "<td>" . $value->sale . "</td>";
						        echo "<td>" . $value->lot . "</td>";
						        echo "<td>" . $value->outturn . "</td>";
						        echo "<td>" . $value->grade . "</td>";
						        echo "<td>" . $value->warrant_weight . "</td>";
						        echo "<td>" . $value->bags . "</td>";
						        echo "<td>" . $value->pockets . "</td>";
						        echo "<td>" . $value->warrant_no . "</td>";

						        echo "<td>" . $value->war_comments . "</td>";

						        echo "</tr>";

						    }
						}
						?>
											  <tr  style='background-color: #f2f2f2'>
											  	<!-- <td>Total:</td> -->
											    <?php
						echo "<td>" . $count . " Lots</td>";
						?>
												<td></td>
												<td></td>
												<td></td>
											    <?php
						echo "<td>" . $total . " Kgs</td>";
						?>
											    <?php
						echo "<td>" . $total_bags . "</td>";
						?>
											    <?php
						echo "<td>" . $total_pkts . "</td>";
						?>
						<td></td>
						<td></td>

					  </tr>
				<!-- </tbody> -->
			</table>






		<div class="push"></div>



		<br>











		</div>



		<footer class="footer">
			<p>
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