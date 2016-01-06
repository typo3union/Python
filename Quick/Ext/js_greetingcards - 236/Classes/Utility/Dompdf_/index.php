<?php

require_once("dompdf_config.inc.php");

// We check wether the user is accessing the demo locally


$html = "Jainish";


  
  $stuff = '<html>
                <body>
                <p>
                    PLEASE WORK!!!
                </p>
				<div style="page-break-before: always;"></div>
				<p>
                    PLEASE WORK!!!
                </p>
            </body></html>';
    set_time_limit(300);
    ini_set('memory_limit', '-1');

    $dompdf = new DOMPDF();
    $dompdf->load_html($stuff);
    $dompdf->set_paper( 'letter' , 'portrait' );
    $dompdf->render();
	$dompdf->stream('sample.pdf');
	
//	$output = $dompdf->output();
//	file_put_contents('jainish.pdf', $output);

  exit(0);


?>
