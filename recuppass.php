<?php 
session_start();
$titre='Récupération de passe';
include("identifiants.php");
include("hautdepage.php");
include("menu2.php");

?>



<?php

if ($id!=0) erreur(ERR_IS_CO);

?>


<?php 

if (!empty($_POST['pseudorecup']) AND  !empty($_POST['telephonerecup'])  AND  !empty($_POST['emailrecup'])) 
{
	$recuppseudo=strtolower(htmlspecialchars($_POST['pseudorecup']));
	/* $recuptelephone=substr(htmlspecialchars($_POST['telephonerecup']),0,10); */
	$recupemail=strtolower(htmlspecialchars($_POST['emailrecup']));
	
	$query=$db->prepare('SELECT membre_mdpvis
       FROM forum_membres WHERE membre_pseudo=:recuppseudo AND membre_email=:recupemail');
       $query->bindValue(':recuppseudo',$recuppseudo, PDO::PARAM_STR);
	   $query->bindValue(':recupemail',$recupemail, PDO::PARAM_STR);
	   /*AND telephone=:recuptelephone   $query->bindValue(':recuptelephone',$recuptelephone, PDO::PARAM_STR); */
       $query->execute();
       $data=$query->fetch();
	   $lepass=$data['membre_mdpvis'];
	   $query->CloseCursor();
	   
	   if (empty($lepass))
	   {
	   
	   echo'<h2><strong>Aucun pass ne correspond à ces informations, faite une nouvelle tentative</strong></h2>';
	    include("formpassrecup.php"); 
        }
		else
	   {
	   echo'<h2><strong>Votre pass est : </strong></h2> <br />'.$lepass;
	   echo'<h2><strong><a href="index.php" target="_parent">Retour vers la page d\'accueil</a></strong></h2> <br />';
	   }
}
else if (empty($_POST['pseudorecup']) AND  empty($_POST['telephonerecup'])  AND  empty($_POST['emailrecup'])) 
{


?>

<h2><strong>Remplisez les trois champs et recupérez votre pass, Merci.</strong></h2>
<?php include("formpassrecup.php"); ?>

<?php 
}
else
{
?>
<h2><strong>Vous devez remplir tout les champs</strong></h2>
<?php include("formpassrecup.php"); ?>



<?php 
}
?>