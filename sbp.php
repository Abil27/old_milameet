
<?php 


$query=$db->prepare('DELETE FROM mm_blogs WHERE id_blog =:inviid');
   $query->bindValue(':inviid', $inviid, PDO::PARAM_INT); 
   $query->execute();
   $query->CloseCursor();
   
  echo'Notification  Supprimé<br/>
  <a href="notification.php">Page précédente</a>'; 
   
?>