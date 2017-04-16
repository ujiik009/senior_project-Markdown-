<?php 
include '../lib/php/mpdf/mpdf.php';
require '../config_system/config_path.php';


//var_dump($path);
 $return = array();
 error_reporting(1);
 if(isset($_POST['html_tag']) && isset($_POST['UID']) && isset($_POST['file_name'])){
 	$html = $_POST['html_tag'];
	$temp_user = $path['temp_user'].$_POST['UID']."/";
	$file_name = explode(".",$_POST['file_name'])[0];
	$base_url = $path["base_url"];
	$url_pdf = $base_url."temp_user/{$_POST['UID']}/";
	$number_ran = rand(100, 200);
	if(file_exists($temp_user)){
		//echo "{$temp_user}{$file_name}.pdf";
		if(chdir($temp_user) ){
			chmod($temp_user, 0777);
			$array_pdf = glob("*.pdf");
			
			foreach ($array_pdf as $key => $name_pdf) {
				chmod($name_pdf, 0755);
				unlink($name_pdf);
			}
			//echo $url_pdf;
			$mpdf=new mPDF();
			$mpdf->WriteHTML($html);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->Output("{$temp_user}{$file_name}_{$number_ran}.pdf",'F');
			
			if(file_exists($temp_user."{$file_name}_{$number_ran}.pdf")){
				$return["status"] =true;
				$return['message'] = "render pass";
				$return['url_download'] = $url_pdf."{$file_name}_{$number_ran}.pdf";

			}else{
				$return["status"] = false;
				$return['message'] = "render now pass";
			}


			// var_dump( glob("*.pdf"));
		}else{
			$return["status"] = false;
			$return['message'] = "chmod error";
		}
		
		//var_dump($_POST);
	}else{
		$return['status'] = false;
		$return['message'] = "Not found path";
	}

 }else{
 	$return['status'] = false;
 	$return['message'] = "data not found";
 }
 echo json_encode($return);
//$html = "<h1>ice</h1>";
 
//  //echo $html;

//   echo $temp_user;
?>
