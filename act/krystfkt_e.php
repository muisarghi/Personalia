<?php
@ini_set('display_errors', 'off');
include('../inc/inc.php');
$id=$_GET['id'];
$id_unit=$_GET['id_unit'];
echo"<h2 align='center'>Ganti Sertifikasi Karyawan</h1>";
$a1=mysql_query("select *from karyawan_sertifikat where id='$id'");
while($a=mysql_fetch_array($a1))
{
$id_kary=$a[id_kary];
$id_sertifikat=$a[id_sertifikat];
$thn_kary_stfkt=$a[thn_kary_stfkt];
}
echo"
<form method='post' action='index.php?task=krystfkt_e'>
	<table width='100%'>
	<tr>
	<td width='20%'>Sertifikat</td>
	<td><select name='id_sertifikat'>";
	$b1=mysql_query("select *from sertifikat where id_unit='$id_unit' order by id ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]'";
		if($b[id]==$id_sertifikat) {echo"SELECTED";}
		echo">$b[no_sertifikat] - $b[sertifikat]</option>
		";
		}
	echo"</select></td>
	</tr>
	
	<tr>
	<td>Tahun</td>
	<td><input type='text' name='thn_kary_stfkt' class='form-input' size='10' value='$thn_kary_stfkt'></td>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='GANTI'></td>
	
	<tr>
	</table></form>";

?>