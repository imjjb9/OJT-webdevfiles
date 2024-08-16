<?php
require('./utils/temporaryId-generator.php');

// $ovrf = new Student_OVRF();
// $ovrf->setName('Baliguat', 'Justine', 'C');
// $ovrf->setStudentNumber('21-01530');
// $ovrf->setCourse('BSCPE');
// $ovrf->setAcademicYear('2023-2024');
// $ovrf->setSemester('summer');
// $ovrf->setYearLevel('3');
// $ovrf->setComputerFee('0.00');
// $ovrf->setLaboratoryFee('0.00');
// $ovrf->setSubjects(Array(
//     array(
//         'code'=>'OJT 240',
//         'subjectDescription'=>'On the Job Training (240 Hours)',
//         'yearSec'=>'',
//         'units'=>'3',
//         'days'=>'',
//         'time'=>'',
//         'room'=>'',
//     ),
// ));

// $ovrf->generateOvrf();

$name = 'Baldia, John Julius';
$stdNumer = '14-01254';
$course = 'Bachelor of Technology and Livelihood Education Major in Information and Communication Technology';
$image = 'assets/img/profile-pic.png';
$instructions = [
  'Print the generated PDF on letter-size paper (8.5" x 11") using high-quality paper.',
  'Cut out the front and back of the ID along the guidelines, then attach the student photo.',
  'Fill in any missing details on the ID with neat handwriting, and review for accuracy.',
  'Laminate the ID or use an ID holder. Wear the ID at all times until the official one is issued.'
];

$fillColor = [255, 127, 80]; //rgb color

generateTemporaryId(
  $name,
  $stdNumer,
  $image,
  $course,
  $instructions,
  $fillColor
);
