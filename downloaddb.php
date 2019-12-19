<?php

@ini_set('display_errors', 'off');
ob_start();

$file=$_GET['nama_file'];
$loc="./backup/".$file."";
header('Content-disposition: attachment; filename='.$file.'');
header('Content-type: text/x-sql');
readfile(''.$loc.'');
echo $content;

exit;
?>
