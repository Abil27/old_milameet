<?php



if (isset($_POST['lastmsg']))
{



  if ($_SESSION['nbrposte']== $_POST['lastmsg'] )
   {
        
		$ttexte=stripslashes(htmlspecialchars($_POST['message']));
		$temps=time(); 
		
		$sesscode=$_SESSION['nbrposte'];
		
		$query=$db->prepare('UPDATE forum_membres
        SET  lastmsg_tchat = :sesscode
        WHERE membre_id=:ida');
		$query->bindValue(':ida', $id, PDO::PARAM_INT); 
		$query->bindValue(':sesscode', $sesscode, PDO::PARAM_INT);
		$query->execute();
		$query->CloseCursor();
		
		$_SESSION['nbrposte']=$_SESSION['nbrposte']+1;
        
         $query=$db->prepare('INSERT INTO tchat_envoyer
        (tchat_texte, tchat_createur, tchat_time)
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
$nbid = $db->query('SELECT COUNT(*) FROM tchat_envoyer')->fetchColumn();

$nbid=$nbid -10;



$query=$db->prepare('SELECT tchat_texte,  tchat_time,tchat_createur,
Mb.membre_pseudo AS tpseudo, Mb.sexe AS tsexe
FROM tchat_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = tchat_envoyer.tchat_createur 
ORDER BY tchat_id  LIMIT :nid,10');
$query->bindValue(':nid', $nbid, PDO::PARAM_INT);
$query->execute();

$couleur_x=' class="artchat" ';
$couleur_z=' class="artchat2"';


 //Début de la boucle
  while($data = $query->fetch())
  {
  
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
   
  
  echo'<tr ><td bordercolor="#FFFFFF">&nbsp;<a href="./profil.php?m='.stripslashes(htmlspecialchars($data['tchat_createur'])).'&amp;action=consulter">  ';
  echo (strtolower($data['tsexe'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
  echo stripslashes(htmlspecialchars($data['tpseudo'])).'
  </span> </a> </td></tr>  <tr '.$couleur_x.'><td>';
  echo'<span class="tchatTime">'.date('H\hi \l\e d M y',($data['tchat_time']- $_SESSION['gmt'])).'</span> <br/> ';
  echo'<span class="tchatTexte">'.code(nl2br(stripslashes(htmlspecialchars($data['tchat_texte'])))).'</span>
  <br/><img src="./images/sept.jpg"/> 
  </td></tr>';
  }
  $query->CloseCursor(); 

?>