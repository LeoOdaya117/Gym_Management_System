<?php


require('fpdf186/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Diet Plan', 0, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the HTML content from the "dietplanto" div
    $htmlContent = captureHTMLContent();

    // Generate the PDF from the HTML content
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $htmlContent);
}

// Output the PDF
$pdf->Output();

