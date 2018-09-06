<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
			.container
			{
			width: 90%;
			margin-left:5%; 
    		margin-right:5%;
			height: 100%;
			}
			@page {
			    header: page-header;
			    footer: page-footer;
			}
			table {
			    border-collapse: collapse;
			    width: 100%;
			}

			th, td {
			    text-align: left;
			    padding: 8px;
			}

			/*tr:nth-child(even){background-color: #f2f2f2}*/
			/*h3   {color: blue;}*/
		</style>
		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>

    </head>

    <body>
		<htmlpageheader name="page-header">
		    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt;">
	    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logocombinedik.png';?>" width="206mm" />
	    		<!-- <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logoimage.png';?>" width="10mm"  float="right"/> -->

		    </div>
		    <br>
		    

		</htmlpageheader>
		<br>
		<h1 align="center">Weighbridge Ticket Out</h1>
		<div class="container" style="margin-top: 1cm;">
			<table>
				<tr>
					<td width="150px" align="right">
						Ticket:
					</td>
					<td align="left">
						<?php echo $weighbridge_ticket; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Driver Name:
					</td>
					<td align="left">						
						<?php echo $wb_driver_name; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Driver ID:
					</td>
					<td align="left">
						<?php echo $wb_driver_id; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Movement Permit:
					</td>
					<td align="left">
						<?php echo $wb_movement_permit; ?> <br>
					</td>
				</tr>				
				<tr>
					<td width="150px" align="right">
						Vehicle Plate:
					</td>
					<td align="left">
						<?php echo $vehicle_plate; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Delivery Number:
					</td>
					<td align="left">
						<?php echo $wb_delivery_number; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Dispatch Date:
					</td>
					<td align="left">
						<?php echo $wb_dispatch_date; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Time In:
					</td>
					<td align="left">
						<?php echo $delivery_date; ?> <br>
					</td>
				</tr>		
				<tr>
					<td width="150px" align="right">
						Time Out:
					</td>
					<td align="left">
						<?php echo $departure_date; ?> <br>
					</td>
				</tr>		
				
				<tr>
					<td width="150px" align="right">
						Time Taken:
					</td>
					<td align="left">
						<?php echo $time_taken; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="150px" align="right">
						Weight In:
					</td>
					<td align="left">
						<?php echo $weighbridge_weight_in; ?> <br>
					</td>
				</tr>			
				<tr>
					<td width="150px" align="right">
						Weight Out:
					</td>
					<td align="left">
						<?php echo $weighbridge_weight_out; ?> <br>
					</td>
				</tr>
				<tr>
					<td width="150px" align="right">
						Unloaded:
					</td>
					<td align="left">
						<?php echo $unloaded; ?> <br>
					</td>
				</tr>
			</table>
		    <br>
		    <br>









			<br>
			<p>
				Received By <?php echo $user;?>.
			</p>			
		</div>

















		<htmlpagefooter name="page-footer" align="left">
		    <div style="text-align: left; border-top: 1px solid #000000; font-size: 11pt;"><strong>Ibero Kenya Ltd</strong></div>
		    <div style="text-align: left; font-size: 10pt;">A Company of Neumann Kaffee Gruppe</div>
		    <div style="text-align: left; font-size: 10pt;">Sukari Industrial Estate - Northern Bypass Road - Ruiru/Nairobi</div>
		    <div style="text-align: left; font-size: 10pt;">P.O.BOX 47882-00100 - Nairobi - Kenya</div>
		    <div style="text-align: left; font-size: 10pt;">Tet +254 20 2343009/2066886</div>
		    <div style="text-align: left; font-size: 10pt;">Tel +254 733 893900/729407495</div>
		    <div style="text-align: left; font-size: 10pt;">Fax +254 20 2056428</div>
		    <div style="text-align: left; font-size: 10pt;">info.iberoke@ngea.com</div>

			<div style="text-align: center; font-weight: bold; font-size: 13pt;">Page {PAGENO}</div>
		</htmlpagefooter>


    	<!-- <img src="./logotext.jpg"> -->

        <?php //echo $ref_no; ?>
    </body>
</html>