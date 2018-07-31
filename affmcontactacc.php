<?php 
session_start();
$titre="Boite d\'envoi";
include("identifiants.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<code>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</code>

</head>
<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclue les 2 pages restantes
include("./forum/functions.php");
include("./forum/constants.php");
?>
<body>


<?php 

$query = $db->prepare('SELECT contact_id FROM mm_contact WHERE utilisateur_id =:id');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();
$TotalDesMembres=0;
 while($data = $query->fetch())
  {
  $TotalDesMembres++;
  }


$lien='<a href="affmcontactacc2.php?p=';
$totalmsg=$TotalDesMembres; 
include("affnpage.php");

$oui="oui";
$query=$db->prepare('SELECT contact_id,
Mb.membre_pseudo AS contact_pseudo,Mb.membre_avatar AS contact_avatar,Mb.sexe AS contact_sexe
,Mb.membre_enligne AS menligne
FROM mm_contact 
LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_contact.contact_id
WHERE utilisateur_id =:id AND en_ligne=:oui
ORDER BY id_contact LIMIT :premier, :nombre');
$query->bindValue(':id', $id, PDO::PARAM_INT); 
$query->bindValue(':oui', $oui, PDO::PARAM_STR);
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);  
$query->execute();

$couleur_x=' background="images/accantar.jpg ';
$couleur_z=' background="images/accantar.jpg ';

echo'<table  border="0" cellspacing="0" cellpadding="5"   class="bl3">';
//Début de la boucle
  while($data = $query->fetch())
  {
  
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
	 echo'<tr  '.$couleur_x.'"><td width="1" ><img src="../images/avatars/'.$data[  'contact_avatar'].'" alt="photo" width="40"/></td>';
	  
	  echo' <td ><a href="javascript:void(0)"    onclick="javascript:chatWith(\''.$data['contact_pseudo'].'\')" >
	   ';?>
	 <?php 
	  echo ($data['contact_sexe']=="feminin")?'<span class="recherchePseudofacc">':
	   '<span class="recherchePseudomacc">';
	   echo nl2br(stripslashes(htmlspecialchars($data['contact_pseudo']))).'( ';
	   echo ($data['contact_sexe']=="feminin")?'F':'M';echo' )</a></span>
	    <td>';
	   echo ($data['menligne'])=="oui"?'<img src="images/onl.png"     border="none"/>':'<img src="images/horl.gif"   width="15"   border="none"/>';
	   echo' </td>
	  	  </tr>';
	   
  }   //FIN de la boucle
  
$query->CloseCursor();

 echo'</table>';


?>
</body>
</html>