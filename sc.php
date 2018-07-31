
<?php 

if(isset($_GET['e']))
   {
$query=$db->prepare('DELETE FROM mm_contact WHERE utilisateur_id =:id AND contact_id = :cid');
   $query->bindValue(':id', $id, PDO::PARAM_INT);   
   $query->bindValue(':cid', $cid, PDO::PARAM_INT); 
   $query->execute();
   $query->CloseCursor();
   
  echo'Contact Supprimé<br/>
  <a href="contact.php">Page précédente</a>'; 

   }
   else
   {
   
   echo'<span class="tchatTime"> 
	      <a href="notification.php?p=1&amp;ss='.$cid.'&amp;e=00">Cliquer ICI pour confirmer la suppression</a></span>';
    
   }
      
?>