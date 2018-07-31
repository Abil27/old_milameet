<?php 
session_start();
$titre='Tchat milameet';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

//Il faut être connecté 
if ($id==0) erreur(ERR_IS_CO);

?>

<?php include("imgentete.php"); ?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	
 	  echo'<center><a href="discusionmm.php" alt="Rafraichir">Rafraichir</a></center><br />';
	  
	  echo'<span class="nomutili">Tchat</span> <br/> ';
	  
	echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >';
     echo'<tr><td><img src="./images/sept.jpg"/></tr></td>';
  	  include("tchatforme.php");
	  echo'<tr><td>&nbsp</td></tr>';
   echo'</table> <br /></p>';  
	  include("tchatsaisizone.php");
	  
	  
echo'<center><a href="discusionmm.php" alt="Rafraichir">Rafraichir</a></center><br />';
	  
		  
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
  <tr><td>&nbsp;</td></tr>
  </table> <br /></p>';
  
  
echo'
<p>
  <br/>--<img src="images/f.gif"/> Tchat</a>Discussion
 <br/>&nbsp; <img src="images/disc.jpg" width="'.$icow.'"/><a href="tchat.php"> Tchat</a>
  <br/><img src="images/lg.jpg" width="'.$icow.'"/><a href="index.php"> Accueil</a>
    
  </p>
  
';

 include("queue.php"); ?>
