<?php
require('table-formatter.php');

// This pdf generator module takes the following parameters

// 1. $name - String
// 2. $position - String
// 3. $comments - String
// 4. $strengths - Array of strings
// 5. $toImproves - Array of strings
// 5. $tableData - Two dimensional array of strings
// the filename of the generated pdf is unique per employee

class PDF extends PDF_MC_Table
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
        $this->Ln(6);
        $this->SetFont('Arial', 'B', '14');
        $this->Cell(80);
        $this->Cell(30, 5, "Results of the Students Evaluation of Teacher's Performance", 0, 0, 'C');
        $this->Ln(6);
        $this->Cell(80);
        $this->Cell(30, 5, "First Semester, Academic Year 2023-2024", 0, 0, 'C');
        $this->Ln(10);
    }
}


function generateEvaluationPDF(
    $name, 
    $position, 
    $comments, 
    $strengths,  
    $toImproves, 
    $tableData,  
    $overallRating,
    $adjectiveRating,
    $instructionGrade,
    $classroomManagementGrade,
    $assessmentGrade,
    $adultLearningPracticesGrade
    ){
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
    // first Page
    $pdf->AddPage();
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(14, 10, "Name: ", 0, 0, '');
    $pdf->SetFont('Arial', 'U', '11');
    $pdf->Cell(0, 10, $name, 0, 0, '');
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
    $pdf->cell(15, 15, '', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', '11');
    $pdf->cell(14, 7, 'Name:', 0, 0, 'L');
    $pdf->setFont('Arial', 'U', '11');
    $pdf->cell(43, 7, $name, 0, 0, 'L');
    $pdf->cell(20, 7, '', 0, 0, 'L');
    $pdf->setFont('Arial', 'B', '11');
    $pdf->cell(47, 7, 'Numerical Overall Rating: ', 0, 0, 'C');
    $pdf->cell(10, 7, $overallRating, 0, 1, 'C');

    $pdf->setFont('Arial', 'B', '11');
    $pdf->cell(75, 7, 'Full-time Faculty', 0, 0, 'L');
    $pdf->cell(33, 7, 'Adjective Rating: ', 0, 0, 'L');
    $pdf->cell(40, 7, $adjectiveRating, 0, 1, 'L');

    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->setFont('Arial', '', '11');
    $pdf->cell(40, 7, 'A. Instruction', 0, 0, 'L');
    $pdf->cell(80, 7, $instructionGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'B. Classroom Management', 0, 0, 'L');
    $pdf->cell(80, 7, $classroomManagementGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'C. Assessment', 0, 0, 'L');
    $pdf->cell(80, 7, $assessmentGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'D. Adult Learning Practices', 0, 0, 'L');
    $pdf->cell(80, 7, $adultLearningPracticesGrade, 0, 1, 'C');

    #padding
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

    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', '11');
    $pdf->Cell(93);
    $pdf->Cell(15, 6, "Legend: ", 0, 0, '');
    $pdf->SetFont('Arial', '', '11');

    for ($x=0; $x < sizeof($legends); $x++) {
      if ($x == 0) {
        $pdf->Cell(1);
      } else {
        $pdf->Cell(109);
      }
      $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
    }

    // Third page
    $pdf->AddPage();
    // $pdf->ln(10);
    $pdf->SetWidths(Array(93, 93));
    $pdf->SetLineHeight(5);

    foreach($tableData as $item){
        $pdf->Row(Array(
            $item['strength'],
            $item['weakness']
        ));
    }

    $filePath = 'pdf-results' . '/' . $datetime . '-' . $randomUUID . '-' . $name . '-evaluation.pdf';
    
    // change this to true if you want a unique name of the pdf file
    $isUniqueName = false;
    $isUniqueName ? $pdf->Output('F', $filePath) : $pdf->Output('F', "evaluation.pdf");


    echo "pdf generated successfully";
}


?>