

<?php 
/* n n n                                  AND invitation_valider="non"*/
$query=$db->prepare('SELECT invitation_valider
FROM mm_invitation WHERE invitation_destinatair =:id ');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();

//Début de la boucle
$nbrnewnoti=0;
$totalnoti=0;
  while($data = $query->fetch())
  {
  if($data["invitation_valider"]=="non")
   {
   $nbrnewnoti++;
   }
      $totalnoti++;
  } 
  
$query->CloseCursor();

 
  
  
  
/* n n n                          AND msg_vu="non" */
$query=$db->prepare('SELECT msg_vu
FROM msg_envoyer WHERE msg_destinatair =:id ');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();

//Début de la boucle
$nbrnewmsg=0;
$totalmsg=0;
  while($data = $query->fetch())
  {
    if($data["msg_vu"]=="non")
   {
    $nbrnewmsg++;
   }
   $totalmsg++;
  } 
  
$query->CloseCursor();

$_SESSION['totalmsg'] = $totalmsg;
$_SESSION['totalnoti'] = $nbrnewnoti;

  $ttotal= $totalmsg+$totalnoti ;  
  $t=$nbrnewmsg+$nbrnewnoti;
  
 
  
?>