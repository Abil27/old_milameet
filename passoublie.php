<?php 
session_start();
$titre='Récupération de passe';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>



<?php

if ($id!=0) erreur(ERR_IS_CO);

?>

<table width="950" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td valign="0" >&nbsp;  </td>
  
    <td valign="0" width="950" >
    <?php include("menuzero.php");?>
    
    </td>
  
    <td valign="0" >&nbsp;   </td>
  </tr>
</table>
  
<table width="950" border="0" cellspacing="0" cellpadding="0"  class="tableprincipale">  
  <tr>
    <td valign="0">
    <?php 
	include("imgentete.php");
	include("comptnewmsg.php");
	
	
	  //On récupère les infos du membre
       $membre=$id;
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email,  membre_signature,  membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	   $pseudo=$data['membre_pseudo'];
	   $query->CloseCursor();
	   
	   
	  if ($data['membre_pseudo']=='ina3')
	  {
	   /* mail("clement_d@hotmail.com","Petit bonjour","Bonjour et vive le php","From: clementbianca9000@hotmail.com\nReply-To: clementbianca9000@hotmail.com"); */
	   $adresse="clementbianca9000@hotmail.com";
	   $titre="yoooo";
	   $message="je t aime beaucoup";
	   mail($adresse,$titre,$message);


}
	?>
    
    </td>
  </tr>
  <tr>
    <td>
    
     <table width="950" border="0" cellspacing="1" cellpadding="0">
      <tr>
          
     <td valign="top" width="750">
     
      <iframe src="recuppass.php" name="maine" width="750" marginwidth="2" height="500" marginheight="2"       align="left"  frameborder="0" ></iframe>
      </td>
      
      <td width="200" valign="top">
       <!--<div align="center" class="liensup"> <a href="supermarche.php">SUPERMARCHE</a></div><br/> -->
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