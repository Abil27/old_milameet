<?php
	 
	 
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire

{


	include("con_ins.php") ;
  
  /* FIN AFFICHAGE INSCRIPTION */
  
}

else
{ 
     $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
	
      include("con_vide.php") ;
	}
    else //On check le mot de passe
    {	
	
	$query=$db->prepare('SELECT membre_pseudo, membre_id FROM forum_membres ');
    /* $query->bindValue(':pseudo',strtolower($pseudo), PDO::PARAM_STR); */
    $query->execute();
        $lidpseudo=0;
	    while($data = $query->fetch())
        {
		if (strtolower($data['membre_pseudo']) == strtolower($_POST['pseudo'])) 
	    {// ***
		$lidpseudo=$data['membre_id'];
		}}// ***
	$query->CloseCursor();	
		
		
	    
	 $query=$db->prepare('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo, 
	 lo_date, credit  FROM forum_membres WHERE membre_id=:lidpseudo');
	 $query->bindValue(':lidpseudo',$lidpseudo, PDO::PARAM_INT);
     $query->execute();
	  $data=$query->fetch();
      $query->CloseCursor();   		
		

	      if (strtolower($data['membre_mdp']) == md5(strtolower($_POST['password']))) // Acces OK !
	      {
          include("con_ok.php") ;
	      
		  }  
	      else // Acces pas OK !
		  {
	      include("con_err.php") ;
		
	      }
			
    }
 }
     
?>
