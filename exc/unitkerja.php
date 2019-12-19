<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');//to make database connecti
$idunit=$_GET['idunit'];
$nmunit=$_GET['nmunit'];

$cap="<table align=center border=1px><th colspan='4'>DATA KARYAWAN UNIT ".$nmunit."</th>";//CAPTION OF THIS REPORT
$title="
<tr>
<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
</tr>";//TABLE HEADER

$tmp_per_res=mysql_query("select * from karyawan where id_unit='$idunit' order by nama_kary ASC");
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
	
	
	