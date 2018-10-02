<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>

    </head>

    <body>
	    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt; margin-bottom: -20px;">
    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombinedik.png'; ?>" width="206mm" />
	    </div>

	    <div style="text-align: center; margin-top: 0.5cm;">
		    <h2>
		   		WAREHOUSE - GOODS DISPATCH NOTE &nbsp;&nbsp;&nbsp;&nbsp; <?php echo 'EGD-'.$dp_number; ?>

		    </h2>
	    </div>

		<div class="container" style="margin-top: 1cm;">

			<table style="text-align: left; font-size: 13px">
				<tr>
					<td width="250px" align="left">
						<strong>To:</strong> <?php if(isset($client)) echo $client; ?>
					</td>
					<td width="200px" align="left">
						<strong>Dispatch Date:</strong> <?php if(isset($delivery_date))  echo $delivery_date; ?> <br>
					</td>
				</tr>			

				<tr>
					<td width="150px" align="left">
						<strong>Mvt. Permit:</strong> <?php if(isset($movement_permit)) echo $movement_permit; ?>
					</td>
					<td width="150px" align="left">
						<strong>Vehicle Reg. No.:</strong> <?php if(isset($vehicle)) echo $vehicle; ?> <br>
					</td>
				</tr>	

				<tr>
					<td width="150px" align="left">
						<strong>Wb. Ticket:</strong> <?php if(isset($weighbridge_ticket)) echo $weighbridge_ticket; ?>
					</td>
					<td width="150px" align="left">
						<strong>Start Time.:</strong> <?php if(isset($time_received)) echo $time_received; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="150px" align="left">
						<strong>Stop Time.:</strong> <?php if(isset($time_received_stop)) echo $time_received_stop; ?> <br>
					</td>
				</tr>

			</table>

		  

			<!-- <h3>Items in Booking</h3> -->
			<table class="table table-striped" style="position: inherit; margin-top: 1cm;">
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
						Nett
					</th>
					<th>
						Tare
					</th>
					<th>
						Gross
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
						$total_gross   = 0;
						$total_tare   = 0;

						$total_packages = 0;

						if (isset($SalesContractSummary) && count($SalesContractSummary) > 0) {

						    foreach ($SalesContractSummary as $value) {

						        $total += $value->stuffed_weight;

						        $total_gross += $value->stuffed_gross_weight;

						        $count += 1;

						        $id = $value->id;

						        $total_bags += $value->stuffed_bags;

						        $total_pkts += $value->stuffed_pockets;

						        $total_tare += $value->stuffed_tare;

						        $total_packages += $value->stuffed_packages;

						        echo "<tr>";

							        echo "<td>" . $value->pr_instruction_number . "</td>";
							        echo "<td>" . $value->sct_description . "</td>";
							        echo "<td>" . $value->stuffed_bags . "</td>";
							        echo "<td>" . $value->stuffed_pockets. "</td>";
							        echo "<td>" . $value->stuffed_weight . "</td>";
							        echo "<td>" . $value->stuffed_tare . "</td>";
							        echo "<td>" . $value->stuffed_gross_weight . "</td>";

						        echo "</tr>";

						    }
						}
						echo "<tr style='background-color: #f2f2f2'>";
							echo "<td>" . $count . " Lots</td>";	
							echo "<td></td>";	
							echo "<td>" . $total_bags . "</td>";
							echo "<td>" . $total_pkts . "</td>";
							echo "<td>" . $total . " Kg</td>";
							echo "<td>" . $total_tare . " Kg</td>";
							echo "<td>" . $total_gross . " Kg</td>";

						echo "</tr>";
					?>
					  </tr>
				<!-- </tbody> -->
			</table>


		    <br>

		    <p style="text-align: left; font-size: 13px">
				<strong>Number of packages received:</strong>

				<?php 

				echo number_to_word($total_packages) ." (".$total_packages. ")";

				?></br>


			</p>
			<p style="text-align: left; font-size: 13px">
				<strong>Total weight received in words:</strong>

				<?php 

				echo number_to_word($total_gross) ." (".$total_gross. " Kg)";

				?></br>


			</p>


		<div class="push"></div>



		<br>











		</div>



		<footer class="footer" style="text-align: left;">
			<p>

			<i style="text-align: left; font-size: 13px">For Client:</i>
			<br>
			<br>			
			<table style="text-align: left; font-size: 13px">
				<tr>
					<td width="100px" align="left">
						<strong>Driver:</strong> <?php if(isset($driver_name)) echo $driver_name; ?>
					</td>
					<td width="100px" align="left">
						<strong>ID No.:</strong> <?php if(isset($driver_id)) echo $driver_id; ?> <br>
					</td>
					<td width="50px" align="left">
						<strong>Signature:</strong> <?php echo " _________________________"; ?> <br>
					</td>
				</tr>	

			</table>
			<br>
			<br>
		<p>
		</p>
			<i style="text-align: left; font-size: 13px">For Ibero Kenya Ltd:</i>
			<br>
			<br>
			<table style="text-align: left; font-size: 13px" >
				<tr>
					<td width="100px" align="left">
						<strong>Dispatch Clerk:</strong> <?php if(isset($received_by))  echo $received_by; ?>
					</td>
					<td width="50px" align="left">
						<strong>Signature:</strong> <?php echo " _________________________" ?> <br>
					</td>
				</tr>
				<tr><td></td>
				</tr>
				<tr><td></td>
				</tr>
				<tr><td></td>
				</tr>
				<tr>
					<td width="100px" align="left">
						<strong>Supervisor:</strong> <?php echo "Nelson" ?>
					</td>
					<td width="50px" align="left">
						<strong>Signature:</strong> <?php echo " _________________________"; ?> <br>
					</td>
				</tr>	

			</table>
			<br>
			<br>

			<table style="text-align: left; font-size: 13px">

				
			</table>
			


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
		    <div style="text-align: left; font-size: 10pt;">info.ke@nkg.coffee</div>

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


<?php

function number_to_word( $num = '' )
{
    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 )
            {
                $tens   = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
            }
            else
            {
                $tens   = ( int ) ( $tens / 10 );
                $tens   = ' ' . $list2[$tens] . ' ';
                $singles    = ( int ) ( $num_part % 10 );
                $singles    = ' ' . $list1[$singles] . ' ';
            }
            $words[]    = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        }
       
        $commas = count( $words );
       
        if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
        if( $commas )
        {
            $words  = str_replace_last( ',' , ' and' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}


function trim_all( $str , $what = NULL , $with = ' ' )
{
    if( $what === NULL )
    {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space
       
        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }
   
    return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}


?>
</html>