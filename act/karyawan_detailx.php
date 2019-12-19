<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');
$id=$_GET['id'];
	$x1=mysql_query("select *from karyawan, karyawan_detail where karyawan.id=karyawan_detail.id_kary and karyawan.id='$id'");
	while($x=mysql_fetch_array($x1))
		{
		$no_kary=$x[no_kary];
		$id_unit=$x[id_unit];
		$id_bag=$x[id_bag];
		$nama_kary=$x[nama_kary];
		$jk=$x[jk];
		$status=$x[status];
		$jamsostek=$x[jamsostek];
		$ktp=$x[ktp];
		$tgl_ttp=$x[tgl_ttp];
		$kota_lhr=$x[kota_lhr];
		$tgl_lhr=$x[tgl_lhr];
		$alm_kary=$x[alm_kary];
		$kota_kary=$x[kota_kary];
		$kec_kary=$x[kec_kary];
		$telp_kary=$x[telp_kary];
		$email_kary=$x[email_kary];
		}
	echo"
	
	<h2 align='center'>EDIT DATA KARYAWAN: "; echo strtoupper($nama_kary); echo"</h2>

	<form  action='index.php?task=kary_eb' method='post' enctype='multipart/form-data'>
	<table width='100%' border='0'>
	<tr>
	<td width='50%'>
	
	<table width='100%' border='0'>
	<tr>
	<td width='25%'>No Karyawan</td>
	<td>$no_kary</td>
	</tr>
	
	<tr>
	<td width='25%'>Nama Karyawan</td>
	<td><input type='text' name='nama_kary' value='$nama_kary' class='form-input'></td>
	</tr>
	
	<tr>
	<td width='20%'>No KTP</td>
	<td><input type='text' name='ktp' value='$ktp' class='form-input'></td>
	</tr>

	<tr>
	<td width='25%'>Jenis Kelamin</td>
	<td>
	<select name='jk'>
	<option value=''>[Jenis Kelamin]</option>
	<option value='Laki-Laki' "; if ($jk=='Laki-Laki'){echo"SELECTED";} echo">Laki-Laki</option>
	<option value='Perempuan'"; if($jk=='Perempuan'){echo"SELECTED";}echo">Perempuan</option>
	</select>
	</td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>"; ?>
	<select name="id_unit" id="XXselectCat" onchange="" class="chzn-select">
	<option value=" ">- Unit Kerja -</option>
	<?php
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
	{
    echo"<option rel='".$a[id]."' value='$a[id]' ";
	if($a[id]==$id_unit) echo"SELECTED ";
	echo"
	>$a[nama]</option>";
	}
    ?>
    </select>
	
	<?php
	echo"
	</td>
	</tr>
	
	<tr>
	<td>Bagian Unit Kerja</td>
	<td>"; ?>
	 <select name="id_bag" id="XXselectSubCat" >
        <option value=" ">- Unit Bagian -</option>
        <?php
          $b1=mysql_query("select *from unit_bagian order by id ASC");
		while($b=mysql_fetch_array($b1))
		{
            echo"<option value='$b[id]' class='$b[id_unit]'";
			if($b[id]==$id_bag) echo"SELECTED";
			echo">$b[nama_bag]</option>";
		}
        ?>
    </select>
	<?php
	echo"
	</td>
	</tr>

	<tr>
	<td>Status Perkawinan</td>
	<td>
	<select name='status'>
	<option value=''>[Status]</option>
	<option value='Menikah' "; if($status=='Menikah'){echo"SELECTED";}echo">Menikah</option>
	<option value='Belum Menikah' "; if($status=='Belum Menikah'){echo"SELECTED";}echo">Belum Menikah</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Tanggal Penetapan</td>
	<td>";
	$ttp=explode('-', $tgl_ttp);
	$ttptgl=$ttp[0];
	$ttpbln=$ttp[1];
	$ttpthn=$ttp[2];
	
	echo"
	<select name='tgl_ttp'>
	";
	for($c=1;$c<=31;$c++)
		{
		echo"<option value='$c' "; 
		if($c==$ttptgl) {echo"SELECTED";}
		echo">$c</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='bln_ttp'>
	";
	for($d=1;$d<=12;$d++)
		{
		echo"<option value='$d' ";
		if($d==$ttpbln) {echo"SELECTED";}
		echo">$d</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='thn_ttp'>
	";
	$thnw=date('Y');
	for($e=$thnw; $e>=1900; $e--)
		{
		echo"<option value='$e' ";
		if($e==$ttpthn) {echo"SELECTED";}
		echo">$e</option>";
		}
	echo"
	</select>

	</td>
	</tr>

	<tr>
	<td>Jamsostek</td>
	<td><input type='text' name='jamsostek' value='$jamsostek' class='form-input'></td>
	</tr>
	</table>
	</td>
	
	<td>
	<table width='100%' border='0'>
	

	<tr>
	<td width='20%'>Tanggal Lahir</td>
	<td>
	";
	$lhr=explode('-', $tgl_lhr);
	$lhrtgl=$lhr[0];
	$lhrbln=$lhr[1];
	$lhrthn=$lhr[2];
	echo"
	<select name='tgl_lhr'>
	";
	for($f=1;$f<=31;$f++)
		{
		echo"<option value='$f' ";
		if($f==$lhrtgl) {echo"SELECTED";}
		echo">$f</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='bln_lhr'>
	";
	for($g=1;$g<=12;$g++)
		{
		echo"<option value='$g' ";
		if($g==$lhrbln) {echo"SELECTED";}
		echo">$g</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='thn_lhr'>
	";
	//$thnw=date('Y');
	for($h=$thnw; $h>=1900; $h--)
		{
		echo"<option value='$h' ";
		if($h==$lhrthn) {echo"SELECTED";}
		echo">$h</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Kota Lahir</td>
	<td><input type='text' name='kota_lhr' value='$kota_lhr' class='form-input'></td>
	</tr>

	<tr>
	<td>Alamat</td>
	<td><input type='text' name='alm_kary' value='$alm_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Kota</td>
	<td><input type='text' name='kota_kary' value='$kota_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Kecamatan</td>
	<td><input type='text' name='kec_kary' value='$kec_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Telpon</td>
	<td><input type='text' name='telp_kary' value='$telp_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Email</td>
	<td><input type='text' name='email_kary' value='$email_kary' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Foto</td>
	<td>
	<img src='foto/$id.jpg'><br><br>
	<input type='file' name='foto_kary'></td>
	</tr>
	</table>

	</td>
	</tr>
	
	<tr>
	<td colspan='2' align='center'>
	<input type='hidden' name='no_kary' value='$no_kary'>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />

		</td>
	</tr>
	</table>
	</form>
	
	";
//<input type='submit' value='GANTI' class='clean-blue' /> 

?>