<?php 
session_start();
$titre='Envoyer un mp';
$balises = true;
$messagelimite= true;
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>



<?php
//Qu'est ce qu'on veut faire ? poster, répondre ou éditer ?
$action = (int) $_GET['ac'];
$idcontact = (int) $_GET['ic'];

?>

<?php 
$query=$db->prepare('SELECT membre_pseudo,membre_avatar
FROM forum_membres WHERE membre_id =:idcontact');
$query->bindValue(':idcontact',$idcontact, PDO::PARAM_INT);
$query->execute();
$data = $query->fetch();
$nomcontact=$data['membre_pseudo'];
$avatar_contact=$data['membre_avatar'];
$query->CloseCursor();
?>

<?php 
echo'Erire à <span class="nomutili">'.$nomcontact.'</span><br/>&nbsp;';
?>

<?php
switch($action)
{

case "nouveaumsg":

echo'<table width="700" border="0" cellspacing="0" cellpadding="15">
      <tr><td width="750" valign="top" align="left"  >';
?>
 

<form method="post" action="msgevoyerok.php?action=nm"  name="formulaire" >
 
Titre <br/>
<input type="text" size="70" id="titre" name="titre"   /> <br/>
 
<legend>Mise en forme</legend><br/>
<input type="button" id="gras" name="gras" value="G" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
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
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" />
 <br/>
 
 
Message <br/>
<textarea cols="55" rows="5" id="message" name="message" onkeypress="compter(this.form)"> </textarea> <br/><br/>
Max caractères : <INPUT type="text" name="nbcar" size=3><br/>


<input name="iddestinataire" type="hidden" value="<?php echo $idcontact ; ?>" />
<p>
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer" /></p>

</form>
<?php

echo'</tr></td></table>';
/*  */
break;
 
//D'autres cas viendront s'ajouter ici par la suite

default: //Si jamais c'est aucun de ceux là c'est qu'il y a eu un problème :o
echo'<p>Cette action est impossible</p>';
} //Fin du switch
?>


<?php /*  ------------------------------------------------------------- */ ?>


<?php

 include("queue.php");
 
 /* <a href= "#"  onclick="window.open('http://www.google.com'); " >kk</a> */
  ?>
