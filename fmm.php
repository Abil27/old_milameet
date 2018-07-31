<?php 
session_start();
$titre='Forum milameet';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>


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
<h2> Forum <span class="style1">milameet</span></h2>

<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>

<?php

//Cette requête permet d'obtenir tout sur le forum
$query=$db->prepare('SELECT cat_id, cat_nom, 
forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id,  forum_topic.topic_post, post_id, post_time, post_createur, membre_pseudo, 
membre_id, sexe
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


<table width="100%" >
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
        <tr   align="left" bgcolor="#67C0DA">
       
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data['cat_nom'])); ?>
        </strong></th>             
        <?php /* <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>  
        <th class="derniermessage"><strong>Dernier message</strong></th> */  ?>
        </tr>
        <?php
               
    }

    //Ici, on met le contenu de chaque catégorie
	// Ce super echo  affiche tous
    // les forums en détail : description, nombre de réponses etc...

    echo'<tr bgcolor="#B1D0F5">
	
    <td class="titre2"><strong>
    <a href="./voirforum.php?f='.$data['forum_id'].'">
    '.stripslashes(htmlspecialchars($data['forum_name'])).'</a></strong>('.$data['forum_topic'].')
    </td></tr>
	<tr ><td background="images/arf2.jpg" ><span class="tchatPseudo">'.nl2br(stripslashes(htmlspecialchars($data['forum_desc']))).'</span> <br />';
    /* <td class="nombresujets">'.$data['forum_topic'].'</td>
    <td class="nombremessages">'.$data['forum_post'].'</td> */


    // Deux cas possibles :
    // Soit il y a un nouveau message, soit le forum est vide
    if (!empty($data['forum_post']))
    {
         //Selection dernier message
	 $nombreDeMessagesParPage = 15;
         $nbr_post = $data['topic_post'] +1;
	 $page = ceil($nbr_post / $nombreDeMessagesParPage);
		 
         echo'
         '.date('H\hi \l\e d/M/Y',($data['post_time']- $_SESSION['gmt'])).'<br />&nbsp;
		  <a href="./profil.php?m='.stripslashes(htmlspecialchars($data['membre_id'])).'&amp;action=consulter">';
		  echo (strtolower($data['sexe'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
		  echo $data['membre_pseudo'].' </span> </a>
         &nbsp;&nbsp;<a href="./voirtopic.php?t='.$data['topic_id'].'&amp;page='.$page.'#p_'.$data['post_id'].'">
         <span class="formtitle">Lire</span></a>
		 <br/><img src="./images/sept.jpg"/></td></tr>';

     }
     else
     {
         echo'Pas de message';
		 echo'<br/><img src="./images/sept.jpg"/></td></tr>';
		 
     }


     //Cette variable stock le nombre de messages, on la met à jour
     $totaldesmessages += $data['forum_post'];

     //On ferme notre boucle et nos balises
} //fin de la boucle
$query->CloseCursor();
echo '</table>';

    ?>

