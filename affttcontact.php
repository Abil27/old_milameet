<?php 

$TotalDesMembres = $db->query('SELECT COUNT(*) FROM forum_membres WHERE visibilite ="oui"')->fetchColumn();
	

$lien='<a href="ttcontact.php?p=';
$totalmsg=$TotalDesMembres; 
include("affnpage.php");




$oui="oui";

$query=$db->prepare('SELECT  sexe, membre_avatar, membre_id,membre_pseudo, membre_enligne
        FROM forum_membres WHERE visibilite =:oui ORDER BY membre_pseudo LIMIT :premier, :nombre');
        $query->bindValue(':oui', $oui, PDO::PARAM_STR);
		$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
        $query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);

        $query->execute();
        

 echo'<p><table  width="100%" height="10" align="left" cellspacing="1" border="0" cellpadding="0"  bgcolor="#DBF3FB"> ';
 
$couleur_x=' background="images/arr1.jpg" ';
$couleur_z=' background="images/arr2.jpg" ';
 
  
  //Début de la boucle
  while($data = $query->fetch())
  {
  
  if ($id!=$data['membre_id']) /* si ce n'est pas moi */
   {
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
	 echo'<tr align="left" '.$couleur_x.'><td  width="1" align="center">&nbsp;<br /><img src="../images/avatars/'.$data[  'membre_avatar'].'" alt="Ce membre n a pas d avatar" width="'.$lewidth.'"/><br/><a href="profil.php?m='.stripslashes(htmlspecialchars($data['membre_id'])).
	   '&amp;action=consulter">Profil</a>
	 </td>
	   <td  >&nbsp;
	   ';/* <a href="ecriremsg.php?ac=nouveaumsg&ic='.stripslashes(htmlspecialchars($data['membre_id'])).'"> */
	   echo (strtolower($data['sexe'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo nl2br(stripslashes(htmlspecialchars($data['membre_pseudo']))).'( ';
	   echo (strtolower($data['sexe'])=="feminin")?'F':'M';echo' )</span><br/>&nbsp;';
	   echo ($data['membre_enligne'])=="oui"?'Statut: <font color="green">En ligne</span>':
	   'Statut: <font color="#FF0000">Hors ligne</span>';
	     
	   echo '<br/>&nbsp;
	   <a href="invitationenvoyerok.php?ic='.stripslashes(htmlspecialchars($data['membre_id'])).
	   '"><span class="rechercheinvit">Envoyer une invitation</span></a><br/>&nbsp;
	   
	   
	   <a href="allblogs.php?ii='.md5(stripslashes(htmlspecialchars($data['membre_id']))."blog").
	   '">Blog</a>
	   </td></tr>';
	} /* Fin si ce n'est pas moi */ 
   }   //FIN de la boucle
 
  
  
  echo'</table> <br /></p>';
 
 
 
$query->CloseCursor();

include("affnpage.php");



?>