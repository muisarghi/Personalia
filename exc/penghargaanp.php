<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idawd=$_GET['idawd'];
$nmawd=$_GET['nmawd'];
$exp->exportWithPage("penghargaan.php","reportpenghargaan.xls");



?>

