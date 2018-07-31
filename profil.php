<?php
session_start();
$titre='Profil';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

//On récupère la valeur de nos variables passées par URL
$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
$membre = isset($_GET['m'])?(int) $_GET['m']:'';
?>



<?php /*  ------------------------------------------------------------- */ ?>


<?php
//On regarde la valeur de la variable $action
switch($action)
{
    //Si c'est "consulter"
    case "consulter":
       //On récupère les infos du membre
	    $samoureuse = NULL;
	   $osexuelle = NULL;
	   $attentes = NULL;
	   $hobbies = NULL;
	   $dnaissance = NULL;
	   $dconnexion = NULL;
	   
	  $query=$db->prepare('SELECT COUNT(*) AS nbr FROM mm_profilplus WHERE id_membre =:membre');
      $query->bindValue(':membre',$membre, PDO::PARAM_INT);
      $query->execute();
      $idplus=($query->fetchColumn()==0)?1:0;
      $query->CloseCursor();
	  
	   if(!$idplus)
       {
      
       $query=$db->prepare('SELECT situation_amoureuse, orientation_sexuelle,
       attentes, hobbies, date_naissance, derniere_connexion
       FROM mm_profilplus WHERE id_membre=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	   
	   $samoureuse=$data['situation_amoureuse'];
	   $osexuelle=$data['orientation_sexuelle'];
	   $attentes=$data['attentes'];
	   $hobbies=$data['hobbies'];
	   $dnaissance=$data['date_naissance'];
	   $dconnexion=$data['derniere_connexion'];

	   }
	   else
	   {
	   $temps=time();
	    $query=$db->prepare('INSERT INTO mm_profilplus (id_membre,derniere_connexion) VALUES (:id,:temps) ');
       $query->bindValue(':id',$id, PDO::PARAM_INT);
	   $query->bindValue(':temps',$temps, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();

	   $dconnexion=$temps;
	   }
	   
	   
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email, description, membre_signature, sexe, membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();

      
	   //On affiche les infos sur le membre
         
      echo'<p><table  class="proar" width="100%" height="500"  cellspacing="1" border="0" cellpadding="3" >';

       echo'<tr><td bgcolor="#FFFFFF">Profil de <span class="nomutili">'.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</span><br />';
       
       echo'<img src="../images/avatars/'.$data['membre_avatar'].'"
       alt="Ce membre n a pas d avatar" width="'.$lewidth.'"/><br /></td></tr>';
       
       

     echo'<tr><td bgcolor="#FFFFFF">
	   <span class="prot">Sexe : </span>
       <span class="proenonce">'.stripslashes(htmlspecialchars($data['sexe'])).'</span>
       </td></tr>';
	
	
	
	   
        echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Description :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($data['description'])).' </span>        </td></tr>';
		
		
		echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Nombre de messages posté :  </span>
		<span class="proenonce">Ce membre est inscrit depuis le
       <strong>'.date('d/m/Y',$data['membre_inscrit']).'</strong> </span>
	    </td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Description :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($data['membre_post'])).' </span>        </td></tr>';
		
		 		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Lieu de Residence :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($data['membre_localisation'])).
		' </span></td></tr>';
						
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Situation Amoureuse :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($samoureuse)).
		' </span></td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Orientation Sexuelle :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($osexuelle)).
		' </span></td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Attentes :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($attentes)).
		' </span></td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Hobbies :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($hobbies)).
		' </span></td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Date de Naissance :  </span>
		<span class="proenonce">'.stripslashes(htmlspecialchars($dnaissance)).
		' </span></td></tr>';
		
		 echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot">Dernière Connexion :  </span>
		<span class="proenonce">'.date('H\hi \l\e d M y',$dconnexion).' </span></td></tr>';
		
		
		echo'<tr><td >&nbsp;</td></tr>';
		
      echo'</table> <br />'; 
       
       $query->CloseCursor();
       break;
?>


<?php
    //Si on choisit de modifier son profil
    case "modifier":
    
    break;
 

 
} //Fin du switch
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php


 include("queue.php");
  ?>
