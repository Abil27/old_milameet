<?php 
session_start();
$titre='tele';
$balises = true;
include("identifiants.php");



if(isset($_GET['f'])){

$img = $_GET['f'];
header('Content-Description: File Transfer');
header("Content-type: application/octetstream");

header('Content-Disposition: attachment; filename='.basename($img));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($img));
ob_clean();
flush();
readfile($img);
exit;
}
?>
