<?php 
session_start();
$titre='SUPERMARCHE';
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
    <td bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:20px; color:#FF0000; text-align:left; font-weight:bold">SUPERMARCHE</span></td>
	<td   align="right"  bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:12px; color:#FF0000;  "><a href="./supermarche.php">Retour vers Supermarche  </a></span></td>
  </tr>
</table>


<br/>';
include("profilsupm.php");
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


