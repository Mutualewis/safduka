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
		   		WAREHOUSE - GOODS DISPATCH NOTE &nbsp;&nbsp;&nbsp;&nbsp; <?php echo 'WGD-0000005'; ?>

		    </h2>
	    </div>

		<div class="container" style="margin-top: 1cm;">

			<table style="text-align: left; font-size: 13px">
				<tr>
					<td width="250px" align="left">
						<strong>To:</strong> <?php echo 'BOLLORE'; ?>
					</td>
					<td width="200px" align="left">
						<strong>Dispatch Date:</strong> <?php echo '22-11-2018'; ?> <br>
					</td>
				</tr>			

				<tr>
					<td width="150px" align="left">
						<strong>Mvt. Permit:</strong>740
					</td>
					<td width="150px" align="left">
						<strong>Vehicle Reg. No.:</strong> <?php echo 'KCA 472Y'; ?> <br>
					</td>
				</tr>	

				<tr>
					<td width="150px" align="left">
						<strong>Wb. Ticket:</strong> <?php echo ''; ?>
					</td>
					<td width="150px" align="left">
						<strong>Start Time.:</strong> <?php echo '03:15 AM'; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="150px" align="left">
						<strong>Stop Time.:</strong> <?php echo '05:51 PM'; ?> <br>
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
						Gross
					</th>
					<th>
						Tare
					</th>
					<th>
						Nett
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




				        echo "<tr>";

					        echo "<td>07NG0033</td>";
					        echo "<td>C</td>";
					        echo "<td>21</td>";
					        echo "<td>06</td>";
					        echo "<td>1307</td>";
					        echo "<td>19.80</td>";
					        echo "<td>1287</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0033</td>";
					        echo "<td>AB</td>";
					        echo "<td>60</td>";
					        echo "<td>66</td>";
					        echo "<td>3728</td>";
					        echo "<td>54.90</td>";
					        echo "<td>3673</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0033</td>";
					        echo "<td>AA</td>";
					        echo "<td>22</td>";
					        echo "<td>16</td>";
					        echo "<td>1360</td>";
					        echo "<td>20.70</td>";
					        echo "<td>1339</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>06NG0016</td>";
					        echo "<td>AA</td>";
					        echo "<td>66</td>";
					        echo "<td>47</td>";
					        echo "<td>4072</td>";
					        echo "<td>60.30</td>";
					        echo "<td>4011</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0009</td>";
					        echo "<td>C</td>";
					        echo "<td>17</td>";
					        echo "<td>25</td>";
					        echo "<td>1062</td>";
					        echo "<td>16.20</td>";
					        echo "<td>1046</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0009</td>";
					        echo "<td>AA</td>";
					        echo "<td>35</td>";
					        echo "<td>44</td>";
					        echo "<td>2180</td>";
					        echo "<td>32.40</td>";
					        echo "<td>2148</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0012</td>";
					        echo "<td>PB</td>";
					        echo "<td>11</td>";
					        echo "<td>23</td>";
					        echo "<td>696</td>";
					        echo "<td>10.80</td>";
					        echo "<td>685</td>";

				        echo "</tr>";


				        echo "<tr>";

					        echo "<td>07NG0012</td>";
					        echo "<td>C</td>";
					        echo "<td>19</td>";
					        echo "<td>22</td>";
					        echo "<td>1183</td>";
					        echo "<td>18.00</td>";
					        echo "<td>1165</td>";

				        echo "</tr>";


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


						    }
						}
						echo "<tr style='background-color: #f2f2f2'>";
							echo "<td>8 Lots</td>";	
							echo "<td></td>";	
							echo "<td>251 </td>";
							echo "<td>249 </td>";
							echo "<td>15588 Kg</td>";
							echo "<td>233.1 Kg</td>";
							echo "<td>15354 Kg</td>";

						echo "</tr>";
					?>
					  </tr>
				<!-- </tbody> -->
			</table>


		    <br>

		    <p style="text-align: left; font-size: 13px">
				<strong>Number of packages dispatched:</strong>

				<?php 
				$total_packages = 251;
				$total_gross = 15588;

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
						<strong>Driver:</strong> Paul Munyoki
					</td>
					<td width="100px" align="left">
						<strong>ID No.:</strong> 23815790<br>
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
			<i style="text-align: left; font-size: 13px">For NKG Coffee Mills Kenya Ltd:</i>
			<br>
			<br>
			<table style="text-align: left; font-size: 13px" >
				<tr>
					<td width="100px" align="left">
						<strong>Dispatch Clerk:</strong> Nancy Kariuki
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
						<strong>Supervisor:</strong> <?php echo "Stanley" ?>
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
		    <div style="text-align: left; border-top: 1px solid #000000; font-size: 11pt;"><strong>NKG Coffee Mills Kenya Ltd</strong></div>
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
