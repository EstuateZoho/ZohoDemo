

<?php

function __autoload($class){
  @include('./controller/' . $class . '.php');
  @include('./model/' . $class . '.php');
}

error_reporting(E_ERROR | E_PARSE);

session_start();
$error_msg = array();

		$id = $_REQUEST['id'];
		$body = InvoiceManager::getInvoicePdf($id);
		//print_r($body); exit;	
				/*----------------------------------------------FPDF----------------------------------------------*/
				require('./fpdf/fpdf.php');

					class PDF extends FPDF
					{
							protected $B = 0;
							protected $I = 0;
							protected $U = 0;
							protected $HREF = '';
						function WriteHTML($html)
						{
							// HTML parser
							$html = str_replace("\n",' ',$html);
							$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
							foreach($a as $i=>$e)
							{
								if($i%2==0)
								{
									// Text
									if($this->HREF)
										$this->PutLink($this->HREF,$e);
									else
										$this->Write(5,$e);
								}
								else
								{
									// Tag
									if($e[0]=='/')
										$this->CloseTag(strtoupper(substr($e,1)));
									else
									{
										// Extract attributes
										$a2 = explode(' ',$e);
										$tag = strtoupper(array_shift($a2));
										$attr = array();
										foreach($a2 as $v)
										{
											if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
												$attr[strtoupper($a3[1])] = $a3[2];
										}
										$this->OpenTag($tag,$attr);
									}
								}
							}
						}
						function OpenTag($tag, $attr)
						{
							// Opening tag
							if($tag=='B' || $tag=='I' || $tag=='U')
								$this->SetStyle($tag,true);
							if($tag=='A')
								$this->HREF = $attr['HREF'];
							if($tag=='BR')
								$this->Ln(5);
						}

						function CloseTag($tag)
						{
							// Closing tag
							if($tag=='B' || $tag=='I' || $tag=='U')
								$this->SetStyle($tag,false);
							if($tag=='A')
								$this->HREF = '';
						}

						function SetStyle($tag, $enable)
						{
							// Modify style and select corresponding font
							$this->$tag += ($enable ? 1 : -1);
							$style = '';
							foreach(array('B', 'I', 'U') as $s)
							{
								if($this->$s>0)
									$style .= $s;
							}
							$this->SetFont('',$style);
						}

						function PutLink($URL, $txt)
						{
							// Put a hyperlink
							$this->SetTextColor(0,0,255);
							$this->SetStyle('U',true);
							$this->Write(5,$txt,$URL);
							$this->SetStyle('U',false);
							$this->SetTextColor(0);
						}
						// Page header
						function Header()
						{
							// Logo
							//$this->Image('./fpdf/zuoralogo.png',10,6,30);
							
							// Arial bold 15
							$this->SetFont('Arial','B',15);
							//$this->Cell(0,6,$body[0][company_name],0,0,'L');
							//$this->Cell(0,6,$body[invoice][billing_address][country],0,0,'L');
							// Move to the right
							//$this->Cell(20);
							// Title
							
							$this->Cell(180,10,'INVOICE',0,0,'R');
							
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

					}
				
					
					$a = '00001';
					$pdf = new PDF();
					$pdf->AliasNbPages();
					$pdf->AddPage();
					$pdf->SetFont('Times','B',9);

					$x = $pdf->GetX();
					$y = $pdf->GetY();
					
					
					$pdf->Cell($x+3,$y-60,ucfirst($body[0][company_name]),'','L',0);
					/* $pdf->SetXY($pdf->GetX()-5,$pdf->GetY());
					$pdf->SetFont('Times','',8);
					$pdf->Cell($x,$y-50,$body[invoice][billing_address][country],'','L',0);
					 */
					$pdf->SetXY($x,$y);
					$pdf->SetFont('Times','B',9);
					$pdf ->MultiCell($x+10,$y,'Bill To: ', '', 'L', 0);
					$pdf->SetFont('Times','',8);
					$pdf->SetXY($x, $y+5);
					$pdf ->MultiCell($x+20,$y,ucfirst($body[invoice][customer_name]), '', 'L', 0);
					$pdf->SetXY($x , $y+10);
					$pdf ->MultiCell($x+25,$y,$body[invoice][billing_address][address], '', 'L', 0);
					$pdf ->MultiCell($x+25,$y-50,ucfirst($body[invoice][billing_address][city]).' - '.$body[invoice][billing_address][zip], '', 'L', 0);
					$pdf ->MultiCell($x+25,$y,$body[invoice][billing_address][state], '', 'L', 0);
					$pdf ->MultiCell($x+25,$y-50,$body[invoice][billing_address][country], '', 'L', 0);
					
					$pdf->SetXY($x + 150, $y-15);
					
					$pdf->Cell($x+18,$y-20,'#'.$body[invoice][number],0,0,'R',0);
					
					$pdf->Cell($x-10,$y,'Balance Due',0,0,'R',0);
					$pdf->SetFont('Times','B',9);
					$pdf->SetXY($x,$y);
					$pdf->Cell($x+165,$y-20,$body[invoice][currency_symbol].number_format($body[invoice][balance], 2,'.', ','),0,0,'R',0);
					$pdf->SetFont('Times','',8);
					
					$pdf->SetXY($pdf->GetX()+30, $pdf->GetY()+10);
					$pdf->Cell(-50,20,'Invoice Date :','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(20,20,$body[invoice][invoice_date],'',0,'R',0); 
					
					$pdf->SetXY($pdf->GetX()+30, $pdf->GetY()+10);
					$pdf->Cell(-50,8,'Terms : ','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(20,8,$body[0][payment_terms],'',0,'R',0); 
					
					$pdf->SetXY($pdf->GetX()+30, $pdf->GetY()+5);
					$pdf->Cell(-50,8,'Due Date : ','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(20,8,$body[invoice][due_date],'',0,'R',0); 
										
					$pdf->Ln(0);

						$pdf->SetFillColor(0,0,0);
						$pdf->SetTextColor(255);
						//$pdf->SetDrawColor(0,47,92, 0.8);
						$pdf->SetDrawColor(204,204,204);
						$pdf->SetLineWidth(.3);
						$pdf->SetFont('','B');
						// Header
						if($body[invoice][coupons]){
							$w = array(10,60, 30, 30, 30, 30);
							$pdf->SetXY($x, $pdf->GetY()+20);
							$header = array('#','Item & Description ','Qty','Rate','Discount','Amount');
						}else{
							$w = array(10,60, 60, 30, 30);
							$pdf->SetXY($x, $pdf->GetY()+20);
							$header = array('#','Item & Description ','Qty','Rate', 'Amount');
						}
						
						for($i=0;$i<count($header);$i++)
							$pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$pdf->Ln();
						// Color and font restoration
						$pdf->SetFillColor(224,235,255);
						$pdf->SetTextColor(0);
						$pdf->SetFont('Times','',9);
						// Data
						$fill = false;
					
					$slno = 1;
					foreach($body[invoice][invoice_items] as $row){
						if($body[invoice][coupons]){
							$pdf->Cell($w[0],6,$slno,'B',0,'L','');
							$pdf->Cell($w[1],6,$row[name],'B',0,'L','');
							$pdf->Cell($w[2],6,$row[quantity],'B',0,'L','');
							$pdf->Cell($w[3],6,number_format($row[price], 2,'.', ','),'B',0,'L','');
							$pdf->Cell($w[4],6,number_format($row[discount_amount], 2,'.', ','),'B',0,'L','');
							$pdf->Cell($w[5],6,number_format($row[item_total], 2,'.', ','),'B',0,'L','');
						}else{
							$pdf->Cell($w[0],6,$slno,'B',0,'L','');
							$pdf->Cell($w[1],6,$row[name],'B',0,'L','');
							$pdf->Cell($w[2],6,$row[quantity],'B',0,'L','');
							$pdf->Cell($w[3],6,number_format($row[price], 2,'.', ','),'B',0,'L','');
							$pdf->Cell($w[4],6,number_format($row[item_total], 2,'.', ','),'B',0,'L','');
						}
						$pdf->Ln();
						$fill = !$fill;
						$slno++;
					}			 
				
				//print_r($row); 
				// Closing line
				$pdf->Cell(array_sum($w),0,'','T');	
				
					$pdf->SetXY($pdf->GetX()-60, $pdf->GetY());
					$pdf->Cell(30,8,'Subtotal:','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(30,8,number_format($body[invoice][sub_total], 2,'.', ','),'',0,'R',0); 
					
					if($body[invoice][taxes][0][tax_name]){
						$pdf->SetXY($pdf->GetX()-60, $pdf->GetY()+8);
						$pdf->Cell(30,8,$body[invoice][taxes][0][tax_name],'',0,'R',0);
						
						$pdf->SetXY($pdf->GetX(), $pdf->GetY());
						$pdf->Cell(30,8,number_format($body[invoice][taxes][0][tax_amount], 2,'.', ','),'',0,'R',0);
					}
					$pdf->SetXY($pdf->GetX()-60, $pdf->GetY()+8);
					$pdf->Cell(30,8,'Total:','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(30,8,$body[invoice][currency_symbol].number_format($body[invoice][total], 2,'.', ','),'',0,'R',0); 
					
					$pdf->SetXY($pdf->GetX()-60, $pdf->GetY()+8);
					$pdf->Cell(30,8,'Payment Made:','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(30,8,number_format($body[invoice][payment_made], 2,'.', ','),'',0,'R',0); 
					
					$pdf->SetXY($pdf->GetX()-60, $pdf->GetY()+8);
					$pdf->Cell(30,8,'Balance Due:','',0,'R',0);
					
					$pdf->SetXY($pdf->GetX(), $pdf->GetY());
					$pdf->Cell(30,8,$body[invoice][currency_symbol].number_format($body[invoice][balance], 2,'.', ','),'',0,'R',0); 

					$pdf->SetXY($pdf->GetX(), $pdf->GetY());  
					
					$pdf->Output();
					
					/*----------------------------------------------FPDF----------------------------------------------*/
					
?>

