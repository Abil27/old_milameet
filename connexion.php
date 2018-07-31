


<?php
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
	echo '<form method="post" action="index.php?mb=non" >
	
	
	<p>
    <span class="txtconnexion">Nom d\'utilisateur </span><br />
	<input name="pseudo" type="text" id="pseudo" /><br />
    <span class="txtconnexion">Mot de Passe :</span><br />
	<input type="password" name="password" id="password" />
	</p>
	
	<p><input type="submit" value="Connexion" /></p></form>
	
	</p>';
	 
	
	/*<a href="passoublie.php"> <font color="red"><small>Passe Oublié ? </small></font></a>
	affichare inscription inscription */
	echo ' </td > </tr>
    </table>
 
     
  <table colums="1"  width="100%" cellspacing="0" border="0" cellpadding="10"   width="176">
  <tr>
  <td>Devenir un membre de <i>milameet?</i>
  <br/><a href="reglement.php"> <span class="ins">Inscription</span></a>
  <br/>
  <i><font color="#ff0000"><small>C \'est 100% gratuit</small></font></i>
  </td>
  </tr>
  <tr>  <td>&nbsp;</td>  </tr>
</table>

  ';
  
  /* FIN AFFICHAGE INSCRIPTION */
  
}

else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p><font color="#ff0000">une erreur s\'est produite pendant votre identification.<br/>
	Vous devez remplir tous les champs</font><br/>
	Cliquez <a href="./index.php">ici</a> pour revenir</p>
	
	</td ></tr>
    </table>';
	
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo
        FROM forum_membres WHERE membre_pseudo = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
		$query->CloseCursor();
		
	if ($data['membre_mdp'] == md5($_POST['password'])) // Acces OK !
	{
	    $_SESSION['pseudo'] = $data['membre_pseudo'];
	    $_SESSION['level'] = $data['membre_rang'];
	    $_SESSION['id'] = $data['membre_id'];
		$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
		
		$_SESSION['nbrposte'] = time() ;
		$_SESSION['nbrnigthposte'] = time() ;
		$_SESSION['enligne'] = "oui";
		$_SESSION['suppmsg'] = "non";
		$_SESSION['fenetremaine'] = "accueil";
		
		 /* $_SESSION['pmoov']='<tr><td  align="left" bgcolor="#DBF3FB" ><a href="www.moov.tg" ><img src="pub/3.gif" alt="moov" width="100%"/></a> </td></tr>';
         $_SESSION['ptogocell']='<tr><td  align="left" bgcolor="#DBF3FB" ><a href="www.togocell.tg" ><img src="pub/k24.gif" alt="moov" width="100%"/></a> </td></tr>'; */
		 
		$_SESSION['pmoov']='<img src="pub/dinainfoweb.gif" alt="dina infomobile" width="100%"/>';
        $_SESSION['ptogocell']='<img src="pub/egomweb.gif" alt="egom" width="100%"/>';
		
		/* Mise a jour de la visibilite */
		$enlign="oui";
		$temps= time();
		$query=$db->prepare('UPDATE forum_membres
		SET membre_enligne = :enlign, lo_date=:temps
		WHERE membre_id = :id');
		$query->bindValue(':enlign',$enlign,PDO::PARAM_STR);
		$query->bindValue(':temps',$temps,PDO::PARAM_INT);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		
/*  header('Location: index.php'); */
	    $message = '<p><font color="white">Bienvenue <strong><span class="nomutili">'.$data['membre_pseudo'].'</span></strong>, 
			vous &ecirc;tes maintenant connect&eacute;!<br/>
			<a href="./index.php" style="color:red" >Cliquez ici</a> 
			pour revenir &agrave; la page d\'accueil </font></p>
			
			</td ></tr>
            </table>';
			
	}
	else // Acces pas OK !
	{
	
	
	    $message = '<p><font color="#blue">Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le nom d\'utilisateur  
            entré n\'est pas correcte.</p><p>
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d\'accueil</font></p>    
		
		</td ></tr>
        </table>';
		
	}
    
    }
    echo $message;/* .'</div></body></html>' */
}
?>