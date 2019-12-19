<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();


$exp->exportWithPage("gaji.php","reportgaji.xls");



?>

