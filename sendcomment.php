
<?php 
if(isset($_GET['cmt'])){

$coid=$_GET['cid'];

$query=$db->prepare('SELECT cid, id_commenter, bcomment, btime,Mb.membre_pseudo AS tpseudo,
        Mb.sexe AS tsexe, Mb.membre_avatar AS tavatar
        FROM mm_blogcomments 
		LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_blogcomments.id_commenter
		WHERE cid=:coid ');
		$query->bindValue(':coid', $coid, PDO::PARAM_STR);    
		$query->execute();
		
		echo' <table width="100%" cellspacing="2" cellpadding="2" align="left" >
        <tr><td width="20">&nbsp;</td><td width="100%"  >&nbsp;</td></tr>';
		 
		while($data = $query->fetch())
  		{ 
			  
         echo' <tr><td width="20" align="center" valign="top" >
		 <img src="../images/avatars/' .$data['tavatar'].'" alt="Ce membre n a pas d avatar" 
		 width="'.$lewidth.'"/><br/>
		 <span class="nomutili">'.$data['tpseudo'].'</span>
		 </td>
		 <td width="20" align="center"  bgcolor="#FBF3EE" valign="top"><span class="bcomments">'.code(nl2br(stripslashes(htmlspecialchars($data['bcomment'])))).'</span><br /><br/>
		 <span class="titreblogtime">'.stripslashes(htmlspecialchars(date('H\hi \l\e d M y',$data['btime']))).'</span>
		 </td>
		 </tr>';
    
		}
		echo'</table>';
		
        $query->CloseCursor(); 
		 

}
else
{
?>
<div align="left" style="width:100%">


<form method="post" action="trcomment.php" name="formulaire" >
 
<legend>Mise en forme</legend ><br />
<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br /><br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' XD ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br />

 
<legend>Entrer votre commentaire</legend><br />
<textarea cols="40" rows="8" id="message" name="message"></textarea><br />
 <input name="idblogowner" type="hidden" value="<?php echo $idtemp;?>" />
  <input name="letemps" type="hidden" value="<?php echo $blogtime;?>" />
  <input name="idblog" type="hidden" value="<?php echo $idblog;?>" />
  <input name="typeth" type="hidden" value="<?php echo $typeth;?>" />
<input type="submit" name="submit" value="Envoyer" />

</form>
</div>
<?php }?>