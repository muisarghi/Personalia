<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');
//$id=$_GET['id'];
//a.kary b.unit c.bag
	//d.kary_dtl e.pendd f.pendd g.ahli h.ahli
	//i.sertifikat j.kary_sertfkt k.golongan l.golongan m.golongan

	$id_kary=$_GET['id'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{	
		$no_kary=$a[no_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$nama_kary=$a[nama_kary];
		$jk=$a[jk];
		$status=$a[status];
		}
	$nmkry=strtoupper($nama_kary);
	echo"
	<h2 align='center'>DATA $nmkry</h2>
	<table width='100%'>
	<tr>
	<td valign='top' width='50%'>
	";
	//////////////KARYAWAN
	echo"<br>
	<fieldset>
	<legend>$nmkry</legend>
	<table width='100%'>
	<tr>
	<td width='20%' valign='top'>Nama</td>
	<td valign='top'>$nama_kary</td>
	<td rowspan='6'><img width='113' align='center' height='170' src='foto/$id_kary.jpg'></td>
	</tr>
	
	<tr>
	<td valign='top'>No Karyawan</td>
	<td valign='top'>$no_kary</td>
	</tr>

	<tr>
	<td valign='top'>Unit Kerja</td>
	<td valign='top'>";
	$b1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($b=mysql_fetch_array($b1))
		{$nmunit=$b[nama];}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td valign='top'>Bagian</td>
	<td valign='top'>";
	$c1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($c=mysql_fetch_array($c1))
		{$nmbag=$c[nama_bag];}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td valign='top'>Jenis Kelamin</td>
	<td valign='top'>$jk</td>
	</tr>

	<tr>
	<td valign='top'>Status</td>
	<td valign='top'>$status</td>
	</tr>

	</table>
	</fieldset>
	";
	/////////////////END KARYAWAN

	//////////////////////IDENTITAS KARYW
	echo"<br><br><br>
	<fieldset>
	<legend>IDENTITAS</legend>
	<table width='100%'>";
	$d1=mysql_query("select *from karyawan_detail where id_kary='$id_kary'");
	while($d=mysql_fetch_array($d1))
		{
		$ktp=$d[ktp];
		$kota_lhr=$d[kota_lhr];
		$tgl_lhr=$d[tgl_lhr];
		$alm_kary=$d[alm_kary];
		$kota_kary=$d[kota_kary];
		$kec_kary=$d[kec_kary];
		$telp_kary=$d[telp_kary];
		$email_kary=$d[email_kary];
		}
	echo"
	<tr>
	<td width='20%' valign='top'>KTP</td>
	<td valign='top'>$ktp</td>
	</tr>

	<tr>
	<td valign='top'>Kelahiran</td>
	<td valign='top'>$kota_lhr / $tgl_lhr</td>
	</tr>

	<tr>
	<td valign='top'>Alamat</td>
	<td valign='top'>$alm_kary</td>
	</tr>
	
	<tr>
	<td valign='top'>Kecamatan</td>
	<td valign='top'>$kec_kary</td>
	</tr>

	<tr>
	<td valign='top'>Kota</td>
	<td valign='top'>$kota_kary</td>
	</tr>

	<tr>
	<td valign='top'>Telepon</td>
	<td valign='top'>$telp_kary</td>
	</tr>

	<tr>
	<td valign='top'>Email</td>
	<td valign='top'>$email_kary</td>
	</tr>

	</table>
	</fieldset>
	";
	
	//////////////////END IDENTITAS KARY
	
	//////////////////GOLONGAN
	$msg_gol=$_GET['msg_gol'];
	echo"
	<br><br><br>
	<fieldset>
	<legend>GOLONGAN</legend>
	<h4>$msg_gol</h4>";
	
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
		<table width='100%'>
		<tr>
		<td width='20%'>Golongan</td>
		<td>";
		$l1=mysql_query("select *from golongan where id='$id_golongan'");
		while($l=mysql_fetch_array($l1))
			{
			$nmgol=$l[gol];
			$ketgol=$l[ket_gol];
			}
		echo"$nmgol - $ketgol</td>
		</tr>

		<tr>
		<td>Keterangan</td>
		<td>$ket_kary_gol</td>
		</tr>

		<tr>
		<td>Tgl Penetapan</td>
		<td>$tgl_ttp_gol</td>
		</tr>

		<tr>
		<td>Hingga</td>
		<td>$tgl_akh_gol</td>
		</tr>

		<tr>
		<td>Jamsostek</td>
		<td>$jamsostek</td>
		</tr>

		</table>
		";
		
	
	echo"
	</fieldset>
	";
	
	/////////////////END GOLONGAN
	echo"
	</td>
	
	<td valign='top' width='50%'>";

	//////////////////PENDIDIKAN KARY
	$msg_pendd=$_GET['msg_pendd'];
	echo"<br>
	<fieldset>
	<legend>PENDIDIKAN</legend>
	<table width='100%'>
	<tr>
	<td colspan='5'>
	<b>$msg_pendd</b>
	</td>
	</tr>
	<tr>
	<td width='30%' align='left'>Tingkat</td>
	<td width='30%' align='center'>Tempat</td>
	<td width='30%' align='left'>Lulus</td>
	
	</tr>";
	
	$f1=mysql_query("select *from karyawan_pendd where id_kary='$id_kary'");
	while($f=mysql_fetch_array($f1))
		{
		echo"
		<tr>
		<td>";
		$idpendd=$f[id_pendd];
		$fx1=mysql_query("select *from pendd where id='$idpendd'");
		while($fx=mysql_fetch_array($fx1))
			{$nmpendd=$fx[tingkat];}
		echo"$nmpendd
		</td>
		<td>$f[tmp_kary_pendd]</td>
		<td>$f[thn_kary_pendd]</td>
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";

	///////////////////END PENDD KARY
	

	//////////////////KEAHLIAN
	$msg_ahli=$_GET['msg_ahli'];
	echo"
	<br><br><br>
	<fieldset>
	<legend>KEAHLIAN</legend>
	<table width='100%'>
	<tr>
	<td colspan='4'><b>$msg_ahli</b></td>
	</tr>
	<tr>
	<td width='40%' align='left'>Keahlian</td>
	<td width='40%' align='left'>Keterangan</td>
	
	</tr>";
	
	$h1=mysql_query("select *from karyawan_ahli where id_kary='$id_kary'");
	while($h=mysql_fetch_array($h1))
		{
		echo"
		<tr>
		<td>";
		$idahli=$h[id_ahli];
		$hx1=mysql_query("select *from ahli where id='$idahli'");
		while($hx=mysql_fetch_array($hx1))
			{$nmahli=$hx[ahli];}
		echo"$nmahli
		</td>
		<td>$h[ket_kary_ahli]</td>
		
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";
	/////////////////////////////END KEAHLIAN


	///////////////////////////Sertifikasi

	$msg_stfkt=$_GET['msg_stfkt'];
	echo"
	<br><br><br>
	<fieldset>
	<legend>SERTIFIKASI</legend>
	<table width='100%'>
	<tr>
	<td colspan='4'><b>$msg_stfkt</b></td>
	</tr>
	<tr>
	<td align='center'>Sertifikasi</td>
	<td width='10%' align='center'>Tahun</td>
	
	</tr>";
	
	$j1=mysql_query("select *from karyawan_sertifikat where id_kary='$id_kary'");
	while($j=mysql_fetch_array($j1))
		{
		echo"
		<tr>
		<td>";
		$idstfkt=$j[id_sertifikat];
		$jx1=mysql_query("select *from sertifikat where id='$idstfkt'");
		while($jx=mysql_fetch_array($jx1))
			{$no_sertifikat=$jx[no_sertifikat];
			$sertifikat=$jx[sertifikat];
			$ket_sertifikat=$jx[ket_sertifikat];
			}
		echo"[$no_sertifikat] $sertifikasi - $ket_sertifikat
		</td>
		<td align='center'> $j[thn_kary_stfkt] </td>
		
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";

	//////////////////////////END Sertifikasi

	echo"
	</td>
	</tr>

	<tr>
	<td valign='top'>";
	
	
	
	echo"</td>
	
	<td valign='top'></td>
	</tr>
	</table>
	";
?>