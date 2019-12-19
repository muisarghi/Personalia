<?php
include ('inc/inc.php');
function getTierOne()
{
		$tiera=mysql_query("select *from unit_kerja");
		while($tier=mysql_fetch_array($tiera))
		{
		  echo '<option value="'.$tier['id'].'">'.$tier['nama'].'</option>';
		}

}

if($_GET['func'] == "drop_1" && isset($_GET['func'])) { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{  
	
	echo "<select name='id_bag' id='drop_2'>
	      <option value='' disabled='disabled' selected='selected'>Bagian Unit Kerja</option>";
			$result=mysql_query("select *from unit_bagian where id_unit='$drop_var'");
		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo "<option value='$drop_2[kode_bag]'>$drop_2[nama_bag]</option>";
			}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
$('#wait_2').hide();
	$('#drop_2').change(function(){
	  $('#wait_2').show();
	  $('#result_2').hide();
      $.get(\"selected.php\", {
		func: \"drop_2\",
		drop_var: $('#drop_2').val()
      }, function(response){
        $('#result_2').fadeOut();
        setTimeout(\"finishAjax_tier_three('result_2', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";

}

if($_GET['func'] == "drop_2" && isset($_GET['func'])) { 
   drop_2($_GET['drop_var']); 
}
function drop_2($drop_var)
{  
    ?>
	
	<input type="submit" value="CARI KARYAWAN" class="clean-blue">

	<?php
	
}

/*function drop_2($drop_var)
{  
    
	$result=mysql_query("select *from karyawan where id_bag='$drop_var'");
	
	echo '<select name="id_kary" id="drop_3">
	      <option value=" " disabled="disabled" selected="selected">Karyawan</option>';

		   while($drop_3 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_3['id'].'">'.$drop_3['nama_kary'].'</option>';
			}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
$('#wait_3').hide();
	$('#drop_3').change(function(){
	  $('#wait_3').show();
	  $('#result_3').hide();
      $.get(\"selected.php\", {
		func: \"drop_3\",
		drop_var: $('#drop_3').val()
      }, function(response){
        $('#result_3').fadeOut();
        setTimeout(\"finishAjax_tier_three('result_3', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";
    
}

if($_GET['func'] == "drop_3" && isset($_GET['func'])) { 
   drop_3($_GET['drop_var']); 
}

function drop_3($drop_var)
{  
    ?>
	
	<input type="submit" value="CARI KARYAWAN" class="clean-blue">

	<?php
	
}
*/
?>