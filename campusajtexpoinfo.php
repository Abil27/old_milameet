<?php 
session_start();
$titre='Ajouter une information';
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
     
     	  
       <td width="750" valign="top" align="left"   bgcolor="#FDEAE1" class="supm">
       
       
       
<?php 
echo'<table width="750" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:20px; color:#FF0000; text-align:left; font-weight:bold">SEMAINE CULTURELLE UNIVERSIETE DE LOME 2012</span></td>
	<td   align="right"  bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:12px; color:#FF0000;  "><a href="./campus.php">Retour vers la page campus  </a></span></td>
  </tr>
</table>


<br/>';
if($id==9){


echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';


	  
	  
if (isset($_GET['t']))
{
 $action=$_GET['t'];
 
 
  switch($action)
  {
    //Premier cas : texto
    case "article":
?>
<h2>AJOUTE INFORMATIONS</h2>
 

<form method="post" action="campusajtexpoinfo.php" name="formulaire"  enctype="multipart/form-data">
 
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
<textarea cols="70" rows="8" id="message" name="message"></textarea><br />
 





<?php

	
	echo '<i><font color="#ff0000"><small> Choisir images :</small></font></i><br />
	<input type="file" name="expoimg" id="cooltaf" size="30"   />
	<br /><small>(Taille max : 150Ko)<br /></small><br />
	<p><input type="submit" value="Envoyer" /></p></form>';
	
    break; 

	
  } //Fin du Switch
} //Fin if
 
 ?>



<?php 
$cooltaf_erreur3 ="";
$cooltaf_erreur2 ="";


$i = 0;
//Vérification de COOLTAF :
    if (!empty($_FILES['expoimg']['size']))
    {
        //On définit les variables :
        $maxsize = 1000024; //Poid de l'image
        $maxwidth = 1500; //Largeur de l'image
        $maxheight = 1500; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['expoimg']['error'] > 0)
        {
                $cooltaf_erreur = "Erreur lors du transfert de la photo de votre article: ";
        }
        if ($_FILES['expoimg']['size'] > $maxsize)
        {
                $i++;
                $cooltaf_erreur = "Le fichier est trop gros : (<strong>".$_FILES['expoimg']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['expoimg']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $cooltaf_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['expoimg']['name'], '.')  ,1));
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
	  
		
		$expocomment=htmlspecialchars($_POST['message']);
	    $temps = time();
		 $idexposant=$_SESSION['exposantid'];
		
        $query=$db->prepare('INSERT INTO campusexpo
        (groupe_id,letexte, temps)
        VALUES(:idexposant,:expocomment,:temps)');
		$query->bindValue(':idexposant', $idexposant, PDO::PARAM_INT);   
        $query->bindValue(':expocomment', $expocomment, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
		$lastid = $db->lastInsertId();
        $query->CloseCursor(); 
		
				
		
		echo 'INFORMATIONS AJOUTE';
		
		
     }
	 
	 
	 if (isset($_FILES['expoimg']))
     {
	  $articlephoto=(!empty($_FILES['expoimg']['size']))?expo_photo($_FILES['expoimg']):''; 
	    $temps = time();
		 
		
		 if( $articlephoto!=""){
		 
	 
	 $query=$db->prepare('UPDATE campusexpo SET
        img=:articlephoto WHERE id_expo=:lastid');
		$query->bindValue(':lastid', $lastid, PDO::PARAM_INT);
        $query->bindValue(':articlephoto', $articlephoto, PDO::PARAM_STR);  
        $query->execute();
        $query->CloseCursor(); 
		
		
		} else{ echo "La photo  n'a pas ete envoye, Ficher vide";
		
		}
		
     }
	 echo'<p><a href="./campus.php">Retour vers la page campus  </a></p>';
   }
   else
   {
        echo'<h1>Cool Tafs non envoyé</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$cooltaf_erreur.'</p>';
        
        echo'<p>'.$cooltaf_erreur2.'</p>';
        echo'<p>'.$cooltaf_erreur3.'</p>';
       
        echo'<p>Cliquez <a href="./campus.php?t=article">ici</a> pour recommencer</p>';
    }

	echo'</table>';
}
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


