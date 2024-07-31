<?php
require('utils/ovrf-generator.php');

$ovrf = new Student_OVRF();
$ovrf->setName('Baliguat', 'Justine Jerald', 'Yuson');
$ovrf->setStudentNumber('21-01530');
$ovrf->setCourse('BSCPE');
$ovrf->setAcademicYear('2023-2024');
$ovrf->setSemester('summer');
$ovrf->setYearLevel('3');
$ovrf->setSubjects(Array(
    array(
        'code'=>'OJT 240',
        'subjectDescription'=>'On the Job Training (240 Hours)',
        'yearSec'=>'',
        'units'=>'3',
        'days'=>'',
        'time'=>'',
        'room'=>'',
    )
));
$ovrf->generateOvrf();


?>