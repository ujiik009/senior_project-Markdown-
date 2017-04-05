<?php 
include '../lib/php/mpdf/mpdf.php';
  $html = $_POST['html_tag'];
//$html = "<h1>ice</h1>";
 echo $html;
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->SetDisplayMode('fullpage');
$mpdf->Output('img2.pdf','F');
 
?>
