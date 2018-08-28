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
			if ($cancelled != null) {
				echo "<h1 style='color:red;' align='center'>The Contract Has Been Cancelled</h1>"; 
			}
		
		?> 
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
						<?php echo $client."(".$client_reference.")"; ?> <br>
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
						Quantity:
					</td>
					<td align="left">
						<?php 
							if ($bag_size != null) {
								echo $packages." bags of ". $bag_size . " KGS"; 
							} else {
								echo $packages." bags "; 								
							}
						?> <br>
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
						Fixation Month:
					</td>
					<td align="left">
						<?php echo $fixation_month; ?> <br>
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
						Price:
					</td>
					<td align="left">
						<?php echo $price. " ". $price_units; ?> <br>
					</td>
					<td width="10px" align="right" style="font-weight:bold;">
						Price Type:
					</td>
					<td align="left">
						<?php 
							if ($call_from != null) {
								echo $price_type. " (".$call_from. ")"; 
							}else{
								echo $price_type; 
							}
							
						?> <br>
					</td>					
				</tr>
				<tr>
					<td width="10px" align="right" style="font-weight:bold;">
						Complimentary Condition:
					</td>
					<td align="left">
						<?php echo $complimentarycondition; ?> <br>
					</td>
					<td width="10px" align="right" style="font-weight:bold;">
						Destination:
					</td>
					<td align="left">
						<?php echo $destination; ?> <br>
					</td>
				</tr>

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