<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');
$idgol=$_GET['idgol'];
$nmgol=$_GET['nmgol'];

$cap="<table align=center border=1px><th colspan='4'>DATA KARYAWAN GOLONGAN ".$nmgol."</th>";
$title="
<tr>
<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
</tr>";

$tmp_per_res=mysql_query("select *from karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id order by karyawan.nama_kary ASC");
while($row=mysql_fetch_array($tmp_per_res,MYSQL_BOTH))
{

$body.="<tr>
<td>".$row['nama_kary']."</td>
<td>".$row['no_kary']."</td>
<td>".$row['jk']."</td>
<td>".$row['status']."</td>
</tr>";
					

}
echo $cap.$title.$body."</table>";						
						
?>	
	
	
	