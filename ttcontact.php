<?php 
session_start();
$titre='Rechercher';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>




<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	
   echo'<p><table  width="100%" height="10" align="left" cellspacing="1" border="0" cellpadding="0"  bgcolor="#DBF3FB">';
	    
	  echo'<tr><td bgcolor="#FDE9D5"><span class="nomutili">Les milameet</span> <br/>   </td></tr>';
  echo'</table> <br /></p>';
  
  
  if (isset($_GET['ol']) ){ //Début de la boucle
 
  include("affttcontactol.php");
   }
   
  if (isset($_GET['chainerech']) ){ //Début de la boucle
 
  include("affttcontactrech.php");
   }
   
   if(isset($_GET['xx']) ){	 	 
	  include("affttcontactfi.php");
   }  
   
   if(!isset($_GET['chainerech']) AND !isset($_GET['ol']) AND !isset($_GET['xx'])){	 	 
	  include("affttcontact.php");
   }  
?>


<?php /*  ------------------------------------------------------------- */ ?>


