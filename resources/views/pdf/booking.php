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
    <?php
		// $date = "Mar 03, 2011";
    	//$date2 = new DateTime($date2);
			

		$validdate = $date2->modify('friday');

    	//$validdate = strtotime("friday", $date2);

		//$validdate = strtotime('next friday');
		// $validdate = strtotime("+7 day", $validdate);
		$validdate =  date_format($validdate,"d D M Y");  

		// $friday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));
		
		//echo date('M d, Y', $date);
	?>
    <body>
		<htmlpageheader name="page-header">
		    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt;">
	    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logocombined.png';?>" />
	    		<!-- <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logoimage.png';?>" width="10mm"  float="right"/> -->

		    </div>
		    <br>
		    

		</htmlpageheader>

		<br>
		<div class="container" style="margin-top: 1cm;">
			<div align="right">
				<label>Tag No.: </label> <textarea border="1px" rows="3" cols="15" >#             </textarea>
				<!-- <input type="textarea" name="" style="background-color:transparent;" height="100px"> -->
			</div>
			
		    <p>Booking Confirmation<br>
		    	Ref. <strong><?php echo $ref_no; ?></strong><br>
		    	<?php echo $coffee_grower. " ". $code; ?><br>
		    	Booking Date: <?php echo $currentdate; ?><br>
		    </p>
		    <br>
			<p>
				<?php echo $coffee_grower;?>,<br><br>
				Your booking has been made with the NKG Coffee Mill at Ruiru by <strong><?php echo $coffee_agent; ?></strong> on <?php echo $currentdate; ?> to be delivered on <strong><?php echo $date; ?></strong>:
			</p>

<!-- background-color: #f2f2f2 -->

			<!-- <h3>Items in Booking</h3> -->
			<table class="table table-striped">
			<thead>
			  <tr>
				<th>
					No.
				</th>
				<th>
					Parchment Type
				</th>
				<th>
					Bags
				</th>
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
							echo "<tr>";
								echo "<td>".$count."</td>";
								echo "<td>".$bookingitems->pty_name."</td>";
								echo "<td>".$bookingitems->bags."</td>";
							echo "</tr>";


						}
					}
				?>
				  <tr>
				  	<td style='background-color: #f2f2f2'></td>
				    <td style="background-color: #f2f2f2">Total:</td>
				    <?php
					    echo "<td style='background-color: #f2f2f2'>".$total_bags."</td>";
					    ?>
				  </tr>
			</tbody>
			</table>






			<br>

			<p>
				Please send the original booking confirmation with the delivery vehicle. 
			</p>

			<p>
				This booking is valid until <strong><?php echo $validdate; ?></strong>.
			</p><br><br>

			<p>
				Signed on behalf of NKG Coffee Mills Kenya.
			</p>			
		</div>

















		<htmlpagefooter name="page-footer" align="right">
		    <div style="text-align: right; border-top: 1px solid #000000; font-size: 12pt;">Reported <?php echo $currentdatetime;?></div>
			<!-- <div style="text-align: center; font-weight: bold; font-size: 13pt;">Page {PAGENO}</div> -->
		</htmlpagefooter>


    	<!-- <img src="./logotext.jpg"> -->

        <?php //echo $ref_no; ?>
    </body>
</html>