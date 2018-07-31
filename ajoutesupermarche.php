<?php 
session_start();
$titre='Supermarche';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>
<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php include("imgentete.php"); ?>

       
<?php 
echo'<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:20px; color:#FF0000; text-align:left; font-weight:bold">SUPERMARCHE</span></td>
  </tr>
</table>


<br/>';
echo'<table width="100%" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="100%" valign="top" align="left"  >';


	  
	  
if (isset($_GET['t']))
{
 $action=$_GET['t'];
 
 if ( $_SESSION['totalc']< $_SESSION['cre_artisupm'] ){

 echo'<h2>CREDITS INSUFISANT POUR CETTE ACTION</h2> ';
 echo'<p><a href="./supm.php">Retour vers Supermarché  </a></p>';
 }
 else
 {
 
  switch($action)
  {
    //Premier cas : texto
    case "article":
?>
<h4>Decrivez l'article que vous vendez et n'oubliez pas de laisser votre contact</h4>
 

<form method="post" action="ajoutesupermarche.php" name="formulaire"  enctype="multipart/form-data">
 
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
 
<legend>ARTICLE</legend><br />
<textarea cols="20" rows="8" id="message" name="message"></textarea><br />
 

<?php
	echo '
		
	<i><font color="#ff0000"><small>hoisissez la photo de votre article:</small></font></i><br />
	<input type="file" name="articleimg" id="articleimg" size="12"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	<p><input type="submit" value="Envoyer" /></p></form>';
	break; 
	
  } //Fin du Switch
} //Fin if
 } 
 ?>

<?php 
if (isset($_POST['message']) AND $_SESSION['totalc']< $_SESSION['cre_artisupm'] ){
 echo'<h2>CREDITS INSUFISANT POUR CETTE ACTION</h2> ';
 echo'<p><a href="./supm.php">Retour vers Supermarché  </a></p>';
 }
 else
 {
?>

<?php 
$cooltaf_erreur3 ="";
$cooltaf_erreur2 ="";


$i = 0;
//Vérification de COOLTAF :
    if (!empty($_FILES['articleimg']['size']))
    {
        //On définit les variables :
        $maxsize = 1000024; //Poid de l'image
        $maxwidth = 1500; //Largeur de l'image
        $maxheight = 1500; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['articleimg']['error'] > 0)
        {
                $cooltaf_erreur = "Erreur lors du transfert de la photo de votre article: ";
        }
        if ($_FILES['articleimg']['size'] > $maxsize)
        {
                $i++;
                $cooltaf_erreur = "Le fichier est trop gros : (<strong>".$_FILES['articleimg']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['articleimg']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $cooltaf_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['articleimg']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $cooltaf_erreur3 = "Extension de l'article incorrecte";
        }
    }
?> 
 
 
 <?php 
   if ($i==0)
   {
     if (isset($_POST['message']))
     {
	  $vide="";
	  
		
		$acomment=htmlspecialchars($_POST['message']);
	    $temps = time();
		
        $query=$db->prepare('INSERT INTO supermarche
        (utilisateur_id,articlecomment, temps)
        VALUES(:id,:acomment,:temps)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':acomment', $acomment, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
		$lastid = $db->lastInsertId();
        $query->CloseCursor(); 
		
				
		
		$_SESSION['totalc'] = $_SESSION['totalc'] - $_SESSION['cre_artisupm'];
		
		include("cupdat.php");
		echo 'Votre article a été ajouté au supermarché';
		
		
     }
	 
	 
	 if (isset($_FILES['articleimg']))
     {
	  $articlephoto=(!empty($_FILES['articleimg']['size']))?supm_article($_FILES['articleimg']):''; 
	    $temps = time();
		 
		
		 if( $articlephoto!=""){
		 
	 
	 $query=$db->prepare('UPDATE supermarche SET
        photoarticle=:articlephoto WHERE id_supermache=:lastid');
		$query->bindValue(':lastid', $lastid, PDO::PARAM_INT);
        $query->bindValue(':articlephoto', $articlephoto, PDO::PARAM_STR);  
        $query->execute();
        $query->CloseCursor(); 
		
		
		} else{ echo "La photo de votre article n'a pas ete envoye, Ficher vide";
		
		}
		
     }
	 echo'<p><a href="./supm.php">Retour vers Supermarché  </a></p>';
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
   
 <?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
 <table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br />';
  
  
echo'

  <br/><img src="images/supm.jpg" width="'.$icow.'"/><a href="supm.php"> Super march&eacute;</a> 
  <br/><img src="images/lg.gif" width="'.$icow.'"/><a href="index.php"> Accueil</a>
  

  
';

 include("queue.php");
  ?>
