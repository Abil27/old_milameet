<?php 
session_start();
$titre='Contact';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>




<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	
	 echo'<span class="nomutili">Vos contacts</span> <br/>';
	  
      echo'<p><table  width="100%" height="10"  cellspacing="0" border="0"  cellpadding="5"  bgcolor="#DBF3FB">
	 <tr >
    <th align="left"  scope="col">Photo</th>
	<th align="left"  scope="col">Pseudo</th>
	<th align="left"  scope="col">Statut</th>
	<th align="left"  scope="col">Envoyer un message</th>
	<th align="left"  scope="col">Supprimer</th>
	
    </tr>
	  
	  
	  ';
	  
	  
	  
	  include("affmcontact.php");
	  
	  
	  echo'</table> <br /></p>';	
  
  	  
      
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php


 include("queue.php"); ?>
 