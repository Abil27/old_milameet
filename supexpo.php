<?php 
session_start();
$titre='Accueil';
include("identifiants.php");




//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';



if ($id==0) erreur(ERR_IS_CO);
?>


<?php 

if(isset($_GET['ssss']) )
   {
	$idexpo=stripslashes(htmlspecialchars($_GET['ssss']));
   
	      

$query=$db->prepare('DELETE FROM campus WHERE id_campus =:idexpo ');
   $query->bindValue(':idexpo', $idexpo, PDO::PARAM_INT);   
   $query->execute();
   $query->CloseCursor();
   
   
   }
   
    header('Location: campus.php'); 
      
?>