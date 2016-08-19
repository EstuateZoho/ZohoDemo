<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('zuoralogo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,10,'Quote',0,0,'R');
	
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(60, 60, 30, 30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
		//$cellWidth = $this->GetStringWidth($row);
        $this->Cell($w[0],6,$row,'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row,'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row,'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row,'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

}
$a = '00001';
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf ->MultiCell(49,6,'Address:710 Sansome St.San Francisco, CA 94111 USA', '', 'L', 0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 150, $y-15);
$pdf->Cell($x+20,8,'Order Number : '.$a,0,0,'R',0);
$pdf->Cell($x-10,15,'Order for : Quote testing',0,0,'R',0);
$pdf->Ln(0);

//headers

$pdf->setFillColor(230,230,230);
$pdf->SetXY($x, $y+10); 
$pdf->Cell(0,8,'Contact and Billing Details',0,1,'L',1);
//$pdf->SetXY($x, $y);

//sold to details

$pdf->Cell(0,10,'Sold to : ',0,0,'L',0);
$pdf->SetXY($x, $y+30);
$pdf->Cell(0,8,'Phone : ',0,0,'L',0);
$pdf->SetXY($x, $y+40);
$pdf->MultiCell(50,5,'Email :710 Sansome St.San Francisco, CA 94111 USA',0);


//bill to details

$pdf->SetXY($x+60, $y+18);
$pdf->Cell(0,10,'Bill to :',0,0,'L',0);
$pdf->SetXY($x+60, $y+30);
$pdf->Cell(0,8,'Phone : ',0,0,'L',0);
$pdf->SetXY($x+60, $y+40);
$pdf->MultiCell(50,5,'Email : 710 Sansome St.San Francisco, CA 94111 USA',0);

// address & PO

$pdf->SetXY($x+120, $y+20);
$pdf->MultiCell(49, 5, 'Address :710 Sansome St.San Francisco, CA 94111 USA', 0);

//headers

$pdf->setFillColor(230,230,230);
$pdf->SetXY($x, $y+60); 
$pdf->Cell(0,8,'License Terms and Conditions',0,1,'L',1);


//terms & conditions
$pdf->SetXY($x, $pdf->GetY()); 
$pdf->Cell(0,10,'Initial Term(Months): 12 ',0,0,'L',0);
$pdf->SetXY($x, $pdf->GetY()+10);
$pdf->Cell(0,8,'Renewal Term(Months): 6 ',0,0,'L',0);
$pdf->SetXY($x, $pdf->GetY()+8);
$pdf->Cell(0,8,'Auto Renew: Yes',0,0,'L',0);

$pdf->SetXY($x+70, $pdf->GetY()-18);
$pdf->Cell(0,10,'Payment Method: Check',0,0,'L',0);
$pdf->SetXY($x+70, $pdf->GetY()+10);
$pdf->Cell(0,8,' Billing Method:Email',0,0,'L',0);
$pdf->SetXY($x+70, $pdf->GetY()+8);
$pdf->Cell(0,8,'Payment Terms: Due upon Receipt',0,0,'L',0);
$pdf->SetXY($x+70, $pdf->GetY()+8);
$pdf->Cell(0,8,'Currency: USD',0,0,'L',0);

//headers
$pdf->SetXY($x, $pdf->GetY()+10);
$tableHeader = array('Product Name','Rate Plan','Quantity','Price');

$data = array('AustriaAustriaAustriaAustria','Vienna','83,859','8,075');

$pdf->FancyTable($tableHeader,$data);

$pdf->SetXY($pdf->GetX()-60, $pdf->GetY());
$pdf->Cell(30,8,'Subtotal:','LRB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,'Discount:','LRB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,'Tax:','LRB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,'Total:','LRB',0,'R',0);

$pdf->SetXY($pdf->GetX(), $pdf->GetY()-24);
$pdf->Cell(30,8,$pdf->GetX(),'RB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,$pdf->GetY(),'RB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,$pdf->GetY(),'RB',0,'R',0);
$pdf->SetXY($pdf->GetX()-30, $pdf->GetY()+8);
$pdf->Cell(30,8,$pdf->GetY(),'RB',0,'R',0);



$pdf->Output();

/*$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
$pdf->AliasNbPages();
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	//foreach($row as $column)
		$pdf->Cell(90,12,$row,1);
}
$pdf->Output();
*/
?>