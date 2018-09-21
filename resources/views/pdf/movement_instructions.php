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
		$movement_type = null;
		if (isset($sale_lots) && count($sale_lots) > 0) {
		    foreach ($sale_lots->all() as $value) {
		    	$warehouse = $value->warehouse;
	    	}
		}

		if (isset($StockView) && count($StockView) > 0) {
		    foreach ($StockView->all() as $value) {
		    	$movement_type = $value->mit_name;
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
						Att:
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
						<?php echo "MI-".$ref_no; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="10px" align="right">
						Type:
					</td>
					<td align="left">
						<?php echo $movement_type; ?> <br>
					</td>
				</tr>

			</table>
			<p>
				Please move the following coffee.
			</p>


			<table class="table table-striped" style="position: inherit;">
			<thead>
			  <tr>					
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
					<th>
						Code
					</th>								
					<th>
						Location
					</th>
					<th>
						New Location
					</th>
					<th>
						Reason
					</th>

				  </tr>
				</thead>



					<?php
						$total_bags    = 0;
						$total_pkts    = 0;
						$count         = 0;
						$total         = 0;

						if (isset($StockView) && count($StockView) > 0) {

						    foreach ($StockView->all() as $value) {

						        $total += $value->btc_weight;
						        $count += 1;
						        $id = $value->id;
						        $total_bags += $value->btc_bags;
						        $total_pkts += $value->btc_pockets;
						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }
						        $name = substr($value->name, 0, 8);					        
						        echo "<td>" . $name . "</td>";
						        echo "<td>" . $value->grade . "</td>";						        
						        echo "<td>" . $value->btc_bags . "</td>";
						        echo "<td>" . $value->btc_pockets . "</td>";
						        echo "<td>" . $value->btc_weight . "</td>";
						        echo "<td>" . $value->code."</td>";
						        echo "<td>" . $value->wr_name."-".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
						        echo "<td>" . $value->new_location."</td>";
						        echo "<td>" . $value->reason."</td>";
						        echo "</tr>";

						    }
						}
						?>
					    <tr  style='background-color: #f2f2f2'>
											    <?php
						echo "<td>" . $count . " Lots</td>";
						?>
												<td></td>
											    <?php
						echo "<td>" . $total_bags . "</td>";
						?>
											    <?php
						echo "<td>" . $total_pkts . "</td>";
						echo "<td>" . $total . " Kgs</td>";
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
				Signed on behalf of Export Warehouse. <br><br>
				<?php echo $person_fname." ".$person_sname. "_________________________"; ?><br><br>
									  <?php echo "Nelson Mose_________________________"; ?><br><br>
									  <?php echo "Supervised By_________________________"; ?><br><br>
									  <?php echo "CYKA_________________________"; ?>
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