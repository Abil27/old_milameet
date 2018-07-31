

<form method="post" action="discusionmm.php?ac=nm"  name="formulaire">
 

<input type="button" id="gras" name="gras" value="G" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
<input type="button" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
<input type="button" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
<br />
<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(' :D ');return(false)" />
<img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(' :lol: ');return(false)" />
<img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(' :triste: ');return(false)" />
<img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(' :frime: ');return(false)" />
<img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies(' :rire: ');return(false)" />
<img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(' :s ');return(false)" />
<img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(' :o ');return(false)" />
<img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(' :interrogation: ');return(false)" />
<img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(' :exclamation: ');return(false)" /><br />
 
<label>Message</label><br />
<textarea name="message"    cols="40" rows="8" id="message"></textarea>
<input name="lastmsg" type="hidden" value="<?php echo $_SESSION['nbrposte']; ?>" />
<p>
<input type="submit" name="submit" value="Envoyer" />
<input type="reset" name = "Effacer" value = "Effacer" /></p>

</form>


