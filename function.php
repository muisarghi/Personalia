<?php

class person

{


function index()
	{

	echo"
	<h2 align='center'>SELAMAT DATANG DI </h2><h1 align='center'>PROGRAM  BERBASIS WEB</h1>
	";

	}

function delet()
	{
	$id=$_GET['id'];
	$code=$_GET['code'];
	$add=$_GET['add'];
	$id_kary=$_GET['id_kary'];
	$msg=$_GET['msg'];
	$a=mysql_query("delete from $code where id='$id'");
	if($a)
		{header("location: index.php?task=$add&id_kary=$id_kary&$msg=Data Sudah Terhapus");}
	else
		{echo"404";}
	}

function delete()
	{
	$id=$_GET['id'];
	$code=$_GET['code'];
	$add=$_GET['add'];
	$a=mysql_query("delete from $code where id='$id'");
	if($a)
		{header("location: index.php?task=$add&msg=Data Sudah Terhapus");}
	else
		{echo"404";}
	}

function deleti()
	{
	$id=$_GET['id'];
	$code=$_GET['code'];
	$add=$_GET['add'];
	$field='id_'.$code;

	$a=mysql_query("delete from $code where $field='$id'");
	if($a)
		{header("location: index.php?task=$add&msg=Data Sudah Terhapus");}
	else
		{echo"404";}
	}

function deleto()
	{
	$id=$_GET['id'];
	$idunit=$_GET['idunit'];
	$code=$_GET['code'];
	$add=$_GET['add'];
	$id_kary=$_GET['id_kary'];
	$h1=$_GET['h1'];
	$a=mysql_query("delete from $code where id='$id'");
	if($a)
		{header("location: index.php?task=msg&add=$add&id_kary=$id_kary&idunit=$idunit&h1=$h1&msg=Data Sudah Terhapus");}
	else
		{echo"404";}
	}

function msg()
	{
	$idunit=$_GET['idunit'];
	$id_kary=$_GET['id_kary'];
	$h1=$_GET['h1'];
	$add=$_GET['add'];
	$msg=$_GET['msg'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	
	echo"
	<h2 align='center'>$h1 $nmkary</h2>
	<br><br>
	<h3 align='center'>$msg</h3>
	<center>
	<form method='post' action='index.php?task=$add'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='hidden' name='id_unit' value='$idunit'>
	<input type='submit' value='KEMBALI' id='simpan' class='clean-blue'>
	</center>
	</form>
	";
	}


///////////////////////////////


function unit_kerja()
	{
	$msg=$_GET['msg'];
	echo"
	<h2 align='center'>Master Unit Kerja</h2>
	<h4>$msg</h4>
	";
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);
	echo"
	<table width='80%' cellpadding='0' cellspacing='0' border='1'>
	<tr>
	<td width='30%'><b>Nama</b></td>
	<td width='5%'><b>Kode</b></td>
	<td width='40%'><b>Keterangan</b></td>
	<td width='10%'></td>
	<td width='10%'></td>
	</tr>
	
	<form method='post' action='index.php?task=untkj_p'>
	<tr>
	<td><input type='text' name='nama' class='form-input'></td>
	<td><input type='text' name='kode' class='form-input'></td>
	<td><input type='text' name='ket' class='form-input'></td>
	<td colspan='2'><input type='submit' name='simpan' id='simpan' value='SIMPAN' class='clean-blue' /> </td>
	</tr>
	</form>
	";
	$a1=mysql_query("select *from unit_kerja order by id DESC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{
	echo"
	<tr>
	<td>$a[nama]</td>
	<td>$a[kode]</td>
	<td>$a[keterangan]</td>
	<td align='center'><a href='index.php?task=untkj_e&id=$a[id]'> <img src='images/b_edit.png'></a></td>
	<td align='center'>
	"; ?>
	<a href='index.php?task=delete&id=<?php echo"$a[id]"; ?>&code=unit_kerja&add=unit_kerja' OnClick="return confirm('Apakah data <?php echo $a[nama]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
	<?php echo"
	</td>
	</tr>
	";
		}
	echo"
	</table>";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM unit_kerja"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM unit_kerja"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=unit_kerja&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=unit_kerja&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=unit_kerja&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Unit Kerja
	";

	}

function untkj_e()
	{
	$id=$_GET['id'];
	$a1=mysql_query("select *from unit_kerja where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$nama=$a[nama];
		$kode=$a[kode];
		$ket=$a[keterangan];
		}

	echo"
	<h2 align='center'>EDIT UNIT KERJA: "; echo strtoupper($nama); echo"</h2>
	<form method='post' action='index.php?task=untkj_e2'>
	<table width='80%'>
	<tr>
	<td width='30%'>Nama</td>
	<td><input type='text' name='nama' class='form-input' value='$nama'></td>
	</tr>
	
	<tr>
	<td>Kode</td>
	<td><input type='text' name='kode' class='form-input' value='$kode'></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket' class='form-input' value='$ket'></td>
	</tr>

	<tr>
	<td colspan='2'>
	<input type='hidden' name='id' value='$id'>
	
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	
	<input type='submit' name='simpan' id='simpan' value='SIMPAN' class='clean-blue' />
	
	</td>
	</tr>
	</form>
	</table>
	";
	}

function untkj_e2()
	{
	$nama=$_POST['nama'];
	$kode=$_POST['kode'];
	$ket=$_POST['ket'];
	$id=$_POST['id'];
	$masuk=mysql_query("UPDATE unit_kerja set nama='$nama', kode='$kode', keterangan='$ket' where id='$id'");
	
	if($masuk)
		{
		header("Location:index.php?task=unit_kerja&msg=Data Telah Diubah");
		}
	else
		{echo"error";}
	}

function untkj_p()
	{
	$nama=$_POST['nama'];
	$kode=$_POST['kode'];
	$ket=$_POST['ket'];
	$masuk=mysql_query("INSERT INTO unit_kerja values('','$nama','$kode','$ket')");
	
	if($masuk)
		{
		header("Location:index.php?task=unit_kerja&msg=Data Telah Masuk");
		}
	else
		{echo"error";}
	}

/* =============================================================== */

function bag()
	{
	$msg=$_GET['msg'];
	
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>Master Bagian Unit Kerja</h2>
	<h4>$msg</h4>

	<table width='100%' cellpadding='0' cellspacing='0' border='1'>
	<tr>
	<td width='15%'><b>Unit Kerja</b></td>
	<td width='20%'><b>Nama Bagian</b></td>
	<td width='5%'><b>Kode Bagian</b></td>
	<td width='10%'><b>Keterangan</b></td>
	<td width='10%'><b>Tunjangan</b></td>
	<td width='10%'><b>Gaji Pokok</b></td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=bag_p'>
	<tr>
	<td>
	<select name='id_unit'>
	<option value=''> [Unit Kerja]</option>
	";
	$b1=mysql_query("select *from unit_kerja order by kode ASC ");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]'>[$b[kode]] $b[nama]</option>
		";
		}
	echo"
	</select>
	</td>
	
	<td><input type='text' name='nama_bag' class='form-input'></td>
	<td><input type='text' name='kode_bag' class='form-input'></td>
	<td><input type='text' name='ket_bag' class='form-input'></td>
	<td><input type='text' name='tunjangan' class='form-input'></td>
	<td><input type='text' name='gaji' class='form-input'></td>
	<td colspan='2'><input type='submit' name='simpan' id='simpan' value='SIMPAN' class='clean-blue' /> </td>
	</tr>
	</form>
	";
	$a1=mysql_query("select *from unit_bagian order by id DESC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{
	echo"
	<tr>
	<td>";
	$id_unit=$a[id_unit];
	$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($c=mysql_fetch_array($c1))
		{
		$unit=$c[nama];
		}
	echo"$unit
	</td>
	<td>$a[nama_bag]</td>
	<td>$a[kode_bag]</td>
	<td>$a[ket_bag]</td>
	<td>$a[tunjangan]</td>
	<td>$a[gaji]</td>
	<td align='center'><a href='index.php?task=bag_e&id=$a[id]'> <img src='images/b_edit.png'></a></td>
	<td align='center'>
	"; ?>
	<a href='index.php?task=delete&id=<?php echo"$a[id]"; ?>&code=unit_bagian&add=bag' OnClick="return confirm('Apakah data <?php echo $a[nama_bag]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
	<?php echo"
	</td>
	</tr>
	";
		}
	echo"
	</table>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM unit_bagian"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM unit_bagian"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=bag&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=bag&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=bag&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Bagian Unit Kerja
	";

	}


function bag_e()
	{
	$id=$_GET['id'];
	$a1=mysql_query("select *from unit_bagian where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$id_unit=$a[id_unit];
		$nama_bag=$a[nama_bag];
		$kode_bag=$a[kode_bag];
		$ket_bag=$a[ket_bag];
		$tunjangan=$a[tunjangan];
		$gaji=$a[gaji];
		}

	echo"
	<h2 align='center'>EDIT BAGIAN UNIT KERJA: "; echo strtoupper($nama_bag); echo"</h2>
	<form method='post' action='index.php?task=bag_e2'>
	<table width='80%'>
	
	<tr>
	<td width='30%'>Unit Kerja</td>
	<td><select name='id_unit'>
	";
	$b1=mysql_query("select *from unit_kerja order by kode ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]' "; 
		if ($b[id]==$id_unit) {echo"SELECTED";} else{}
		echo" >[$b[kode]] $b[nama]</option>
		";
		}
	echo"
	</select>
	</td>
	</tr>

	<tr>
	<td width='30%'>Nama Bagian</td>
	<td><input type='text' name='nama_bag' class='form-input' value='$nama_bag'></td>
	</tr>
	
	<tr>
	<td>Kode</td>
	<td><input type='text' name='kode_bag' class='form-input' value='$kode_bag'></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_bag' class='form-input' value='$ket_bag'></td>
	</tr>

	<tr>
	<td>Tunjangan</td>
	<td><input type='text' name='tunjangan' class='form-input' value='$tunjangan'></td>
	</tr>

	<tr>
	<td>Gaji</td>
	<td><input type='text' name='gaji' class='form-input' value='$gaji'></td>
	</tr>

	<tr>
	<td colspan='2'>
	<input type='hidden' name='id' value='$id'>
	
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	
	<input type='submit' name='simpan' id='simpan' value='SIMPAN' class='clean-blue' />
	
	</td>
	</tr>
	</form>
	</table>
	";
	
	}


function bag_e2()
	{
	$id_unit=$_POST['id_unit'];
	$nama_bag=$_POST['nama_bag'];
	$kode_bag=$_POST['kode_bag'];
	$ket_bag=$_POST['ket_bag'];
	$id=$_POST['id'];
	$tunjangan=$_POST['tunjangan'];
	$gaji=$_POST['gaji'];
	$masuk=mysql_query("UPDATE unit_bagian set id_unit='$id_unit', nama_bag='$nama_bag', kode_bag='$kode_bag', ket_bag='$ket_bag', tunjangan='$tunjangan', gaji='$gaji' where id='$id'");
	
	if($masuk)
		{
		header("Location:index.php?task=bag&msg=Data Telah Diubah");
		}
	else
		{echo"error";}
	}


function bag_p()
	{
	$id_unit=$_POST['id_unit'];
	$nama_bag=$_POST['nama_bag'];
	$kode_bag=$_POST['kode_bag'];
	$ket_bag=$_POST['ket_bag'];
	$tunjangan=$_POST['tunjangan'];
	$gaji=$_POST['gaji'];
	$masuk=mysql_query("INSERT INTO unit_bagian values('', '$id_unit', '$nama_bag', '$kode_bag','$ket_bag', '$tunjangan', $gaji)");
	
	if($masuk)
		{
		header("Location:index.php?task=bag&msg=Data Telah Masuk");
		}
	else
		{echo"error";}
	}

/* =============================================================== */

function kary()
	{
	 
	$msg=$_GET['msg'];
	echo"
	
	<br><br>
	<fieldset>
	<legend>Form</legend>
	<h4>$msg</h4>
	<form  action='index.php?task=kary_p' method='post' enctype='multipart/form-data'>
	<table width='100%' border='0'>
	<tr>
	<td width='50%'>
	
	<table width='100%' border='0'>
	<tr>
	<td width='25%'>Nama Karyawan</td>
	<td><input type='text' name='nama_kary' class='form-input'></td>
	</tr>
	
	<tr>
	<td width='20%'>No KTP</td>
	<td><input type='text' name='ktp' class='form-input'></td>
	</tr>

	<tr>
	<td width='25%'>Jenis Kelamin</td>
	<td>
	<select name='jk'>
	<option value=''>[Jenis Kelamin]</option>
	<option value='Laki-Laki'>Laki-Laki</option>
	<option value='Perempuan'>Perempuan</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Unit/ Bagian Kerja</td>
	
	<td><select name='unitbag'>";
	$k1=mysql_query("select *from unit_kerja order by id ASC");
	while($k=mysql_fetch_array($k1))
		{
		$id_unit=$k[id];
		echo"<optgroup label='$k[nama]'>";
		$l1=mysql_query("select *from unit_bagian where id_unit='$id_unit'");
		while($l=mysql_fetch_array($l1))
			{
			$id_bag=$l[id];
			echo"
			<option value='$id_unit-$id_bag'>$l[nama_bag]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	
	

	<tr>
	<td>Status Perkawinan</td>
	<td>
	<select name='status'>
	<option value=''>[Status]</option>
	<option value='Menikah'>Menikah</option>
	<option value='Belum Menikah'>Belum Menikah</option>
	</select>
	</td>
	</tr>

	
	</table>
	</td>
	
	<td>
	<table width='100%' border='0'>
	

	<tr>
	<td width='20%'>Tanggal Lahir</td>
	<td>";
	echo"
	<select name='tgl_lhr'>
	";
	for($f=1;$f<=31;$f++)
		{
		echo"<option value='$f'>$f</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='bln_lhr'>
	";
	for($g=1;$g<=12;$g++)
		{
		echo"<option value='$g'>$g</option>";
		}
	echo"
	</select>
	&nbsp;
	<select name='thn_lhr'>
	";
	//$thnw=date('Y');
	for($h=$thnw; $h>=1900; $h--)
		{
		echo"<option value='$h'>$h</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Kota Lahir</td>
	<td><input type='text' name='kota_lhr' class='form-input'></td>
	</tr>


	<tr>
	<td>Alamat</td>
	<td><input type='text' name='alm_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Kota</td>
	<td><input type='text' name='kota_kary' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Kecamatan</td>
	<td><input type='text' name='kec_kary' class='form-input'></td>
	</tr>


	<tr>
	<td>Telpon</td>
	<td><input type='text' name='telp_kary' class='form-input'></td>
	</tr>

	<tr>
	<td>Email</td>
	<td><input type='text' name='email_kary' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Foto</td>
	<td><input type='file' name='foto_kary'>
	<br>
	<font size='-3' color='#0000FF'>*Foto harap berukuran 4 X 6</font>
	</td>
	</tr>
	</table>

	</td>
	</tr>
	
	<tr>
	<td colspan='2' align='center'>
	<input type='submit' value='SIMPAN' class='clean-blue' /> 
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	////////////////
	////////////////
	//////VIEW/////
	///////////////
	
	$msg=$_GET['msg'];
	
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"<br><br><br>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%' border='1'>
	<tr>
	<td>No</td>
	<td>Nama</td>
	<td>Unit</td>
	<td>Bagian</td>
	<td>Status</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	";
	$ix1=mysql_query("select *from karyawan order by id DESC LIMIT $from, $max_results");
	while($ix=mysql_fetch_array($ix1))
	{
	echo"
	<tr>
	<td>$ix[no_kary]</td>
	<td><a href='index.php?task=kary_d&id_kary=$ix[id]'>$ix[nama_kary]</a></td>
	<td>";$unit=$ix[id_unit];
	$unitx=mysql_query("select *from unit_kerja where id='$unit'");
	while($unita=mysql_fetch_array($unitx))
		{
		$nmunit=$unita[nama];
		}
	echo"$nmunit
	</td>
	<td>"; $bag=$ix[id_bag];
	$bagx=mysql_query("select *from unit_bagian where id='$bag'");
	while($baga=mysql_fetch_array($bagx))
		{
		$nmbag=$baga[nama_bag];
		}
	echo"$nmbag

	
	</td>
	<td>$ix[status]</td>
	<td align='center'><a href='index.php?task=kary_e&id=$ix[id]'> <img src='images/b_edit.png'></a></td>
	<td align='center'>
	"; ?>
	<a href='index.php?task=delete&id=<?php echo"$ix[id]"; ?>&code=karyawan&add=kary' OnClick="return confirm('Apakah data <?php echo $ix[nama_kary]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
	<?php echo"
	</td>
	</tr>
	";
	}
	echo"
	</table>
	<br>
	
	";

	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=kary&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=kary&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=kary&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Karyawan
	<br><br><br>
	</fieldset>
	";

	}


function kary_p()
	{
	$unitbag=$_POST['unitbag'];
	$unitbagi=explode('-', $unitbag);
	$id_unit=$unitbagi[0];
	$id_bag=$unitbagi[1];

	$id_unit=$_POST['id_unit']; $id_bag=$_POST['id_bag']; 
	$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($c=mysql_fetch_array($c1))
		{
		$id_unita=$c[kode];		
		}
	$d1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($d=mysql_fetch_array($d1))
		{
		$id_baga=$d[kode_bag];		
		}

	//$id_unita=str_pad($id_unit, 2, '0', STR_PAD_LEFT);
	//$id_baga=str_pad($id_bag, 2, '0', STR_PAD_LEFT);
	$nama_kary=$_POST['nama_kary'];  
	$status=$_POST['status']; 
	$jk=$_POST['jk']; 
	//$jamsostek=$_POST['jamsostek'];
	//$tgl_ttp=$_POST['tgl_ttp']; $bln_ttp=$_POST['bln_ttp']; 
	//$thn_ttp=$_POST['thn_ttp']; 
	//$dt_ttp=$tgl_ttp.'-'.$bln_ttp.'-'.$thn_ttp;
	//$foto_kary=;
	$foto_kary_nm=$_FILES['foto_kary']['name'];
	$foto_kary_sz=$_FILES['foto_kary']['size'];
	
		

	$kota_lhr=$_POST['kota_lhr']; $ktp=$_POST['ktp']; 
	$tgl_lhr=$_POST['tgl_lhr']; $bln_lhr=$_POST['bln_lhr'];
	$thn_lhr=$_POST['thn_lhr']; 
	$dt_lhr=$tgl_lhr.'-'.$bln_lhr.'-'.$thn_lhr;
	$alm_kary=$_POST['alm_kary']; $kec_kary=$_POST['kec_kary'];
	$kota_kary=$_POST['kota_kary']; $telp_kary=$_POST['telp_kary']; $email_kary=$_POST['email_kary'];
	
	
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan"),0);
	$idna=$max+1;
	$code=str_pad($idna, 5, '0', STR_PAD_LEFT);
	$no_kary=$id_unita.''.$id_baga.''.$thn_lhr.''.$code;
	$a=mysql_query("insert into karyawan values('$idna', '$no_kary', '$id_unit', '$id_bag', '$nama_kary', 'jk', '$status', '$idna.jpg')");
	$b=mysql_query("insert into karyawan_detail values('', '$idna', '$ktp', '$kota_lhr', '$dt_lhr', '$alm_kary', '$kota_kary', '$kec_kary', '$telp_kary', '$email_kary')");

	$copia= copy($_FILES['foto_kary']['tmp_name'],'foto/'.$idna.'.jpg');

	if($a and $b)
		{
		header("location: index.php?task=kary&msg=Data Sudah Masuk");
		}
	else
		{echo"error";}

	}


function kary_e()
	{
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
		//$jamsostek=$x[jamsostek];
		$ktp=$x[ktp];
		//$tgl_ttp=$x[tgl_ttp];
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
	<td>Unit/ Bagian</td>
	<td><select name='unitbag'>";
	$k1=mysql_query("select *from unit_kerja order by id ASC");
	while($k=mysql_fetch_array($k1))
		{
		$id_unitx=$k[id];
		echo"<optgroup label='$k[nama]'>";
		$l1=mysql_query("select *from unit_bagian where id_unit='$id_unitx'");
		while($l=mysql_fetch_array($l1))
			{
			$id_bagx=$l[id];
			echo"
			<option value='$id_unitx-$id_bagx'";
			if($id_bagx==$id_bag) {echo"SELECTED ";}
			echo"
			>$l[nama_bag]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
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
	</tr>";
	/*
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
	
	*/
	echo"
	
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

	<input type='submit' value='GANTI' class='clean-blue' /> 
	</td>
	</tr>
	</table>
	</form>
	
	";
	}


function kary_eb()
	{
	$unitbag=$_POST['unitbag'];
	$unitbagi=explode('-', $unitbag);

	//$id_unit=$_POST['id_unit']; 
	//$id_bag=$_POST['id_bag']; 
	$id_unit=$unitbagi[0];
	$id_bag=$unitbagi[1];
	$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($c=mysql_fetch_array($c1))
		{
		$id_unita=$c['kode'];		
		}
	$d1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($d=mysql_fetch_array($d1))
		{
		$id_baga=$d['kode_bag'];		
		}
	
	$id_unita=str_pad($id_unit, 2, '0', STR_PAD_LEFT);
	$id_baga=str_pad($id_bag, 2, '0', STR_PAD_LEFT);
	//$tgl_ttp=$_POST['tgl_ttp']; 
	//$bln_ttp=$_POST['bln_ttp']; 
	//$thn_ttp=$_POST['thn_ttp']; 
	//$dt_ttp=$tgl_ttp.'-'.$bln_ttp.'-'.$thn_ttp;
	//$foto_kary=;
	$tgl_lhr=$_POST['tgl_lhr'];
	$bln_lhr=$_POST['bln_lhr'];
	$thn_lhr=$_POST['thn_lhr']; 
	$dt_lhr=$tgl_lhr.'-'.$bln_lhr.'-'.$thn_lhr;

	$id=$_POST['id'];
	$nama_kary=$_POST['nama_kary'];  
	$status=$_POST['status']; 
	$jk=$_POST['jk']; 
	//$jamsostek=$_POST['jamsostek'];
	$tgl_ttp=$_POST['tgl_ttp']; 
	
	$foto_kary_nm=$_FILES['foto_kary']['name'];
	$foto_kary_sz=$_FILES['foto_kary']['size'];
	
		

	$kota_lhr=$_POST['kota_lhr']; $ktp=$_POST['ktp']; 
	$tgl_lhr=$_POST['tgl_lhr']; 
	
	$alm_kary=$_POST['alm_kary']; $kec_kary=$_POST['kec_kary'];
	$kota_kary=$_POST['kota_kary']; $telp_kary=$_POST['telp_kary']; $email_kary=$_POST['email_kary'];
	
	
	/*$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan"),0);
	$idna=$max+1;
	$code=str_pad($idna, 5, '0', STR_PAD_LEFT);
	$no_kary=$id_unita.''.$id_baga.''.$thn_lhr.''.$code;
	*/
	$no_kary=$_POST['no_kary'];
	$no_kary_new=substr($no_kary, 8, 5);
	$nokary=$id_unita.''.$id_baga.''.$thn_lhr.''.$no_kary_new;

	$a=mysql_query("UPDATE karyawan set no_kary='$nokary', id_unit='$id_unit', id_bag='$id_bag', nama_kary='$nama_kary', jk='$jk', status='$status' where id='$id'");
	$b=mysql_query("UPDATE karyawan_detail set ktp='$ktp', kota_lhr='$kota_lhr', tgl_lhr='$dt_lhr', alm_kary='$alm_kary', kota_kary='$kota_kary', kec_kary='$kec_kary', telp_kary='$telp_kary', email_kary='$email_kary' where id_kary='$id'");
	
	if($foto_kary_sz!='')
		{
		$copia= copy($_FILES['foto_kary']['tmp_name'],'foto/'.$id.'.jpg');
		}
	else
		{}
	

	if($a and $b)
		{
		header("location: index.php?task=kary&msg=Data Sudah Diganti");
		}
	else
		{echo"error";}
	}


function kary_d()
	{
	//a.kary b.unit c.bag
	//d.kary_dtl e.pendd f.pendd g.ahli h.ahli
	//i.sertifikat j.kary_sertfkt k.golongan l.golongan m.golongan

	$id_kary=$_GET['id_kary'];
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
	$countgol=mysql_result(mysql_query("select count(*) from karyawan_golongan where id_kary='$id_kary'"),0);
	//$countgolo= mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_golongan where id_kary='$id_kary'"),0);
	if($countgol=='')
		{
		echo"
		<form method='post' action='index.php?task=krygol_p'>
		<table width='100%'>
		<tr>
		<td width='20%'>Golongan</td>
		<td><select name='id_gol'>";
		$k1=mysql_query("select *from golongan order by gol ASC");
		while($k=mysql_fetch_array($k1))
			{
			echo"
			<option value='$k[id]'>$k[gol] - $k[ket_gol]</option>
			";
			}
		echo"</select></td>
		</tr>
		<tr>
		<td></td>
		<td>
		<input type='hidden' name='id_kary' value='$id_kary'>
		<input type='submit' value='SIMPAN' class='clean-blue'>
		</td>
		</tr>
		</table>
		</form>";
		}
	else
		{
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

		<tr>
		<td></td>
		<td> <a class='link_tab clean-gray' href='act/krygol_e.php?id_kary=$id_kary' rel='facebox'><img src='images/edit.png' border='0' title='Edit' align='absmiddle' /> Edit Profil</a></td>
		</tr>

		</table>
		";
		}
	
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
	<width='3%'></td>
	<width='3%'></td>
	</tr>
	
	<form method='post' action='index.php?task=krypend_p'>
	<tr>
	<td><select name='id_pendd'>";
	$e1=mysql_query("select *from pendd order by id ASC");
	while($e=mysql_fetch_array($e1))
		{
		echo"
		<option value='$e[id]'>$e[tingkat]</option>
		";
		}
	echo"</select></td>
	<td><input type='text' name='tmp_kary_pendd' class='form-input'></td>
	<td><input type='text' name='thn_kary_pendd' class='form-input' size='10'></td>
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='SIMPAN'></td>
	</form>
	<tr>";
	
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
		<td align='center'><a href='act/krypendd_e.php?id=$f[id]' rel='facebox'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delet&id=<?php echo"$f[id]&id_kary=$id_kary"; ?>&code=karyawan_pendd&add=kary_d&msg=msg_pendd' OnClick="return confirm('Apakah data <?php echo $nmpendd; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
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
	<width='3%'></td>
	<width='3%'></td>
	</tr>
	
	<form method='post' action='index.php?task=kryahli_p'>
	<tr>
	<td><select name='id_ahli'>";
	$g1=mysql_query("select *from ahli where id_unit='$id_unit' order by id ASC");
	while($g=mysql_fetch_array($g1))
		{
		echo"
		<option value='$g[id]'>$g[ahli]</option>
		";
		}
	echo"</select></td>
	<td><input type='text' name='ket_kary_ahli' class='form-input'></td>
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='SIMPAN'></td>
	</form>
	<tr>";
	
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
		<td align='center'><a href='act/kryahli_e.php?id=$h[id]&id_unit=$id_unit' rel='facebox'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delet&id=<?php echo"$h[id]&id_kary=$id_kary"; ?>&code=karyawan_ahli&add=kary_d&msg=msg_ahli' OnClick="return confirm('Apakah data <?php echo $nmahli; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
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
	<width='3%'></td>
	<width='3%'></td>
	</tr>
	
	<form method='post' action='index.php?task=krystfkt_p'>
	<tr>
	<td><select name='id_sertifikat'>";
	$i1=mysql_query("select *from sertifikat where id_unit='$id_unit' order by id ASC");
	while($i=mysql_fetch_array($i1))
		{
		echo"
		<option value='$i[id]'>[$i[no_sertifikat]] $i[sertifikat]</option>
		";
		}
	echo"</select></td>
	<td><input type='text' name='thn_kary_stfkt' class='form-input'></td>
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' class='clean-blue' value='SIMPAN'></td>
	</form>
	<tr>";
	
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
		<td align='center'><a href='act/krystfkt_e.php?id=$j[id]&id_unit=$id_unit' rel='facebox'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delet&id=<?php echo"$j[id]&id_kary=$id_kary"; ?>&code=karyawan_sertifikat&add=kary_d&msg=msg_stfkt' OnClick="return confirm('Apakah data <?php echo $sertifikat; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
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
	}

/* ============================================================= */


function krygol_p()
	{
	$id_kary=$_POST['id_kary'];
	$id_gol=$_POST['id_gol'];
	$a=mysql_query("insert into karyawan_golongan values('', '$id_kary', '$id_gol', '', '', '', '')");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_gol=Data Golongan Telah Masuk");}
	else
		{echo"error";}
	}

function krygol_e()
	{
	$id_kary=$_POST['id_kary'];
	$id_golongan=$_POST['id_golongan'];
	$ket_kary_gol=$_POST['ket_kary_gol'];
	$tgl_ttp_gol=$_POST['tgl_ttp_gol'];
	$tgl_akh_gol=$_POST['tgl_akh_gol'];
	$jamsostek=$_POST['jamsostek'];
	$a=mysql_query("update karyawan_golongan set id_golongan='$id_golongan', ket_kary_gol='$ket_kary_gol', tgl_ttp_gol='$tgl_ttp_gol', tgl_akh_gol='$tgl_akh_gol', jamsostek='$jamsostek' where id_kary='$id_kary'");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_gol=Data Golongan Telah Diganti");}
	else
		{echo"error";}
	}

function krypend_p()
	{
	$id_kary=$_POST['id_kary'];
	$id_pendd=$_POST['id_pendd'];
	$tmp_kary_pendd=$_POST['tmp_kary_pendd'];
	$thn_kary_pendd=$_POST['thn_kary_pendd'];
	$a=mysql_query("insert into karyawan_pendd values('', '$id_kary', '$id_pendd', '$tmp_kary_pendd', '$thn_kary_pendd')");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_pendd=Data Pendidikan Telah Masuk");}
	else
		{}
	}

function krypend_e()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$id_pendd=$_POST['id_pendd'];
	$tmp_kary_pendd=$_POST['tmp_kary_pendd'];
	$thn_kary_pendd=$_POST['thn_kary_pendd'];
	$a=mysql_query("update karyawan_pendd set id_pendd='$id_pendd', tmp_kary_pendd='$tmp_kary_pendd', thn_kary_pendd='$thn_kary_pendd' where id='$id'");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_pendd=Data Pendidikan Telah Diganti");}
	else
		{}
	}

function kryahli_p()
	{
	$id_kary=$_POST['id_kary'];
	$id_ahli=$_POST['id_ahli'];
	$ket_kary_ahli=$_POST['ket_kary_ahli'];
	$a=mysql_query("insert into karyawan_ahli values('', '$id_kary', '$id_ahli', '$ket_kary_ahli')");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_ahli=Data Keahlian Telah Masuk");}
	else
		{}
	}

function kryahli_e()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$id_ahli=$_POST['id_ahli'];
	$ket_kary_ahli=$_POST['ket_kary_ahli'];
	$a=mysql_query("update karyawan_ahli set id_ahli='$id_ahli', ket_kary_ahli='$ket_kary_ahli' where id='$id'");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_ahli=Data Keahlian Telah Diganti");}
	else
		{}
	}

function krystfkt_p()
	{
	$id_kary=$_POST['id_kary'];
	$id_sertifikat=$_POST['id_sertifikat'];
	$thn_kary_stfkt=$_POST['thn_kary_stfkt'];
	$a=mysql_query("insert into karyawan_sertifikat values('', '$id_kary', '$id_sertifikat', '$thn_kary_stfkt')");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_stfkt=Data Sertifikasi Telah Masuk");}
	else
		{}
	}

function krystfkt_e()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$id_sertifikat=$_POST['id_sertifikat'];
	$thn_kary_stfkt=$_POST['thn_kary_stfkt'];
	$a=mysql_query("update karyawan_sertifikat set id_sertifikat='$id_sertifikat', thn_kary_stfkt='$thn_kary_stfkt' where id='$id'");
	if($a)
		{header("location: index.php?task=kary_d&id_kary=$id_kary&msg_stfkt=Data Sertifikasi Telah Diganti");}
	else
		{}
	}



function pendd()
	{
	$msg=$_GET['msg'];
	
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>Master Pendidikan</h2>
	<h4>$msg</h4>
	<table width='100%'>
	<tr>
	<td>Nama </td>
	<td>Keterangan </td>
	<td width='5%'> </td>
	<td width='5%'> </td>
	</tr>
	
	<form method='post' action='index.php?task=pendd_p'>
	<tr>
	<td><input type='text' name='tingkat' class='form-input'></td>
	<td><input type='text' name='ket' class='form-input'></td>
	<td colspan='2'><input type='submit' name='simpan' id='simpan' value='SIMPAN' class='clean-blue' /></td>
	</tr>
	</form>
	";
	$a1=mysql_query("select *from pendd order by id ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{
		echo"
		<tr>
		<td>$a[tingkat]</td>
		<td>$a[ket]</td>
		<td align='center'><a href='index.php?task=pendd_e&id=$a[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$a[id]"; ?>&code=pendd&add=pendd' OnClick="return confirm('Apakah data <?php echo $a[tingkat]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table> <br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM pendd"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM pendd"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=pendd&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=pendd&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=pendd&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Pendidikan
	<br><br>
	";
	}

function pendd_p()
	{
	$tingkat=$_POST['tingkat'];
	$ket=$_POST['ket'];
	$a=mysql_query("insert into pendd values('', '$tingkat', '$ket')");
	if($a)
		{header("location: index.php?task=pendd&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}


function pendd_e()
	{
	$id=$_GET['id'];
	$a1=mysql_query("select *from pendd where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$tingkat=$a[tingkat];
		$ket=$a[ket];
		}
	$tingkata=strtoupper($tingkat);
	echo"
	<h2 align='center'>Master Pendidikan $tingkata</h2>
	<form method='post' action='index.php?task=pendd_e2'>
	<table width='80%'>
	<tr>
	<td width='15'>Tingkat Pendidikan</td>
	<td width='15'><input type='text' name='tingkat' value='$tingkat' class='form-input'></td>
	</tr>
	<tr>
	<td width='15'>Keterangan</td>
	<td width='15'><input type='text' name='ket' value='$ket' class='form-input'></td>
	</tr>

	<tr>
	<td colspan='2'>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' value='GANTI' id='simpan' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	";
	}

function pendd_e2()
	{
	$id=$_POST['id'];
	$tingkat=$_POST['tingkat'];
	$ket=$_POST['ket'];
	$a=mysql_query("update pendd set tingkat='$tingkat', ket='$ket' where id='$id'");
	if($a)
		{header("location: index.php?task=pendd&msg=Data Sudah Diubah");}
	else
		{echo"error";}
	}

/* ============================================================= */

function ahli()
	{
	$msg=$_GET['msg'];

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>Setup Master Keahlian</h2>
	<h4>$msg</h4>
	<table width='100%'>
	<tr>
	<td>Unit Kerja</td>
	<td>Keahlian</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=ahli_p'>
	<tr>
	
	<td><select name='id_unit'>";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]'>$a[nama]</option>";
		}
	echo"
	</select>
	</td>
	
	<td><input type='text' name='ahli' class='form-input'></td>
	<td><input type='text' name='ket' class='form-input'></td>
	<td colspan='2'><input type='submit' value='SIMPAN' id='simpan' class='clean-blue'></td>
	</tr>
	</form>
	";
	
	$b1=mysql_query("select *from ahli order by id_unit ASC LIMIT $from, $max_results");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>";
		$id_unit=$b[id_unit];
		$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
		while($c=mysql_fetch_array($c1))
			{
			$namaunit=$c[nama];
			}
		echo"$namaunit</td>
		<td>$b[ahli]</td>
		<td>$b[ket]</td>
		<td align='center'><a href='index.php?task=ahli_e&id=$b[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$b[id]"; ?>&code=ahli&add=ahli' OnClick="return confirm('Apakah data <?php echo $b[ahli]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}

	echo"
	</table>
	<br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ahli"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM ahli"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=ahli&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=ahli&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=ahli&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Keahlian
	<br><br>
	";
	}

function ahli_p()
	{
	$id_unit=$_POST['id_unit'];
	$ahli=$_POST['ahli'];
	$ket=$_POST['ket'];
	$a=mysql_query("insert into ahli values('', '$id_unit', '$ahli', '$ket')");
	if($a)
		{header("location: index.php?task=ahli&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}

function ahli_e()
	{
	$id=$_GET['id'];
	$a1=mysql_query("select *from ahli where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$id_unit=$a[id_unit];
		$ahli=$a[ahli];
		$ket=$a[ket];
		}
	$ahlia=strtoupper($ahli);
	echo"
	<h2 align='center'>EDIT SETUP KEAHLIAN $ahlia</h2>
	<form method='post' action='index.php?task=ahli_e2'>
	<table width='100%'>
	<tr>
	<td width='15%'>Unit Kerja</td>
	
	<td>
	<select name='id_unit'>
	";
	$b1=mysql_query("select *from unit_kerja order by id ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<option value='$b[id]' ";
		if($b[id]==$id_unit) {echo"SELECTED";}
		echo">$b[nama]</option>
		";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Keahlian</td>
	<td>
	<input type='text' name='ahli' value='$ahli' class='form-input'>
	</td>
	</tr>

	<tr>
	<td>Keterangan</td>
	<td>
	<input type='text' name='ket' value='$ket' class='form-input'>
	</td>
	</tr>

	<tr>
	<td colspan='2'><input type='hidden' name='id' value='$id'> 
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' value='GANTI' id='simpan' class='clean-blue'>
	
	</td>
	</tr>
	</table>
	</form>
	";
	}

function ahli_e2()
	{
	$id=$_POST['id'];
	$id_unit=$_POST['id_unit'];
	$ahli=$_POST['ahli'];
	$ket=$_POST['ket'];
	$a=mysql_query("update ahli set id_unit='$id_unit', ahli='$ahli', ket='$ket' where id='$id'");
	if($a)
		{header("location: index.php?task=ahli&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}

/* ============================================================= */

function sertifikat()
	{
	$msg=$_GET['msg'];

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>SETUP MASTER SERTIFIKASI </h2>
	<h4>$msg</h4>

	<table width='100%'>
	<tr>
	<td width='10%'>Unit Kerja</td>
	<td width='20%'>No Sertifikat</td>
	<td>Sertifikat</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=sertifikat_p'>
	<tr>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]'>$a[nama]</option>";
		}
	echo"
	</select>
	</td>

	<td><input type='text' name='no_sertifikat' class='form-input'></td>
	<td><input type='text' name='sertifikat' class='form-input'></td>
	<td><input type='text' name='ket_sertifikat' class='form-input'></td>
	<td colspan='2'><input type='submit' id='simpan' value='SIMPAN' class='clean-blue'></td>
	</tr>
	</form>";
	
	$b1=mysql_query("select *from sertifikat order by id_unit ASC LIMIT $from, $max_results");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>";
		$id_unit=$b[id_unit];
		$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
		while($c=mysql_fetch_array($c1))
			{
			$namaunit=$c[nama];
			}
		echo"$namaunit</td>
		<td>$b[no_sertifikat]</td>
		<td>$b[sertifikat]</td>
		<td>$b[ket_sertifikat]</td>
		<td align='center'><a href='index.php?task=sertifikat_e&id=$b[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$b[id]"; ?>&code=sertifikat&add=sertifikat' OnClick="return confirm('Apakah data <?php echo $b[sertifikat]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	<br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM sertifikat"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM sertifikat"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=sertifikat&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=sertifikat&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=sertifikat&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Sertfikat
	<br><br>
	";

	}


function sertifikat_p()
	{
	$id_unit=$_POST['id_unit'];
	$no_sertifikat=$_POST['no_sertifikat'];
	$sertifikat=$_POST['sertifikat'];
	$ket_sertifikat=$_POST['ket_sertifikat'];
	$a=mysql_query("insert into sertifikat values('', '$id_unit', '$no_sertifikat', '$sertifikat', '$ket_sertifikat')");
	if($a)
		{header("location: index.php?task=sertifikat&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}


function sertifikat_e()
	{
	$id=$_GET['id'];
	$b1=mysql_query("select *from sertifikat where id='$id'");
	while($b=mysql_fetch_array($b1))
		{
		$id_unit=$b[id_unit];
		$no_sertifikat=$b[no_sertifikat];
		$sertifikat=$b[sertifikat];
		$ket_sertifikat=$b[ket_sertifikat];
		}
	$sertifika=strtoupper($sertifikat);
	echo"
	<h2 align='center'>EDIT SETUP SERTIFIKASI $sertifikata</h2>
	<form method='post' action='index.php?task=sertifikat_e2'>
	<table width='100%'>
	<tr>
	<td width='15%'>Unit Kerja</td>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]' ";
		if($a[id]==$id_unit) {echo"SELECTED";}
		echo">$a[nama]</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>No Sertifikat</td>
	<td><input type='text' name='no_sertifikat' value='$no_sertifikat' class='form-input'></td>
	</tr>

	<tr>
	<td>Sertifikat</td>
	<td><input type='text' name='sertifikat' value='$sertifikat' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Keterangan Sertifikat</td>
	<td><input type='text' name='ket_sertifikat' value='$ket_sertifikat' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' id='simpan' class='clean-blue' value='GANTI'></td>
	</td>
	</tr>
	</table>
	</form>";
	}

function sertifikat_e2()
	{
	$id=$_POST['id'];
	$id_unit=$_POST['id_unit'];
	$no_sertifikat=$_POST['no_sertifikat'];
	$sertifikat=$_POST['sertifikat'];
	$ket_sertifikat=$_POST['ket_sertifikat'];
	$a=mysql_query("update sertifikat set id_unit='$id_unit', no_sertifikat='$no_sertifikat', sertifikat='$sertifikat', ket_sertifikat='$ket_sertifikat' where id='$id'");
	if($a)
		{header("location: index.php?task=sertifikat&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}


/* ============================================================= */

function award()
	{
	
	$msg=$_GET['msg'];

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>SETUP MASTER PENGHARGAAN</h2>
	<h4>$msg</h4>

	<table width='100%'>
	<tr>
	<td width='10%'>Unit Kerja</td>
	<td width='20%'>Jenis Penghargaan</td>
	<td>Penghargaan</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=award_p'>
	<tr>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]'>$a[nama]</option>";
		}
	echo"
	</select>
	</td>

	<td><input type='text' name='jns_award' class='form-input'></td>
	<td><input type='text' name='award' class='form-input'></td>
	<td><input type='text' name='ket_award' class='form-input'></td>
	<td colspan='2'><input type='submit' id='simpan' class='clean-blue' value='SIMPAN'></td>
	</tr>
	</form>";
	
	$b1=mysql_query("select *from award order by id_unit ASC LIMIT $from, $max_results");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>";
		$id_unit=$b[id_unit];
		$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
		while($c=mysql_fetch_array($c1))
			{
			$namaunit=$c[nama];
			}
		echo"$namaunit</td>
		<td>$b[jns_award]</td>
		<td>$b[award]</td>
		<td>$b[ket_award]</td>
		<td align='center'><a href='index.php?task=award_e&id=$b[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$b[id]"; ?>&code=award&add=award' OnClick="return confirm('Apakah data <?php echo $b[award]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	<br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM award"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM award"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=award&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=award&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=award&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Penghargaan
	<br><br>
	";

	
	}


function award_p()
	{
	$id_unit=$_POST['id_unit'];
	$jns_award=$_POST['jns_award'];
	$award=$_POST['award'];
	$ket_award=$_POST['ket_award'];
	$a=mysql_query("insert into award values('', '$id_unit', '$jns_award', '$award', '$ket_award')");
	if($a)
		{header("location: index.php?task=award&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}


function award_e()
	{
	$id=$_GET['id'];
	$b1=mysql_query("select *from award where id='$id'");
	while($b=mysql_fetch_array($b1))
		{
		$id_unit=$b[id_unit];
		$jns_award=$b[jns_award];
		$award=$b[award];
		$ket_award=$b[ket_award];
		}
	$awarda=strtoupper($award);
	echo"
	<h2 align='center'>EDIT SETUP PENGHARGAAN $awarda</h2></center>
	<form method='post' action='index.php?task=award_e2'>
	<table width='100%'>
	<tr>
	<td width='15%'>Unit Kerja</td>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]' ";
		if($a[id]==$id_unit) {echo"SELECTED";}
		echo">$a[nama]</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Jenis Penghargaan</td>
	<td><input type='text' name='jns_award' value='$jns_award' class='form-input'></td>
	</tr>

	<tr>
	<td>Penghargaan</td>
	<td><input type='text' name='award' value='$award' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_award' value='$ket_award' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' id='simpan' class='clean-blue' value='GANTI'></td>
	</td>
	</tr>
	</table>
	</form>";
	}


function award_e2()
	{
	$id=$_POST['id'];
	$id_unit=$_POST['id_unit'];
	$jns_award=$_POST['jns_award'];
	$award=$_POST['award'];
	$ket_award=$_POST['ket_award'];
	$a=mysql_query("update award set id_unit='$id_unit', jns_award='$jns_award', award='$award', ket_award='$ket_award' where id='$id'");
	if($a)
		{header("location: index.php?task=award&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}

/* ============================================================= */

function langgar()
	{
	
	$msg=$_GET['msg'];

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>SETUP MASTER PELANGGARAN</h2>
	<h4>$msg</h4>

	<table width='100%'>
	<tr>
	<td width='10%'>Unit Kerja</td>
	<td width='20%'>Jenis Pelanggaran</td>
	<td>Pelanggaran</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=langgar_p'>
	<tr>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]'>$a[nama]</option>";
		}
	echo"
	</select>
	</td>

	<td><input type='text' name='jns_langgar' class='form-input'></td>
	<td><input type='text' name='langgar' class='form-input'></td>
	<td><input type='text' name='ket_langgar' class='form-input'></td>
	<td colspan='2'><input type='submit' id='simpan' class='clean-blue' value='SIMPAN'></td>
	</tr>
	</form>";
	
	$b1=mysql_query("select *from langgar order by id_unit ASC LIMIT $from, $max_results");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>";
		$id_unit=$b[id_unit];
		$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
		while($c=mysql_fetch_array($c1))
			{
			$namaunit=$c[nama];
			}
		echo"$namaunit</td>
		<td>$b[jns_langgar]</td>
		<td>$b[langgar]</td>
		<td>$b[ket_langgar]</td>
		<td align='center'><a href='index.php?task=langgar_e&id=$b[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$b[id]"; ?>&code=langgar&add=langgar' OnClick="return confirm('Apakah data <?php echo $b[langgar]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	<br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM langgar"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM langgar"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=langgar&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=langgar&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=langgar&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Pelanggaran
	<br><br>
	";

	
	}


function langgar_p()
	{
	$id_unit=$_POST['id_unit'];
	$jns_langgar=$_POST['jns_langgar'];
	$langgar=$_POST['langgar'];
	$ket_langgar=$_POST['ket_langgar'];
	$a=mysql_query("insert into langgar values('', '$id_unit', '$jns_langgar', '$langgar', '$ket_langgar')");
	if($a)
		{header("location: index.php?task=langgar&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}


function langgar_e()
	{
	$id=$_GET['id'];
	$b1=mysql_query("select *from langgar where id='$id'");
	while($b=mysql_fetch_array($b1))
		{
		$id_unit=$b[id_unit];
		$jns_langgar=$b[jns_langgar];
		$langgar=$b[langgar];
		$ket_langgar=$b[ket_langgar];
		}
	$langgara=strtoupper($langgar);
	echo"
	<h2 align='center'>EDIT SETUP PELANGGARAN $langgara</h2>
	<form method='post' action='index.php?task=langgar_e2'>
	<table width='100%'>
	<tr>
	<td width='15%'>Unit Kerja</td>
	<td>
	<select name='id_unit'>
	";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]' ";
		if($a[id]==$id_unit) {echo"SELECTED";}
		echo">$a[nama]</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Jenis Pelanggaran</td>
	<td><input type='text' name='jns_langgar' value='$jns_langgar' class='form-input'></td>
	</tr>

	<tr>
	<td>Pelanggaran</td>
	<td><input type='text' name='langgar' value='$langgar' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_langgar' value='$ket_langgar' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' id='simpan' class='clean-blue' value='GANTI'></td>
	</td>
	</tr>
	</table>
	</form>";
	}


function langgar_e2()
	{
	$id=$_POST['id'];
	$id_unit=$_POST['id_unit'];
	$jns_langgar=$_POST['jns_langgar'];
	$langgar=$_POST['langgar'];
	$ket_langgar=$_POST['ket_langgar'];
	$a=mysql_query("update langgar set id_unit='$id_unit', jns_langgar='$jns_langgar', langgar='$langgar', ket_langgar='$ket_langgar' where id='$id'");
	if($a)
		{header("location: index.php?task=langgar&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}

/* ============================================================= */


function gol()
	{
	
	$msg=$_GET['msg'];

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =10;
	$from=(($page*$max_results)-$max_results);

	echo"
	<h2 align='center'>SETUP MASTER GOLONGAN</h2>
	<h4>$msg</h4>

	<table width='100%'>
	<tr>
	<td width='20%'>Golongan</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=gol_p'>
	<tr>
	<td><input type='text' name='gol' class='form-input'></td>
	<td><input type='text' name='ket_gol' class='form-input'></td>
	<td colspan='2'><input type='submit' id='simpan' class='clean-blue' value='SIMPAN'></td>
	</tr>
	</form>";
	
	$b1=mysql_query("select *from golongan order by id ASC LIMIT $from, $max_results");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>$b[gol]</td>
		<td>$b[ket_gol]</td>
		<td align='center'><a href='index.php?task=gol_e&id=$b[id]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=delete&id=<?php echo"$b[id]"; ?>&code=golongan&add=gol' OnClick="return confirm('Apakah data <?php echo $b[gol]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	<br>
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM golongan"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id) FROM golongan"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=gol&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=gol&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=gol&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Master Golongan
	<br><br>
	";

	
	}


function gol_p()
	{
	$gol=$_POST['gol'];
	$ket_gol=$_POST['ket_gol'];
	$a=mysql_query("insert into golongan values('', '$gol', '$ket_gol')");
	if($a)
		{header("location: index.php?task=gol&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}


function gol_e()
	{
	$id=$_GET['id'];
	$b1=mysql_query("select *from golongan where id='$id'");
	while($b=mysql_fetch_array($b1))
		{
		$gol=$b[gol];
		$ket_gol=$b[ket_gol];
		}
	$gola=strtoupper($gol);
	echo"
	<h2 align='center'>EDIT SETUP GOLONGAN $gola</h2>
	<form method='post' action='index.php?task=gol_e2'>
	<table width='100%'>
	
	<tr>
	<td>Golongan</td>
	<td><input type='text' name='gol' value='$gol' class='form-input'></td>
	</tr>

	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_gol' value='$ket_gol' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' id='simpan' class='clean-blue' value='GANTI'></td>
	</td>
	</tr>
	</table>
	</form>";
	}


function gol_e2()
	{
	$id=$_POST['id'];
	$gol=$_POST['gol'];
	$ket_gol=$_POST['ket_gol'];
	$a=mysql_query("update golongan set gol='$gol', ket_gol='$ket_gol' where id='$id'");
	if($a)
		{header("location: index.php?task=gol&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}

/* ============================================================= */
/* ============================================================= */
/* ============================================================= */
/* ============================================================= */

function fmly()
	{
	include ('selected.php');

	echo"
	<h2 align='center'>DATA KELUARGA</h2>
	<fieldset>
	<legend>Cari Karyawan</legend>
	<form method='post' action='index.php?task=fmlyb'>
	";?>
	
	<table width='100%'>
	<tr>
	<td width="15%">Unit Kerja</td>
	<td>
    <select name="id_unit" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Unit Kerja</option>
      
      <?php getTierOne(); ?>
    
    </select> 
	</td>
	</tr>
    
	<tr>
	<td>Bagian</td>
	<td>
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    </td>
	</tr>

	<tr>
	<td>Karyawan</td>
	<td>
	<span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
	</td></tr>

	<tr>
	<td></td>
	<td>
	<span id="result_3" style="display: none;"></span> 
	
	</td></tr>

	</table>

	<?php echo"</form>
	</fieldset>
	
	";
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
		
	}

function fmlyb()
	{
	$id_kary=$_POST['id_kary'];
	$idunit=$_POST['id_unit'];
	$idbag=$_POST['idbagian'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	echo"
	<h2 align='center'>DATA KELUARGA $nmkary $idunit -- $idbag</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	</table>
	</fieldset>

	<br><br><br>";
	////////////////////////
	////////////////////////
	////////////////////////
	$b=mysql_result(mysql_query("select count(id) from family where id_kary='$id_kary'"),0);
	if($b==0)
		{
		echo"
		<fieldset>
		<legend>Data Keluarga</legend>
		<form method='post' action='index.php?task=fmly_p'>
		<table width='100%'>
		
		<tr>
		<td colspan='2'><h4>Orang Tua</h4></td>
		</tr>

		<tr>
		<td width='20%'>Nama Ayah</td>
		<td><input type='text' name='ayah' class='form-input'></td>
		</tr>

		<tr>
		<td>Nama Ibu</td>
		<td><input type='text' name='ibu' class='form-input'></td>
		</tr>

		<tr>
		<td>Alamat</td>
		<td><input type='text' name='alm_ortu' class='form-input'></td>
		</tr>

		<tr>
		<td colspan='2'><h4>Keluarga</h4></td>
		</tr>

		<tr>
		<td>Nama Istri</td>
		<td><input type='text' name='istri' class='form-input'></td>
		</tr>

		<tr>
		<td>Alamat Istri</td>
		<td><input type='text' name='alm_istri' class='form-input'></td>
		</tr>

		<tr>
		<td>Anak I</td>
		<td><input type='text' name='anak1' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak II</td>
		<td><input type='text' name='anak2' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak III</td>
		<td><input type='text' name='anak3' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak IV</td>
		<td><input type='text' name='anak4' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak V</td>
		<td><input type='text' name='anak5' class='form-input'></td>
		</tr>

		<tr>
		<td colspan='2'>
		<input type='hidden' name='id_kary' value='$id_kary'>";?>
		<input type='button' value='KEMBALI' id='simpan' class='clean-blue' onClick="window.location.href='index.php?task=fmly'">
		<?php echo"
		<input type='submit' value='SIMPAN' id='simpan' class='clean-blue'>
		</td>
		</tr>
		
		</table>
		</form>
		</fieldset>
		";
		}
		/////////////////////
		/////////////////////
		/////////////////////
	else
		{
		$c1=mysql_query("select *from family where id_kary='$id_kary'");
		while($c=mysql_fetch_array($c1))
			{
			$id=$c[id];
			$ayah=$c[ayah];
			$ibu=$c[ibu];
			$alm_ortu=$c[alm_ortu];
			$istri=$c[istri];
			$alm_istri=$c[alm_istri];
			$anak1=$c[anak1];
			$anak2=$c[anak2];
			$anak3=$c[anak3];
			$anak4=$c[anak4];
			$anak5=$c[anak5];
			}

		echo"
		<fieldset>
		<legend>Data Keluarga</legend>
		<form method='post' action='index.php?task=fmly_e'>
		<table width='100%'>
		
		<tr>
		<td colspan='2'><h4>Orang Tua</h4></td>
		</tr>

		<tr>
		<td width='20%'>Nama Ayah</td>
		<td><input type='text' name='ayah' value='$ayah' class='form-input'></td>
		</tr>

		<tr>
		<td>Nama Ibu</td>
		<td><input type='text' name='ibu' value='$ibu' class='form-input'></td>
		</tr>

		<tr>
		<td>Alamat</td>
		<td><input type='text' name='alm_ortu' value='$alm_ortu' class='form-input'></td>
		</tr>

		<tr>
		<td colspan='2'><h4>Keluarga</h4></td>
		</tr>

		<tr>
		<td>Nama Istri</td>
		<td><input type='text' name='istri' value='$istri' class='form-input'></td>
		</tr>

		<tr>
		<td>Alamat Istri</td>
		<td><input type='text' name='alm_istri' value='$alm_istri' class='form-input'></td>
		</tr>

		<tr>
		<td>Anak I</td>
		<td><input type='text' name='anak1' value='$anak1' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak II</td>
		<td><input type='text' name='anak2' value='$anak2' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak III</td>
		<td><input type='text' name='anak3' value='$anak3' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak IV</td>
		<td><input type='text' name='anak4' value='$anak4' class='form-input'></td>
		</tr>
		<tr>
		<td>Anak V</td>
		<td><input type='text' name='anak5' value='$anak5' class='form-input'></td>
		</tr>

		<tr>
		<td></td>
		<td>
		<input type='hidden' name='id' value='$id'>
		<input type='hidden' name='id_kary' value='$id_kary'>
		";?>
		<input type='button' value='KEMBALI' id='simpan' class='clean-blue' onClick="window.location.href='index.php?task=fmly'">
		<?php echo"
		<input type='submit' value='GANTI' id='simpan' class='clean-blue'>
		</td>
		</tr>
		
		</table>
		</form>
		</fieldset>
		";
		}
	
	}



function fmly_p()
	{
	$id_kary=$_POST['id_kary'];
	$ayah=$_POST['ayah'];
	$ibu=$_POST['ibu'];
	$alm_ortu=$_POST['alm_ortu'];
	$istri=$_POST['istri'];
	$alm_istri=$_POST['alm_istri'];
	$anak1=$_POST['anak1'];
	$anak2=$_POST['anak2'];
	$anak3=$_POST['anak3'];
	$anak4=$_POST['anak4'];
	$anak5=$_POST['anak5'];
	$a=mysql_query("insert into family values('', '$id_kary', '$ayah', '$ibu', '$alm_ortu', '$istri', '$alm_istri', '$anak1', '$anak2', '$anak3', '$anak4', '$anak5')");
	if($a)
		{
		header("location: index.php?task=fmly_msg&msg=Data Keluarga Sudah Masuk&id_kary=$id_kary");
		
		}
	else
		{echo"error";}
	}

function fmly_msg()
	{
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	$msg=$_GET['msg'];
	echo"
	<h2 align='center'>DATA KELUARGA $nmkary</h2>
	<h3>$msg</h3>
	<form method='post' action='index.php?task=fmlyb'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='KEMBALI' id='simpan' class='clean-blue'>
	</form>
	";
	}


function fmly_e()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$ayah=$_POST['ayah'];
	$ibu=$_POST['ibu'];
	$alm_ortu=$_POST['alm_ortu'];
	$istri=$_POST['istri'];
	$alm_istri=$_POST['alm_istri'];
	$anak1=$_POST['anak1'];
	$anak2=$_POST['anak2'];
	$anak3=$_POST['anak3'];
	$anak4=$_POST['anak4'];
	$anak5=$_POST['anak5'];
	$a=mysql_query("update family set ayah='$ayah', ibu='$ibu', alm_ortu='$alm_ortu', istri='$istri', alm_istri='$alm_istri', anak1='$anak1', anak2='$anak2', anak3='$anak3', anak4='$anak4', anak5='$anak5')");
	if($a)
		{
		header("location: index.php?task=fmly_msg&msg=Data Keluarga Sudah Diganti&id_kary=$id_kary");
		
		}
	else
		{echo"error";}
	}


/* ============================================================= */

function penddno()
	{
	include ('selected.php');

	echo"
	<h2 align='center'>DATA PENDIDIKAN NON FORMAL KARYAWAN</h2>
	<fieldset>
	<legend>Cari Karyawan</legend>
	<form method='post' action='index.php?task=penddno_b'>
	";?>
	
	<table width='100%'>
	<tr>
	<td width="15%">Unit Kerja</td>
	<td>
    <select name="drop_1" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Unit Kerja</option>
      
      <?php getTierOne(); ?>
    
    </select> 
	</td>
	</tr>
    
	<tr>
	<td>Bagian</td>
	<td>
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    </td>
	</tr>

	<tr>
	<td>Karyawan</td>
	<td>
	<span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
	</td></tr>

	<tr>
	<td></td>
	<td>
	<span id="result_3" style="display: none;"></span> 
	
	</td></tr>

	</table>

	<?php echo"</form>
	</fieldset>
	
	";
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
		
	}

function penddno_b()
	{
	$id_kary=$_POST['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	echo"
	<h2 align='center'>DATA PENDIDIKAN NON FORMAL $nmkary</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	</table>
	</fieldset>

	<br><br>";
	////////////////////////
	////////////////////////
	////////////////////////
	
	echo"<br>
	<fieldset>
	<legend>Data Pendidikan Non Formal</legend>
	<table width='100%'>
	<tr>
	<td width='15%'>Jenis</td>
	<td width='20%'>Nama</td>
	<td width='10%'>Tahun</td>
	<td>Keterangan</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=penddno_p'>
	<tr>
	<td><select name='jns_non'>
	<option value='' selected='selected' disabled='disabled'>[ Non Formal ]</option>
	<option value='Pelatihan'>Pelatihan</option>
	<option value='Kursus'>Kursus</option>
	<option value='Diklat'>Diklat</option>
	<option value='Lainnya'>Lainnya</option>
	</select>
	</td>
	<td><input type='text' name='nama_non' class='form-input'></td>
	<td><input type='text' name='thn_non' class='form-input'></td>
	<td><input type='text' name='ket_non' class='form-input' size='40'></td>
	
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='TAMBAHKAN' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>";
	//////////////////
	//////////////////
	
	$b1=mysql_query("select *from penddno where id_kary='$id_kary' order by thn_non ASC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td>$b[jns_non]</td>
		<td>$b[nama_non]</td>
		<td>$b[thn_non]</td>
		<td>$b[ket_non]</td>
		<td align='center'><a href='index.php?task=penddno_e&id=$b[id]&id_kary=$id_kary'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=deleto&id=<?php echo"$b[id]&id_kary=$id_kary"; ?>&code=penddno&add=penddno_b&h1=DATA PENDIDIKAN NON FORMAL' OnClick="return confirm('Apakah data <?php echo $b[award]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";
		
	
	}



function penddno_p()
	{
	$id_kary=$_POST['id_kary'];
	$jns_non=$_POST['jns_non'];
	$nama_non=$_POST['nama_non'];
	$thn_non=$_POST['thn_non'];
	$ket_non=$_POST['ket_non'];
	$a=mysql_query("insert into penddno values('', '$id_kary', '$jns_non', '$nama_non', '$thn_non', '$ket_non')");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Pendidikan Non Formal Sudah Masuk&id_kary=$id_kary&h1=DATA PENDIDIKAN NON FORMAL&add=penddno_b");
		
		}
	else
		{echo"error";}
	}

function penddno_msg()
	{
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	$msg=$_GET['msg'];
	echo"
	<h2 align='center'>DATA PENDIDIKAN NON FORMAL $nmkary</h2>
	<h3>$msg</h3>
	<form method='post' action='index.php?task=penddno_b'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='KEMBALI' id='simpan' class='clean-blue'>
	</form>
	";
	}


function penddno_e()
	{
	$id=$_GET['id'];
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from penddno where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$jns_non=$a[jns_non];
		$nama_non=$a[nama_non];
		$thn_non=$a[thn_non];
		$ket_non=$a[ket_non];
		}
	echo"<br><br>
	<fieldset>
	<legend>Data Pendidikan Non Formal</legend>
	<form method='post' action='index.php?task=penddno_e2'>
	<table width='100%'>
	<tr>
	<td width='15%'>Jenis</td>
	<td><select name='jns_non'>
	";
	$jns1="Pelatihan";
	$jns2="Kursus";
	$jns3="Diklat";
	$jns4="Pelatihan";
	echo"
	<option value='Pelatihan' "; if($jns_non=='Pelatihan') {echo"SELECTED";}
	echo" >Pelatihan</option>
	<option value='Kursus' "; if($jns_non=='Kursus') {echo"SELECTED";}
	echo">Kursus</option>
	<option value='Diklat' "; if($jns_non=='Diklat') {echo"SELECTED";}
	echo">Diklat</option>
	<option value='Lainnya' "; if($jns_non=='Pelatihan') {echo"SELECTED";}
	echo">Lainnya</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Nama</td>
	<td><input type='text' name='nama_non' value='$nama_non' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Tahun</td>
	<td><input type='text' name='thn_non' value='$thn_non' class='form-input'></td>
	</tr>
	
	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_non' value='$ket_non' class='form-input' size='40'></td>
	</tr>
	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' value='GANTI' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>";
	}
	/*
	<option value='Pelatihan' "; if($jns_non=='Pelatihan') {echo"SELECTED";}
	echo" >Pelatihan</option>
	<option value='Kursus' "; if($jns_non=='Kursus') {echo"SELECTED";}
	echo">Kursus</option>
	<option value='Diklat' "; if($jns_non=='Diklat') {echo"SELECTED";}
	echo">Diklat</option>
	<option value='Lainnya' "; if($jns_non=='Pelatihan') {echo"SELECTED";}
	echo">Lainnya</option>
	*/

function penddno_e2()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$jns_non=$_POST['jns_non'];
	$nama_non=$_POST['nama_non'];
	$thn_non=$_POST['thn_non'];
	$ket_non=$_POST['ket_non'];
	$a=mysql_query("update penddno set jns_non='$jns_non', nama_non='$nama_non', thn_non='$thn_non', ket_non='$ket_non' where id='$id'");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Pendidikan Non Formal Sudah Diganti&id_kary=$id_kary&h1=DATA PENDIDIKAN NON FORMAL&add=penddno_b");
		
		}
	else
		{echo"error";}
	}


/* ============================================================= */

function lgrkry()
	{
	include ('selected.php');

	echo"
	<h2 align='center'>DATA PELANGGARAN KARYAWAN</h2>
	<fieldset>
	<legend>Cari Karyawan</legend>
	<form method='post' action='index.php?task=lgrkry_b'>
	";?>
	
	<table width='100%'>
	<tr>
	<td width="15%">Unit Kerja</td>
	<td>
    <select name="id_unit" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Unit Kerja</option>
      
      <?php getTierOne(); ?>
    
    </select> 
	</td>
	</tr>
    
	<tr>
	<td>Bagian</td>
	<td>
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    </td>
	</tr>

	<tr>
	<td>Karyawan</td>
	<td>
	<span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
	</td></tr>

	<tr>
	<td></td>
	<td>
	<span id="result_3" style="display: none;"></span> 
	
	</td></tr>

	</table>

	<?php echo"</form>
	</fieldset>
	
	";
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
		
	}

function lgrkry_b()
	{
	$idunit=$_POST['id_unit'];
	$id_kary=$_POST['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	echo"
	<h2 align='center'>DATA PELANGGARAN $nmkary</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	</table>
	</fieldset>

	<br><br>";
	////////////////////////
	////////////////////////
	////////////////////////
	
	echo"<br>
	<fieldset>
	<legend>Data Pelanggaran Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='25%'>Pelanggaran</td>
	<td width='20%'>Sanksi</td>
	<td>Keterangan</td>
	<td width='15%'>Tanggal</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=lgrkry_p'>
	<tr>
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
	<td><input type='text' name='sanksi_lgr' class='form-input'></td>
	<td><input type='text' name='ket_lgr' class='form-input' size='40'></td>
	<td><input type='text' name='tgl_lgr' class='datepicker' class='form-input'></td>
	<td colspan='2'>
	<input type='hidden' name='idunit' value='$idunit'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='TAMBAHKAN' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>";
	//////////////////
	//////////////////
	
	$b1=mysql_query("select *from langgar_kary where id_kary='$id_kary' order by id DESC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td valign='top'>";$idlanggar=$b[id_langgar];
		$g1=mysql_query("select *from langgar where id='$idlanggar'");
		while($g=mysql_fetch_array($g1))
			{
			$jns_langgar=$g[jns_langgar];
			$langgar=$g[langgar];
			$ket_langgar=$g[ket_langgar];
			}
		echo"
		$jns_langgar .<br>
		$langgar . <br>
		$ket_langgar 
		</td>
		<td valign='top'>$b[sanksi_lgr]</td>
		<td valign='top'>$b[ket_lgr]</td>
		<td valign='top'>$b[tgl_lgr]</td>
		<td valign='top' align='center'><a href='index.php?task=lgrkry_e&id=$b[id]&id_kary=$id_kary&idunit=$idunit'> <img src='images/b_edit.png'></a></td>
		<td valign='top' align='center'>
		"; ?>
		<a href='index.php?task=deleto&id=<?php echo"$b[id]&id_kary=$id_kary&idunit=$idunit"; ?>&code=langgar_kary&add=lgrkry_b&h1=DATA PELANGGARAN KARYAWAN' OnClick="return confirm('Apakah Data Pelanggaran Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";
	}


function lgrkry_p()
	{
	$id_kary=$_POST['id_kary'];
	$idunit=$_POST['idunit'];
	$id_langgar=$_POST['id_langgar'];
	$sanksi_lgr=$_POST['sanksi_lgr'];
	$ket_lgr=$_POST['ket_lgr'];
	$tgl_lgr=$_POST['tgl_lgr'];
	$a=mysql_query("insert into langgar_kary values('', '$id_kary', '$id_langgar', '$sanksi_lgr', '$ket_lgr', '$tgl_lgr')");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Pelanggaran Karyawan Sudah Masuk&id_kary=$id_kary&idunit=$idunit&h1=DATA PELANGGARAN KARYAWAN&add=lgrkry_b");
		
		}
	else
		{echo"error";}
	}

function lgrkry_msg()
	{
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	$msg=$_GET['msg'];
	echo"
	<h2 align='center'>DATA PENDIDIKAN NON FORMAL $nmkary</h2>
	<h3>$msg</h3>
	<form method='post' action='index.php?task=penddno_b'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='KEMBALI' id='simpan' class='clean-blue'>
	</form>
	";
	}


function lgrkry_e()
	{
	$id=$_GET['id'];
	$idunit=$_GET['idunit'];
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from langgar_kary where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$id_langgar=$a[id_langgar];
		$sanksi_lgr=$a[sanksi_lgr];
		$ket_lgr=$a[ket_lgr];
		$tgl_lgr=$a[tgl_lgr];
		}
	echo"<br><br>
	<fieldset>
	<legend>DATA PELANGGARAN KARYAWAN</legend>
	<form method='post' action='index.php?task=lgrkry_e2'>
	<table width='100%'>
	<tr>
	<td width='20%'>Pelanggaran</td>
	<td><select name='id_langgar'>
	<option value='' disabled='disabled'>[ Pelanggaran ]</option>";
	$f1=mysql_query("select *from langgar where id_unit='$idunit'");
	while($f=mysql_fetch_array($f1))
		{
		echo"<option value='$f[id]' ";
		if($f[id]=='$id_langgar') {echo"SELECTED";}
		echo">$f[jns_langgar] - $f[langgar]</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Sanksi</td>
	<td><input type='text' name='sanksi_lgr' value='$sanksi_lgr' class='form-input'></td>
	</tr>

	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_lgr' value='$ket_lgr' class='form-input' size='40'></td>
	</tr>

	<tr>
	<td>Tanggal</td>
	<td><input type='text' name='tgl_lgr' value='$tgl_lgr' class='datepicker' class='form-input'></td>
	</tr>

	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='idunit' value='$idunit'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' value='GANTI' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>
	</table>
	</fieldset>
	";
	}
	

function lgrkry_e2()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$id_langgar=$_POST['id_langgar'];
	$idunit=$_POST['idunit'];
	$sanksi_lgr=$_POST['sanksi_lgr'];
	$ket_lgr=$_POST['ket_lgr'];
	$tgl_lgr=$_POST['tgl_lgr'];
	$a=mysql_query("update langgar_kary set id_langgar='$id_langgar', sanksi_lgr='$sanksi_lgr', ket_lgr='$ket_lgr', tgl_lgr='$tgl_lgr' where id='$id'");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Pelanggaran Karyawan Sudah Diganti&id_kary=$id_kary&h1=DATA PELANGGARAN KARYAWAN&add=lgrkry_b&idunit=$idunit");
		
		}
	else
		{echo"error";}
	}


/* ============================================================= */

function awdkry()
	{
	include ('selected.php');

	echo"
	<h2 align='center'>DATA PENGHARGAAN KARYAWAN</h2>
	<fieldset>
	<legend>Cari Karyawan</legend>
	<form method='post' action='index.php?task=awdkry_b'>
	";?>
	
	<table width='100%'>
	<tr>
	<td width="15%">Unit Kerja</td>
	<td>
    <select name="id_unit" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Unit Kerja</option>
      
      <?php getTierOne(); ?>
    
    </select> 
	</td>
	</tr>
    
	<tr>
	<td>Bagian</td>
	<td>
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    </td>
	</tr>

	<tr>
	<td>Karyawan</td>
	<td>
	<span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
	</td></tr>

	<tr>
	<td></td>
	<td>
	<span id="result_3" style="display: none;"></span> 
	
	</td></tr>

	</table>

	<?php echo"</form>
	</fieldset>
	
	";
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
	///////////////////////////////
		
	}

function awdkry_b()
	{
	$idunit=$_POST['id_unit'];
	$id_kary=$_POST['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a[nama_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	echo"
	<h2 align='center'>DATA PENGHARGAAN $nmkary</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	</table>
	</fieldset>

	<br><br>";
	////////////////////////
	////////////////////////
	////////////////////////
	
	echo"<br>
	<fieldset>
	<legend>Data Penghargaan Karyawan</legend>
	<table width='100%'>
	<tr>
	<td>Penghargaan</td>
	<td width='25%'>Keterangan</td>
	<td width='15%'>Tanggal</td>
	<td width='5%'></td>
	<td width='5%'></td>
	</tr>
	
	<form method='post' action='index.php?task=awdkry_p'>
	<tr>
	<td><select name='id_award'>
	<option value='' selected='selected' disabled='disabled'>[ Penghargaan ]</option>";
	$f1=mysql_query("select *from award where id_unit='$idunit'");
	while($f=mysql_fetch_array($f1))
		{
		echo"<option value='$f[id]'>$f[jns_award] - $f[award] - $f[ket_award]</option>";
		}
	echo"
	</select>
	</td>
	<td><input type='text' name='ket_awd' class='form-input' size='20'></td>
	<td><input type='text' name='tgl_awd' class='datepicker' class='form-input'></td>
	<td colspan='2'>
	<input type='hidden' name='idunit' value='$idunit'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='submit' value='TAMBAHKAN' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>";
	//////////////////
	//////////////////
	
	$b1=mysql_query("select *from award_kary where id_kary='$id_kary' order by id DESC");
	while($b=mysql_fetch_array($b1))
		{
		echo"
		<tr>
		<td valign='top'>";$idaward=$b[id_award];
		$g1=mysql_query("select *from award where id='$idaward'");
		while($g=mysql_fetch_array($g1))
			{
			$jns_award=$g[jns_award];
			$award=$g[award];
			$ket_award=$g[ket_award];
			}
		echo"
		$jns_award<br>
		$award<br>
		$ket_award
		</td>
		<td valign='top'>$b[ket_awd]</td>
		<td valign='top'>$b[tgl_awd]</td>
		<td valign='top' align='center'><a href='index.php?task=awdkry_e&id=$b[id]&id_kary=$id_kary&idunit=$idunit'> <img src='images/b_edit.png'></a></td>
		<td valign='top' align='center'>
		"; ?>
		<a href='index.php?task=deleto&id=<?php echo"$b[id]&id_kary=$id_kary&idunit=$idunit"; ?>&code=award_kary&add=awdkry_b&h1=DATA PENGHARGAAN KARYAWAN' OnClick="return confirm('Apakah Data Penghargaan Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	</fieldset>
	";
	}


function awdkry_p()
	{
	$id_kary=$_POST['id_kary'];
	$idunit=$_POST['idunit'];
	$id_award=$_POST['id_award'];
	$ket_awd=$_POST['ket_awd'];
	$tgl_awd=$_POST['tgl_awd'];
	$a=mysql_query("insert into award_kary values('', '$id_kary', '$id_award', '$ket_awd', '$tgl_awd')");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Penghargaan Karyawan Sudah Masuk&id_kary=$id_kary&idunit=$idunit&h1=DATA PENGHARGAAN KARYAWAN&add=awdkry_b");
		
		}
	else
		{echo"error";}
	}


function awdkry_e()
	{
	$id=$_GET['id'];
	$idunit=$_GET['idunit'];
	$id_kary=$_GET['id_kary'];
	$a1=mysql_query("select *from award_kary where id='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$id_award=$a[id_award];
		$ket_awd=$a[ket_awd];
		$tgl_awd=$a[tgl_awd];
		}
	echo"<br><br>
	<fieldset>
	<legend>DATA PENGHARGAAN KARYAWAN</legend>
	<form method='post' action='index.php?task=awdkry_e2'>
	<table width='100%'>
	<tr>
	<td width='20%'>Penghargaan</td>
	<td><select name='id_award'>
	<option value='' disabled='disabled'>[ Penghargaan ]</option>";
	$f1=mysql_query("select *from award where id_unit='$idunit'");
	while($f=mysql_fetch_array($f1))
		{
		echo"<option value='$f[id]' ";
		if($f[id]=='$id_award') {echo"SELECTED";}
		echo">$f[jns_award] - $f[award] - $f[ket_award]</option>";
		}
	echo"
	</select>
	</td>
	</tr>

	<tr>
	<td>Keterangan</td>
	<td><input type='text' name='ket_awd' value='$ket_awd' class='form-input' size='40'></td>
	</tr>

	<tr>
	<td>Tanggal</td>
	<td><input type='text' name='tgl_awd' value='$tgl_awd' class='datepicker' class='form-input'></td>
	</tr>

	
	<tr>
	<td></td>
	<td>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='idunit' value='$idunit'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' /> &nbsp;&nbsp;
	<input type='submit' value='GANTI' class='clean-blue' id='simpan'>
	</td>
	</tr>
	</form>
	</table>
	</fieldset>
	";
	}
	

function awdkry_e2()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$id_award=$_POST['id_award'];
	$idunit=$_POST['idunit'];
	$ket_awd=$_POST['ket_awd'];
	$tgl_awd=$_POST['tgl_awd'];
	$a=mysql_query("update award_kary set id_award='$id_award', ket_awd='$ket_awd', tgl_awd='$tgl_awd' where id='$id'");
	if($a)
		{
		header("location: index.php?task=msg&msg=Data Penghargaan Karyawan Sudah Diganti&id_kary=$id_kary&h1=DATA PENGHARGAAN  KARYAWAN&add=awdkry_b&idunit=$idunit");
		
		}
	else
		{echo"error";}
	}



/* ============================================================= */

function mutasi()
	{
	echo"<h2 align='center'>DATA MUTASI KARYAWAN</h2>";
	$nmunit=$_GET['nmunit'];
	$nmbag=$_GET['nmbag'];
	$namaunit=$_GET['namaunit'];
	$namabag=$_GET['namabag'];
	$nama_kary=$_GET['nama_kary'];
	$tgl_mutasi=$_GET['tgl_mutasi'];
	if($nmunit=='')
		{}
	else
		{echo"
		<h4>Karyawan $nama_kary Sudah Dimutasikan Dari Unit $nmunit Bagian $nmbag ke Unit $namaunit Bagian $namabag Pada Tanggal $tgl_mutasi</h4>
		<br><br>
		";}
	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);

	echo"
	
	<fieldset>
	<legend>Cari Karyawan</legend>
	
	<table width='100%'>
	<tr>
	<td width='10%'>Karyawan</td>
	<td>
	<form method='post' action='index.php?task=mutasi2'>
	<input type='text' id='katanyo' name='kary' onkeyup='lihat(this.value)' size='40' class='form-input'>
	<div id='kotaksugest' style='position:absolute;
	background-color:#eeffee;visibility:hidden;z-index:1300;x-index:30; y-index:500'>
	</td>
	</tr>

	<tr>
	<td></td>
	<td><input type='submit' value='CARI KARYAWAN' class='clean-blue'></td>
	</tr>
	</form>
	</table>
	</fieldset>
	<br><br><br>

	<fieldset>
	<legend>Data Mutasi Karyawan</legend>
	$msg
	<table width='100%'>
	<tr>
	<td rowspan='2'><b>Nama Karyawan</b></td>
	<td colspan='2' align='center'><b>MUTASI DARI</b></td>
	<td colspan='2' align='center'><b>MUTASI KE</b></td>
	<td rowspan='2'><b>Tanggal Mutasi</b></td>
	<td rowspan='2' width='5%'></td>
	<td rowspan='2' width='5%'></td>
	</tr>
	<tr>
	<td align='center'>Unit</td>
	<td align='center'>Bagian</td>
	<td align='center'>Unit</td>
	<td align='center'>Bagian</td>
	</tr>
	";
	$a1=mysql_query("select *from mutasi, karyawan, unit_kerja, unit_bagian where mutasi.id_kary=karyawan.id and mutasi.id_unit=unit_kerja.id and mutasi.id_bag=unit_bagian.id  order by mutasi.id_mutasi DESC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{
		echo"
		<tr>
		<td>$a[nama_kary]
		</td>
		<td>$a[nama]</td>
		<td>$a[nama_bag]</td>
		<td>";$id_unit1=$a[id_unit1];
		$b1=mysql_query("select *from unit_kerja where id='$id_unit1'");
		while($b=mysql_fetch_array($b1))
			{$unitnm1=$b[nama];}
		echo"$unitnm1
		</td>
		<td>";$id_bag1=$a[id_bag1];
		$c1=mysql_query("select *from unit_bagian where id='$id_bag1'");
		while($c=mysql_fetch_array($c1))
			{$bagnm1=$c[nama_bag];}
		echo"$bagnm1
		</td>
		<td>$a[tgl_mutasi]</td>
		<td align='center'><a href='index.php?task=mutasi_e&id=$a[id_mutasi]'> <img src='images/b_edit.png'></a></td>
		<td align='center'>
		"; ?>
		<a href='index.php?task=deleti&id=<?php echo"$a[id_mutasi]"; ?>&code=mutasi&add=mutasi&field' OnClick="return confirm('Apakah data <?php echo $a[nama_kary]; ?>  Akan Dihapus?');");> <img src='images/trash.png'></a>
		<?php echo"
		</td>
		</tr>
		";
		}
	echo"
	</table>
	
	";
	$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM mutasi"),0);
	$max=mysql_result(mysql_query("SELECT MAX(id_mutasi) FROM mutasi"),0);
	$total_pages = ceil($total_results / $max_results);

	echo "<br><center>[Page]<br>";


	if($page > 1){
		$prev = ($page - 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=mutasi&page=$prev\">&lt;&lt;Prev</a> ";
	}

	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
			} else {
				echo "<a href=\"".$_SERVER['PHP_SELF']."?task=mutasi&page=$i\">$i</a> ";
		}
	}


	if($page < $total_pages){
		$next = ($page + 1);
		echo "<a href=\"".$_SERVER['PHP_SELF']."?task=mutasi&page=$next\">Next>></a>";

		} echo"
		<br>
	<br>Terdapat $total_results Data Mutasi Karyawan
	</fieldset>
	";
	}


function mutasi2()
	{
	include ('selected.php');
	//$kary=$_POST['kary'];
	$kary=explode('-', $_POST['kary']);
		$nmkry=$kary[0];
		$nokry=$kary[1];
	$a1=mysql_query("select *from karyawan where no_kary='$nokry'");
	while($a=mysql_fetch_array($a1))
		{
		$id_kary=$a[id];
		$nama_kary=$a[nama_kary];
		$id_unita=$a[id_unit];
		$id_baga=$a[id_bag];
		$jk=$a[jk];
		$no_kary=$a[no_kary];
		}
	$nmkary=strtoupper($nama_kary);
	echo"
	<h2 align='center'>MUTASI $nmkary</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unita'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_baga'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>

	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>

	<tr>
	<td colspan='2'><h4>Dimutasikan Ke:</h4></td>
	</tr>
	<form method='post' action='index.php?task=mutasi_p'>
	";?>
	<!-- 
	<tr>
	<td width="15%">Unit Kerja</td>
	<td>
    <select name="id_unit" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Unit Kerja</option>
      
      <?php getTierOne(); ?>
    
    </select> 
	</td>
	</tr>
    
	<tr>
	<td>Bagian</td>
	<td>
	
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    
	</td>
	</tr>
	<tr>
	<td>Karyawan</td>
	<td>
	<span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="images/loading.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
	</td></tr>	
	-->
	<?php
	echo"
	<tr>
	<td>Unit/ Bagian</td>
	<td><select name='unitbag'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from unit_bagian where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_bag=$g[id];
			echo"
			<option value='$id_unit-$id_bag'>$g[nama_bag]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>

	<tr>
	<td>Tanggal Mutasi </td>
	<td><input type='text' name='tgl_mutasi' class='datepicker' class='form-input'></td>
	<tr>
	<tr>
	<td></td>
	<td>
	
	<input type='hidden' name='nmunit' value='$nmunit'>
	<input type='hidden' name='nmbag' value='$nmbag'>
	<input type='hidden' name='nama_kary' value='$nama_kary'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='hidden' name='id_unita' value='$id_unita'>
	<input type='hidden' name='id_baga' value='$id_baga'>
	<input type='hidden' name='nokry' value='$nokry'>
	<input type='submit' value='MUTASI' class='clean-blue'>
	</td>
	</tr>
	</form>
	</table>
	</fieldset>

	<br><br>";
	}


function mutasi_p()
	{
	$nmunit=$_POST['nmunit'];
	$nmbag=$_POST['nmbag'];
	$id_kary=$_POST['id_kary'];
	$nama_kary=$_POST['nama_kary'];
	$id_unita=$_POST['id_unita'];
	$id_baga=$_POST['id_baga'];
	//$id_unit=$_POST['id_unit'];
	//$id_bag=$_POST['id_bag'];
	$unitbag=$_POST['unitbag'];
	$nokry=$_POST['nokry'];
	$tgl_mutasi=$_POST['tgl_mutasi'];

	$unitbagi=explode('-', $unitbag);
	$id_unit=$unitbagi[0];
	$id_bag=$unitbagi[1];

	$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($c=mysql_fetch_array($c1))
		{
		$codeunit=$c[kode];
		$namaunit=$c[nama];
		}
	$d1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($d=mysql_fetch_array($d1))
		{
		$codebag=$d[kode_bag];
		$namabag=$d[nama_bag];
		}
	$frontcode=substr($nokry, 0, 4);
	$backcode=substr($nokry, 4, 9);
	$nokary=$codeunit.''.$codebag.''.$backcode;
	
	//echo"$id_unit - $id_bag";
	$a=mysql_query("insert into mutasi values('', '$id_kary', '$id_unita', '$id_baga', '$id_unit', '$id_bag', '$tgl_mutasi')");
	$b=mysql_query("update karyawan set no_kary='$nokary', id_unit='$id_unit', id_bag='$id_bag' where id='$id_kary'");

	if($a and $b)
		{
		header("location: index.php?task=mutasi&nama_kary=$nama_kary&nmunit=$nmunit&nmbag=$nmbag&namaunit=$namaunit&namabag=$namabag&tgl_mutasi=$tgl_mutasi");
		}
	else
		{echo"error";}
		
	}


function mutasi_e()
	{
	$id=$_GET['id'];
	$a1=mysql_query("select *from mutasi where id_mutasi='$id'");
	while($a=mysql_fetch_array($a1))
		{
		$id_kary=$a[id_kary];
		$id_unit=$a[id_unit];
		$id_bag=$a[id_bag];
		$id_unit1=$a[id_unit1];
		$id_bag1=$a[id_bag1];
		$tgl_mutasi=$a[tgl_mutasi];
		}
	$b1=mysql_query("select *from karyawan where id='$id_kary'");
	while($b=mysql_fetch_array($b1))
		{
		$nama_kary=$b[nama_kary];
		$nokry=$b[no_kary];
		}
	echo"
	<h2 align='center'>MUTASI $nmkary</h2>
	<fieldset>
	<legend>Karyawan</legend>
	<table width='100%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='5'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>

	

	<tr>
	<td>No Karyawan</td>
	<td>$nokry</td>
	</tr>

	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	
	<tr>
	<td>Unit Kerja Sebelumnya</td>
	<td>";
	$d1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($d=mysql_fetch_array($d1))
		{
		$nmunit=$d[nama];
		}
	echo"$nmunit
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja Sebelumnya</td>
	<td>";
	$e1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($e=mysql_fetch_array($e1))
		{
		$nmbag=$e[nama_bag];
		}
	echo"$nmbag
	</td>
	</tr>
	
	<tr>
	<td colspan='2'><b>Dimutasikan Ke :</b></td>
	</tr>

	<tr>
	<td>Unit Kerja</td>
	<td>";
	$f1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($f=mysql_fetch_array($f1))
		{
		$nmunit_=$f[nama];
		}
	echo"$nmunit_
	</td>
	</tr>

	<tr>
	<td>Bagian Unit Kerja</td>
	<td>";
	$g1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($g=mysql_fetch_array($g1))
		{
		$nmbag_=$g[nama_bag];
		}
	echo"$nmbag_
	</td>
	</tr>

	

	<tr>
	<td colspan='2'><h4>Pergantian Ke:</h4></td>
	</tr>
	<form method='post' action='index.php?task=mutasi_e2'>
	";?>
	
	<?php
	echo"
	<tr>
	<td>Unit/ Bagian</td>
	<td><select name='unitbag'>";
	$h1=mysql_query("select *from unit_kerja order by id ASC");
	while($h=mysql_fetch_array($h1))
		{
		$id_unith=$h[id];
		echo"<optgroup label='$h[nama]'>";
		$i1=mysql_query("select *from unit_bagian where id_unit='$id_unith'");
		while($i=mysql_fetch_array($i1))
			{
			$id_bagi=$i[id];
			echo"
			<option value='$id_unith-$id_bagi'>$i[nama_bag]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>

	<tr>
	<td>Tanggal Mutasi </td>
	<td><input type='text' name='tgl_mutasi' class='datepicker' class='form-input' value='$tgl_mutasi'></td>
	<tr>
	<tr>
	<td></td>
	<td>
	
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='hidden' name='nokry' value='$nokry'>
	<input type='submit' value='MUTASI' class='clean-blue'>
	</td>
	</tr>
	</form>
	</table>
	</fieldset>
	";
	}


function mutasi_e2()
	{
	$id=$_POST['id'];
	$id_kary=$_POST['id_kary'];
	$nokry=$_POST['nokry'];
	$unitbag=$_POST['unitbag'];
	$tgl_mutasi=$_POST['tgl_mutasi'];
	
	$unitbagi=explode('-', $unitbag);
	$id_unit=$unitbagi[0];
	$id_bag=$unitbagi[1];
	
	
	$c1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($c=mysql_fetch_array($c1))
		{
		$codeunit=$c[kode];
		$namaunit=$c[nama];
		}
	$d1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($d=mysql_fetch_array($d1))
		{
		$codebag=$d[kode_bag];
		$namabag=$d[nama_bag];
		}
	$frontcode=substr($nokry, 0, 4);
	$backcode=substr($nokry, 4, 9);
	$nokary=$codeunit.''.$codebag.''.$backcode;

	$a=mysql_query("update mutasi set id_unit1='$id_unit', id_bag1='$id_bag', tgl_mutasi='$tgl_mutasi' where id_mutasi='$id'");
	
	$b=mysql_query("update karyawan set no_kary='$nokary', id_unit='$id_unit', id_bag='$id_bag' where id='$id_kary'");
	if($a and $b)
		{header("location: index.php?task=mutasi&msg=Data Sudah Diganti");}
	else
		{echo"eror";}

	}

/* ============================================================= */
/* ============================================================= */
/* ============================================================= */
/* ============================================================= */

function rep_ker()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER UNIT KERJA</h2>
	<br><br>
	<fieldset>
	<legend>Unit Kerja</legend>
	<form method='post' action='index.php?task=rep_ker_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Unit Kerja</td>
	<td>
	<select name='unit'>";
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		$id=$a[id];
		$nama=$a[nama];
		echo"
		<option value='$id.$nama'>$nama</option>
		";
		}
	echo"
	</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_ker_p()
	{
	$unit=$_POST['unit'];
	$unita=explode('.', $unit);
	$idunit=$unita[0];
	$nmunit=strtoupper($unita[1]);

	if($unit=='')
		{
		$idunit=$_GET['id_unit'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN UNIT $nmunit</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_ker_pdf&idunit=$idunit&nmunit=$nmunit'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/unitkerjap.php?idunit=$idunit&nmunit=$nmunit'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan where id_unit='$idunit' order by nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan where id_unit='$idunit'"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan where id_unit='$idunit'"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ker_p&id_unit=$idunit&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ker_p&id_unit=$idunit&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ker_p&id_unit=$idunit&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		 
		<br><br>
		</fieldset>"; ?>



	<?php echo"
	";
	}


function rep_ker_pdf()
	{
	include_once('phpToPDF.php') ; 
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
		<h2 align='center'>DATA KARYAWAN UNIT $nmunit</h2>
		<center>
		<a href='pdf/rep_unit_kerja.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>"; 
	}




function rep_ker_d()
	{
	$id=$_GET['id'];
	$a1=mysql_query();
	}

/* ============================================================= */

function rep_bag()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER BAGIAN UNIT KERJA</h2>
	<br><br>
	<fieldset>
	<legend>Bagian Unit Kerja</legend>
	<form method='post' action='index.php?task=rep_bag_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Bagian Unit Kerja</td>
	<td><select name='unitbag'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from unit_bagian where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_bag=$g[id];
			$nm_bag=$g[nama_bag];
			echo"
			<option value='$id_unit-$id_bag-$nm_bag'>$g[nama_bag]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}


function rep_bag_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idbag=$_GET['idbag'];
	$nmbag=$_GET['nmbag'];

	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	<h2 align='center'>DATA KARYAWAN UNIT BAGIAN $nmbag</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;
	$a1=mysql_query("select *from karyawan where id_bag='$idbag' order by nama_kary ASC");
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
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan where id_bag='$idbag'"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan where id_bag='$idbag'"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="<br><center>
		<br>$total_results Data Karyawan Unit Bagian $nmbag</center>
		";

		phptopdf_html($html,'pdf/', 'rep_unit_bag.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN UNIT BAGIAN $nmbag</h2>
		<center>
		<a href='pdf/rep_unit_bag.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";

	}

function rep_bag_p()
	{
	$unitbag=$_POST['unitbag'];
	$unita=explode('-', $unitbag);
	$idunit=$unita[0];
	$idbag=$unita[1];
	$nmbag=strtoupper($unita[2]);

	if($unitbag=='')
		{
		$idbag=$_GET['id_bag'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN BAGIAN UNIT $nmbag</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_bag_pdf&idbag=$idbag&nmbag=$nmbag'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/unitbagp.php?idbag=$idbag&nmbag=$nmbag'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan where id_bag='$idbag' order by nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan where id_bag='$idbag'"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan where id_bag='$idbag'"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_bag_p&id_bag=$idbag&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ker_p&id_bag=$idbag&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ker_p&id_bag=$idbag&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}


/* ============================================================= */

function rep_pendd()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER TINGKAT PENDIDIKAN</h2>
	<br><br>
	<fieldset>
	<legend>Pendidikan</legend>
	<form method='post' action='index.php?task=rep_pendd_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Tingkat Pendidikan</td>
	<td><select name='pendd'>";
	$a1=mysql_query("select *from pendd order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]-$a[tingkat]'>$a[tingkat]</option>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_pendd_p()
	{
	$pendd=$_POST['pendd'];
	$penddi=explode('-', $pendd);
	$idpendd=$penddi[0];
	$nmpendd=$penddi[1];
	$nmpenddi=strtoupper($nmpendd);

	if($pendd=='')
		{
		$idpendd=$_GET['id_pendd'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN TINGKAT PENDIDIKAN $nmpenddi</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_pendd_pdf&idpendd=$idpendd&nmpendd=$nmpenddi'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/penddp.php?idpendd=$idpendd&nmpendd=$nmpenddi'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_pendd_p&idpendd=$idpendd&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_pendd_p&idpendd=$idpendd&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_pendd_p&idpendd=$idpendd&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}


function rep_pendd_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idpendd=$_GET['idpendd'];
	$nmpendd=$_GET['nmpendd'];

	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="
	<h2 align='center'>DATA KARYAWAN TINGKAT PENDIDIKAN $nmpendd</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;

	$a1=mysql_query("select *from karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id order by karyawan.nama_kary ASC");
	while($a=mysql_fetch_array($a1))
		{	
		if($counter %2 == 0)
			{$wrn=$wn2;}
		else
			{$wrn=$wn1;}

		$html.="
		<tr bgcolor='".$wrn."'>
		<tr>
		<td>".$a[nama_kary]."</td>
		<td>".$a[no_kary]."</td>
		<td>".$a[jk]."</td>
		<td>".$a[status]."</td>
		</tr>
		";
		$counter++;
		}
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_pendd, karyawan where karyawan_pendd.id_pendd='$idpendd' and karyawan_pendd.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="
		<br>
		<br><center>$total_results Data Karyawan Pendidikan ".$nmpendd." </center>";

		phptopdf_html($html,'pdf/', 'rep_pendd.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN PENDIDIKAN $nmpendd</h2>
		<center>
		<a href='pdf/rep_pendd.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}

/* ============================================================= */

function rep_ahli()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER KEAHLIAN</h2>
	<br><br>
	<fieldset>
	<legend>Keahlian</legend>
	<form method='post' action='index.php?task=rep_ahli_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Keahlian</td>
	<td><select name='unitahli'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from ahli where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_ahli=$g[id];
			$ahli=$g[ahli];
			echo"
			<option value='$id_ahli-$ahli'>$g[ahli] - $g[ket]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_ahli_p()
	{
	$unitahli=$_POST['unitahli'];
	$unit_ahli=explode('-', $unitahli);
	$idahli = $unit_ahli[0];
	$nmahli = $unit_ahli[1];
	$nmahli2=strtoupper($nmahli);

	if($unitahli=='')
		{
		$idahli=$_GET['idahli'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN KEAHLIAN $nmahli2</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_ahli_pdf&idahli=$idahli&nmahli=$nmahli2'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/ahlip.php?idahli=$idahli&nmahli=$nmahli2'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ahli_p&idahli=$idahli&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ahli_p&idahli=$idahli&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_ahli_p&idahli=$idahli&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}


function rep_ahli_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idahli=$_GET['idahli'];
	$nmahli=$_GET['nmahli'];

	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	
	<h2 align='center'>DATA KARYAWAN KEAHLIAN $nmahli</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;

	$a1=mysql_query("select *from karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id order by karyawan.nama_kary ASC ");
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
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_ahli, karyawan where karyawan_ahli.id_ahli='$idahli' and karyawan_ahli.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="<center>
		<br><br>$total_results Data Karyawan Keahlian ".$nmahli."
		</center>";

		phptopdf_html($html,'pdf/', 'rep_ahli.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN KEAHLIAN $nmahli</h2>
		<center>
		<a href='pdf/rep_ahli.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}

/* ============================================================= */

function rep_stfkt()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER SERTIFIKASI</h2>
	<br><br>
	<fieldset>
	<legend>Sertifikasi</legend>
	<form method='post' action='index.php?task=rep_stfkt_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Sertifikasi</td>
	<td><select name='unitstfkt'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from sertifikat where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_stfkt=$g[id];
			$sertifikat=$g[sertifikat];
			echo"
			<option value='$id_stfkt-$sertifikat'>$g[sertifikat] - $g[ket_sertifikat]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_stfkt_p()
	{
	$unitstfkt=$_POST['unitstfkt'];
	$unit_stfkt=explode('-', $unitstfkt);
	$idstfkt = $unit_stfkt[0];
	$nmstfkt = $unit_stfkt[1];
	$nmstfkt2=strtoupper($nmstfkt);

	if($unitstfkt=='')
		{
		$idstfkt=$_GET['idstfkt'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN SERTIFIKASI $nmstfkt2</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_stfkt_pdf&idstfkt=$idstfkt&nmstfkt=$nmidstfkt2'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/sertifikasip.php?idstfkt=$idstfkt&nmstfkt=$nmstfkt2'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_stfkt_p&idstfkt=$idstfkt&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_stfkt_p&idstfkt=$idstfkt&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_stfkt_p&idstfkt=$idstfkt&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}


function rep_stfkt_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idstfkt = $_GET['idstfkt'];
	$nmstfkt = $_GET['nmstfkt'];

	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	<h2 align='center'>DATA KARYAWAN SERTIFIKASI $nmstfkt2</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;
	$a1=mysql_query("select *from karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id order by karyawan.nama_kary ASC");
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
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_sertifikat, karyawan where karyawan_sertifikat.id_sertifikat='$idstfkt' and karyawan_sertifikat.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);
		$html.="<center><br>
		<br>$total_results Data Karyawan Sertifikasi $nmstfkt
		</center>"; 
		phptopdf_html($html,'pdf/', 'rep_sertifikat.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN SERTIFIKASI $nmstfkt</h2>
		<center>
		<a href='pdf/rep_sertifikat.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}

/* ============================================================= */

function rep_awd()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER PENGHARGAAN</h2>
	<br><br>
	<fieldset>
	<legend>Penghargaan</legend>
	<form method='post' action='index.php?task=rep_awd_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Penghargaan</td>
	<td><select name='unitawd'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from award where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_awd=$g[id];
			$jns_award=$g[jns_award];
			echo"
			<option value='$id_awd-$jns_award'>$g[jns_award] - $g[award]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_awd_p()
	{
	$unitawd=$_POST['unitawd'];
	$unit_awd=explode('-', $unitawd);
	$idawd = $unit_awd[0];
	$nmawd = $unit_awd[1];
	$nmawd2=strtoupper($nmawd);

	if($unitawd=='')
		{
		$idawd=$_GET['idawd'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN PENGHARGAAN $nmawd2 </h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_awd_pdf&idawd=$idawd&nmawd=$nmawd2'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/penghargaanp.php?idawd=$idawd&nmawd=$nmawd2'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_awd_p&idawd=$idawd&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_awd_p&idawd=$idawd&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_awd_p&idawd=$idawd&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}

function rep_awd_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idawd = $_GET['idawd'];
	$nmawd = $_GET['nmawd'];
	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	<h2 align='center'>DATA KARYAWAN PENGHARGAAN $nmawd </h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;
	$a1=mysql_query("select *from award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id order by karyawan.nama_kary ASC");
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
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM award_kary, karyawan where award_kary.id_award='$idawd' and award_kary.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);
		$html.="<center>
		<br>
		<br>$total_results Data Karyawan Penghargaan $nmawd
		</center>"; 
		phptopdf_html($html,'pdf/', 'rep_penghargaan.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN PENGHARGAAN $nmawd</h2>
		<center>
		<a href='pdf/rep_penghargaan.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	
	}

/* ============================================================= */

function rep_lgr()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER PELANGGARAN</h2>
	<br><br>
	<fieldset>
	<legend>Pelanggaran</legend>
	<form method='post' action='index.php?task=rep_lgr_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Pelanggaran</td>
	<td><select name='unitlgr'>";
	$f1=mysql_query("select *from unit_kerja order by id ASC");
	while($f=mysql_fetch_array($f1))
		{
		$id_unit=$f[id];
		echo"<optgroup label='$f[nama]'>";
		$g1=mysql_query("select *from langgar where id_unit='$id_unit'");
		while($g=mysql_fetch_array($g1))
			{
			$id_lgr=$g[id];
			$jns_award=$g[jns_award];
			echo"
			<option value='$id_lgr-$jns_langgar'>$g[jns_langgar] - $g[langgar]</option>
			";
			}
		echo"</optgroup>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_lgr_p()
	{
	$unitlgr=$_POST['unitlgr'];
	$unit_lgr=explode('-', $unitlgr);
	$idlgr = $unit_lgr[0];
	$nmlgr = $unit_lgr[1];
	$nmlgr2=strtoupper($nmlgr);

	if($unitlgr=='')
		{
		$idlgr=$_GET['idlgr'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN PELANGGARAN $nmlgr2 </h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_lgr_pdf&idlgr=$idlgr&nmlgr=$nmlgr2'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/pelanggaranp.php?idlgr=$idlgr&nmlgr=$nmlgr2'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_lgr_p&idlgr=$idlgr&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_lgr_p&idlgr=$idlgr&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_lgr_p&idlgr=$idlgr&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}

function rep_lgr_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idlgr = $_GET['idlgr'];
	$nmlgr = $_GET['nmlgr'];
	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	<h2 align='center'>DATA KARYAWAN PELANGGARAN $nmlgr </h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;
	$a1=mysql_query("select *from langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id order by karyawan.nama_kary ASC");
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
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM langgar_kary, karyawan where langgar_kary.id_langgar='$idlgr' and langgar_kary.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="<center><br><br>$total_results Data Karyawan Pelanggaran $nmlgr
		</center>"; 
		phptopdf_html($html,'pdf/', 'rep_pelanggaran.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN PELANGGARAN $nmlgr</h2>
		<center>
		<a href='pdf/rep_pelanggaran.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}

/* ============================================================= */

function rep_gol()
	{
	echo"<h2 align='center'>LAPORAN DATA KARYAWAN PER GOLONGAN</h2>
	<br><br>
	<fieldset>
	<legend>Golongan</legend>
	<form method='post' action='index.php?task=rep_gol_p'>
	<table width='100%'>
	<tr>
	<td width='15%'>Pilih Golongan</td>
	<td><select name='golongan'>";
	$a1=mysql_query("select *from golongan order by id ASC");
	while($a=mysql_fetch_array($a1))
		{
		echo"<option value='$a[id]-$a[gol]'>$a[gol] - $a[ket_gol]</option>";
		}
	echo"</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='DATA KARYAWAN' class='clean-blue'>
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	";
	}

function rep_gol_p()
	{
	$golongan=$_POST['golongan'];
	$gol=explode('-', $golongan);
	$idgol=$gol[0];
	$nmgol=$gol[1];
	$nmgol2=strtoupper($nmgol);

	if($golongan=='')
		{
		$idgol=$_GET['idgol'];
		}
	else
		{}

	$msg=$_GET['msg'];
	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$max_results =20;
	$from=(($page*$max_results)-$max_results);


	echo"<br><br>
	<fieldset>
	<legend>Data Karyawan</legend>
	<h2 align='center'>DATA KARYAWAN GOLONGAN $nmgol2</h2>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_gol_pdf&idgol=$idgol&nmgol=$nmgol2'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/golonganp.php?idgol=$idgol&nmgol=$nmgol2'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$a1=mysql_query("select *from karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id order by karyawan.nama_kary ASC LIMIT $from, $max_results");
	while($a=mysql_fetch_array($a1))
		{	
		//link_tab clean-gray
		//<a href='index.php?task=rep_ker_d&id=$id' target='_blank'>$a[nama_kary]</a>
		echo"
		<tr>
		<td>";?><a href="<?php echo"act/karyawan_detail.php?id=$a[id_kary]";?>" rel="facebox"><?php echo"$a[nama_kary]"; ?></a>
		</td>
		<?php echo"
		<td>$a[no_kary]</td>
		<td>$a[jk]</td>
		<td>$a[status]</td>
		</tr>

		";
		}
		echo"</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		echo "<br><center>[Page]<br>";


		if($page > 1){
			$prev = ($page - 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_gol_p&idgol=$idgol&page=$prev\">&lt;&lt;Prev</a> ";
		}

		for($i = 1; $i <= $total_pages; $i++){
			if(($page) == $i){
				echo "$i ";
				} else {
					echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_gol_p&idgol=$idgol&page=$i\">$i</a> ";
			}
		}


		if($page < $total_pages){
			$next = ($page + 1);
			echo "<a href=\"".$_SERVER['PHP_SELF']."?task=rep_gol_p&idgol=$idgol&page=$next\">Next>></a>";

			} echo"
			<br>
		<br>Terdapat $total_results Data Karyawan
		 
		</fieldset>"; ?>



	<?php echo"
	";
	}

function rep_gol_pdf()
	{
	include_once('phpToPDF.php') ; 
	$idgol=$_GET['idgol'];
	$nmgol=$_GET['nmgol'];
	$wn1="#ffffff";
	$wn2="#eeeeee";
	$html="<br><br>
	<h2 align='center'>DATA KARYAWAN GOLONGAN $nmgol</h2>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	<tr>
	<td><b>Nama Karyawan</b></td>
	<td><b>Nomer Karyawan</b></td>
	<td><b>Jenis Kelamin</b></td>
	<td><b>Status Nikah</b></td>
	</tr>
	";
	$counter=1;
	$a1=mysql_query("select *from karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id order by karyawan.nama_kary ASC");
	while($a=mysql_fetch_array($a1))
		{	
		if($counter %2 == 0)
			{$wrn=$wn2;}
		else
			{$wrn=$wn1;}

		$html.="
		<td>".$a[nama_kary]."</td>
		<td>".$a[no_kary]."</td>
		<td>".$a[jk]."</td>
		<td>".$a[status]."</td>
		</tr>

		";
		$counter++;
		}
		$html.="</table><br><br>";
		$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id"),0);
		$max=mysql_result(mysql_query("SELECT MAX(id) FROM karyawan_golongan, karyawan where karyawan_golongan.id_golongan='$idgol' and karyawan_golongan.id_kary=karyawan.id"),0);
		$total_pages = ceil($total_results / $max_results);

		$html.="<center><br>
		<br>Terdapat $total_results Data Karyawan Golongan $nmgol
		</center>"; 
		phptopdf_html($html,'pdf/', 'rep_golongan.pdf');
		echo "
		<h2 align='center'>DATA KARYAWAN GOLONGAN $nmgol</h2>
		<center>
		<a href='pdf/rep_golongan.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}

/* ============================================================= */

function rep_gaji()
	{
	echo"
	<h2 align='center'>DATA GAJI POKOK & TUNJANGAN</h2>
	<br><br>
	<fieldset>
	<legend>Gaji Pokok & Tunjangan</legend>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_gaji_pdf'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/gajip.php'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td width='20%'><b>Unit Kerja/Bagian</b></td>
	<td width='10%' align='right'><b>Gaji Pokok</b></td>
	<td width='10%' align='right'><b>Tunjangan</b></td>
	<td></td>
	</tr>
	";
	$a1=mysql_query("select *from unit_kerja order by nama ASC");
	while($a=mysql_fetch_array($a1))
		{
		$idunit=$a[id];
		echo"
		<tr>
		<td><b>$a[nama]</b></td>
		<td align='right'>";
		$c=mysql_result(mysql_query("select SUM(gaji) as NUM from unit_bagian where id_unit='$idunit'"),0);
		 $c1=number_format($c, 0, '.', '.');
		echo"
		</td>
		<td align='right'>";
		$d=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian where id_unit='$idunit'"),0);
		$d1=number_format($d, 0, '.', '.');
		echo"
		</td>
		</tr>";
		
		$b1=mysql_query("select *from unit_bagian where id_unit='$idunit'");
		while($b=mysql_fetch_array($b1))
			{
			echo"
			<tr>
			<td>$b[nama_bag]</td>
			<td align='right'>"; echo number_format($b[gaji], 0, '.', '.'); echo"</td>
			<td align='right'>"; echo number_format($b[tunjangan], 0, '.', '.'); echo"</td>
			</tr>
			";
			}
		
		echo"
		<tr>
		<td></td>
		<td align='right'><b>$c1</b></td>
		<td align='right'><b>$d1</b></td>
		<td></td>
		</tr>
		";
		}
		$e=mysql_result(mysql_query("select SUM(gaji) as NUM from unit_bagian "),0);
		$e1=number_format($e, 0, '.', '.');
		$f=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian "),0);
		$f1=number_format($f, 0, '.', '.');

	echo"
	<tr>
	<td><font size='2'><b>TOTAL</b></td>
	<td align='right'><font size='2'><u><b>$e1</b></td>
	<td align='right'><font size='2'><u><b>$f1</b></td>
	<td></td>
	</tr>
	</table>
	</fieldset>
	";	
	}


function rep_gaji_pdf()
	{
	include_once('phpToPDF.php') ;
	$html="
	<h2 align='center'>DATA GAJI POKOK & TUNJANGAN</h2>
	<br>
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>

	<tr>
	<td width='30%'><b>Unit Kerja/Bagian</b></td>
	<td width='30%' align='right'><b>Gaji Pokok</b></td>
	<td width='30%' align='right'><b>Tunjangan</b></td>
	
	</tr>
	";
	$a1=mysql_query("select *from unit_kerja order by nama ASC");
	while($a=mysql_fetch_array($a1))
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
		while($b=mysql_fetch_array($b1))
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
	
	</tr>
	</table>";
	phptopdf_html($html,'pdf/', 'rep_gaji.pdf');
		echo "
		<h2 align='center'>DATA GAJI KARYAWAN </h2>
		<center>
		<a href='pdf/rep_gaji.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	
	}


function rep_biaya()
	{
	echo"
	<h2 align='center'>TOTAL BIAYA TUNJANGAN UNIT KERJA</h2>
	<br><br>
	<fieldset>
	<legend>Tunjangan</legend>
	<table width='100%'>
	<tr>
	<td colspan='4'>";?>
	<a class="link_tab clean-gray" target="_blank"<?php echo"href='index.php?task=rep_biaya_pdf'";?>  <?php echo"><img src='images/pdf_icon.png' border='0' title='Edit' align='absmiddle'> PDF</a>
	
	&nbsp;&nbsp;&nbsp;
	<a class='link_tab clean-gray' href='exc/tunjanganp.php'><img src='images/excel_icon.png' border='0' title='Edit' align='absmiddle' /> Excel</a>
	<br><br>
	</td>
	</tr>

	<tr>
	<td width='20%'><b>Unit Kerja/Bagian</b></td>
	<td width='10%' align='center'><b>Jml Karyawan</b></td>
	<td width='10%' align='right'><b>Tunjangan</b></td>
	<td width='10%' align='right'><b>Total</b></td>
	<td></td>
	</tr>
	";
	$a1=mysql_query("select *from unit_kerja order by nama ASC");
	while($a=mysql_fetch_array($a1))
		{
		$idunit=$a[id];
		echo"
		<tr>
		<td><b>$a[nama]</b></td>
		<td align='center'></td>
		<td align='right'><b>";
		$d=mysql_result(mysql_query("select sum(tunjangan) as NUM from unit_bagian where id_unit='$idunit'"),0);
		//echo number_format($d, 0, '.', '.');
		echo"</b>
		</td>
		<td align='right'><b>";
		//$f=mysql_result(mysql_query("select sum (tunjangan) as num from karyawan, unit_bagian where karyawan.id_unit=unit_bagian.id_unit and unit_bagian.id_unit='$idunit'"),0);
		
		$i=mysql_result(mysql_query("select sum(tunjangan) from karyawan, unit_bagian where karyawan.id_bag=unit_bagian.id and unit_bagian.id_unit='$idunit'"),0);
		//echo number_format($i, 0, '.', '.');
		echo"</b></td>
		<td></td>
		</tr>";
		
		$b1=mysql_query("select *from unit_bagian where id_unit='$idunit'");
		while($b=mysql_fetch_array($b1))
			{
			echo"
			<tr>
			
			<td>$b[nama_bag]</td>
			<td align='center'>";
			$e=mysql_result(mysql_query("select count(id) as num from karyawan where id_bag='$b[id]'"),0);
			echo"$e</td>

			<td align='right'>"; echo number_format($b[tunjangan], 0, '.', '.'); echo"</td>
			<td align='right'>";
			$tot=$e*$b[tunjangan];
			echo number_format($tot, 0, '.', '.');
			echo"
			</td>
			<td></td>
			</tr>
			";
			}
			echo"<tr>
			<td></td>
			<td colspan='2' align='left'></td>
			<td align='right'><b>"; echo number_format($i, 0, '.', '.'); echo"</b></td>
			<td></td>
			</tr>";
		}
		$h=mysql_result(mysql_query("select sum(tunjangan) from karyawan, unit_bagian where karyawan.id_bag=unit_bagian.id"),0);
	echo"
	<tr>
	<td colspan='3'><b>TOTAL</b></td>
	<td align='right'><b>"; echo number_format($h,0,'.','.'); echo"</b></td>
	</tr>
	</table>
	</fieldset>
	<br><br>
	
	";
	
	}


function rep_biaya_pdf()
	{
	include_once('phpToPDF.php') ;
	$echo="
	<h2 align='center'>TOTAL BIAYA TUNJANGAN UNIT KERJA</h2>
	<br><br>
	
	<table width='100%' border='1' cellpadding='0' cellspacing='0'>
	<tr>
	<td width='20%'><b>Unit Kerja/Bagian</b></td>
	<td width='10%' align='center'><b>Jml Karyawan</b></td>
	<td width='10%' align='right'><b>Tunjangan</b></td>
	<td width='10%' align='right'><b>Total</b></td>
	</tr>
	";
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
	</tr>
	</table>
	<br>
	
	";
	phptopdf_html($echo,'pdf/', 'rep_tunjangan.pdf');
		echo "
		<h2 align='center'>DATA TUNJANGAN KARYAWAN</h2>
		<center>
		<a href='pdf/rep_tunjangan.pdf'>[ Download <img src='images/pdf_icon.png'> ]</a>";?>
		<a onclick="window.close()">[ Close <img src='images/close.png'>] </a>
		<?php
		echo"
		<br><br>
		</center>";
	}



function backup()
	{
	echo"
	<h2 align='center'>BACKUP DATABASE DATA PERSONALIA</h2>
	<center>
	<br>
	<p align='center'><font color='#990000'><img src='images/tanda_seru.png' > Proses Backup Database Dalam Bentuk File .sql</font>
	</p>
	<br><br>
	<form method='post' action='index.php?task=backupp'>
	<input type='submit'";?> onClick="return confirm('Yakin Backup Database Personalia?')" <?php echo"value='Backup Data' class='clean-blue'>
	</form>
	</center>";
	}

function backupp()
	{
	include ('inc/inc.php');
	include ('backupdb.php');
	$file=date("mdY_his").'_personalia.sql';
	backup_tables($host, $user, $pass, $db,$file);
	?>
	<h2 align="center">BACKUP DATABASE PERSONALIA</h2>
	<br><br>
	<center>
	Backup database telah dibuat. 
	<a onClick="location.href='downloaddb.php?nama_file=<?php echo $file;?>'"><font color="#000099">[ Download file database Personalia ]</font></a>
	</center>
	<?php 
	}

function restore()
	{
	$msg=$_GET['msg'];

	echo"
	<h2 align='center'>RESTORE DATABASE DATA PERSONALIA</h2>
	<center>
	<h3 align='center'>$msg</h3>
	<p align='center'><font color='#990000'><img src='images/tanda_seru.png' > Proses Restore Database, Upload File .sql</font>
	<br><br>
	<form method='post' action='index.php?task=restorep' enctype='multipart/form-data'>
	File .sql <input type='file' name='file' size='30'>
	<br><br>
	<input type='submit'"; ?> onClick="return confirm('Yakin Me-Restore Database Personalia?')" <?php echo" value='Restore Database' class='clean-blue'>
	</form>
	</center>
	";
	}

function restorep()
	{
	//include ('inc/inc.php');
	$nama_file=$_FILES['file']['name'];
	$ukuran=$_FILES['file']['size'];
	
	if ($nama_file=="")
	{
		header("location: index.php?task=restore&msg=Ada Kesalahan Mengupload File");
	}
	else
	{
		$uploaddir='./restore/';
		$alamatfile=$uploaddir.$nama_file;
		if (move_uploaded_file($_FILES['file']['tmp_name'],$alamatfile))
		{
			$filename = './restore/'.$nama_file.'';
			$templine = '';
			$lines = file($filename);
			foreach ($lines as $line)
			{
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
				$templine .= $line;				
				if (substr(trim($line), -1, 1) == ';')
				{
					mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
					$templine = '';
				}
			}
			header("location: index.php?task=restore&msg=Database Personalia Telah ter-Restore");
		
		}
		else
		{
			header("location: index.php?task=restore&msg=Database Personalia Belum ter-Restore");
		}	
	}

	}

/* ============================================================= */
/* ============================================================= */
/* ============================================================= */

function rpend()
	{
	$msg=$_GET['msg'];
	echo"
	<h2 align='center'>Master Riwayat Pendidikan</h2>
	<h4>$msg</h4>
	<form method='post' action='index.php?task=pend2'>
	<table>
	<tr>
	<td>Unit Kerja</td>
	<td>"; ?>
	<select name="id_unit" id="XXselectCat" onchange="" class="chzn-select">
	<option value=" ">- Unit Kerja -</option>
	<?php
	$a1=mysql_query("select *from unit_kerja order by id ASC");
	while($a=mysql_fetch_array($a1))
	{
    echo"<option rel='".$a[id]."' value='$a[id]'>$a[nama]</option>";
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
            echo"<option value='$b[id]' class='$b[id_unit]'>$b[nama_bag]</option>";
		}
        ?>
    </select>
	<?php
	echo"
	</td>
	</tr>

	<tr>
	<td colspan='2'>
	<input type='submit' name='simpan' id='simpan' value='KARYAWAN' class='clean-blue' />
	</td>
	</tr>

	</table>
	</form>";
	
	}


function rpend2()
	{
	$id_unit=$_POST['id_unit'];
	$id_bag=$_POST['id_bag'];
	$a1=mysql_query("select *from unit_kerja where id='$id_unit'");
	while($a=mysql_fetch_array($a1))
		{$unit=$a[nama];}
	$b1=mysql_query("select *from unit_bagian where id='$id_bag'");
	while($b=mysql_fetch_array($b1))
		{$bag=$b[nama_bag];}
	echo"<h2 align='center'>Daftar Karyawan</h2>
	<h3 align='center'>Unit: $unit Bagian: $bag</h3>
	";
	$d=mysql_result(mysql_query("select COUNT(id) from karyawan where id_bag='$id_bag'"),0);
	if($d=='0')
	{
	echo"
	<center>
	<h4>Tidak Ada Karyawan di Unit Kerja <b>$unit</b> Bagian <b>$bag</b> </h4>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	</center>";
	}
	else
	{
	echo"
	<table width='100%'>
	<tr>
	<td width='10%'>Karyawan</td>
	<td>
	<form method='post' action='index.php?task=pend3'>
	<select name='id_kary'>
	";
	$c1=mysql_query("select *from karyawan where id_bag='$id_bag' order by nama_kary ASC");
	while($c=mysql_fetch_array($c1))
		{
		$nama_kary=strtoupper($c[nama_kary]);
		echo"<option value='$c[id]'> [ $c[no_kary] ] $nama_kary</option>";
		}
	echo"
	</select>
	</td>
	</tr>
	<tr>
	<td colspan='2'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	&nbsp;&nbsp;&nbsp;
	<input type='submit' value='PILIH KARYAWAN' class='clean-blue' /> 
	</form>
	</td>
	</tr>
	<table>
	";
	}
	}


function rpend3()
	{
	$id_kary=$_POST['id_kary'];
	$a1=mysql_query("select *from karyawan where id='$id_kary'");
	while($a=mysql_fetch_array($a1))
		{
		$nama_kary=$a['nama_kary'];
		$no_kary=$a['no_kary'];
		$jk=$a['jk'];
		}
	echo"
	<fieldset>
	<table width='80%'>
	<tr>
	<td width='20%'>Nama Karyawan</td>
	<td width='20%'>$nama_kary</td>
	<td rowspan='3'><img src='foto/$id_kary.jpg' width='128'></td>
	</tr>
	<tr>
	<td>No Karyawan</td>
	<td>$no_kary</td>
	</tr>
	<tr>
	<td>Jenis Kelamin</td>
	<td>$jk</td>
	</tr>
	</table>
	</fieldset>
	<br><br><br>";
	$count=mysql_result(mysql_query("select count(id) from pendidikan where id_kary='$id_kary'"),0);
	if($count=='0')
	{

	echo"
	<fieldset>
	<legend>Riwayat Pendidikan</legend>
	<form method='post' action='index.php?task=pend_p'>
	<table width='100%' border='1'>
	<tr>
	<td width='10%'>Tingkat Pendidikan</td>
	<td width='15%'>Nama Pendidikan</td>
	<td>Tahun Lulus</td>
	</tr>

	<tr>
	<td>TK</td>
	<td><input type='text' name='tk' class='form-input'></td>
	<td><input type='text' name='tk_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>SD</td>
	<td><input type='text' name='sd' class='form-input'></td>
	<td><input type='text' name='sd_thn' class='form-input'></td>
	</tr>
	
	<tr>
	<td>SMP</td>
	<td><input type='text' name='smp' class='form-input'></td>
	<td><input type='text' name='smp_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>SMA</td>
	<td><input type='text' name='sma' class='form-input'></td>
	<td><input type='text' name='sma_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>Perguruan Tinggi</td>
	<td><input type='text' name='pt' class='form-input'></td>
	<td><input type='text' name='pt_thn' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	&nbsp;&nbsp;&nbsp;
	<input type='submit' value='SIMPAN' class='clean-blue' /> 
	</td>
	
	</tr>
	</table>
	</fieldset>
	";
	}
	//////////////////
	//////////////////
	//////////////////
	else
	{
	$b1=mysql_query("select *from pendidikan where id_kary='$id_kary'");
	while($b=mysql_fetch_array($b1))
		{
		$tk=$b[tk]; $tk_thn=$b[tk_thn];
		$sd=$b[sd]; $sd_thn=$b[sd_thn];
		$smp=$b[smp]; $smp_thn=$b[smp_thn];
		$sma=$b[sma]; $sma_thn=$b[sma_thn];
		$pt=$b[pt]; $pt_thn=$b[pt_thn];
		}
	echo"
	<fieldset>
	<legend>Riwayat Pendidikan</legend>
	<form method='post' action='index.php?task=pend_e'>
	<table width='100%' border='1'>
	<tr>
	<td width='10%'>Tingkat Pendidikan</td>
	<td width='15%'>Nama Pendidikan</td>
	<td>Tahun Lulus</td>
	</tr>

	<tr>
	<td>TK</td>
	<td><input type='text' name='tk' value='$tk' class='form-input'></td>
	<td><input type='text' name='tk_thn' value='$tk_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>SD</td>
	<td><input type='text' name='sd' value='$sd' class='form-input'></td>
	<td><input type='text' name='sd_thn' value='$sd_thn' class='form-input'></td>
	</tr>
	
	<tr>
	<td>SMP</td>
	<td><input type='text' name='smp' value='$smp' class='form-input'></td>
	<td><input type='text' name='smp_thn' value='$smp_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>SMA</td>
	<td><input type='text' name='sma' value='$sma' class='form-input'></td>
	<td><input type='text' name='sma_thn' value='$sma_thn' class='form-input'></td>
	</tr>

	<tr>
	<td>Perguruan Tinggi</td>
	<td><input type='text' name='pt' value='$pt' class='form-input'></td>
	<td><input type='text' name='pt_thn' value='$pt_thn' class='form-input'></td>
	</tr>
	
	<tr>
	<td></td>
	<td colspan='2'>
	<input type='hidden' name='id_kary' value='$id_kary'>
	<input type='button'  value='KEMBALI' class='clean-blue' ONCLICK='history.go(-1)' />
	&nbsp;&nbsp;&nbsp;
	<input type='submit' value='GANTI' class='clean-blue' /> 
	</td>
	
	</tr>
	</table>
	</fieldset>
	";
	}
	}

function rpend_p()
	{
	$id_kary=$_POST['id_kary'];
	$tk=$_POST['tk'];
	$tk_thn=$_POST['tk_thn'];
	$sd=$_POST['sd'];
	$sd_thn=$_POST['sd_thn'];
	$smp=$_POST['smp'];
	$smp_thn=$_POST['smp_thn'];
	$sma=$_POST['sma'];
	$sma_thn=$_POST['sma_thn'];
	$pt=$_POST['pt'];
	$pt_thn=$_POST['pt_thn'];
	$a=mysql_query("insert into pendidikan values('', '$id_kary', '$tk', '$tk_thn', '$sd', '$sd_thn', '$smp', '$smp_thn', '$sma', '$sma_thn', '$pt', '$pt_thn')");
	if($a)
		{header("location: index.php?task=pend&msg=Data Sudah Masuk");}
	else
		{echo"error";}
	}

function rpend_e()
	{
	$id_kary=$_POST['id_kary'];
	$tk=$_POST['tk'];
	$tk_thn=$_POST['tk_thn'];
	$sd=$_POST['sd'];
	$sd_thn=$_POST['sd_thn'];
	$smp=$_POST['smp'];
	$smp_thn=$_POST['smp_thn'];
	$sma=$_POST['sma'];
	$sma_thn=$_POST['sma_thn'];
	$pt=$_POST['pt'];
	$pt_thn=$_POST['pt_thn'];
	$a=mysql_query("update pendidikan set tk='$tk', tk_thn='$tk_thn', sd='$sd', sd_thn='$sd_thn', smp='$smp', smp_thn='$smp_thn', sma='$sma', sma_thn='$sma_thn', pt='$pt', pt_thn='$pt_thn' where id_kary='$id_kary'");
	if($a)
		{header("location: index.php?task=pend&msg=Data Sudah Diganti");}
	else
		{echo"error";}
	}

/* ============================================================= */




/* ============================================================= */



/* ============================================================= */


}



?>