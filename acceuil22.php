

<?php
include("accdebut.php");
include("accentdebase.php"); 
?>
    
<table width="750" border="0" align="left" > 
    <tr>
    
     <td width="150" valign="top"><?php  include("menuacceuil.php");?></td>
    
    <td width="1" valign="top"  style=" background-image:url(images/bvam.png); background-repeat:repeat-y ;">&nbsp;</td>
    <td width="400" valign="top">
    <?php /* include("accfmmpart.php"); */ ?>
     <iframe src="accfmmpart.php" name="maine"  onload="iFrameHeight()"    id="blockrandom"
	width="100%"	height="1200"	scrolling="auto"	align="top"	frameborder="0" ></iframe>
    </td>
     <td width="1" valign="top"  style=" background-image:url(images/bvam.png); background-repeat:repeat-y ;">&nbsp;</td>
    
    <td  width="150" valign="top"><?php  include("menuaccueildroit.php");?></td>
    
  </tr>
</table>
<?php

$_SESSION['username'] = $_SESSION['pseudo'] ; // Must be already set
?>




