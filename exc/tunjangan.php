<?php
@ini_set('display_errors', 'off');
include ('../inc/inc.php');


$cap="<table align=center border=1px><th colspan='4'>DATA TUNJANGAN KARYAWAN </th>";
$title="
<tr>
	<td width='20%'><b>Unit Kerja/Bagian</b></td>
	<td width='10%' align='center'><b>Jml Karyawan</b></td>
	<td width='10%' align='right'><b>Tunjangan</b></td>
	<td width='10%' align='right'><b>Total</b></td>
	</tr>";

$a1=mysql_query("select *from unit_kerja order by nama ASC");
	while($a=mysql_fetch_array($a1))
		{
		$idunit=$a[id];
		$echo.="
		<tr>
		<td><b>".$a[nama]."</b></td>
		<td align='center'></td>
		<td align='right'><b>";
		$d=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian where id_unit='$idunit'"),0);
		$echo.="</b>
		</td>
		<td align='right'><b>";
		
		$i=mysql_result(mysql_query("select sum(tunjangan) from karyawan, unit_bagian where karyawan.id_bag=unit_bagian.id and unit_bagian.id_unit='$idunit'"),0);
		
		$echo.="</b></td>
		
		</tr>";
		
		$b1=mysql_query("select *from unit_bagian where id_unit='$idunit'");
		while($b=mysql_fetch_array($b1))
			{
			$echo.="
			<tr>
			
			<td>".$b[nama_bag]."</td>
			<td align='center'>";
			$e=mysql_result(mysql_query("select count(id) as num from karyawan where id_bag='$b[id]'"),0);
			$echo.="".$e."</td>

			<td align='right'>"; 
			$btunjangan=number_format($b[tunjangan], 0, '.', '.'); 
			$echo.="".$btunjangan."</td>
			<td align='right'>";
			$tot=$e*$b[tunjangan];
			$tot=number_format($tot, 0, '.', '.');
			$echo.="".$tot."
			</td>
			</tr>
			";
			}
			$echo.="
			<tr>
			<td></td>
			<td colspan='2' align='left'></td>
			<td align='right'><b>"; 
			$inya=number_format($i, 0, '.', '.'); 
			$echo.="".$inya."</b></td>
			
			</tr>";
		}
		$h=mysql_result(mysql_query("select sum(tunjangan) from karyawan, unit_bagian where karyawan.id_bag=unit_bagian.id"),0);
	$echo.="
	<tr>
	<td colspan='3'><b>TOTAL</b></td>
	<td align='right'><b>"; 
	$hnya=number_format($h,0,'.','.'); 
	$echo.="$hnya</b></td>
	</tr>";


echo $cap.$title.$echo."</table>";						
						
?>	
	
	
	