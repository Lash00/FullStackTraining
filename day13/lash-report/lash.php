<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml("Hello in ths Lash world ");

$dompdf->setPaper("A4", "landscape");
$dompdf->render();
$dompdf->stream("Lash_World", ["Attachment" => true]);

?>