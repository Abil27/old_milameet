<?php 

if (isset($_GET['ss']))
{
$cid=$_GET['ss'];
include("sc.php");

}
else
{

$query = $db->prepare('SELECT contact_id FROM mm_contact WHERE utilisateur_id =:id');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();
$TotalDesMembres=0;
 while($data = $query->fetch())
  {
  $TotalDesMembres++;
  }


$lien='<a href="contact.php?p=';
$totalmsg=$TotalDesMembres; 
include("affnpage.php");


$query=$db->prepare('SELECT contact_id,
Mb.membre_pseudo AS contact_pseudo,Mb.membre_avatar AS contact_avatar,Mb.sexe AS contact_sexe
,Mb.membre_enligne AS menligne
FROM mm_contact 
LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_contact.contact_id
WHERE utilisateur_id =:id
ORDER BY id_contact LIMIT :premier, :nombre');
$query->bindValue(':id', $id, PDO::PARAM_INT); 
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);  
$query->execute();

$couleur_x=' background="images/arctca.jpg ';
$couleur_z=' background="images/arctcb.jpg ';

//Début de la boucle
  while($data = $query->fetch())
  {
  
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
	 echo'<tr align="left" '.$couleur_x.'"><td width="1" ><img src="../images/avatars/'.$data[  'contact_avatar'].'" alt="photo" width="'.$lewidth.'"/></td>
	   <td >
	   <a href="./profil.php?m='.stripslashes(htmlspecialchars($data['contact_id'])).'&amp;action=consulter">';
	   echo ($data['contact_sexe']=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo nl2br(stripslashes(htmlspecialchars($data['contact_pseudo']))).'( ';
	   echo ($data['contact_sexe']=="feminin")?'F':'M';echo' )</a></span>
	    <td>';
	   echo ($data['menligne'])=="oui"?' <font color="green">En ligne</span>':' <font color="#FF0000">Hors ligne</span>
	   </td>';
	     
	   echo'<td><a href="ecriremsg.php?ac=nouveaumsg&ic='.$data['contact_id'].'">
	   Envoyer un mp</a>
	   </td>
	   
	   <td><span class="tchatTime">
	   <a href="contact.php?ss='.$data['contact_id'].'"> Supp</a></span>
	   </td></tr>';
	   
  }   //FIN de la boucle
  
$query->CloseCursor();


}

?>
