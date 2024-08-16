<?php
require('temporaryIdTemplate.php');

function generateTemporaryId($name, $stdNumer, $image, $course, $instructions, $fillColor) {
    $pdf = new ID('P', 'mm', 'Letter');

    $pdf->AddPage();
    $pdf->skipFooter = true;

    $imageWidth = 30;
    $imageHeight = 30;
    $pageWidth = $pdf->GetPageWidth();
    $pageHeight = $pdf->GetPageHeight();

    // $centerX = ($pageWidth - $imageWidth) / 2;
    $centerY = ($pageHeight - $imageHeight) / 2;
    
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->setY(20);
    $pdf->MultiCell($pageWidth, 10, 'Instructions', 0, 'L');

    $pdf->SetFont('Arial', '', 13);
    foreach ($instructions as $key=>$instruction) {
        $pdf->MultiCell($pageWidth - 30, 10, $key + 1 . '. ' . $instruction, 0, 'L');
    }

    $textStart = $centerY + 22;
    $pdf->SetY($textStart);
    $pdf->Image('assets/img/cdm-logo.jpg', 42, $textStart, 10, 10);

    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(74, 8, 'Colegio de Montalban', 0, 'R');

    $pdf->SetFont('Arial', '', 4);
    $pdf->MultiCell(73, -2, 'Kasiglahan Village, San Jose, Montalban, Rizal 1860', 0, 'R');
    
    // Front
    $pdf->RoundedRect(40, $centerY + 20, 53.98, 85.6, 3, '1234', 'D');

    $pdf->Image($image, 52, $textStart + 10, $imageWidth, $imageHeight);

    $pdf->SetXY(43, $textStart + 40);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(48, 5, $name, 0, 'C');

    $pdf->SetXY(45, $textStart + 53);

    $pdf->SetFont('Arial', '', 7);
    $pdf->MultiCell(42, 4, $stdNumer, 0, 'C');

    $pdf->SetXY(40.14, $textStart + 60);

    $pdf->SetFont('Arial', '', 7);
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->MultiCell(53.72, 4, $course, 0, 'C', 1);

    $pdf->SetXY(37, $textStart + 69);

    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(60, 4, '__________________', 0, 0, 'C');
    $pdf->SetXY(37, $textStart + 72);

    $pdf->SetFont('Arial', '', 6);
    $pdf->MultiCell(60, 4, 'Signature', 0, 'C');

    $pdf->SetXY(37, $textStart + 78);

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->MultiCell(60, 4, 'TEMPORARY ID', 0, 'C');

    // Back
    $pdf->RoundedRect(120, $centerY + 20, 53.98, 85.6, 3, '1234', 'D');
    $pdf->SetXY(122, $textStart + 5);

    $pdf->SetFont('Arial', '', 6);
    $pdf->SetFillColor(2, 88, 18);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->MultiCell(50, 4, 'IN CASE OF EMERGENCY, PLEASE NOTIFY', 0, 'C', 1);

    $pdf->SetFont('Arial', '', 5);
    $pdf->SetXY(122, $textStart + 10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, 'GUARDIAN CONTACT #: ____________________________', 0, 0);
    $pdf->SetXY(122, $textStart + 14);
    $pdf->Cell(60, 4, 'CDM-REGISTRAR TEL #: 0283959731', 0, 0);

    $pdf->SetFont('Arial', '', 9);
    $pdf->SetXY(124, $textStart + 30);
    $pdf->MultiCell(46, 5, "Wear this ID at all times while inside the premises of Colegio de Montalban. If found, please return  to the Registrar's Office.", 1, 'C');

    $pdf->SetXY(118, $textStart + 71);

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(60, 4, 'Dr. Joy U. Mercado', 0, 0, 'C');
    $pdf->SetXY(118, $textStart + 72);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(60, 4, '__________________', 0, 0, 'C');
    $pdf->SetXY(118, $textStart + 75);

    $pdf->SetFont('Arial', '', 5);
    $pdf->MultiCell(60, 4, 'CDM - PRESIDENT', 0, 'C');

    $outputPath = 'pdf-results/temporary-id/';
    if (!file_exists($outputPath)) mkdir($outputPath, 0777, true);

    $pdf->Output('F', $outputPath  . $name . '-temporary-id.pdf');
}
?>