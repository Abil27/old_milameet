<?php 
//On récupère texto

       $vide='';
       $query=$db->prepare('SELECT id_blog,blog_titre, blog_text, blog_image, blog_imgcomment, blog_time
	   FROM mm_blogs WHERE utilisateur_id=:id ' );
       $query->bindValue(':id',$id,PDO::PARAM_INT);
       $query->execute();
       	  
	  
	  
	  echo'<p><table  width="100%" height="10" align="left" cellspacing="1" border="0" cellpadding="0"  bgcolor="#FFFFFF"> ';
	  echo' <tr><td >&nbsp;</td></tr>';
	  $nomblreligne=1;
	  
	   while($data = $query->fetch())
       {
	   
	     
	     if (empty($data['blog_image'])) 
		  {
		  
		   echo' <tr><td background="images/tb.jpg" style="background-repeat:no-repeat">&nbsp;&nbsp;Titre: <span class="titreblog">'.stripslashes(htmlspecialchars($data['blog_titre'])).'
		   </span></td></tr>';
		   echo' <tr><td bgcolor="#FFFFFF">'.stripslashes(htmlspecialchars($data['blog_text'])).'</td></tr>';
		   echo' <tr><td bgcolor="#EDEBE7"><span class="titreblogtime">'.stripslashes
		   (htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>
		   &nbsp;&nbsp;&nbsp;<span class="titreblogmodisup">
		   <a href="loadblogdata.php?t=modifiermessage&u='.stripslashes
		   (htmlspecialchars($data['id_blog'])).'"> Modifier </a>
		   <a href="loadblogdata.php?t=supprimer&u='.stripslashes
		   (htmlspecialchars($data['id_blog'])).'">Supprimer </a> </span></td></tr>';
		   echo' <tr><td >&nbsp;</td></tr>';
		   
	       }
		   
		   
		   
		   
	     if (empty($data['blog_text']))
	       {
		    echo' <tr><td background="images/tb.jpg" style="background-repeat:no-repeat">
			&nbsp;&nbsp;Titre: <span class="titreblog">
			'.stripslashes(htmlspecialchars($data['blog_titre'])).'
		   </span></td></tr>';
		   echo' <tr><td bgcolor="#FFFFFF"><img src="../images/blogimgs/'.stripslashes
		   (htmlspecialchars($data['blog_image'])).'
		   " width="'.$lewblog.'"/>
		   </td></tr>';
		   echo' <tr><td bgcolor="#FFFFFF">'.stripslashes(htmlspecialchars
		   ($data['blog_imgcomment'])).'</td></tr>';
		   echo' <tr><td bgcolor="#EDEBE7"><span class="titreblogtime">'.stripslashes(htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>
		   &nbsp;&nbsp;&nbsp;<span class="titreblogmodisup">
		   <a href="loadblogdata.php?t=modifierblogimg&u='.stripslashes
		   (htmlspecialchars($data['id_blog'])).'"> Modifier </a>
		   <a href="loadblogdata.php?t=supprimer&amp;u='.stripslashes
		   (htmlspecialchars($data['id_blog'])).'">Supprimer </a> </span></td></tr>';
		   echo' <tr><td >&nbsp;</td></tr>';
		   
	       }
        $nomblreligne++;
	   }
        echo'</table>';
	    $query->CloseCursor();

?>
