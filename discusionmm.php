<?php 
session_start();
$titre='Tchat milameet';
$balises = true;
include("identifiants.php");
include("hautdepage3.php");

?>

<?php 
$lewidth=50;
 $icow=30;
 ?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>



<?php /*  ------------------------------------------------------------- */ ?>


<?php 
	
 	 echo'<center><a href="discusionmm.php" alt="Rafraichir">Rafraichir</a></center><br />';
	  
	  echo'<span class="nomutili">Tchat</span> <br/> ';
	  
	echo'
  <p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >';
     echo'<tr><td><img src="./images/sept.jpg"/></td></tr>';
  	  include("tchatforme.php");
	  echo'<tr><td>&nbsp</td></tr>';
   echo'</table> <br /></p>';  
	  include("tchatsaisizone.php");
	  
 echo'<center><a href="discusionmm.php" alt="Rafraichir">Rafraichir</a></center><br />';	  

	  
		  
?>


</body>
</html>