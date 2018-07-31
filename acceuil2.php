<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php include("imgentete.php"); ?>


<?php  //On récupère les infos du membre
       $membre=$id;
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
?>


<?php 
	
	echo'Bonjour '.$data['membre_pseudo'].' />';
	echo'<img src="./images/avatars/'.$data['membre_avatar'].'"
       alt="Ce membre n\'a pas d\'avatar" />  <br/>';
	   
      echo'- "Les flashy" <br/>
	  <a href="texto.php"> Exprimez-vous!</a>  <br/>';
	  
	  echo'- Les cools Tofs<br/>
	  <a href="texto.php"> Metre ta photo dans "les cools tofs" </a>';
?>



<?php include("bpage.php"); ?>