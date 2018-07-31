
<?php 

        $enlign="oui";
		$temps= time();
		$tempsinact= time()-300;
		$query=$db->prepare('UPDATE forum_membres
		SET membre_enligne = :enlign, lo_date=:temps
		WHERE lo_date >:tempsinact OR  membre_id = :id');
		$query->bindValue(':enlign',$enlign,PDO::PARAM_STR);
		$query->bindValue(':temps',$temps,PDO::PARAM_INT);
        $query->bindValue(':tempsinact', $tempsinact, PDO::PARAM_INT);   
		$query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		
		$enlign="non";
		$query=$db->prepare('UPDATE forum_membres
		SET membre_enligne = :enlign
		WHERE lo_date <:tempsinact');
		$query->bindValue(':enlign',$enlign,PDO::PARAM_STR);
		$query->bindValue(':tempsinact', $tempsinact, PDO::PARAM_INT);   
        $query->execute();
        $query->CloseCursor();


$enlign="oui";
$query=$db->prepare('SELECT membre_enligne
FROM forum_membres WHERE membre_enligne =:enlign ');
$query->bindValue(':enlign',$enlign,PDO::PARAM_STR); 
$query->execute();

//Début de la boucle
$nol=0;
  while($data = $query->fetch())
  {
  if($data["membre_enligne"]=="oui")
   {
   $nol++;
   }
      
  } 
  
$query->CloseCursor();

 
  
  


  ?>