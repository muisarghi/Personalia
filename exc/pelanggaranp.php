<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idlgr=$_GET['idlgr'];
$nmlgr=$_GET['nmlgr'];
$exp->exportWithPage("pelanggaran.php","reportpelanggaran.xls");



?>

