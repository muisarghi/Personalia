<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');//to make database connecti
$idbag=$_GET['idbag'];
$nmbag=$_GET['nmbag'];

$cap="<table align=center border=1px><th colspan='4'>DATA KARYAWAN UNIT BAGIAN ".$nmbag."</th>";
$title="
<tr>
<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
</tr>";

$tmp_per_res=mysql_query("select * from karyawan where id_bag='$idbag' order by nama_kary ASC");
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
	
	
	