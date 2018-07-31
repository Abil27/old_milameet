<?php 
session_start();
$titre='Rechercher';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php include("imgentete.php"); ?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	
   echo'<p><table  width="100%" height="10" align="left" cellspacing="1" border="0" cellpadding="0"  bgcolor="#DBF3FB">';
	    
	  echo'<tr><td bgcolor="#FDE9D5"><span class="nomutili">Les milameet</span> <br/>   </td></tr>';
  echo'</table> <br /></p>';
  
  if (isset($_GET['chainerech']) ){ //Début de la boucle
 
  include("affttcontactrech.php");
   }
   else{	 	 
	  include("affttcontact.php");
   }  
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br /></p>';
  
  
echo'
<p>
  <br/>&nbsp;<img src="images/sear.jpg" width="'.$icow.'"/><a href="ttcontact.php"> Rechercher</a>
  <br/><img src="images/lg.gif" width="'.$icow.'"/><a href="index.php"> Accueil</a>
  
  
  </p>
  
';

 include("queue.php"); ?>
