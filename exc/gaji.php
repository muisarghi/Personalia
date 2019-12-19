<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');


$cap="<table align=center border=1px><th colspan='3'>DATA GAJI KARYAWAN </th>";
$title="
<tr>
	<td width='30%'><b>Unit Kerja/Bagian</b></td>
	<td width='30%' align='right'><b>Gaji Pokok</b></td>
	<td width='30%' align='right'><b>Tunjangan</b></td>
	
	</tr>";

$a1=mysql_query("select *from unit_kerja order by nama ASC");
	while($a=mysql_fetch_array($a1,MYSQL_BOTH))
		{
		$idunit=$a[id];
		$html.="
		<tr>
		<td><b>".$a[nama]."</b></td>
		<td align='right'>";
		$c=mysql_result(mysql_query("select SUM(gaji) as NUM from unit_bagian where id_unit='$idunit'"),0);
		 $c1=number_format($c, 0, '.', '.');
		$html.="
		</td>
		<td align='right'>";
		$d=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian where id_unit='$idunit'"),0);
		$d1=number_format($d, 0, '.', '.');
		$html.="
		</td>
		</tr>";
		
		$b1=mysql_query("select *from unit_bagian where id_unit='$idunit'");
		while($b=mysql_fetch_array($b1,MYSQL_BOTH))
			{
			$html.="
			<tr>
			<td>".$b[nama_bag]."</td>
			<td align='right'>"; $b11=number_format($b[gaji], 0, '.', '.'); $html.="".$b11."</td>
			<td align='right'>"; $b12=number_format($b[tunjangan], 0, '.', '.'); $html.="".$b12."</td>
			</tr>
			";
			}
		
		$html.="
		<tr>
		<td></td>
		<td align='right'><b>".$c1."</b></td>
		<td align='right'><b>".$d1."</b></td>
		
		</tr>
		";
		}
		$e=mysql_result(mysql_query("select SUM(gaji) as NUM from unit_bagian "),0);
		$e1=number_format($e, 0, '.', '.');
		$f=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian "),0);
		$f1=number_format($f, 0, '.', '.');

	$html.="
	<tr>
	<td><font size='4'><b>TOTAL</b></td>
	<td align='right'><font size='4'><u><b>".$e1."</b></td>
	<td align='right'><font size='4'><u><b>".$f1."</b></td>
	
	</tr>";
/*$tmp_per_res=mysql_query("select *from unit_kerja order by nama ASC");
while($row=mysql_fetch_array($tmp_per_res,MYSQL_BOTH))
{

$body.="<tr>
<td>".$row['nama_kary']."</td>
<td>".$row['no_kary']."</td>
<td>".$row['jk']."</td>
<td>".$row['status']."</td>
</tr>";
					

}
*/
echo $cap.$title.$html."</table>";						
						
?>	
	
	
	