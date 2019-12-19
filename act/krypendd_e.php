

<?php
@ini_set('display_errors', 'off');
include('../inc/inc.php');
$id=$_GET['id'];
echo"<h2 align='center'>Ganti Pendidikan Karyawan</h1>";
$a1=mysql_query("select *from karyawan_pendd where id='$id'");
while($a=mysql_fetch_array($a1))
{
$id_kary=$a[id_kary];
$id_pendd=$a[id_pendd];
$tmp_kary_pendd=$a[tmp_kary_pendd];
$thn_kary_pendd=$a[thn_kary_pendd];
}
echo"
<form method='post' action='index.php?task=krypend_e'>
	<table width='100%'>
	<tr>
	<td width='20%'>Tingkat</td>
	<td><select name='id_pendd'>";
	$b1=mysql_query("select *from pendd order by id ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]'";
		if($b[id]==$id_pendd) {echo"SELECTED";}
		echo">$b[tingkat]</option>
		";
		}
	echo"</select></td>
	</tr>
	
	<tr>
	<td>Tempat</td>
	<td><input type='text' name='tmp_kary_pendd' class='form-input' value='$tmp_kary_pendd'></td>
	</tr>
	
	<tr>
	<td>Tahun</td>
	<td><input type='text' name='thn_kary_pendd' class='form-input' size='10' value='$thn_kary_pendd'></td>
	</tr>


	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='GANTI'></td>
	
	<tr>
	</table></form>";

?>