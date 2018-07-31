<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");


// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>

<?php 

       $blogimg_erreur="";
       $blogimg_erreur1="";
      $blogimg_erreur2="";
       $blogimg_erreur3="";

if (isset($_GET['u']))
{
 $idblogpost=htmlspecialchars($_GET['u']);
} 
 
 
if (isset($_GET['t']))
{
 $action=$_GET['t'];

  switch($action)
  {
    //Premier cas : message
    case "message":
?>
<h2><span class="titretopic">Poster un Message</span></h2>
 


<form method="post" action="loadblogdata.php"  name="formulaire">
 Titre<br />
<input type="text" size="80" id="titre" name="titre" /><br />

<input type="button" id="gras" name="gras" value="G" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' :rire: ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br />
 
<label>Message</label><br />
<textarea name="message"    cols="15" rows="5" id="message"></textarea>

<p>
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer" /></p>

</form>

<?php

	

 
    break; 



  case "modifiermessage":
?>
<h2><span class="titretopic">Poster un nouveau Message</span></h2>
 


<form method="post" action="loadblogdata.php"  name="formulaire">
 Titre<br />
<input type="text" size="80" id="titre" name="titre" /><br />

<input type="button" id="gras" name="gras" value="G" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' :rire: ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br />
 
<label>Message</label><br />
<textarea name="modifiermessage"    cols="15" rows="5" id="modifiermessage"></textarea>

<p>
<input type="hidden" name="modifid" value="<?php echo $idblogpost;?>" />
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer" /></p>

</form>

<?php
echo'<br/>
  <a href="blog.php">Page précédente</a>'; 
	

 
    break; 
	
	 //suppression
    case "supprimer":
	$query=$db->prepare('DELETE FROM mm_blogs WHERE id_blog =:idblogpost');
   $query->bindValue(':idblogpost', $idblogpost, PDO::PARAM_INT); 
   $query->execute();
   $query->CloseCursor();
   
  echo'Post  Supprimé<br/>
  <a href="blog.php">Page précédente</a>'; 
  
   break; 
  
    //Deuxième cas : image blog
    case "blogimg":
	echo '<form method="post" action="loadblogdata.php" enctype="multipart/form-data">
	
	Titre<br />
    <input type="text" size="80" id="titre" name="titre" /><br />
		
	<i><font color="#ff0000"><small> Choisissez votre image :</small></font></i><br />
	<input type="file" name="blogimg" id="blogimg" size="12"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	
	Commentaire<br />
    <textarea name="imgcomment"  cols="15" rows="5" id="imgcomment"></textarea>
	
	<p><input type="submit" value="Envoyer" /></p></form>';
	
	
  
   break; 
  
   //Deuxième cas : image blog modifier
    case "modifierblogimg":
	
	echo '<form method="post" action="loadblogdata.php" enctype="multipart/form-data">
	
	Titre<br />
    <input type="text" size="80" id="titre" name="titre" /><br />
		
	<i><font color="#ff0000"><small> Choisissez votre image :</small></font></i><br />
	<input type="file" name="modifierblogimg" id="modifierblogimg" size="12"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	
	Commentaire<br />
    <textarea name="imgcomment"  cols="15" rows="5" id="imgcomment"></textarea>
	<input type="hidden" name="modifid" value="'.$idblogpost.'" />
	<p><input type="submit" value="Envoyer" /></p></form>';
	
	 echo'<br/>
  <a href="blog.php">Page précédente</a>'; 
  } //Fin du Switch
  
} //Fin if
 ?>


<?php 
$i = 0;
//Vérification de blogimg :
    if (!empty($_FILES['blogimg']['size']))
    {
        //On définit les variables :
        $maxsize = 150024; //Poid de l'image
        $maxwidth = 1100; //Largeur de l'image
        $maxheight = 1100; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['blogimg']['error'] > 0)
        {
                $blogimg_erreur = "Erreur lors du transfert de l'image : ";
        }
        if ($_FILES['blogimg']['size'] > $maxsize)
        {
                $i++;
                $blogimg_erreur = "Le fichier est trop gros : (<strong>".$_FILES['blogimg']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['blogimg']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $blogimg_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['blogimg']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $blogimg_erreur3 = "Extension de l'image incorrecte";
        }
    }
?> 
 
 
 <?php 
   if ($i==0)
   {
     if (isset($_POST['message']))
     {
	 $message=htmlspecialchars($_POST['message']);
	 $titre=htmlspecialchars($_POST['titre']);
	 $temps = time();
	 $query=$db->prepare('INSERT INTO mm_blogs
        (utilisateur_id, blog_text, blog_titre, blog_time)
        VALUES(:id,:message, :titre, :temps)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':message', $message, PDO::PARAM_STR);  
		$query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
        $query->CloseCursor(); 
		
		echo 'message posté';
		
		echo'<p><a href="./blog.php">Retour vers votre Blog  </a></p>';
		
     }
	 
	 if (isset($_POST['modifiermessage']))
     {
	 $message=htmlspecialchars($_POST['modifiermessage']);
	 $titre=htmlspecialchars($_POST['titre']);
	 $temps = time();
	 $idcible=htmlspecialchars($_POST['modifid']);
	 $vide="";
	 
	 $query=$db->prepare('UPDATE mm_blogs
        SET  blog_titre=:titre, blog_text=:message,  blog_image=:vide, blog_time=:temps
		WHERE id_blog=:idcible AND utilisateur_id=:id');
		$query->bindValue(':id', $id, PDO::PARAM_INT); 
		$query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':message', $message, PDO::PARAM_STR); 
		$query->bindValue(':vide', $vide, PDO::PARAM_STR);
		$query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':idcible', $idcible, PDO::PARAM_INT); 
		 
		$query->execute();
        $query->CloseCursor();
		 
		
		echo'<p>done</p>'.$message.$vide.$temps.$idcible.$titre;
		
		echo'<p><a href="./blog.php">Retour vers votre Blog  </a></p>';
		
     }
	 
	 
	 if (isset($_FILES['blogimg']))
     {
	 $blogimg=(!empty($_FILES['blogimg']['size']))?move_blogimg($_FILES['blogimg']):''; 
	 $titre=htmlspecialchars($_POST['titre']);
	 $imgcomment=htmlspecialchars($_POST['imgcomment']);
	 $temps = time();
	 $query=$db->prepare('INSERT INTO mm_blogs
        (utilisateur_id, blog_image, blog_titre, blog_imgcomment, blog_time)
        VALUES(:id,:blogimg, :titre, :imgcomment, :temps)');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':blogimg', $blogimg, PDO::PARAM_STR);  
		$query->bindValue(':titre', $titre, PDO::PARAM_STR);
		$query->bindValue(':imgcomment', $imgcomment, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
        $query->CloseCursor(); 
		
		echo 'Image posté!';
		
		echo'<p><a href="./blog.php">Retour à votre Blog  </a></p>';
     }
	 
	 
	 
	  if (isset($_FILES['modifierblogimg']))
     {
	 $blogimg=(!empty($_FILES['modifierblogimg']['size']))?move_blogimg($_FILES['modifierblogimg']):''; 
	 $titre=htmlspecialchars($_POST['titre']);
	 $imgcomment=htmlspecialchars($_POST['imgcomment']);
	 $temps = time();
	 $idcible=htmlspecialchars($_POST['modifid']);
	 $vide="";
	 
	 $query=$db->prepare('UPDATE  mm_blogs
        SET blog_text=:vide, blog_image=:blogimg, blog_imgcomment=:imgcomment,
		 blog_titre=:titre, blog_time=:temps
		WHERE id_blog=:idcible AND utilisateur_id=:id ');
		$query->bindValue(':id', $id, PDO::PARAM_INT);   
		$query->bindValue(':vide', $vide, PDO::PARAM_STR);  
        $query->bindValue(':blogimg', $blogimg, PDO::PARAM_STR);  
		$query->bindValue(':imgcomment', $imgcomment, PDO::PARAM_STR);
		$query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->bindValue(':idcible', $idcible, PDO::PARAM_INT);  
		$query->execute();
        $query->CloseCursor(); 
		
		echo 'Image posté!';
		
		echo'<p><a href="./blog.php">Retour à votre Blog  </a></p>';
     }
   }
   else
   {
        echo'<h1>Cool image non envoyé</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$blogimg_erreur.'</p>';
        echo'<p>'.$blogimg_erreur1.'</p>';
        echo'<p>'.$blogimg_erreur2.'</p>';
        echo'<p>'.$blogimg_erreur3.'</p>';
       
        echo'<p>Cliquez <a href="./loadblogdata.php?t=blogimg">ici</a> pour recommencer</p>';
    }
	
	
	
	
 ?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php
include("queue.php"); ?>
