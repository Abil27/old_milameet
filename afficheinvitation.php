<?php 





if (isset($_GET['ss']))
{
$inviid=$_GET['ss'];
include("sn.php");

}
else
{

$couleur_x="#C4EBF7";
$couleur_z="#FFFFFF";


$lien='<a href="notification.php?p=';
$totalmsg=$_SESSION['totalnoti']; 
include("affnpage.php");

$invitvalider="non";

$query=$db->prepare('SELECT invitation_titre, id_invitation, invitation_valider,
Mb.membre_pseudo AS pseudo_invitation_createur,Mb.membre_avatar AS avatar_invitation_createur 
FROM mm_invitation 
LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_invitation.invitation_createur
WHERE invitation_destinatair =:id 
ORDER BY id_invitation DESC LIMIT :premier, :nombre');
$query->bindValue(':id', $id, PDO::PARAM_INT); 
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);
$query->execute();




  //Début de la boucle
  while($data = $query->fetch())
  {
    
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
   echo'<tr  bgcolor="'.$couleur_x.'"><td align="center" width="2%">&nbsp; <br/>
   <img src="../images/avatars/'.$data[  'avatar_invitation_createur'].'"
       alt="Ce membre n\'a pas d\'avatar"  width="'.$lewidth.'"/>  <br/>  
	   '.$data['pseudo_invitation_createur'].' </td>';
	   
	 if ($data['invitation_valider']==$invitvalider)
	{  
	   echo'<td>
	   <a href="./invitationenvoyerok.php?t='.$data['id_invitation'].'">
	   '.nl2br(stripslashes(htmlspecialchars($data['invitation_titre']))).'</a>';
	    echo'<br/><a href="notification.php?ss='.$data['id_invitation'].'">Ignorer</a></td></tr>';
	 } 
	 else
	 {
	  echo'<td >Invitation accepté';
	 echo'<br/><a href="notification.php?ss='.$data['id_invitation'].'">Enlever</a></td></tr>';
	 }
	 
  }   //FIN de la boucle

$query->CloseCursor();



}

?>