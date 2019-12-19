<script>
$(function() {
		$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
</script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<?php
@ini_set('display_errors', 'off');
include('../inc/inc.php');
$id_kary=$_GET['id_kary'];
echo"<h2 align='center'>Ganti Golongan Karyawan</h1>";

$m1=mysql_query("select *from karyawan_golongan where id_kary='$id_kary'");
		while($m=mysql_fetch_array($m1))
			{
			$id_golongan=$m[id_golongan];
			$ket_kary_gol=$m[ket_kary_gol];
			$tgl_ttp_gol=$m[tgl_ttp_gol];
			$tgl_akh_gol=$m[tgl_akh_gol];
			$jamsostek=$m[jamsostek];
			}
		echo"
		<form method='post' action='index.php?task=krygol_e'>
		<table width='100%'>
		<tr>
		<td width='20%'>Golongan</td>
		<td><select name='id_golongan'>";
		$l1=mysql_query("select *from golongan order by gol ASC");
		while($l=mysql_fetch_array($l1))
			{
			echo"
			<option value='$l[id]'";
			if($l[id]==$id_golongan) {echo"SELECTED ";}
			echo">$l[gol] - $l[ket_gol]</option>
			";
			}
		echo"
		</td>
		</tr>

		<tr>
		<td>Keterangan</td>
		<td><input type='text' name='ket_kary_gol' value='$ket_kary_gol' class='form-input'></td>
		</tr>

		<tr>
		<td>Tgl Penetapan</td>
		<td><input type='text' name='tgl_ttp_gol' value='$tgl_ttp_gol' class='datepicker'></td>
		</tr>

		<tr>
		<td>Hingga</td>
		<td><input type='text' name='tgl_akh_gol' value='$tgl_akh_gol' class='datepicker'></td>
		</tr>

		<tr>
		<td>Jamsostek</td>
		<td><input type='text' name='jamsostek' value='$jamsostek' class='form-input'></td>
		</tr>

		<tr>
		<td></td>
		<td> 
		<input type='hidden' name='id_kary' value='$id_kary'>
		<input type='submit' value='GANTI' class='clean-blue'>
		</td>
		</tr>

		</table>
		</form>
		";
?>