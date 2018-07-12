
<!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    </head>

    <body>

	    <div style="text-align: center; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt; ">

    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/logocombinedik.png'; ?>" width="406mm" />
    		
	    </div>

		<span><?php echo 'Sale:'.$sale.str_repeat('&nbsp;', 5).'Lot:'.$lot.str_repeat('&nbsp;', 5).'Bags:'.$bags; ?></span><br>

		<span><?php echo $outtturn.'-'.substr($mark, 0, 5).str_repeat('&nbsp;', 5).'Year:'.substr($season,5); ?></span><br>

		<span><?php echo 'Grade:'.$grade_name.str_repeat('&nbsp;', 5).'Cup:'.$cup_score; ?></span><br>

		<span><?php echo 'Quality:'.$internal_basket_quality.':'.$internal_basket; ?></span><br>

		<span><?php echo 'A:'. number_format($acidity,1).str_repeat('&nbsp;', 1).'B:'. number_format($body,1).str_repeat('&nbsp;', 1).'F:'. number_format($flavour,1).str_repeat('&nbsp;', 1). $description; ?></span><br>

		<span><?php echo 'Cert:'.$certification; ?></span><br>

	    <div style="text-align: right;  font-weight: bold; padding-right: 15px; ">

    		<img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . '/images/qar.png'; ?>" width="40mm" />

	    </div>

    </body>
		<style>

			span{

				text-align: left; 
				font-weight: bold; 
				font-size: 47pt; 

			}
		</style>
</html>