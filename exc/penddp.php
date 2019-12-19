<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idpendd=$_GET['idpendd'];
$nmpendd=$_GET['nmpendd'];
$exp->exportWithPage("pendd.php","reportpendidikan.xls");



?>

