
<?php 


$query=$db->prepare('DELETE FROM mm_invitation WHERE id_invitation =:inviid');
   $query->bindValue(':inviid', $inviid, PDO::PARAM_INT); 
   $query->execute();
   $query->CloseCursor();
   
  echo'Notification  Supprimé<br/>
  <a href="notification.php">Page précédente</a>'; 
   
?>