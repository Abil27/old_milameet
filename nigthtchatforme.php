<?php



if (isset($_POST['lastmsg']))
{



  if ($_SESSION['nbrnigthposte']== $_POST['lastmsg'] )
   {
        
		$ttexte=stripslashes(htmlspecialchars($_POST['message']));
		$temps=time(); 
		
		$sesscode=$_SESSION['nbrnigthposte'];
		
		$query=$db->prepare('UPDATE forum_membres
        SET  lastmsg_tchat = :sesscode
        WHERE membre_id=:ida');
		$query->bindValue(':ida', $id, PDO::PARAM_INT); 
		$query->bindValue(':sesscode', $sesscode, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();
		
		$_SESSION['nbrnigthposte']=$_SESSION['nbrnigthposte']+1;
        
         $query=$db->prepare('INSERT INTO nigthtchat_envoyer
        (nigthtchat_texte, nigthtchat_createur, nigthtchat_time)
        VALUES(:ttexte, :idb, :tempsb)');
        $query->bindValue(':ttexte', $ttexte, PDO::PARAM_STR);
		$query->bindValue(':idb', $id, PDO::PARAM_INT); 
		$query->bindValue(':tempsb', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 
   }	
}		
?>

<?php 

//On compte nombre de msg
$nbid = $db->query('SELECT COUNT(*) FROM nigthtchat_envoyer')->fetchColumn();

$nbid=$nbid -10;


$query=$db->prepare('SELECT nigthtchat_texte,  nigthtchat_time, nigthtchat_createur,
Mb.membre_pseudo AS tpseudo, Mb.sexe AS tsexe
FROM nigthtchat_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = nigthtchat_envoyer.nigthtchat_createur 
ORDER BY nigthtchat_id  LIMIT :nid,10');
$query->bindValue(':nid', $nbid, PDO::PARAM_INT);
$query->execute();

$couleur_x=' class="arntchat" ';
$couleur_z='class="arntchat2"';

 //Début de la boucle
  while($data = $query->fetch())
  {
  
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
  
  echo'<tr ><td bordercolor="#FFFFFF" class="arntnt">&nbsp;<a href="./profil.php?m='.stripslashes(htmlspecialchars($data['nigthtchat_createur'])).'&amp;action=consulter">'; 
  echo (strtolower($data['tsexe'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
  echo stripslashes(htmlspecialchars($data['tpseudo'])).'
  </span>';
  echo'</a> </td></tr>  <tr '.$couleur_x.'><td>';
  echo'<span class="tchatTime">'.date('H\hi \l\e d M y',($data['nigthtchat_time']- $_SESSION['gmt'])).'</span> <br/> ';
  echo'<span class="ntchatTexte">'.code(nl2br(stripslashes(htmlspecialchars($data['nigthtchat_texte'])))).'</span>
  <br/><img src="./images/sept.jpg"/> 
  </td></tr>';
  }
  $query->CloseCursor(); 

?>