<?php
@ini_set('display_errors', 'off');
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>.:: Aplikasi Penjualan ::. </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />

<link href="css/jquery-ui1.8.base.css" rel="stylesheet">
<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery13.js"></script>
<script src="js/jquery-ui-1.8.23.custom.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jconfirmaction.jquery.js"></script>

<link rel="stylesheet" href="css/jqonfirmation.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/buttons.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/form_general-light.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/datepicker.css" type="text/css" media="screen">

<!-- <script type="text/javascript" src="js/scripts.js"></script>

<link rel="stylesheet" type="text/css" href="js/facebox.css" />
<script language="javascript" src="js/facebox.js"></script>
-->
<script type="text/javascript">
$(document).ready(function() {

	$('.ask').jConfirmAction();///Confirmasi hapus data
	

	$( "#tabs" ).tabs({
	  fx:{opacity:'toggle'},
	  cookie: { expires: 30},
	  show: function(event, ui) { $("a").show(); }
	  });

	
});	
</script>

<!--Pirobox Komponen-->


<script type="text/javascript" src="js/pirobox.min.js"></script>
<link href="css/piro_style/style.css" class="piro_style" media="screen" title="white" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 400, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
	
	
});
</script>


<!-- DATEPICK
-->
<script>
$(function() {
		$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
</script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>

<!-- SELECTED TWO -->



<!--  SELECTED TREE   -->
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("selected.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_three(id, response) {
  $('#wait_2').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>

<script src="js/java.js"></script>

<!-- PIRO -->
<script src="faceboxi/jquery.js" type="text/javascript"></script>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script> 
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
	  
}) 
</script>
</head>

<body>

<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all-non">
<div id="start"><span class="img_start"><span/></div>
	
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all-non">
        <li ><a href="#master">Master Data</a></li>
        <li><a href="#transaksi">Transaksi Data</a></li>
        <li><a href="#report">Pelaporan</a></li>
        <li><a href="#tools">Utility</a></li>
    </ul>

    <div id="konten">
        <div id="master" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
           	<a href="index.php?task=unit_kerja">
			<img src="images/unit_kerja.png" title="Setup Unit Kerja" />
			<br/><span>Unit Kerja</span>
			</a>
           	
			<a href="index.php?task=bag">
			<img src="images/unit_bag.png" title="Setup Bagian Unit Kerja" />
			<br/><span>Bagian Unit Kerja</span>
			</a>
            
			<a href="index.php?task=pendd">
			<img src="images/pendd.png" title="Setup Riwayat Pendidikan Karyawan" />
			<br/><span>Pendidikan</span>
			</a>
            
			<a href="index.php?task=ahli">
			<img src="images/skill.png" title="Setup Keahlian Karyawan"/>
			<br/><span>Keahlian</span>
			</a>
            
			<a href="index.php?task=sertifikat">
			<img src="images/certificate.png" title="Setup Sertifikasi Karyawan" />
			<br/><span>Sertifikasi</span>
			</a>

			<a href="index.php?task=award">
			<img src="images/award.png" title="Setup Penghargaan Karyawan" />
			<br/><span>Penghargaan</span>
			</a>

			<a href="index.php?task=langgar">
			<img src="images/pelanggaran.png" title="Setup Pelanggaran Karyawan" />
			<br/><span>Pelanggaran</span>
			</a>

			<a href="index.php?task=gol">
			<img src="images/golongan.png" title="Setup Golongan Karyawan" />
			<br/><span>Golongan</span>
			</a>
            
			
			
      </div>
        
        <div id="transaksi" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
           	<a href="index.php?task=kary">
			<img src="images/kary.png" title="Identitas Karyawan" /><br/><span>Identitas Karyawan</span>
			</a>

			<a href="index.php?task=fmly">
			<img src="images/family.png" title="Data Keluarga Karyawan" />
			<br/><span>Keluarga</span>
			</a>
            
			<a href="index.php?task=mutasi"><img src="images/mutasi.png" title="Mutasi Unit Kerja" />
			<br/><span>Mutasi Unit Kerja</span>
			</a>
            
			<a href="index.php?task=penddno"><img src="images/pendd_non.png" title="Pendidikan Non Formal Karyawan" /><br/><span>Pendidikan Non Formal</span>
			</a>
            
			<a href="index.php?task=lgrkry">
			<img src="images/pelanggaran.png" title="Pelanggaran Karyawan" /><br/><span>Pelanggaran/Sanksi</span>
			</a>
            
			<a href="index.php?task=awdkry"><img src="images/award.png" title="Data Penghargaan Karyawan" /><br/><span>Penghargaan</span></a>
      </div>
      
      
      
      <div id="report" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
           	<a href="index.php?task=rep_ker">
			<img src="images/report_unit.png" title="Laporan Data Karyawan Unit Kerja" />
			<br/><span>Unit Kerja</span>
			</a>

			<a href="index.php?task=rep_bag">
			<img src="images/report_bag.png" title="Laporan Data Karyawan Bagian Unit Kerja" />
			<br/><span>Bagian Unit Kerja</span>
			</a>

			<a href="index.php?task=rep_pendd">
			<img src="images/report_pendd.png" title="Laporan Data Pendidikan Karyawan" />
			<br/><span>Pendidikan</span>
			</a>

			<a href="index.php?task=rep_ahli">
			<img src="images/report_skill.png" title="Laporan Data Keahlian Karyawan" />
			<br/><span>Keahlian</span>
			</a>

			<a href="index.php?task=rep_stfkt">
			<img src="images/report_certificate.png" title="Laporan Data Sertifikasi Karyawan" />
			<br/><span>Sertifikasi</span>
			</a>

			<a href="index.php?task=rep_awd">
			<img src="images/report_award.png" title="Laporan Data Penghargaan Karyawan" />
			<br/><span>Penghargaan</span>
			</a>

			<a href="index.php?task=rep_lgr">
			<img src="images/report_pelanggaran.png" title="Laporan Data Pelanggaran Karyawan" />
			<br/><span>Pelanggaran</span>
			</a>

			<a href="index.php?task=rep_gol">
			<img src="images/report_golongan.png" title="Laporan Data Golongan Karyawan" />
			<br/><span>Golongan</span>
			</a>

			<a href="index.php?task=rep_gaji">
			<img src="images/report_costa.png" title="Laporan Data Gaji Karyawan" />
			<br/><span>Gaji</span>
			</a>

			<a href="index.php?task=rep_biaya">
			<img src="images/report_costb.png" title="Laporan Data Total Biaya Karyawan" />
			<br/><span>Total Biaya</span>
			</a>
           	
			

      </div>
      
      <div id="tools" class="ui-tabs-panel ui-widget-content ui-corner-bottom" >
            <a href="index.php?task=backup" ><img src="images/backup_data.png" title="Backup Database" /><br/><span>Backup</span></a>
            <a href="index.php?task=restore" ><img src="images/restore_data.png" title="Restore Database" /><br/><span>Restore</span></a>
      </div>
      
     
      
    </div>
    
 </div>


<div id="loding" style="display:none"><img src="images/loading.gif" alt="Loading" border="0" align="absmiddle" /><span>LOADING</span></div>

<!-- ISI -->

<div id="isi">

<?php
include ('panel.php');
?>

</div>



<div id="footer" >
    <div class="judul_footer">
    Aplikasi Penjualan &copy; 2013 :: 
    </div>

</div>
</body>
</html>
