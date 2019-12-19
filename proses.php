<?php
@ini_set('display_errors', 'off');
include('inc/inc.php');
//session_start();
ob_start();	
//if(session_is_registered('pes2'))
//{



$katanyo = $_POST['q'];
$query = mysql_query("select *from karyawan where nama_kary like '%$katanyo%'");
while($k=mysql_fetch_array($query))
	{
	$id=$k[id];
	$nama=$k[nama_kary];
	$no_kary=$k[no_kary];
	
    echo '<li onClick="isinyo(\''.$k[nama_kary].'-'.$k[no_kary].'\');" style="cursor:pointer"> '.$nama.' ['.$no_kary.'] </li>';}






//}
//else
//{}
?>
