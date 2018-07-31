<?php 
session_start();
$titre='Mila meet Nigth Club';
$balises = true;
include("identifiants.php");
include("hautdepage3.php");

?>

<?php 
$lewidth=50;
 $icow=30;
 ?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php 
$ladate=time();
$d=date('H',$ladate);

if(($d-2) >19 OR ($d-2)<6){

 	  echo'<center><a href="nigthclub.php" alt="Rafraichir">Rafraichir</a></center><br />';
	  
	  echo'<span class="nomutili">Nigth Club</span> <br/> ';
	  
	echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >';
     echo'<tr><td><img src="./images/sept.jpg"/></tr></td>';
  	  include("nigthtchatforme.php");
	  echo'<tr><td>&nbsp</td></tr>';
   echo'</table> <br /></p>';  
	  include("nigthtchatsaisizone.php");
	  
	  
echo'<center><a href="nigthclub.php" alt="Rafraichir">Rafraichir</a></center><br />';
	  
	}
	
	else{
	echo'<span class="nomutili"> Le NIGTHCLUB ouvre entre 19h et 6h du mat, a bient&ocirc;t.</span> <br/>';
  }                           

	  
?>


<?php /*  ------------------------------------------------------------- */ ?>


