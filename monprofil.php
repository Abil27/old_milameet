<?php
session_start();
$titre='Mon profil';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

//On récupère la valeur de nos variables passées par URL

$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):md5($id.'consulter');
$membre = isset($_GET['m'])?(int) $_GET['m']:'';


?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'<p><table  width="100%" height="200"  cellspacing="0" border="0" cellpadding="5" >   ';
 
 echo'<tr><td  >
 </td>   </tr>

<tr><td  >';

//On regarde la valeur de la variable $action
switch($action)
{
    //Si c'est "consulter"
    case md5($id."consulter"):
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

       
      echo'<p><table  class="proar" width="100%" height="500" align="left" cellspacing="1" border="0" cellpadding="3" >';

       echo'<tr><td   bgcolor="#FFFFFF">Profil de <span class="nomutili">'.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</span><br />';
       
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
		<span class="proenonce">'.stripslashes(htmlspecialchars($data['membre_post'])).' </span>        </td></tr>';
		
		echo'<tr><td bgcolor="#FFFFFF">
		<span class="prot"> Inscription:  </span>
		<span class="proenonce">Ce membre est inscrit depuis le
       <strong>'.date('d/m/Y',$data['membre_inscrit']).'</strong> </span>
	    </td></tr>';
		
				
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
	   echo'<p><a href="./monprofil.php?action='.md5($id."modifier").'">Modifier profil</a> </p>';
	   
       break;
	   
	   
   
?>


<?php
    //Si on choisit de modifier son profil
    case md5($id."modifier"):
    if (empty($_POST['sent'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
    {
        //On commence par s'assurer que le membre est connecté
        if ($id==0) erreur(ERR_IS_NOT_CO);

        //On prend les infos du membre
        $query=$db->prepare('SELECT membre_pseudo, membre_email,
        description, visibilite, telephone, membre_signature, sexe, membre_localisation,
        membre_avatar,mm_profilplus.situation_amoureuse, mm_profilplus.orientation_sexuelle,
        mm_profilplus.attentes, mm_profilplus.hobbies, mm_profilplus.date_naissance, 
	    mm_profilplus.derniere_connexion
        FROM forum_membres
		LEFT JOIN mm_profilplus ON mm_profilplus.id_membre = forum_membres.membre_id
		 WHERE membre_id=:id');
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $data=$query->fetch();
        
        echo '<h1>Modifier mon profil</h1>';
        
        echo '<form method="post" action="monprofil.php?
		action='.md5($id."modifier").'" enctype="multipart/form-data">
       
 
        <fieldset><legend>Identifiants</legend><br />
        Pseudo : <strong>'.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</strong><br />       
        <label for="password">Nouveau mot de Passe :</label><br />
        <input type="password" name="password" id="password" /><br />
        <label for="confirm">Confirmer le mot de passe :</label><br />
        <input type="password" name="confirm" id="confirm"  /><br />';
		
		echo ($data['sexe']=="Feminin")?'<br />
		<label><input type="radio" name="sexe" value="Masculin" />Masculin </label>    
		<label><input type="radio" name="sexe" value="Feminin"  checked="checked"/>
		Feminin</label><br />':
		'<label><input type="radio" name="sexe" value="Masculin" checked="checked" />
		Masculin </label>    
		<label><input type="radio" name="sexe" value="Feminin" />Feminin</label><br /><br />';
		
		echo '<label>Visibilité de votre profil </label><br />';
		echo ($data['visibilite']=="oui")?'
		<label><input type="radio" name="visibilite" value="non" />Non </label>    
		<label><input type="radio" name="visibilite" value="oui"  checked="checked"/>
		Oui</label><br />':
		'<label><input type="radio" name="visibilite" value="oui" checked="checked" />
		Non </label>    
		<label><input type="radio" name="visibilite" value="non" />Oui</label><br />';
		echo '</fieldset><br />
 
        <fieldset><legend>Informations supplémentaires</legend>
        <label for="email">Votre adresse E_Mail :</label><br />
        <input type="text" name="email" id="email"
        value="'.stripslashes($data['membre_email']).'" /><br />
 
        <i><font color="#ff0000"><small>Téléphone : </small></font></i><br />
	    <input type="text" name="telephone" id="telephone" 
		value="'.stripslashes($data['telephone']).'"/>
	    <br /><small>(Exemple : 0022899665544 pour le Togo)<br /></small><br />
 
        
        <label for="localisation">Lieu de Residence : :</label><br />
        <input type="text" name="localisation" id="localisation"
        value="'.stripslashes($data['membre_localisation']).'" /><br /><br />
        
               
        
        <label for="avatar">Changer votre avatar :</label><br />
        <input type="file" name="avatar" id="avatar" /><br />
        (Taille max : 1 Mo )<br /><br />
		
        <label><input type="checkbox" name="delete" value="Delete" />
        Supprimer l avatar</label><br />
        Avatar actuel :<br />
        <img src="../images/avatars/'.$data['membre_avatar'].'"
        alt="pas d avatar"  width="'.$lewidth.'"/><br /><br />
		
		<i><font color="#ff0000"><small>Mondifier votre description : </small></font></i>
		<br />
	     <textarea cols="20" rows="4" name="description" id="description" 
		 value="'.stripslashes($data['description']).'">
		 '.stripslashes($data['description']).'</textarea><br />
     
        <br /><br />
        <label for="signature">Signature :</label><br />
        <textarea cols="20" rows="4" name="signature" id="signature">
        '.stripslashes($data['membre_signature']).'</textarea><br />
          
        <br />
		
		 <br /><br />
        <label for="signature">Situation Amoureuse :</label><br />
        <input type="text" name="samoureuse" id="samoureuse"
        value="'.$data['situation_amoureuse'].'" /><br />
          
        <br />
		
		  <label for="localisation">Orientation Sexuelle :</label><br />
        <input type="text" name="osexuelle" id="osexuelle"
        value="'.stripslashes($data['orientation_sexuelle']).'" /><br /><br />
        
		  <label for="localisation">Attentes  :</label><br />
        <input type="text" name="attentes" id="attentes"
        value="'.stripslashes($data['attentes']).'" /><br /><br />
        
		  <label for="localisation">Hobbies :</label><br />
        <textarea cols="20" rows="4" name="hobbies" id="hobbies">
        "'.$data['hobbies'].'"</textarea><br /><br />
        
		  <label for="localisation">Date de Naissance :</label><br />
        <input type="text" name="dnaissance" id="dnaissance"
        value="'.stripslashes($data['date_naissance']).'" /><br />
		Ex: jj/mm/aaaa<br /><br />
        
		        
		
        <p>
        <input type="submit" value="Modifier" />
        <input type="hidden" id="sent" name="sent" value="1" />
        </p></form>';
        $query->CloseCursor();   
   }   
   else //Sinon on est dans la page de traitement
   {
       //On déclare les variables 

     $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;
    $telephone_erreur = NULL;
	$description_erreur = NULL;
    $signature_erreur = NULL;
    $avatar_erreur = NULL;
    $avatar_erreur1 = NULL;
    $avatar_erreur2 = NULL;
    $avatar_erreur3 = NULL;
	 $dnai_erreur = NULL;

    //Encore et toujours notre belle variable $i :p
    $i = 0;
    $temps = time(); 
    	
    $signature = stripslashes(htmlspecialchars($_POST['signature']));
		
	$description = stripslashes(htmlspecialchars($_POST['description']));
		
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $localisation = $_POST['localisation'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
  
  
    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
         $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent ou sont vides";
         $i++;
    }
	$passvis = $_POST['password'];
	$pass = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);

    //Vérification de l'adresse email
    //Il faut que l'adresse email n'ait jamais été utilisée (sauf si elle n'a pas été modifiée)

    //On commence donc par récupérer le mail
    $query=$db->prepare('SELECT membre_email FROM forum_membres WHERE membre_id =:id'); 
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();
    if (strtolower($data['membre_email']) != strtolower($email))
    {
        //Il faut que l'adresse email n'ait jamais été utilisée
        $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_email =:mail');
        $query->bindValue(':mail',$email,PDO::PARAM_STR);
        $query->execute();
        $mail_free=($query->fetchColumn()==0)?1:0;
        $query->CloseCursor();
        if(!$mail_free)
        {
            $email_erreur1 = "Votre adresse email est déjà utilisé par un membre";
            $i++;
        }

        //On vérifie la forme maintenant
        if (!preg_match("#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
        {
            $email_erreur2 = "Votre nouvelle adresse E-Mail n'a pas un format valide";
            $i++;
        }
    }
	
    //Vérification de le telephone
    if (!preg_match("#[0-9]$#", $telephone) && !empty($telephone))
    {
        $telephone_erreur = "Votre telephone n'a pas un format valide";
        $i++;
    }
	
	//Vérification de la description
    if (strlen($description) > 200)
    {
        $description_erreur = "Votre description est trop longue";
        $i++;
    }

    //Vérification de la signature
    if (strlen($signature) > 200)
    {
        $signature_erreur = "Votre nouvelle signature est trop longue";
        $i++;
    }
	
	 $dnaissance=$_POST['dnaissance'];
	/* list ($jour, $mois , $an ) = split("[-./]",$dnaissance);
      */
    if (ftdate($dnaissance)==false){
    
	 $dnai_erreur = "la date n'est pas valide";
        $i++;
    }
	

 
 

    //Vérification de l'avatar
 
    if (!empty($_FILES['avatar']['size']))
    {
        
        $maxsize = 1000024; 
        $maxwidth = 1500; 
        $maxheight = 1500; 
        
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' );
 
        if ($_FILES['avatar']['error'] > 0)
        {
        $avatar_erreur = "Erreur lors du tranfsert de l'avatar : ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
        $i++;
        $avatar_erreur1 = "Le fichier est trop gros :
        (<strong>".$_FILES['avatar']['size']." Octets</strong>
        contre <strong>".$maxsize." Octets</strong>)";
        }
 
        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
        $i++;
        $avatar_erreur2 = "Image trop large ou trop longue :
        (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre
        <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
 
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }
     }





    echo '<h3>Modification du profil</h3>';

 
    if ($i == 0) // Si $i est vide, il n'y a pas d'erreur
    {
        if (!empty($_FILES['avatar']['size']))
        {
         $nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'vide.jpg'; 
                $query=$db->prepare('UPDATE forum_membres
                SET membre_avatar = :avatar 
                WHERE membre_id = :id');
                $query->bindValue(':avatar',$nomavatar,PDO::PARAM_STR);
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->execute();
                $query->CloseCursor();
        }
 
        //Une nouveauté ici : on peut choisis de supprimer l'avatar
        if (isset($_POST['delete']))
        {
                $query=$db->prepare('UPDATE forum_membres
		SET membre_avatar=0 WHERE membre_id = :id');
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->execute();
                $query->CloseCursor();
        }
 
        echo'<span class="modifier">Modification terminée <br/>Votre profil a été 
		modifié avec succès !</span>';
        echo'<br/>Cliquez <a href="./monprofil.php?m='.$id.'&amp;action='.md5($id."consulter").'">ici</a> 
        pour revenir à votre profil';
 
        //On modifie la table
		$sexe=$_POST['sexe'];
	    $visibilite=$_POST['visibilite'];
 
        $query=$db->prepare('UPDATE forum_membres
        SET membre_mdp = :mdp, membre_mdpvis= :passvis, sexe=:sex, telephone=:tele, membre_signature=:sign, membre_email=:mail, description=:descri,
         membre_localisation=:loc
        WHERE membre_id=:id');
        $query->bindValue(':mdp',$pass,PDO::PARAM_INT);
		$query->bindValue(':passvis',$passvis,PDO::PARAM_INT);
        $query->bindValue(':sex',$sexe,PDO::PARAM_STR);
        $query->bindValue(':descri',$description,PDO::PARAM_STR);
		$query->bindValue(':mail',$email,PDO::PARAM_STR);
        $query->bindValue(':sign',$signature,PDO::PARAM_STR);
        $query->bindValue(':tele',$telephone,PDO::PARAM_STR);
        $query->bindValue(':loc',$localisation,PDO::PARAM_STR);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		
		
		$samoureuse=$_POST['samoureuse'];
	   $osexuelle=$_POST['osexuelle'];
	   $attentes=$_POST['attentes'];
	   $hobbies=$_POST['hobbies'];
	   $dnaissance=$_POST['dnaissance'];
	   
	   
	  $temps=time();
	   
	    $query=$db->prepare('UPDATE mm_profilplus
        SET situation_amoureuse = :samoureuse, orientation_sexuelle= :osexuelle,
		attentes=:attentes, hobbies=:hobbies, date_naissance=:dnaissance,
	    derniere_connexion=:temps
        WHERE id_membre=:id');
        
        $query->bindValue(':samoureuse',$samoureuse,PDO::PARAM_STR);
        $query->bindValue(':osexuelle',$osexuelle,PDO::PARAM_STR);
		$query->bindValue(':attentes',$attentes,PDO::PARAM_STR);
        $query->bindValue(':hobbies',$hobbies,PDO::PARAM_STR);
        $query->bindValue(':dnaissance',$dnaissance,PDO::PARAM_STR);
        $query->bindValue(':temps',$temps,PDO::PARAM_STR);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		


    }
    else
    {
        echo'<h1>Modification interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant la modification du profil</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$signature_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>'; 
		echo'<p>'.$dnai_erreur.'</p>';
        echo' Cliquez <a href="./monprofil.php?action='.md5($id."modifier").'">ici</a> pour recommencer';
    }

  }//Fin du else

    break;
 


} //Fin du switch



echo'</td>   </tr>     </table>';
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php


 include("queue.php");
  ?>
