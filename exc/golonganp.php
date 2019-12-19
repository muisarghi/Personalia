<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idgol=$_GET['idgol'];
$nmgol=$_GET['nmgol'];
$exp->exportWithPage("golongan.php","reportgolongan.xls");



?>

