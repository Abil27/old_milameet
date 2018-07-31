<?php 
session_start();
$titre='Inscription';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

 ?>
 
 

<table width="950" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  
  <tr>
    <td valign="0">
    <?php include("menuzero.php");?>
    
    </td>
  </tr>
  
  <tr>
    <td valign="0">
    <?php include("imgentete.php");?>
    
    </td>
  </tr>
  <tr>
    <td>
    
     <table width="950" border="1" cellspacing="0" cellpadding="0">
      <tr>
     
     	  
       <td width="750" valign="top" align="left" >
       
       
       
<?php




if ($id!=0) erreur(ERR_IS_CO);
?>





<?php




$i = 0;

    $temps ; 
    $pseudo;
    $signature;
    $email;
	$telephone;
    $description;
    $localisation;
    $pass;
    $confirm;
	
	$pseudo_erreur1;
    $pseudo_erreur2 ;
    $mdp_erreur ;
    $email_erreur1 ;
    $email_erreur2;
    $description_erreur;
    $signature_erreur;
    $avatar_erreur;
    $avatar_erreur1 ;
    $avatar_erreur2;
    $avatar_erreur3;

	

echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';
	  
?>





<table colums="1">
  <tr>
<td ><?php 
echo'<span class="nommm">Formulaire d\'inscription<br/></span>';
?>
</td>
</tr></table>
<br />
<?php
if (empty($_POST['pseudo'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
	
	echo '<form method="post" action="inscription.php" enctype="multipart/form-data">
	<fieldset><legend>Identifiants</legend>
	<i><font color="#ff0000"><small>* Nom d\'utilisateur</small></font></i>  <br />
	<input name="pseudo" type="text" id="pseudo" /> <br /><small>(le nom d\'utilisateur doit contenir entre 3 et 15 caractères)</small><br />
	
	<i><font color="#ff0000"><small>*Mot de Passe</small></font></i><br />
	<input type="password" name="password" id="password" /><br />
	
	<i><font color="#ff0000"><small>* Confirmer le mot de passe</small></font></i><br />
	<input type="password" name="confirm" id="confirm" /><br />
	
	<label><input type="radio" name="sexe" value="Masculin" checked="checked" />Masculin</label>    <label><input type="radio" name="sexe" value="Feminin" />Feminin</label>
    </fieldset>
	
	<fieldset><legend>Contacts</legend>
	<i><font color="#ff0000"><small>* Votre adresse Mail</small></font></i><br />
	<input type="text" name="email" id="email" /><br />
	
	<i><font color="#ff0000"><small>Num de téléphone avec l\'identification de votre pays : </small></font></i><br />
	<input type="text" name="telephone" id="telephone" /><br />
	<br /><small>(Exemple : 0022899665544 pour le Togo)<br /></small><br />
	
	</fieldset>
	
	<fieldset><legend>Informations supplémentaires</legend>
	<i><font color="#ff0000"><small>Localisation : </small></font></i><br />
	<input type="text" name="localisation" id="localisation" />
	</fieldset>
	
	<fieldset><legend>Profil sur le forum</legend>
	<i><font color="#ff0000"><small> Choisissez votre avatar :</small></font></i><br />
	<input type="file" name="avatar" id="avatar" size="12"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	
	<i><font color="#ff0000"><small>Présentez-vous en quelques lignes : </small></font></i><br />
	<textarea cols="20" rows="4" name="description" id="description">La description est limitée à 200 caractères</textarea><br />
	
	<i><font color="#ff0000"><small>Signature dans le forum : </small></font></i><br />
	<textarea cols="20" rows="4" name="signature" id="signature">La signature est limitée à 200 caractères</textarea>
	
	</fieldset>
	<small><p>Les champs précédés d\'un * sont obligatoires</p></small>
	<p><input type="submit" value="S\'inscrire" /></p></form>
	
	</body>
	</html>';
	
	
} //Fin de la partie formulaire

else //On est dans le cas traitement
{
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
	
	
	//On récupère les variables
    $i = 0;
    $temps = time(); 
    $pseudo=$_POST['pseudo'];
	
    $signature = stripslashes(htmlspecialchars($_POST['signature']));
	if ($signature == "La signature est limitée à 200 caractères")
	{
	 $signature="";
	}
	
	
	$description = stripslashes(htmlspecialchars($_POST['description']));
	if ($description == "La description est limitée à 200 caractères")
	{
	 $description="";
	}
	
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $localisation = $_POST['localisation'];
    $pass = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);
	
    //Vérification du pseudo
    $query=$db->prepare('SELECT membre_pseudo FROM forum_membres ');
    /* $query->bindValue(':pseudo',strtolower($pseudo), PDO::PARAM_STR); */
    $query->execute();
    /* $pseudo_free=($query->fetchColumn()==0)?1:0; */
	/* $data=$query->fetch(); */
    
	
	    $pseudo_free=0;
	    while($data = $query->fetch())
        {
		if (strtolower($data['membre_pseudo']) == strtolower($_POST['pseudo'])) 
	    {// ***
		$pseudo_free=1;
		}}// ***
	    $query->CloseCursor();
		
   /*  if(!$pseudo_free) */
    if($pseudo_free==1)
    {
        $pseudo_erreur1 = "Votre nom d'utilisateur est déjà utilisé par un membre";
        $i++;
    }

    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre nom d'utilisateur est soit trop grand, soit trop petit";
        $i++;
    }

    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
        $i++;
    }
?>



<?php 
$query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_pseudo =:pseudo');
$query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
$query->execute();
$pseudo_free=($query->fetchColumn()==0)?1:0;
?>




<?php
    //Vérification de l'adresse email

    //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
    //On vérifie la forme maintenant
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }
    //Vérification de le telephone
    if (!preg_match("#[0-9]$#", $telephone) && !empty($telephone))
    {
        $telephone_erreur = "Votre num telephone n'a pas un format valide";
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
        $signature_erreur = "Votre signature est trop longue";
        $i++;
    }
?>
 



<?php
    //Vérification de l'avatar :
    if (!empty($_FILES['avatar']['size']))
    {
        //On définit les variables :
        $maxsize = 1000024; //Poid de l'image
        $maxwidth = 1500; //Largeur de l'image
        $maxheight = 1500; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['avatar']['error'] > 0)
        {
                $avatar_erreur = "Erreur lors du transfert de l'avatar : ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $avatar_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }
    }
?>



<?php
   if ($i==0)
   {
	echo'<h">Inscription terminée</h">';
        echo'<p>Bienvenue  <span class="nomutili"> '.stripslashes(htmlspecialchars($_POST['pseudo'])).'</span> vous êtes maintenant inscrit sur milameet</p>
	<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p>';
	
       
	$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'vide.jpg'; 
    $sexe=$_POST['sexe'];
	$visibilite="oui";
	$passvis=$_POST['password'];
	$credepart=500;
	
        $query=$db->prepare('INSERT INTO forum_membres (membre_pseudo, membre_mdp, 
		membre_mdpvis, sexe, membre_email, visibilite, telephone, description, membre_avatar,
        membre_signature, membre_localisation, membre_inscrit,   
        membre_derniere_visite, credit)
        VALUES (:pseudo, :pass, :passvis, :sexe, :email, :visibilite, :telephone, :description,
		:nomavatar, :signature, :localisation, :temps, :temps, :credepart)');
	$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$query->bindValue(':pass', $pass, PDO::PARAM_INT);
	$query->bindValue(':passvis', $passvis, PDO::PARAM_INT);
	$query->bindValue(':sexe', $sexe, PDO::PARAM_STR);
	$query->bindValue(':email', $email, PDO::PARAM_STR);
	$query->bindValue(':visibilite', $visibilite, PDO::PARAM_STR);
	$query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
	$query->bindValue(':nomavatar', $nomavatar, PDO::PARAM_STR);
	$query->bindValue(':signature', $signature, PDO::PARAM_STR);
	$query->bindValue(':description', $description, PDO::PARAM_STR);
	$query->bindValue(':localisation', $localisation, PDO::PARAM_STR);
	$query->bindValue(':temps', $temps, PDO::PARAM_INT);
	$query->bindValue(':credepart', $credepart, PDO::PARAM_INT);
        $query->execute();

	//Et on définit les variables de sessions
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = $db->lastInsertId(); 
        $_SESSION['level'] = 2;
        $query->CloseCursor();
		$_SESSION['totalc']=500;
		$titre="Bienvenue";
		$msg=" Salut, vous etes maintenant membre de milameet. Vous pouvez deja commmencé par vous exprimer dans les flashy, par mettre votre photo  ou encore modifier votre profil pour le rendre plus acceuillant.
Et des sujets reclament deja vos commentaires dans le forum. Qu'attendez-vous pour vous faire de nouveaux amis au tchat. Si vous avez des questions consultez l'aide et FAQ.


milameet, de loin le site qui vous rapproche.

";
        $idd=$_SESSION['id'];
		$idadmin=113;
		$temps = time();
		$msgvu="non";
        $query=$db->prepare('INSERT INTO msg_envoyer
        ( msg_titre, msg_texte, msg_createur, msg_destinatair, msg_vu, msg_time)
        VALUES( :titre, :mess, :idadmin, :idd, :msgvu, :temps)');
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':mess', $msg, PDO::PARAM_STR);
		$query->bindValue(':msgvu', $msgvu, PDO::PARAM_STR);
        $query->bindValue(':idd', $idd, PDO::PARAM_INT);
		$query->bindValue(':idadmin', $idadmin, PDO::PARAM_INT);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 
		
    }
    else
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$telephone_erreur.'</p>';
		echo'<p>'.$description_erreur.'</p>';
        echo'<p>'.$signature_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';
       
        echo'<p>Cliquez <a href="./inscription.php">ici</a> pour recommencer</p>';
    }
}



echo'</table>';
?>

       
       
       </td>
      
      <td width="200" valign="top">&nbsp;
      <iframe src="pub.php" name="cpub" width="200" marginwidth="2" height="500" marginheight="2"      align="left" scrolling="no" frameborder="0"></iframe>
      </td>
      
      </tr>
     </table>

    </td>
  </tr>
  
  
  <tr>
    <td><?php include("bpage.php"); ?></td>
  </tr>
  
</table>



