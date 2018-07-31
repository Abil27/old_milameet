<?php 
session_start();
$titre='Accueil';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");


// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

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
     
     	  
       <td width="750" valign="top" align="left"  >
       
       
       
<?php 

echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';


	  
	  
if (isset($_GET['t']))
{
 $action=$_GET['t'];
 
 if (($action=="texto" AND $_SESSION['totalc']< $_SESSION['cre_flashy']) OR ($action=="cooltaf" AND $_SESSION['totalc']< $_SESSION['cre_cooltofs']) ){
 echo'<h2>CREDITS INSUFISANT POUR CETTE ACTION</h2> ';
 echo'<p><a href="./index.php">Retour vers la page accueil  </a></p>';
 }
 else
 {
 
  switch($action)
  {
    //Premier cas : texto
    case "texto":
?>
<h2>Exprimez-vous!</h2>
 

<form method="post" action="ajcooltaf.php" name="formulaire" >
 
<legend>Mise en forme</legend><br />
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' XD ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" />
<br />
 
<legend>Message</legend><br />
<textarea cols="70" rows="8" id="message" name="message"></textarea><br />
 
<input type="submit" name="submit" value="Envoyer" />

</p></form>


<?php

	

 
    break; 


    //Deuxième cas : coul taf
    case "cooltaf":
	echo '<form method="post" action="ajcooltaf.php" enctype="multipart/form-data">
		
	<i><font color="#ff0000"><small> Choisissez votre image Cool Tof :</small></font></i><br />
	<input type="file" name="cooltaf" id="cooltaf" size="12"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	 
	Titre <br/>
     <input type="text" size="70" id="titre" name="titre"   /> <br/>
	<p><input type="submit" value="Envoyer" /></p></form>';
	
	
  } //Fin du Switch
} //Fin if
 } 
 ?>

<?php 
if ((isset($_POST['message']) AND $_SESSION['totalc']< $_SESSION['cre_flashy']) OR (!empty($_FILES['cooltaf']['size']) AND $_SESSION['totalc']< $_SESSION['cre_cooltofs']) ){
 echo'<h2>CREDITS INSUFISANT POUR CETTE ACTION</h2> ';
 echo'<p><a href="./index.php">Retour vers la page accueil  </a></p>';
 }
 else
 {
?>

<?php 
$cooltaf_erreur3 ="";
$cooltaf_erreur2 ="";


$i = 0;
//Vérification de COOLTAF :
    if (!empty($_FILES['cooltaf']['size']))
    {
        //On définit les variables :
        $maxsize = 1000024; //Poid de l'image
        $maxwidth = 1500; //Largeur de l'image
        $maxheight = 1500; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['cooltaf']['error'] > 0)
        {
                $cooltaf_erreur = "Erreur lors du transfert du Cool Taf : ";
        }
        if ($_FILES['cooltaf']['size'] > $maxsize)
        {
                $i++;
                $cooltaf_erreur = "Le fichier est trop gros : (<strong>".$_FILES['cooltaf']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['cooltaf']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $cooltaf_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['cooltaf']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $cooltaf_erreur3 = "Extension de l'avatar incorrecte";
        }
    }
?> 
 
 
 <?php 
   if ($i==0)
   {
     if (isset($_POST['message']))
     {
	  $vide="";
	  $query=$db->prepare('SELECT 
        utilisateur_id, id_cool
		FROM mm_textocooltaf WHERE utilisateur_id=:id AND  cooltafs=:vide ORDER BY id_cool DESC LIMIT 0,1');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		
		$emplacement="";
		while($data = $query->fetch())
  		{ 
		$emplacement=$data['id_cool'];
		}
		
		$query->CloseCursor();
		
		
		
		$texto=htmlspecialchars($_POST['message']);
	    $temps = time();
		
        if($emplacement==""){
	 	   	 
	 
	 $query=$db->prepare('INSERT INTO mm_textocooltaf
        (utilisateur_id, texto, cool_time)
        VALUES(:id,:texto,:temps)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':texto', $texto, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
        $query->CloseCursor(); 
		
				
		 }
	    else {
		
		 $query=$db->prepare('UPDATE mm_textocooltaf
        SET  texto=:texto, cool_time=:temps
		WHERE id_cool=:emplacement ');
		$query->bindValue(':texto', $texto, PDO::PARAM_STR);
		$query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':emplacement', $emplacement, PDO::PARAM_INT); 
		$query->execute();
        $query->CloseCursor();
	 
	    }  
		$_SESSION['totalc'] = $_SESSION['totalc'] - $_SESSION['cre_flashy'];
		
		include("cupdat.php");
		echo 'Texto envoye';
		echo'<p><a href="./index.php">Retour vers la page accueil  </a></p>';
		
     }
	 
	 
	 if (isset($_FILES['cooltaf']))
     {
	 
	  $vide="";
	 $query=$db->prepare('SELECT 
        utilisateur_id, id_cool
		FROM mm_textocooltaf WHERE utilisateur_id=:id AND  texto=:vide ORDER BY id_cool DESC LIMIT 0,1');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		
		$emplacement="";
		while($data = $query->fetch())
  		{ 
		$emplacement=$data['id_cool'];
		}
		
		$query->CloseCursor();
		
		
		$cooltaf=(!empty($_FILES['cooltaf']['size']))?move_cooltaf($_FILES['cooltaf']):''; 
	    $temps = time();
		$titre=htmlspecialchars($_POST['titre']);
		
		 if( $cooltaf!=""){
		 if($emplacement=="" AND $cooltaf!=""){
		 
	 
	 $query=$db->prepare('INSERT INTO mm_textocooltaf
        (utilisateur_id, cooltafs,cooltof_cmt, cool_time)
        VALUES(:id,:cooltaf,:titre,:temps)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':cooltaf', $cooltaf, PDO::PARAM_STR);  
		 $query->bindValue(':titre', $titre, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
        $query->CloseCursor(); 
		
				
		 }
	    else {
		
		 $query=$db->prepare('UPDATE mm_textocooltaf
        SET  cooltafs=:cooltaf,cooltof_cmt=:titre, cool_time=:temps
		WHERE id_cool=:emplacement ');
		$query->bindValue(':cooltaf', $cooltaf, PDO::PARAM_STR);
		 $query->bindValue(':titre', $titre, PDO::PARAM_STR);  
		$query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':emplacement', $emplacement, PDO::PARAM_INT); 
		$query->execute();
        $query->CloseCursor();
	 
	    }  
		$_SESSION['totalc'] = $_SESSION['totalc'] - $_SESSION['cre_cooltofs'];
		include("cupdat.php");
		echo 'Cool Tof envoyé';
		echo'<p><a href="./index.php">Retour vers la page accueil  </a></p>';
		
		} else{ echo "Cool Tof NON envoyé, Ficher vide";
		echo'<p><a href="./index.php">Retour vers la page accueil  </a></p>';
		}
     }
   }
   else
   {
        echo'<h1>Cool Tafs non envoyé</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$cooltaf_erreur.'</p>';
        
        echo'<p>'.$cooltaf_erreur2.'</p>';
        echo'<p>'.$cooltaf_erreur3.'</p>';
       
        echo'<p>Cliquez <a href="./ajcooltaf.php?t=cooltaf">ici</a> pour recommencer</p>';
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


