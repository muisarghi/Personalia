<?php
@ini_set('display_errors', 'off');
include('../inc/inc.php');
$id=$_GET['id'];
echo"<h2 align='center'>Ganti Keahlian Karyawan</h1>";
$a1=mysql_query("select *from karyawan_ahli where id='$id'");
while($a=mysql_fetch_array($a1))
{
$id_kary=$a[id_kary];
$id_ahli=$a[id_ahli];
$ket_kary_ahli=$a[ket_kary_ahli];
}
echo"
<form method='post' action='index.php?task=kryahli_e'>
	<table width='100%'>
	<tr>
	<td width='20%'>Keahlian</td>
	<td><select name='id_ahli'>";
	$b1=mysql_query("select *from ahli where id_unit='$id_unit' order by id ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]'";
		if($b[id]==$id_ahli) {echo"SELECTED";}
		echo">$b[ahli] - $b[ket]</option>
		";
		}
	echo"</select></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_kary_ahli' class='form-input' size='10' value='$ket_kary_ahli'></td>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='GANTI'></td>
	
	<tr>
	</table></form>";

?>