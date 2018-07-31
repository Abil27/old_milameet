<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");


// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>


<?php 
/* on recupert  tous les donnees */
$query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email, description, membre_signature, sexe, membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:id');
       $query->bindValue(':id',$id, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();

?>


<?php 
/* msg de bienvenus */
echo'<p><table  width="100%" height="10" align="left" cellspacing="0" border="0" cellpadding="0" >
     <tr ><td>&nbsp;</td></tr>';
     echo'<tr align="left" bgcolor="#D9DCFB"><td width="2" ><img src="../images/avatars/'.$data['membre_avatar'].'"
       alt="Ce membre n a pas d avatar" width="'.$lewidth.'"/></td>';
  	  
	  echo'<td >&nbsp;&nbsp;Bienvenus sur votre Blog <span class="nomutili">'.$data['membre_pseudo'].'
	  </span> <br/></td></tr>';
   echo'</table> <br /></p>';  
 $query->CloseCursor();  
  
include("affblogdata.php");   
   
?>

<?php 

if ($nomblreligne<=5)/* si nombre de ligne depasse 5 on insert plus rien */
{

}
echo' <a href="loadblogdata.php?t=message"> Inserer un message </a> <br />';
echo'<a href="loadblogdata.php?t=blogimg"> Inserer une Image ou une Photo </a> ';
?>


 
<?php /*  ------------------------------------------------------------- */ ?>

 
<?php
 include("queue.php"); ?>
