<?php 
session_start();
$titre='Reglements';
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

echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';
	  


echo '<br/><h3>Les Reglements de <strong><em>Milameet</em></strong></h3>';
if ($id!=0) erreur(ERR_IS_CO);
?>

Bienvenus cher(e) utilisateur(trice).<br/>
En vous inscrivant sur le site,
vous vous engagé:<br/>
- à respecter les uns et
les autres<br/>
- à ne pas tenir des propos 
injurieux ou de nature
diffamatoir envers
les autres utilisateurs et à l'équipe d'administration du site<br/>
- à ne pas créer plusieurs
comptes<br/>
- à ne pas divulguer
vos informations privées (numéro de
de télephone, e-mail...) dans les lieux publics(tchat, forum, blog...)<br/>
<br/>
<table colums="1" cellspacing="0" border="0" cellpadding="3" >
 
  <tr> <td><a href="inscription.php"><i><u>J'ACCEPTE</u></i></a></td></tr>
  <tr><td><a href="index.php"><i><u>JE REFUSE</u></i></a></td></tr>
   
</table>


<?php  echo'</table>'; ?>     
       
       
       
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



