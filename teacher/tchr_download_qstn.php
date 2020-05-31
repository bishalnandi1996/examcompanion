<?php

	/* PDF generating function */
	function showPDF($qstn_name, $file_content) {
		require('../fpdf/fpdf.php');

		$pdf = new FPDF();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',16);
		$pdf->MultiCell(0,4,strtoupper($qstn_name),0,'C');
		$pdf->MultiCell(0,4," ");
		$pdf->MultiCell(0,4," ");
		
		$pdf->SetFont('Arial','',10);
		$i=0;
		foreach($file_content as $qstn_set) {
			$pdf->MultiCell(0,4,++$i.") ".$qstn_set['question']);
			$pdf->MultiCell(0,4," ");
			$pdf->MultiCell(0,4,'a) '.$qstn_set['a']);
			$pdf->MultiCell(0,4,'b) '.$qstn_set['b']);
			$pdf->MultiCell(0,4,'c) '.$qstn_set['c']);
			$pdf->MultiCell(0,4,'d) '.$qstn_set['d']);
			$pdf->MultiCell(0,4," ");
		}
		
		$pdf->Output();
	}


	require 'tchr_authenticate.php';

	$sql="select * from question where question.qstn_id=".$_GET['qstn'];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	#echo "<h2 style='font-weight: bold;'>".strtoupper($row['qstn_name'])."</h2>";


	#start of file reading
	$filename='../questions/'.$_GET['qstn'];
	#Reads entire file into a string
	$file_content_raw=file_get_contents($filename);

	#Decryption
	$decrypt_file_content_raw=openssl_decrypt($file_content_raw,"aes-128-cbc",$row['qstn_key'],true,$row['qstn_vector']);

	#Decodes a JSON string
	$file_content_json= json_decode($decrypt_file_content_raw, true);

	#pdf generation function
	showPDF($row['qstn_name'], $file_content_json);
?>