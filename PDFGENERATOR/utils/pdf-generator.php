<?php
require('fpdf/fpdf.php');

// This pdf generator module takes the following parameters

// 1. $employeeName - String
// 2. $position - String
// 3. $comments - String
// 4. $strengths - Array of strings
// 5. $toImproves - Array of strings
// the filename of the generated pdf is unique per employee

class PDF extends FPDF
{
    function Header()
    {
        $initialHeaders = array("Republic of the Philippines", "Province of Rizal", "Municipality of Rodriguez", "Colegio De Montalban", "Kasiglahan Village San Jose Rodriguez, Rizal");
        $this-> Image('assets/img/rodriguez-logo.png',20,14,25,25);
        $this-> Image('assets/img/cdm-logo.jpg',165,14,25,25);
        for($x=0; $x < sizeof($initialHeaders); $x++){
            if($x == 3){
                $this->SetFont('Arial', 'BI', '16');
            }else{
                $this->SetFont('Arial', '', '10');
            }
            // Move to the right
            $this->Cell(80);
            // Framed title
            $this->Cell(30, 10, $initialHeaders[$x], 0, 0, 'C');
            // Line break
            $this->Ln(5);
        }
        $this->Ln(5);
        $this->Line(20, 42, 210-20, 42);
    }
}


function generateEvaluationPDF($employeeName, $position, $comments, $strengths,  $toImproves){
    $datetime = date('YmdHis');
    $randomUUID = uniqid();
    $legends = Array(
        "1.00-1.80 - Poor Performance",
        "1.81-2.61 - Performance Needs Improvement",
        "2.62-3.42 - Satisfactory Performance",
        "3.43-4.23 - Very Satisfactory Performance",
        "4.24-5.00 - Excellent Performance",
    );

    $pdf = new PDF('P', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', '14');
    $pdf->Ln(6);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, "Results of the Students Evaluation of Teacher's Performance", 0, 0, 'C');
    $pdf->Ln(6);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, "First Semester, Academic Year 2023-2024", 0, 0, 'C');
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Ln(15);
    $pdf->Cell(14, 10, "Name: ", 0, 0, '');
    $pdf->SetFont('Arial', 'U', '11');
    $pdf->Cell(0, 10, $employeeName, 0, 0, '');
    $pdf->Ln(6);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(0, 10, $position, 0, 0, '');
    $pdf->Ln(16);
    $pdf->Cell(20, 5, "Komento: ", 0, 0, '');
    $pdf->SetFont('Arial', '', '11');
    $pdf->MultiCell(0, 5, $comments, 0, "L");
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'BI', '11');
    $pdf->Cell(20, 5, "KALAKASAN: ", 0, 0, '');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', '11');
    foreach($strengths as $strength){
        $pdf->Cell(0, 5, $strength, 0, 0, "L");
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'BI', '11');
    $pdf->Cell(20, 5, "SAKLAW NA DAPAT BAGUHIN: ", 0, 0, '');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', '11');
    foreach($toImproves as $toImprove){
        $pdf->Cell(0, 5, $toImprove, 0, 0, "L");
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Prepared By: ", 0, 0, '');
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(20, 5, "Rheza Maureen Joy Y. Gabinete, MBA, LPT", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(20, 5, "Officer in Charge", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Office of the Vice President of Academic Affairs", 0, 0, '');
    $pdf->Ln(15);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Noted By:", 0, 0, '');
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(20, 5, "Joy U Mercado, Ph. D., LPT", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(20, 5, "Colegio de Montalban President", 0, 0, '');
    $pdf->Ln(15);
    $pdf->Cell(93);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(15, 6, "Legend: ", 0, 0, '');
    $pdf->SetFont('Arial', '', '11');
    for($x=0; $x < sizeof($legends); $x++){
        if($x == 0){
            $pdf->Cell(1);
        }else{
            $pdf->Cell(109); 
        }
        $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
    }

    // second page

    $pdf->AddPage();

    $filePath = 'public/evaluation-pdf' . '/' . $datetime . '-' . $randomUUID . '-' . $employeeName . '-evaluation.pdf';
    
    // change this to true if you want a unique name of the pdf file
    $isUniqueName = true;
    $isUniqueName ? $pdf->Output('F', $filePath) : $pdf->Output('F', "evaluation.pdf");


    echo "pdf generated successfully";
}


?>