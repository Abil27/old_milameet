
<?php 

if(isset($_GET['e']))
   {
     $query=$db->prepare('UPDATE msg_envoyer
       SET  supp_destinatair=1 WHERE msg_id=:msgid ');
       $query->bindValue(':msgid', $msgid, PDO::PARAM_INT);  
       $query->execute();


   /* $query=$db->prepare('DELETE FROM msg_envoyer WHERE msg_id =:msgid ');
   $query->bindValue(':msgid', $msgid, PDO::PARAM_INT); 
   $query->execute();
   $query->CloseCursor(); */
   
  echo'Message  Supprimé<br/>
  <a href="affichemsg.php?p=1">Retour vers Inbox</a>';
 
   }
   else
   {
   
   echo'<span class="tchatTime"> 
	      <a href="affichemsg.php?p=1&amp;ss='.$msgid.'&amp;e=00">Cliquer ICI pour confirmer la suppression</a></span>';
    
   }
   

   
?>