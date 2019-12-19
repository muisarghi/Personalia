<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idstfkt=$_GET['idstfkt'];
$nmstfkt=$_GET['nmstfkt'];
$exp->exportWithPage("sertifikasi.php","reportsertifikasi.xls");



?>

