<style>
.text-danger strong {
    		color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
</style>

<div class="container">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombinedik.png'; ?>" >
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5></h5>
							<p><i class="fa fa-phone"></i></p>
							<p><i class="fa fa-envelope-o"></i></p>
							<p><i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><small> </small></h5>
							<p><b></b></p>
							<p><b></b></p>
							<p><b></b></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Service charge details</h1>
						</div>
					</div>
				</div>
            </div>
			
			
            <div>

				<?php
				$total_results = 0;
				$results_type = array();

				if (isset($results_view) && count($results_view) > 0) {
					foreach ($results_view->all() as $value) {
						$total_results += 1;
					}
				}

			?>


			<?php
				$total_instructed = 0;

				if (isset($StockView) && count($StockView) > 0) {
					foreach ($StockView->all() as $value_1) {
						$total_instructed += $value_1->weight;
					}
				}

			?>


		   <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td style="font-weight: 'bold';font-size: 20px; text-align:'center'"><?php echo $servicename ?> for Process <?php echo $ref_no ?></td>
                        </tr>
                    </thead>
				</table>


			<?php echo '<table class="table table-striped" >' ?>
			<thead>
			<?php echo "<tr style='background-color: #000000'>" ?>
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
						
					</th>
					<?php
						// for ($i=1; $i <= $total_results ; $i++) { 
						// 	echo "<th>".$i.substr(date('jS', mktime(0,0,0,1,($i%10==0?9:($i%100>20?$i%10:$i%100)),2000)),-2)."</th>";
						// }

						if (isset($results_view) && count($results_view) > 0) {
							foreach ($results_view->all() as $value) {
								echo "<th>".$value->result_type."</th>";
								echo "<th>Location</th>";
							}
						}
					?>
				  </tr>
				</thead>



					<?php
						$total_bags    = 0;
						$total_pkts    = 0;
						$count = 0;
						$total = 0;
						$total_pall_ratios = 0;
						$total_result = 0;

						


						if (isset($StockView) && count($StockView) > 0) {

						    foreach ($StockView->all() as $value) {

						        $total += $value->weight;
						        $count += 1;
						        $id = $value->id;
						        $total_bags += $value->bags;
						        $total_pkts += $value->pockets;

						        $pall_ratios = ($value->weight/$total_instructed);

						        $total_pall_ratios += $pall_ratios;

						        if ($value->warrant_no == null) {

						            echo "<tr style='color:red;'>";

						        } else {

						            echo "<tr>";
						        }
						        $name = substr($value->name, 0, 8);
						        echo "<td>" . $value->sale . "</td>";
						        echo "<td>" . $value->lot . "</td>";
						        echo "<td>" . $value->csn_season . "</td>";						        
						        echo "<td>" . $value->outturn . "</td>";
						        echo "<td>" . $value->grade . "</td>";						        
						        echo "<td>" . $value->bags . "</td>";
						        echo "<td>" . $value->pockets . "</td>";
						        echo "<td>" . $value->weight . "</td>";
						        echo "<td></td>";

								if (isset($results_view) && count($results_view) > 0) {
									foreach ($results_view->all() as $value) {
										echo "<td>".round($value->weight_out*$pall_ratios)."</td>";
										echo "<td>".$value->wr_name.'-'.$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
									}
								}

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
											    <?php
						echo "<td>" . $total_bags . "</td>";
						?>
											    <?php
						echo "<td>" . $total_pkts . "</td>";
						echo "<td>" . $total . " Kgs</td>";
						echo "<td></td>";

						

						?>


						<td></td>
						<td></td>

					  </tr>
			</table>

				 <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-md-9">Packages</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $bagstopay ?></td>
                        </tr>
                       
						<?php echo "<tr style='background-color: #000000; text-color: #fff'>" ?>
						<?php
							echo "<td style='color: #fff'>teamserviceprovider</td>";
								echo "<td style='color: #fff'>team group </td>";
								echo "<td style='color: #fff'>description</td>";
						?>
						</tr>
						<tr>
						<?php 
						if (isset($teamsarray) && count($teamsarray) > 0) {
							
							foreach ($teamsarray as $value) {
								echo "<tr>";
								echo "<td>".$value["teamserviceprovider"]."</td>";
								echo "<td>".$value["teamgroup"]."</td>";
								echo "<td>".$value["desc"]."</td>";
								echo "</tr>";
							}
						}
						?>
						</tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Rate: </strong>
                            </p>
                            <p>
                                <strong>Total Amount:</strong>
                            </p>
							
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $rate.'/-' ?></strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $totalcost.'/-' ?></strong>
                            </p>
							
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i><?php echo $totalcost.'/-' ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :   <?php echo date("Y/m/d H:i:s"); ?></b> </p>
							<h5 style="color: rgb(140, 140, 140);"></h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
                            <h1>Signed on behalf of Ibero Kenya Ltd. <br><br>
				<?php echo "Nelson Mose_________________________"; ?><br><br>
									  <?php echo "Cyka _________________________"; ?> 
				<br></h1>
						</div>
					</div>
				</div>
            </div>
			<footer class="footer">
			

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



			
        </div>    
	</div>
</div>

