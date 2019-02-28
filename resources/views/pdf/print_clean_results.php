<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<img src="logotext.jpg" align="left"></img>
		<img src="logo.jpg" align="right"></img>

    </head>

    <body>
	    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 13pt; margin-bottom: -20px;">
    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombined.png'; ?>" width="206mm" />
	    </div>

	    <div style="text-align: center; margin-top: 0.5cm;">
		    <h2>
		   		<?php echo strtoupper("Warehouse"); ?> - CLEAN BULKING RESULTS &nbsp;&nbsp;&nbsp;&nbsp; <?php echo 'CBR-'.$instruction_number_clean; ?>

		    </h2>
	    </div>

		<div class="container" style="margin-top: 1cm;">
			<h2>Instructed</h2>
			<table style="text-align: left; font-size: 13px;  border: 1px solid #dddddd;" border="1">
				<tr>
					<td width="250px" align="left">
						<strong>Outturn No.:</strong> <?php if(isset($st_outturn)) echo $st_outturn; ?>
					</td>
					<td width="200px" align="left">
						<strong>Bulk Marks:</strong> <?php if(isset($st_mark))  echo $st_mark; ?> <br>
					</td>
					<td width="200px" align="left">
						<strong>Grade:</strong> <?php if(isset($mt_name))  echo $mt_name; ?> <br>
					</td>
				</tr>	

				<tr>
					<td width="250px" align="left">
						<strong>Instruction No.:</strong> <?php if(isset($instruction_number)) echo $instruction_number; ?>
					</td>
					<td width="200px" align="left">
						<strong>Instructed Bags:</strong> <?php if(isset($st_bags_instructed))  echo $st_bags_instructed; ?> <br>
					</td>
					<td width="200px" align="left">
						<strong>Instructed Pockets:</strong> <?php if(isset($st_pockets_instructed))  echo $st_pockets_instructed; ?> <br>
					</td>
				</tr>	

				<tr>
					<td width="200px" align="left">
						<strong>Instructed Net Weight:</strong> <?php if(isset($st_net_weight_instructed))  echo $st_net_weight_instructed.' KG'; ?> <br>
					</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td width="200px" align="left">
						<strong>Certification:</strong> <?php if(isset($certification))  echo $certification; ?> <br>
					</td>
					<td></td>
					<td></td>
				</tr>			
			</table>


			<h2>Results</h2>
			<table style="text-align: left; font-size: 13px;  border: 1px solid #dddddd;" border="1">
				<tr>
					<td width="200px" align="left">
						<strong>Bag Type:</strong> <?php if(isset($pkg_name))  echo $pkg_name; ?> <br>
					</td>

					<td width="250px" align="left">
						<strong>Results Bags:</strong> <?php if(isset($st_bags_results)) echo $st_bags_results; ?>
					</td>
					<td width="200px" align="left">
						<strong>Results Pockets:</strong> <?php if(isset($st_pockets_results))  echo $st_pockets_results; ?> <br>
					</td>
				</tr>	

				<tr>
					<td width="250px" align="left">
						<strong>Results Gross Weight:</strong> <?php if(isset($st_gross)) echo $st_gross.' KG'; ?>
					</td>
					<td width="200px" align="left">
						<strong>Results Net Weight:</strong> <?php if(isset($st_net_weight_results))  echo $st_net_weight_results.' KG'; ?> <br>
					</td>
					<?php
						if($st_bulk_gain != null && $st_bulk_gain > 0){
							?>
								<td width="200px" align="left">
									<strong>Bulk Gain:</strong> <?php if(isset($st_bulk_gain))  echo $st_bulk_gain.' KG'; ?> <br>
								</td>
							<?php
						} else {
							?>
								<td width="200px" align="left">
									<strong>Bulk Loss:</strong> <?php if(isset($st_bulk_loss))  echo $st_bulk_loss.' KG'; ?> <br>
								</td>
							<?php							
						}
					?>
				</tr>	

				<tr>
					<td width="200px" align="left">
						<strong>Sample:</strong> <?php if(isset($sample))  echo $sample.' KG'; ?> <br>
					</td>
					<td width="200px" align="left">
						<strong>Location:</strong> <?php if(isset($location))  echo $location; ?> <br>
					</td>
					<td width="200px" align="left">
						<strong>Chargeable To:</strong> <?php  echo "Tropical Farm Management"; ?> <br>
					</td>
				</tr>

				<tr>
					<td width="200px" align="left" colspan="3">
						<strong>Comments:</strong> <br>
					</td>
			</table>

<!-- ', 'mt_name', 'instruction_number', '', '', '', '', '', '', '', '', '', '', '', 'user_name', ''
 -->				
					

		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>

			<br>
			<br>
			<br>
			<br>
	













		<footer class="footer" style="text-align: left;">
	
			<i style="text-align: left; font-size: 13px">For NKG Coffee Mills Kenya Ltd:</i>
			<br>
			<br>
			<table style="text-align: left; font-size: 13px" >
				<tr>
					<td width="100px" align="left">
						<strong>Prepared By:&nbsp;&nbsp;</strong><?php echo $user_name; ?>
					</td>
					<td width="50px" align="left">
						<strong>Signature:</strong> <?php echo " _________________________" ?> <br>
					</td>
					<td width="50px" align="left">
						<strong>Date:</strong> <?php echo $creation_date; ?> <br>
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
						<strong>Supervisor:&nbsp;&nbsp;</strong> <?php echo "Stanley Rotich" ?>
					</td>
					<td width="50px" align="left">
						<strong>Signature:</strong> <?php echo " _________________________"; ?> <br>
					</td>
					<td width="50px" align="left">
						<strong>Date:</strong> <?php echo $creation_date; ?> <br>
					</td>
				</tr>	

			</table>
			<br>
			<br><br><br>
			



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