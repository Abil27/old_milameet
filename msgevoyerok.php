<?php 
session_start();
$titre='Envoyer un mp';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

//On récupère la valeur de la variable action
$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>







<?php

switch($action)
{
    //Premier cas : nouveau topic
    case "nm":
    //On passe le message dans une série de fonction
    $message = $_POST['message'];
    

    //Pareil pour le titre
   

    //ici seulement, maintenant qu'on est sur qu'elle existe, on récupère la valeur de la variable f
    $idcontact= (int) $_POST['iddestinataire'];
    $temps = time();
      
	  if (empty($_POST['titre']))
	  {
	  $titre="Sans titre";
	  }
	  else
	  { 
	  $titre = $_POST['titre'];
	  }

    if (empty($message) || empty($titre))
    {
        echo'<p>Votre message ou votre titre est vide, 
        cliquez <a href="./ecriremsg.php?ac=nouveaumsg&ic='.$idcontact.'">ici</a> pour recommencer</p>';
    }
    else //Si jamais le message n'est pas vide
    {

		$msgvu="non";
        $query=$db->prepare('INSERT INTO msg_envoyer
        ( msg_titre, msg_texte, msg_createur, msg_destinatair, msg_vu, msg_time)
        VALUES( :titre, :mess, :id, :idcontact, :msgvu, :temps)');
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':mess', $message, PDO::PARAM_STR);
		$query->bindValue(':msgvu', $msgvu, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':idcontact', $idcontact, PDO::PARAM_INT);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 

       
        
		$_SESSION['totalc'] = $_SESSION['totalc'] + $_SESSION['cre_msgenvo'];
		
		include("cupdat.php");
        echo'<p>Votre message a bien été envoyer!<br /><br />Cliquez <a href="./affichemsg.php">ici</a> pour revenir dans votre boîte de reception<br />';
        }
    break; 

  
} //Fin du Switch


?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br /></p>';
  
 
 include("queue.php");
  ?>
