<?php
	 
	/*  echo '<table width="100%" colums="1" cellspacing="0" border="0" cellpadding="10"       width="176" >
    <tr>
    <td >'; */

       
	    $_SESSION['pseudo'] = $data['membre_pseudo'];
	    $_SESSION['level'] = $data['membre_rang'];
	    $_SESSION['id'] = $data['membre_id'];
		$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
		
		$_SESSION['nbrposte'] = time() ;
		$_SESSION['nbrnigthposte'] = time() ;
		$_SESSION['enligne'] = "oui";
		$_SESSION['suppmsg'] = "non";
		$_SESSION['fenetremaine'] = "accueil";
		$_SESSION['totalc'] = $data['credit'];
		 $_SESSION['exposantid'] =1;
		
		 /* $_SESSION['pmoov']='<tr><td  align="left" bgcolor="#DBF3FB" ><a href="www.moov.tg" ><img src="pub/3.gif" alt="moov" width="100%"/></a> </td></tr>';
         $_SESSION['ptogocell']='<tr><td  align="left" bgcolor="#DBF3FB" ><a href="www.togocell.tg" ><img src="pub/k24.gif" alt="moov" width="100%"/></a> </td></tr>'; */
		 
		$_SESSION['pmoov']='<img src="pub/dinainfoweb.gif" alt="dina infomobile" width="100%"/>';
        $_SESSION['ptogocell']='<img src="pub/egomweb.gif" alt="egom" width="100%"/>';
		$_SESSION['publicite3']='<img src="pub/publicite3.gif" alt="egom" width="100%"/>';
		
		$ta = time() ;
		if (date('d',($data['lo_date']- $_SESSION['gmt']))!=date('d',($ta - $_SESSION['gmt']))){
		$_SESSION['totalc'] = $_SESSION['totalc'] + $_SESSION['cre_preconnectj'];
		}
		$totalcredit=$_SESSION['totalc'];
		
		/* Mise a jour de la visibilite */
		$enlign="oui";
		$temps= time();
		$query=$db->prepare('UPDATE forum_membres
		SET membre_enligne = :enlign, lo_date=:temps, credit=:totalcredit
		WHERE membre_id = :id');
		$query->bindValue(':enlign',$enlign,PDO::PARAM_STR);
		$query->bindValue(':temps',$temps,PDO::PARAM_INT);
		$query->bindValue(':totalcredit',$totalcredit,PDO::PARAM_INT);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
	include("debuindex.php");	
 
 $query=$db->prepare('UPDATE mm_contact
		SET en_ligne = :enlign
		WHERE contact_id = :id');
		$query->bindValue(':enlign',$enlign,PDO::PARAM_STR);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		
	    $message = '<p><font color="white">Bienvenue <strong><span class="nomutili">'.$data['membre_pseudo'].'</span></strong>, 
			vous &ecirc;tes maintenant connect&eacute;!<br/>
			<a href="./index.php" style="color:red" >Cliquez ici</a> 
			pour revenir &agrave; la page d\'accueil </font></p>
			
			';
			
/* echo $message; *//* .'</div></body></html>' </td ></tr>
            </table>*/	

 include("mainepage.php");
   
    echo'<td width="200" valign="top" bgcolor="#E3EEFB">
	
      <iframe src="pub.php" name="cpub" width="200" marginwidth="2" height="500" marginheight="2"      align="left" scrolling="no" frameborder="0"></iframe>
     ';
   
   
  /*  echo '</td></tr>
     </table>'; */

?>
