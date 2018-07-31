<?php 
session_start();
$titre='Voir un sujet';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

 //Il faut être connecté 
if ($id==0) erreur(ERR_IS_CO);

//On récupère la valeur de t
$topic = (int) $_GET['t'];
 
//A partir d'ici, on va compter le nombre de messages pour n'afficher que les 15 premiers
$query=$db->prepare('SELECT topic_titre, topic_post, forum_topic.forum_id, topic_last_post,
forum_name, auth_view, auth_topic, auth_post 
FROM forum_topic 
LEFT JOIN forum_forum ON forum_topic.forum_id = forum_forum.forum_id 
WHERE topic_id = :topic');
$query->bindValue(':topic',$topic,PDO::PARAM_INT);
$query->execute();
$data=$query->fetch();
$forum=$data['forum_id']; 
$totalDesMessages = $data['topic_post'] + 1;
$nombreDeMessagesParPage = 15;
$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);

 ?>
 
 




 
 <?php

echo '<h3>'.stripslashes(htmlspecialchars($data['topic_titre'])).'</h3>';
?>


<?php
$topicencour=stripslashes(htmlspecialchars($data['topic_titre']));
$forumencour=stripslashes(htmlspecialchars($data['forum_name']));
//Nombre de pages
$page = (isset($_GET['page']))?intval($_GET['page']):1;

//On affiche les pages 1-2-3 etc...
echo '<p>Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
    if ($i == $page) //On affiche pas la page actuelle en lien
    {
    echo $i;
    }
    else
    {
    echo '<a href="voirtopic.php?t='.$topic.'&page='.$i.'">
    ' . $i . '</a> ';
    }
}
echo'</p>';
 
$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;

 


$query->CloseCursor(); 
//Enfin on commence la boucle !
?>



<?php
$query=$db->prepare('SELECT post_id , post_createur , post_texte , post_time ,
membre_id, membre_pseudo, membre_inscrit, membre_avatar, membre_localisation, membre_post, membre_signature
FROM forum_post
LEFT JOIN forum_membres ON forum_membres.membre_id = forum_post.post_createur
WHERE topic_id =:topic
ORDER BY post_id
LIMIT :premier, :nombre');
$query->bindValue(':topic',$topic,PDO::PARAM_INT);
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nombreDeMessagesParPage,PDO::PARAM_INT);
$query->execute();
 
//On vérifie que la requête a bien retourné des messages
if ($query->rowCount()<1)
{
        echo'<p>Il n y a aucun post sur ce topic, vérifiez l url et reessayez</p>';
}
else
{
        //Si tout roule on affiche notre tableau puis on remplit avec une boucle
        ?><table  align="left"  width="100%" >
        <tr    align="left" bgcolor="#FFAEBA" >
        <th width="5" ><strong>Auteurs</strong></th>             
        <th  ></th>             
              
        </tr>
        <?php
        while ($data = $query->fetch())
        {



//On commence à afficher le pseudo du créateur du message :
         //On vérifie les droits du membre
         //(partie du code commentée plus tard)
         echo'<tr >
		 <td  bgcolor="#B1D0F5" ><strong>
         <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">
         '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></strong><br />';
           
            
   
         //AVATAR
         echo'<img src="../images/avatars/'.$data['membre_avatar'].'" alt=""  width="'.$lewidth.'"/></td>
		 
		
         <td  valign="top">
		  <table  align="left"  width="100%"  cellspacing="0" cellpadding="0" border="0">
		  
		  <tr > <td bgcolor="#FEDAE0"><p>'.code(nl2br(stripslashes(htmlspecialchars($data['post_texte'])))).'</td></tr></p>';
		  
         /* Si on est l'auteur du message, on affiche des liens pour
         Modérer celui-ci.
         Les modérateurs pourront aussi le faire, A revoir plus tard ! */  
         if ($id == $data['post_createur'])
         {
         echo'<tr ><td id=p_'.$data['post_id'].' bgcolor="#FBE2CA"  align="right"><span class="tchatTime">Posté à '.date('H\hi \l\e d M y',($data['post_time']- $_SESSION['gmt'])).' </span >
         <a href="./poster.php?p='.$data['post_id'].'&amp;action=delete">
         <img src="./images/supprimer.gif" alt="Supprimer"  border="none"
         title="Supprimer ce message" /></a>   
         <a href="./poster.php?p='.$data['post_id'].'&amp;action=edit">
         <img src="./images/editer.gif" alt="Editer"  border="none"
         title="Editer ce message" /></a></td></tr>';
         }
         else
         {
         echo'<tr ><td  bgcolor="#FBE2CA" align="right"><span class="tchatTime">
         Posté à '.date('H\hi \l\e d M y',($data['post_time']- $_SESSION['gmt'])).'</span >
         </td></tr>';
         }
       
         
          /* <br />Inscrit le '.date('d/m/Y',$data['membre_inscrit']).'
         <br />Msg : '.$data['membre_post'].'<br />
         '.stripslashes(htmlspecialchars($data['membre_localisation'])).' */  
		    
         //Message
         echo '<tr ><td  bgcolor="#FFFFFF">'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'
         </td></tr>
		 </table> </td></tr>';
         } //Fin de la boucle ! \o/
         $query->CloseCursor();

         ?>
</table>

<?php 
echo'<a href="./poster.php?action=repondre&amp;t='.$topic.'">
<span class="formtitle">Répondre</span></a>';
 
?>

<?php
        echo '<p>Page : ';
        for ($i = 1 ; $i <= $nombreDePages ; $i++)
        {
                if ($i == $page) //On affiche pas la page actuelle en lien
                {
                echo $i;
                }
                else
                {
                echo '<a href="voirtopic.php?t='.$topic.'&amp;page='.$i.'">
                ' . $i . '</a> ';
                }
        }
        echo'</p>';
       
        //On ajoute 1 au nombre de visites de ce topic
        $query=$db->prepare('UPDATE forum_topic
        SET topic_vu = topic_vu + 1 WHERE topic_id = :topic');
        $query->bindValue(':topic',$topic,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();

} //Fin du if qui vérifiait si le topic contenait au moins un message
?>           


<?php /*  ------------------------------------------------------------- */ ?>


<?php


 include("queue.php");
  ?>
