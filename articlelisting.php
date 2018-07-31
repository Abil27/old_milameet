<table width="750" border="0" cellspacing="0" cellpadding="5">
  <tr>
    
    <td   align="right"  bgcolor="#FDFECF" background="images/artsupm.jpg"><span style="font-size:12px; color:#FF0000;  "><a href="./supermarche.php">Retour vers Supermarche  </a></span></td>
    
  </tr>
</table>



 



  <?php 
  

$TotalDesMembres = $db->query('SELECT COUNT(*) FROM supermarche')->fetchColumn();

$lien='<a href="supermarche.php?p=';
$totalmsg=$TotalDesMembres; 
include("affnpage.php");
  ?>

<?php 

/* include("ajoutesupermarche.php"); */

$query=$db->prepare('SELECT utilisateur_id, articlecomment, photoarticle, temps,Ma.membre_pseudo AS lepseudo, Ma.sexe AS lesexe
        FROM supermarche 
		LEFT JOIN forum_membres Ma ON Ma.membre_id =supermarche.utilisateur_id
        ORDER BY utilisateur_id LIMIT :premier, :nombre');
		
		$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
        $query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);  
        $query->execute();
        
echo'<table width="100%" border="0" cellspacing="0" cellpadding="6">';
$comptl=0;		
while($data=$query->fetch())
{
/* $comptl++;
if($comptl==1)
{ echo ' <tr>'; } */
 
  ?>
  

  <tr>
    <td valign="top" width="200"><?php include("unoariticlo.php"); ?></td>
    
    
    <td valign="top" width="200"><?php if ($data=$query->fetch()){  include("unoariticlo.php");}  ?></td>
    
    
    <td valign="top" width="200"><?php if ($data=$query->fetch()){  include("unoariticlo.php");}  ?></td>
  </tr>



<?php 


}
echo'</table>';
$query->CloseCursor();
?> <td  bgcolor="#FFFFFF" bgcolor="#000000" style=" background-image:url(images/arsuputili.jpg); background-repeat:no-repeat" >
