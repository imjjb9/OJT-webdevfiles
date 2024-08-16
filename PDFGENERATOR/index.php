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

$name = 'Baliguat, Justine Jerald Y.';
  $stdNumer = '21-01530';
  $course = 'Bachelor of Science in Computer Engineering';
  $image = 'assets/img/profile-pic.png';
  $instructions = [
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
  ];

  $fillColor = [255, 127, 80]; //rgb color

  generateTemporaryId(
    $name, $stdNumer, $image, $course, $instructions, $fillColor
  );


?>