<?php
@ini_set('display_errors', 'off');
include_once('ExportToExcel.class.php');
include ('../inc/inc.php');
$exp=new ExportToExcel();

$idahli=$_GET['idahli'];
$nmahli=$_GET['nmahli'];
$exp->exportWithPage("ahli.php","reportkeahlian.xls");



?>

