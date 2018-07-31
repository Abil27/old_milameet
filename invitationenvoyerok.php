<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

//On récupère la valeur de la variable action
$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>



<?php


if (isset($_GET['ic']))
{
    $titre = "Accepter l'invitation?";
    $idcontact= (int) $_GET['ic'];
    $temps = time();
	$invitvalider="non";
    
   /* On verifie si le contacte n'est pas déjà enregistré */
   $query=$db->prepare('SELECT contact_id FROM mm_contact WHERE utilisateur_id =:id');
   $query->bindValue(':id', $id, PDO::PARAM_INT);   
   $query->execute();
   
   $contactdeja="non";
   while($data = $query->fetch())
   {
     if ($idcontact==$data['contact_id'])
     {
	 //Et un petit message
	 $contactdeja="oui";
       $message='<span class="nomutili">Fait déjà partie de vos contact<br /></span><br />
		Cliquez <a href="./ttcontact.php">ici pour revenir sur la liste de recherche</a>';
	 $query->CloseCursor();
	 }
	 
   }   //FIN de la boucle
   
   
   if ($contactdeja=="non")
    { 
   /* On insert l'invitation  */
        $query=$db->prepare('INSERT INTO mm_invitation
        ( invitation_titre, invitation_createur, invitation_destinatair, invitation_valider, invitation_time)
        VALUES( :titre, :id, :idcontact, :invitvalider, :temps)');
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':idcontact', $idcontact, PDO::PARAM_INT);
		$query->bindValue(':invitvalider', $invitvalider, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 

       
        //Et un petit message
        $message='<p>Votre INVITATION a bien été envoyer!<br /><br />Cliquez <a href="./ttcontact.php">ici pour revenir sur la	 liste de recherche</a><br />';
    }
	echo $message;
}



if (isset($_GET['t']))
{
    $titre = "Repondre à l'invitation";
    $idnotification= (int) $_GET['t'];
    $temps = time();
	$invitvalider="oui";
    
//On entre le topic dans la base de donnée en laissant
        //le champ topic_last_post à 0
        $query=$db->prepare('UPDATE mm_invitation
        SET invitation_valider= :invitvalider, invit_acceptation_time= :temps  
		WHERE id_invitation= :idnotification ');
        
		$query->bindValue(':idnotification', $idnotification, PDO::PARAM_INT);
		$query->bindValue(':invitvalider', $invitvalider, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 

       
	   $query=$db->prepare('SELECT invitation_createur, invitation_destinatair FROM mm_invitation
        WHERE id_invitation = :idnotification ');
        $query->bindValue(':idnotification', $idnotification, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch();
		$idcontactcreateur = $data['invitation_createur'];
		$idcontactdestinatair = $data['invitation_destinatair'];
        $query->CloseCursor(); 
	   
	   
	   
	$titre = " Invitation accepté;";
    $temps = time();
	$invitvalider="oui";
    
        $query=$db->prepare('INSERT INTO mm_invitation
        ( invitation_titre, invitation_createur, invitation_destinatair, invitation_valider, invitation_time)
        VALUES( :titre, :idcontactcreateur, :idcontactcreateur, :invitvalider, :temps)');
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':idcontactcreateur', $idcontactcreateur, PDO::PARAM_INT);
		$query->bindValue(':idcontactcreateur', $idcontactcreateur, PDO::PARAM_INT);
		$query->bindValue(':invitvalider', $invitvalider, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 

	   
	   
	   $query=$db->prepare('INSERT INTO mm_contact
        ( utilisateur_id, contact_id, contact_time)
        VALUES( :idcontactcreateur, :idcontactdestinatair, :temps)');
        $query->bindValue(':idcontactdestinatair', $idcontactdestinatair, PDO::PARAM_STR);
		$query->bindValue(':idcontactcreateur', $idcontactcreateur, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 
	   
	   /*  on inverse les contacts*/
	   $query=$db->prepare('INSERT INTO mm_contact
        (  contact_id, utilisateur_id, contact_time)
        VALUES( :idcontactcreateur, :idcontactdestinatair, :temps)');
        $query->bindValue(':idcontactdestinatair', $idcontactdestinatair, PDO::PARAM_STR);
		$query->bindValue(':idcontactcreateur', $idcontactcreateur, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 
	   
        //Et un petit message
        echo'<p>Invitation accept&eacute;, la liste de vos contact à été mise &agrave; jour!<br /><br />Cliquez <a href="./notification.php">ici pour revenir dans votre boîte de notification</a><br />';
    
}

?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

 include("queue.php");
  ?>
