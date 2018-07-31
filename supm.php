<?php 
session_start();
$titre='Téléchargement';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>
<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php include("imgentete.php"); ?>


<?php 
echo'EN CONSTRUCTION';
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
 <table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br />';
  
  
echo'

  <br/><img src="images/supm.jpg" width="'.$icow.'"/><a href="supm.php"> Super march&eacute;</a> 
  <br/><img src="images/lg.gif" width="'.$icow.'"/><a href="index.php"> Accueil</a>
  

  
';

 include("queue.php");
  ?>
