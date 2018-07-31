<?php 
session_start();
$titre='Tchat milameet';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>

<?php include("imgentete.php"); ?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	 
if (isset($_GET['e']))
   {
   include("emoticones.php");
   }
   else
   {
   include("bb.php");
   }

?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br /></p>';
  
  
echo'
<p>
  <br/>&nbsp; <img src="images/disc.jpg" width="'.$icow.'"/><a href="tchat.php"> Tchat</a>
  <br/><img src="images/lg.jpg" width="'.$icow.'"/><a href="index.php"> Accueil</a>
  
  </p>
  
';

 include("queue.php"); ?>
