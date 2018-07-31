<?php 
session_start();
$titre='Notification';
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


<?php  //On récupère les infos du membre
       $membre=$id;
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email,  membre_signature,  membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	   $pseudo=$data['membre_pseudo'];
	   $query->CloseCursor();
?>


<?php 
	
	echo'<span class="nomutili">Les notifications de '.$pseudo.'</span><br/>';
	
  echo'<p><table  width="100%" height="10"  cellspacing="1" border="0" cellpadding="1"  bgcolor="#DBF3FB" > ';
	 
	 
	 
	 include("afficheinvitation.php");
	 
  echo'</table> <br /></p>';	
  
  	  

?>



  
