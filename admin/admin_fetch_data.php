<?php
require 'admin_authenticate.php';
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

$uploadData= new stdClass();

for($i=0;$i<count($worksheet_data);$i++) {
    $uploadData->$i=new stdClass();
    $uploadData->$i->id=$worksheet_data[$i][0];
    $uploadData->$i->name=$worksheet_data[$i][1];
}

$uploadData=json_encode($uploadData);
unlink($inputFileName);
print_r($uploadData);

?>
