<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idbag=$_GET['idbag'];
$nmbag=$_GET['nmbag'];
$exp->exportWithPage("unitbag.php","reportunitbag.xls");



?>

