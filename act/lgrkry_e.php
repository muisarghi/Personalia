<?php
	echo"
	<form method='post' action='index.php?task=lgrkry_e2'>
	<table>
	<tr>
	<td width='20%'>Pelanggaran</td>
	<td><select name='id_langgar'>
	<option value='' selected='selected' disabled='disabled'>[ Pelanggaran ]</option>";
	$f1=mysql_query("select *from langgar where id_unit='$idunit'");
	while($f=mysql_fetch_array($f1))
		{
		echo"<option value='$f[id]'>$f[jns_langgar] - $f[langgar]</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Sanksi</td>
	<td><input type='text' name='sanksi_lgr' class='form-input'></td>
	</tr>

	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_lgr' class='form-input' size='40'></td>
	</tr>

	<tr>
	<td>Tanggal</td>
	<td><input type='text' name='tgl_lgr' class='datepicker' class='form-input'></td>
	</tr>

	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='GANTI' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>
	</table>";
?>