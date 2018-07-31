<?php 
session_start();
$titre='Accueil';
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu2.php");
$lewidthb=250;

// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>


<?php 
$typeth="blog";
if (isset($_GET['ii']))
  {
  $query=$db->prepare('SELECT membre_id FROM forum_membres ');
  $query->execute();

 //Début de la boucle
  $idtemp=0;
    while($data = $query->fetch())
    {
	if($_GET['ii'] ==  md5($data['membre_id'].'blog'))
	 {
      $idtemp=stripslashes(htmlspecialchars($data['membre_id']));
	 }
	 
    } 
  
   $query->CloseCursor();

    
  }


if ($idtemp >0)
{
/* on recupert  tous les donnees */
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
        description, sexe, membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:idtemp');
       $query->bindValue(':idtemp',$idtemp, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();


/* msg de bienvenus */
     echo'<p><table  width="100%" height="10"  cellspacing="0" border="0" cellpadding="0" >
     <tr ><td>&nbsp;</td></tr>';
     echo'<tr  bgcolor="#D9DCFB"><td width="2" ><img src="../images/avatars/'
	 .$data[  'membre_avatar'].'"
       alt="Ce membre n a pas d avatar" width="'.$lewidth.'"/></td>';
  	  
	  echo'<td >&nbsp;&nbsp;<span class="nomutili">'
	  .$data['membre_pseudo'].'</span><br />&nbsp;&nbsp;Bienvenus dans mon Blog  
	   <br/></td></tr>';
     echo'</table> <br /></p>';  
    $query->CloseCursor(); 
	
	 
      
    include("allaffblogdata.php");   
   
} /* fin if */   
   
?>

 
<?php /*  ------------------------------------------------------------- */ ?>


<?php

 include("queue.php"); ?>
