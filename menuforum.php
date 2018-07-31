
<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<style type="text/css">
<!--
.style1 {
	color: #0066CC;
	font-style: italic;
}
-->
</style>

<?php 
 /* echo'<table width="195" border="0" cellspacing="0" cellpadding="5">';
echo'
  <tr>
    <td   bgcolor="#000000"  ><a href="campus.php" ><span style="font-size:16px; color:#FF0000; text-align:left; font-weight:bold">JOURNEE CULTURELLE DE L\'UNIVERSITE DE LOME 2012</span></a>
    </td>
     </tr></table>'; */

/* echo' <p><table  width="95%" height="10" align="center" cellspacing="0" border="0" cellpadding="2"  >
	
    ';
	  echo'<tr><td  background="images/argtmv.png" align="center"><span class="gtmv">Forum Milameet</span> <br/>   </td></tr>';
	  
	  echo'<tr><td bgcolor="#FFFFFF">  Bienvenue dans le Forum Mila meet.	  </td></tr></table>';
	  
 */?>



<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>

<?php

//Cette requête permet d'obtenir tout sur le forum
$query=$db->prepare('SELECT cat_id, cat_nom, 
forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id,  forum_topic.topic_post, post_id, post_time, post_createur, membre_pseudo, 
membre_id 
FROM forum_categorie
LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
LEFT JOIN forum_membres ON forum_membres.membre_id = forum_post.post_createur
WHERE auth_view <= :lvl 
ORDER BY cat_ordre, forum_ordre DESC');
$query->bindValue(':lvl',$lvl,PDO::PARAM_INT);
$query->execute();
?>

<table width="150" border="0" cellspacing="0" cellpadding="5" align="center"  class="bl3">
<?php
//Début de la boucle
while($data = $query->fetch())
{
    //On affiche chaque catégorie
    if( $categorie != $data['cat_id'] )
    {
        //Si c'est une nouvelle catégorie on l'affiche
       
        $categorie = $data['cat_id'];
        ?>
                
        <?php /* <tr   align="left"  bgcolor="#E00D01"  bgcolor="#222271">
       
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data['cat_nom'])); ?>
        </strong></th>     <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>  
        <th class="derniermessage"><strong>Dernier message</strong></th> 
        </tr>*/  ?>
        <?php
               
    }

    //Ici, on met le contenu de chaque catégorie
	// Ce super echo  affiche tous
    // les forums en détail : description, nombre de réponses etc...

  
		 
	 echo'<tr ><td  align="left"> 
		 <a href="./voirforum.php?f='.$data['forum_id'].'" target="maine">
		 <img src="images/forum.jpg" width="'.$icow.'" border="none"/></a>  </td>
		 <td  align="left">  
		 <a href="./voirforum.php?f='.$data['forum_id'].'" target="maine">
		'.stripslashes(htmlspecialchars($data['forum_name'])).'('.$data['forum_topic'].')</a>  </td>
		 </tr>';
	

     //Cette variable stock le nombre de messages, on la met à jour
     $totaldesmessages += $data['forum_post'];

     //On ferme notre boucle et nos balises
} //fin de la boucle
$query->CloseCursor();
echo '</table>';

    ?>

