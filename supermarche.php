<?php 
session_start();
$titre='supermarche';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>


<table width="950" border="0" cellspacing="0"  style="padding: 3px 0px 0px 0px ">
  
  <tr>
    <td valign="0">
    <?php include("menuzero.php");?>
    
    </td>
  </tr>
</table>
  
<table width="950" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">  
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
      
      <td width="750" valign="top"  align="center" >
      <?php
      include("accdebut.php");
      include("accentdebasesupm.php"); 
      ?>
      
       <?php
	  include("articlelisting.php");
		  ?>
      </td>
     

   
<td width="200" valign="top" bgcolor="#E3EEFB">&nbsp;
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

