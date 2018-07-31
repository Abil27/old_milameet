<?php



if (isset($_POST['lastmsg']))
{

$query=$db->prepare('SELECT lastmsg_tchat FROM forum_membres WHERE membre_id =:id');
$query->bindValue(':id', $id, PDO::PARAM_INT); 
$query->execute();
$data = $query->fetch();
$lastsesscode=$data['lastmsg_tchat'];
$query->CloseCursor();
echo $_SESSION['nbrposte'];echo $lastsesscode.$_POST['lastmsg'];
  if ($_SESSION['nbrposte']!= $_POST['lastmsg'] OR empty($lastsesscode))
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



$query=$db->prepare('SELECT tchat_texte,  tchat_time,
Mb.membre_pseudo AS tpseudo, Mb.sexe AS tsexe
FROM tchat_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = tchat_envoyer.tchat_createur 
ORDER BY tchat_id  LIMIT :nid,10');
$query->bindValue(':nid', $nbid, PDO::PARAM_INT);
$query->execute();

$couleur_x=' background="images/ftb.jpg"';
$couleur_z=' background="images/ftb2.jpg"';

 //Début de la boucle
  while($data = $query->fetch())
  {
  
   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
  
  echo'<tr ><td bordercolor="#FFFFFF"><span class="tchatPseudo">'.stripslashes(htmlspecialchars($data['tpseudo'])).'
  </span> </td></tr>  <tr '.$couleur_x.'><td>';
  echo'<span class="tchatTime">'.date('H\hi \l\e d M y',$data['tchat_time']).'</span> <br/> ';
  echo'<span class="tchatTexte">'.code(nl2br(stripslashes(htmlspecialchars($data['tchat_texte'])))).'</span>
  <br/><img src="./images/sept.jpg"/> 
  </td></tr>';
  }
  $query->CloseCursor(); 

?>