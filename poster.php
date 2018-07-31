<?php 
session_start();
$titre='Accueil';
$balises = true;
$messagelimite= true;
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

?>

<?php //Il faut être connecté pour poster !
if ($id==0) erreur(ERR_IS_CO);
?>






<?php
//Qu'est ce qu'on veut faire ? poster, répondre ou éditer ?
$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';


//Si on veut poster un nouveau topic, la variable f se trouve dans l'url,
//On récupère certaines valeurs
if (isset($_GET['f']))
{
    $forum = (int) $_GET['f'];
    $query= $db->prepare('SELECT forum_name, auth_view, auth_post, auth_topic, auth_annonce, auth_modo
    FROM forum_forum WHERE forum_id =:forum');
    $query->bindValue(':forum',$forum,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();
    
$brepondre='<br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/f.gif"/>Nouveau topic
  <br/>&nbsp;&nbsp;<img src="images/f.gif"/> <a href="./voirforum.php?f='.$forum.'">'.stripslashes(htmlspecialchars($data['forum_name'])).'</a>';
 
}
 
//Sinon c'est un nouveau message, on a la variable t et
//On récupère f grâce à une requête
elseif (isset($_GET['t']))
{
    $topic = (int) $_GET['t'];
    $query=$db->prepare('SELECT topic_titre, forum_topic.forum_id,
    forum_name, auth_view, auth_post, auth_topic, auth_annonce, auth_modo
    FROM forum_topic
    LEFT JOIN forum_forum ON forum_forum.forum_id = forum_topic.forum_id
    WHERE topic_id =:topic');
    $query->bindValue(':topic',$topic,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();
    $forum = $data['forum_id'];  

    $brepondre='<br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/f.gif"/>Répondre
  <br/>&nbsp;&nbsp;&nbsp;<img src="images/f.gif"/><a href="./voirtopic.php?t='.$topic.'"> '.stripslashes(htmlspecialchars($data['topic_titre'])).'</a>
  <br/>&nbsp;&nbsp;<img src="images/f.gif"/> <a href="./voirforum.php?f='.$forum.'">'.stripslashes(htmlspecialchars($data['forum_name'])).'</a>';
}
 
//Enfin sinon c'est au sujet de la modération(on verra plus tard en détail)
//On ne connait que le post, il faut chercher le reste
elseif (isset ($_GET['p']))
{
    $post = (int) $_GET['p'];
    $query=$db->prepare('SELECT post_createur, forum_post.topic_id, topic_titre, forum_topic.forum_id,
    forum_name, auth_view, auth_post, auth_topic, auth_annonce, auth_modo
    FROM forum_post
    LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
    LEFT JOIN forum_forum ON forum_forum.forum_id = forum_topic.forum_id
    WHERE forum_post.post_id =:post');
    $query->bindValue(':post',$post,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();

    $topic = $data['topic_id'];
    $forum = $data['forum_id'];
 
   
	
	$brepondre='<br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/f.gif"/>Répondre
  <br/>&nbsp;&nbsp;&nbsp;<img src="images/f.gif"/><a href="./voirtopic.php?t='.$topic.'"> '.stripslashes(htmlspecialchars($data['topic_titre'])).'</a>
  <br/>&nbsp;&nbsp;<img src="images/f.gif"/> <a href="./voirforum.php?f='.$forum.'">'.stripslashes(htmlspecialchars($data['forum_name'])).'</a>';
}
$query->CloseCursor();  
?>




<?php
switch($action)
{
case "repondre": //Premier cas on souhaite répondre
echo'<table width="100%" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="100%" valign="top"   >';
?>
<h3><span class="titretopic">Poster une réponse</span></h3>
 
<form method="post" action="postok.php?action=repondre&amp;t=<?php echo $topic ?>" name="formulaire">
 
Mise en forme<br/>
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' :rire: ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br/><br/>

 
Message<br/>
<textarea cols="55"  rows="5" onkeypress="compter(this.form)"  id="message" name="message"></textarea><br/><br/>
Nombre de caractères : <INPUT type="text" name="nbcar" size=3><br/>

 
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer"/>
</p></form>
<?php

echo'</tr></td></table>';
break;
 
case "nouveautopic":
echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';
?>
 
<h3><span class="titretopic">Nouveau thème</span></h3>
<form method="post" action="postok.php?action=nouveautopic&amp;f=<?php echo $forum ?>" name="formulaire">
 
Titre<br/>
<input type="text" size="80" id="titre" name="titre" /><br/><br/>
 
Mise en forme<br/>
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' :rire: ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br/><br/>
 
Message<br/>
<textarea cols="35"  rows="5" onkeypress="compter(this.form)" id="message" name="message"></textarea>
<label><input type="radio" name="mess" value="Annonce" />Annonce</label>
<label><input type="radio" name="mess" value="Message" checked="checked" />Topic</label><br/>
Nombre de caractères : <INPUT type="text" name="nbcar" size=3><br/>

<p>
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer" /></p>
</form>
<?php

echo'</tr></td></table>';

break;

//D'autres cas viendront s'ajouter ici par la suite

default: //Si jamais c'est aucun de ceux là c'est qu'il y a eu un problème :o
echo'<p>Cette action est impossible</p>';
} //Fin du switch
?>

<?php /*  ------------------------------------------------------------- */ ?>


<?php

 include("queue.php");
  ?>

