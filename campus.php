<?php 
session_start();
$titre='CAMPUS';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>


<table width="950" border="0" cellspacing="0" cellpadding="0"  class="tableprincipale">
  <tr>
    <td valign="0" >
    <?php include("menuzero.php");?>
    
    </td>
  </tr>
  
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

	?>
    
    </td>
  </tr>
  <tr>
    <td>
    
     <table width="950" border="0" cellspacing="1" cellpadding="0">
      <tr>
      
     <td width="200" valign="top"  align="center" background="images/armv.jpg">
      
      
       <?php
	  include("menucampus.php");
		  ?>
      </td>
     
     <td valign="top">
     
      <iframe src="<?php 
	  if (isset ($_GET['u'])){
	   $u=$_GET['u'];
	   $uu=substr($u,0,10);
	   if($uu=="allblogs.php" OR $uu="ttcontact.ph"){
	   echo $_GET['u'];
	   }
		
	   
	  }
	  else{
	  echo'maincampus.php';
	  }
	  ?>" name="maine" width="550" marginwidth="2" height="1100" marginheight="2"       align="left" scrolling="yes" frameborder="0" ></iframe>
      </td>
      
     

   
<td width="200" valign="top" bgcolor="#E3EEFB">
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
