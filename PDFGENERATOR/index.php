<?php
require('utils/pdf-generator.php');

$name = "Brao, Rizza Mae C.";
$position = "Full-Time Faculty";
$comments = "Ok namn siya magturo, magaling magturo c maam";
$strengths = Array("Good at explaining the entire lesson", "Be on time on our class, elaborate more. Teach more.");
$toImprove = Array("Strict teacher", "Giving more alternative formulas");

generateEvaluationPDF($name, $position, $comments, $strengths, $toImprove);

?>