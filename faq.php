<?php 
session_start();
$titre='Aide et FAQ';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php /*  ------------------------------------------------------------- */ ?>


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
       <?php include("afffaq.php");?>
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


