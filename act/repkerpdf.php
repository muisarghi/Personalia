<?php
@ini_set('display_errors', 'off');
include('../inc/inc.php');
include('../phpToPDF.php') ;
?>


	<?php
	$idunit=$_GET['idunit'];
	$nmunit=$_GET['nmunit'];

	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	
	<h2 align='center'>DATA KARYAWAN UNIT $nmunit</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	
	$a1=mysql_query("select *from karyawan where id_unit='$idunit' order by nama_kary ASC");
	$counter=1;
	while($a=mysql_fetch_array($a1))
		{	
		if($counter %2 == 0)
			{$wrn=$wn2;}
		else
			{$wrn=$wn1;}
		$html.="

		<tr bgcolor='".$wrn."'>
		<td>".$a[nama_kary]."</td>
		<td>".$a[no_kary]."</td>
		<td>".$a[jk]."</td>
		<td>".$a[status]."</td>
		</tr>
		
		";
		$counter++;
		}
		$html.= "</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan where id_unit='$idunit'"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan where id_unit='$idunit'"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="
		<br>
		<br><center>$total_results Data Karyawan Unit Kerja $nmunit</center>
		 
		 
		<br><br>
		";
		phptopdf_html($html,'pdf/', 'rep_unit_kerja.pdf');
		echo "
		<h2>PDF DATA KARYAWAN UNIT $nmunit</h2>
		
		<a href='pdf/rep_unit_kerja.pdf'>Download PDF</a><br><br>"; 
?>