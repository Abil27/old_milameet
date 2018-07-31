<?php include("debuindex.php");
 echo'<td width="950" valign="top">';
echo $msgaccueil2.' <br/>';?>
<table width="950" border="0" cellspacing="0" cellpadding="0" vspace="0">
  <tr>
   <td valign="top">
   
    <table width="350" border="0" cellspacing="0" cellpadding="0" vspace="0">
    <tr>
     <td></td>
    </tr>
    <tr>
     <td><img src="images/iac.jpg"></td>
    </tr>
    <tr>
     <td align="center"><p><span  style="font-size:20px; color:#4EB6ED">milameet.com </span>
       </p>
       <p>de loin le site qui nous rapproche</p></td>
    </tr>
    </table>
    
   </td>

   <td valign="top">
   
    <table width="300" border="0" cellspacing="5" cellpadding="5">
    <tr>
     <td bgcolor="#F3F7FE">Inscris-toi dès maintenant, crée ton propre réseau d’amis en invitant les amis à s’inscrire, crée ton blog personel, fais des Upload de tes photos et vidéos et gagne de l’argent en faisont du business grâce au supermarché en ligne.</td>
    </tr>
    <tr>
     <td bgcolor="#F3F7FE">Télécharge des milliers de fonds d’écran pour ton ordinateur et ton téléphones mobile…</td>
    </tr>
    <tr>
     <td><br/>
     Devenir un membre de <i>milameet?</i>
  <br/>
  <a href="reglement.php"> <span class="ins">Oui je m'inscris</span></a>
  <br/>
  <i><font color="#ff0000"><small>C 'est 100% gratuit</small></font></i>
  </td>
    </tr>
    </table>
    
   </td>
   
   <td valign="top">
   
    <table width="250" border="0" cellspacing="1" cellpadding="5">
    <tr>
     <td><strong>Connecte toi!</strong></td>
    </tr>
    
    <tr>
     <td>
     <?php
	 
	
	 echo '<table width="100%" colums="1" cellspacing="0" border="0" cellpadding="0"        bgcolor="#C8D7F9">
	 <tr>
     <td bgcolor="#FFFFFF"><img src="images/argtmv.png" width="100%"/></td>
    </tr>
	 </td > </tr>
    </table>  ';
 
	 echo '<table width="100%" colums="1" cellspacing="1" border="0" cellpadding="5"        bgcolor="#C8D7F9">
	
    <tr>
    <td bgcolor="#FFFFFF">';

	
	    $message = '<p><font color="red">Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le nom d\'utilisateur  
            entré n\'est pas correcte.</p><p>
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d\'accueil</font></p> 
		   
		<br /> <a href="passoublie.php"> <font color="red"><small>Passe Oublié ? </small></font></a>
		</td ></tr>
        </table>';
		
		
		
	echo $message;/* .'</div></body></html>' */
?>
</td>
    </tr>
    <tr>
      <td>
       <table width="250" border="0" cellspacing="1" cellpadding="5" bgcolor="#FDEBEA">
         <tr >
          <td bgcolor="#FFFFFF"><img src="images/p.jpg" /></td>
          <td align="center"><strong>Milameet avec toi partout !</strong><br /> Reste connecté où que tu sois, à n’importe quelle heure grâce à milameet mobile en tapant
            <strong>http://milameet.com</strong> dans le navigateur de ton mobile.</td>
         </tr>
        </table>
     </td>
    </tr>
    </table>
    
   </td>
   
  </tr>
</table>
