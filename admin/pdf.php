<?php
ob_start();

function generateRow() {
	require("connection.php");
	    $contents= '';
		
		$res=$con->query("SELECT * FROM tb_product");
		
		    while($row=$res->fetch_assoc())
			{
				
				$image=$row['Image'];
				
				
				$contents .= '
				<tr>
				    <td>'.$row['Productid'].'</td>
					<td>'.$row['ProductName'].'</td>
					<td>'.$row['Price'].'</td>
					<td><img src="productimages/'.$image.'"width="50" height="50"></td>
					<td>'.$row['Quantity'].'</td>
					
					
				</tr>
                 ';
			}


             return $contents;
        }			 
		
		
		
		require_once('tcpdf/tcpdf.php');
		$pdf=new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		
		$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont('helvetica');
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->AddPage();
		$content= '';
		$content .= '
		
		
		
		<table border="1" cellspacing="0" cellpadding="3">
		   <tr>
		   <th>Productid</th>
		   <th>ProductName</th>
		   <th>Price</th>
		   <th>Image</th>
		   <th>Quantity</th>
		   
		   
		   
		   
		    </tr>
		';
    $content .=generateRow();
	$content .='</table>';
	$pdf->writeHTML($content);
	$pdf->Output('Report.pdf', 'I');
	
?>