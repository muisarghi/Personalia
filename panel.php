<?php
include('inc/inc.php');
include('function.php');



$task=$_GET['task'];
	switch($task)
	{
	case 'index':
	person::index($option);
	break;
	case 'delet':
	person::delet($option);
	break;
	case 'delete':
	person::delete($option);
	break;
	case 'deleto':
	person::deleto($option);
	break;
	case 'deleti':
	person::deleti($option);
	break;
	case 'msg':
	person::msg($option);
	break;

	//////////////////////
	case 'unit_kerja':
	person::unit_kerja($option);
	break;
	case 'untkj_p':
	person::untkj_p($option);
	break;
	case 'untkj_e':
	person::untkj_e($option);
	break;
	case 'untkj_e2':
	person::untkj_e2($option);
	break;
	
	
	/////////////////////////
	case 'bag':
	person::bag($option);
	break;	
	case 'bag_p':
	person::bag_p($option);
	break;	
	case 'bag_e':
	person::bag_e($option);
	break;	
	case 'bag_e2':
	person::bag_e2($option);
	break;	
	/////////////////////////

	case 'pendd':
	person::pendd($option);
	break;
	case 'pendd_p':
	person::pendd_p($option);
	break;	
	case 'pendd_e':
	person::pendd_e($option);
	break;	
	case 'pendd_e2':
	person::pendd_e2($option);
	break;	
	
	//////////////////////////
	case 'ahli':
	person::ahli($option);
	break;
	case 'ahli_p':
	person::ahli_p($option);
	break;	
	case 'ahli_e':
	person::ahli_e($option);
	break;	
	case 'ahli_e2':
	person::ahli_e2($option);
	break;	

	//////////////////////////
	case 'sertifikat':
	person::sertifikat($option);
	break;
	case 'sertifikat_p':
	person::sertifikat_p($option);
	break;	
	case 'sertifikat_e':
	person::sertifikat_e($option);
	break;	
	case 'sertifikat_e2':
	person::sertifikat_e2($option);
	break;	
	
	//////////////////////////
	case 'award':
	person::award($option);
	break;
	case 'award_p':
	person::award_p($option);
	break;	
	case 'award_e':
	person::award_e($option);
	break;	
	case 'award_e2':
	person::award_e2($option);
	break;	

	//////////////////////////
	case 'langgar':
	person::langgar($option);
	break;
	case 'langgar_p':
	person::langgar_p($option);
	break;	
	case 'langgar_e':
	person::langgar_e($option);
	break;	
	case 'langgar_e2':
	person::langgar_e2($option);
	break;	

	//////////////////////////
	case 'gol':
	person::gol($option);
	break;
	case 'gol_p':
	person::gol_p($option);
	break;	
	case 'gol_e':
	person::gol_e($option);
	break;	
	case 'gol_e2':
	person::gol_e2($option);
	break;	
	
	//////////////////////////
	//////////////////////////
	//////////////////////////
	//////////////////////////

	case 'kary':
	person::kary($option);
	break;	
	case 'kary_p':
	person::kary_p($option);
	break;	
	case 'kary_e':
	person::kary_e($option);
	break;	
	case 'kary_eb':
	person::kary_eb($option);
	break;	
	case 'kary_d':
	person::kary_d($option);
	break;	
	case 'krypend_p':
	person::krypend_p($option);
	break;	
	case 'krypend_e':
	person::krypend_e($option);
	break;	
	case 'kryahli_p':
	person::kryahli_p($option);
	break;	
	case 'kryahli_e':
	person::kryahli_e($option);
	break;	
	case 'krystfkt_p':
	person::krystfkt_p($option);
	break;	
	case 'krystfkt_e':
	person::krystfkt_e($option);
	break;	
	case 'krygol_p':
	person::krygol_p($option);
	break;	
	case 'krygol_e':
	person::krygol_e($option);
	break;	
	
	//////////////////////////
	
	case 'fmly':
	person::fmly($option);
	break;
	case 'fmly_msg':
	person::fmly_msg($option);
	break;
	case 'fmlyb':
	person::fmlyb($option);
	break;	
	case 'fmly_p':
	person::fmly_p($option);
	break;	
	case 'fmly_e':
	person::fmly_e($option);
	break;	
	case 'fmly_eb':
	person::fmly_eb($option);
	break;	
	//////////////////////////

	case 'penddno':
	person::penddno($option);
	break;
	case 'penddno_msg':
	person::penddno_msg($option);
	break;
	case 'penddno_b':
	person::penddno_b($option);
	break;	
	case 'penddno_p':
	person::penddno_p($option);
	break;	
	case 'penddno_e':
	person::penddno_e($option);
	break;	
	case 'penddno_e2':
	person::penddno_e2($option);
	break;	
	case 'penddno_eb':
	person::penddno_eb($option);
	break;	
	//////////////////////////


	case 'lgrkry':
	person::lgrkry($option);
	break;
	case 'lgrkry_msg':
	person::lgrkry_msg($option);
	break;
	case 'lgrkry_b':
	person::lgrkry_b($option);
	break;	
	case 'lgrkry_p':
	person::lgrkry_p($option);
	break;	
	case 'lgrkry_e':
	person::lgrkry_e($option);
	break;	
	case 'lgrkry_e2':
	person::lgrkry_e2($option);
	break;	
	case 'lgrkry_eb':
	person::lgrkry_eb($option);
	break;	
	//////////////////////////

	case 'awdkry':
	person::awdkry($option);
	break;
	case 'awdkry_b':
	person::awdkry_b($option);
	break;	
	case 'awdkry_p':
	person::awdkry_p($option);
	break;	
	case 'awdkry_e':
	person::awdkry_e($option);
	break;	
	case 'awdkry_e2':
	person::awdkry_e2($option);
	break;	
	case 'lgrkry_eb':
	person::lgrkry_eb($option);
	break;	
	//////////////////////////

	case 'mutasi':
	person::mutasi($option);
	break;	
	case 'mutasi2':
	person::mutasi2($option);
	break;	
	case 'mutasi_p':
	person::mutasi_p($option);
	break;	
	case 'mutasi_e':
	person::mutasi_e($option);
	break;	
	case 'mutasi_e2':
	person::mutasi_e2($option);
	break;	

	//////////////////////////

	case 'rep_ker':
	person::rep_ker($option);
	break;	
	case 'rep_ker_p':
	person::rep_ker_p($option);
	break;	
	case 'rep_ker_pdf':
	person::rep_ker_pdf($option);
	break;		
	case 'rep_ker_d':
	person::rep_ker_d($option);
	break;	

	//////////////////////////
	case 'rep_bag':
	person::rep_bag($option);
	break;	
	case 'rep_bag_pdf':
	person::rep_bag_pdf($option);
	break;	
	case 'rep_bag_p':
	person::rep_bag_p($option);
	break;	
	//////////////////////////
	
	case 'rep_pendd':
	person::rep_pendd($option);
	break;	
	case 'rep_pendd_p':
	person::rep_pendd_p($option);
	break;	
	case 'rep_pendd_pdf':
	person::rep_pendd_pdf($option);
	break;	
	//////////////////////////

	case 'rep_ahli':
	person::rep_ahli($option);
	break;	
	case 'rep_ahli_p':
	person::rep_ahli_p($option);
	break;	
	case 'rep_ahli_pdf':
	person::rep_ahli_pdf($option);
	break;	
	//////////////////////////

	case 'rep_stfkt':
	person::rep_stfkt($option);
	break;	
	case 'rep_stfkt_p':
	person::rep_stfkt_p($option);
	break;	
	case 'rep_stfkt_pdf':
	person::rep_stfkt_pdf($option);
	break;	
	//////////////////////////

	case 'rep_awd':
	person::rep_awd($option);
	break;	
	case 'rep_awd_p':
	person::rep_awd_p($option);
	break;	
	case 'rep_awd_pdf':
	person::rep_awd_pdf($option);
	break;	
	//////////////////////////

	case 'rep_lgr':
	person::rep_lgr($option);
	break;	
	case 'rep_lgr_p':
	person::rep_lgr_p($option);
	break;	
	case 'rep_lgr_pdf':
	person::rep_lgr_pdf($option);
	break;	
	//////////////////////////

	case 'rep_gol':
	person::rep_gol($option);
	break;	
	case 'rep_gol_p':
	person::rep_gol_p($option);
	break;	
	case 'rep_gol_pdf':
	person::rep_gol_pdf($option);
	break;	
	//////////////////////////
	
	case 'rep_gaji':
	person::rep_gaji($option);
	break;	
	case 'rep_gaji_pdf':
	person::rep_gaji_pdf($option);
	break;	
	case 'rep_biaya':
	person::rep_biaya($option);
	break;	
	case 'rep_biaya_pdf':
	person::rep_biaya_pdf($option);
	break;	
	

	case 'backup':
	person::backup($option);
	break;	
	case 'backupp':
	person::backupp($option);
	break;	

	case 'restore':
	person::restore($option);
	break;	
	case 'restorep':
	person::restorep($option);
	break;	

	default:
	person::index($option);
	break;
	}


?>