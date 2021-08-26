<?php require "includes/vendor/fpdf/fpdf.php";?>
<?php
	$title = "The PDF Report";
	$body = 'Here is a test report';
	$filename= "test1.pdf";
	$method = 'I';
	$pdf= new FPDF();
	$pdf->AddPage(); //creates a new PDF
	$pdf->SetFont('Arial', '', 12); //this is an Arial with a 12 point font. The 2nd parameter is the font styling B = Bold, U = Underline, I = Italics 
	$pdf->Cell(190,10,$title, 1,0);
	$pdf->Cell(60,5,'Powered by FPDF.',1,1,'C',0); //width (max 190), height, string, border, line, alignment, fill, link
	$pdf->output('PDFreports/'.$filename, $method,true); //destination/filename, command F=save to folder I=Save inline (default value), is UTF8 default=false
?>
