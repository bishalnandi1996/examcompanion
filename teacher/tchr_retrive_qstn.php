<?php
require 'tchr_authenticate.php';
require '../PhpSpreadSheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$inputFileType = 'Xlsx';
$inputFileName = '../raw_uploaded_file/'.$_GET['filename'];


/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);

$worksheetData = $reader->listWorksheetInfo($inputFileName);

foreach ($worksheetData as $worksheet) {
    $sheetName = $worksheet['worksheetName'];
    break;
}

/**  Load $inputFileName to a Spreadsheet Object  **/
$reader->setLoadSheetsOnly($sheetName);

$spreadsheet = $reader->load($inputFileName);

$worksheet = $spreadsheet->getActiveSheet();
$worksheet_data=$worksheet->toArray();


$question="";
for($i=1;$i<count($worksheet_data);$i++) {
    $question.="insert into question_subjectwise(qstn,option_a,option_b,option_c,option_d,answer,subj_id) values('".mysqli_real_escape_string($link,$worksheet_data[$i][1])."','".mysqli_real_escape_string($link,$worksheet_data[$i][2])."','".mysqli_real_escape_string($link,$worksheet_data[$i][3])."','".mysqli_real_escape_string($link,$worksheet_data[$i][4])."','".mysqli_real_escape_string($link,$worksheet_data[$i][5])."','".mysqli_real_escape_string($link,strtolower($worksheet_data[$i][6]))."',".$_GET['subject'].");";
}

unlink($inputFileName);
print_r($question);
?>
