<?php 
session_start();
$titre='Forum milameet';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>


<?php // Si le membre n'est pas connect�, il est arriv� ici par erreur
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
include("accentdebase.php"); 
?>
    
<table width="750" border="0" align="left" > 
    <tr>
    
     <td width="150" valign="top"><?php  include("menuforum.php");?></td>
    
    <td width="1" valign="top"  style=" background-image:url(images/bvam.png); background-repeat:repeat-y ;">&nbsp;</td>
    
    <td width="100%" valign="top" align="left">
    <iframe src="fmm.php"     name="maine"   onload="iFrameHeight()"    id="blockrandom"
	width="100%"	height="2000"	scrolling="auto"	align="top"	frameborder="0" ></iframe> 
      </iframe>
      </td>
      
     <td width="1" valign="top"  style=" background-image:url(images/bvam.png); background-repeat:repeat-y ;">&nbsp;</td>
    
    <td  width="150" valign="top"><?php  include("menuaccueildroit.php");?></td>
    
  </tr>
</table>
<?php

$_SESSION['username'] = $_SESSION['pseudo'] ; 
?>

    
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
