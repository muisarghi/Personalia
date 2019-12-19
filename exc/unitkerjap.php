<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idunit=$_GET['id_unit'];
$nmunit=$_GET['nmunit'];
$exp->exportWithPage("unitkerja.php","reportunitkerja.xls");



?>

