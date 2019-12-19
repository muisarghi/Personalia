<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');
$idlgr=$_GET['idlgr'];
$nmlgr=$_GET['nmlgr'];

$cap="<table align=center border=1px><th colspan='4'>DATA KARYAWAN PELANGGARAN ".$nmlgr."</th>";
$title="
<tr>
<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
</tr>";

$tmp_per_res=mysql_query("select *from langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id order by karyawan.nama_kary ASC");
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
	
	
	