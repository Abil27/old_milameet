<?php 

if (isset($_POST['idthemetocomment']) OR isset($_GET['idthemetocomment'])){
    if (isset($_POST['typeth']) OR isset($_GET['typeth'])){
	  if (isset($_POST['typeth']) ){
	  $typet=$_POST['typeth'];
	  }
	  else
	  {
	  $typet=$_GET['typeth'];
	  }
	  
	 switch($typet)
      {
       case "texto":
	   $vide="";
	   $query=$db->prepare('SELECT 
        utilisateur_id, id_cool,texto,cool_time
		FROM mm_textocooltaf WHERE utilisateur_id=:idtemp AND  cooltafs=:vide
		 ORDER BY id_cool DESC LIMIT 0,1');
		$query->bindValue(':idtemp',$idtemp,PDO::PARAM_INT);
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		$data = $query->fetch();
		$query->CloseCursor();
		
	   $texto=$data['texto'];
       $idcooltaf=$data['id_cool'];
	   $cooltime=$data['cool_time'];
   
       echo' <table width="100%" cellspacing="0" cellpadding="2"  >
   
         <tr><td width="275">&nbsp;</td>     </tr>';
	    
         echo' <tr><td width="275"><span class="textotitre">&nbsp;&nbsp;Flashy</span><br/>
		 </td></tr>';
        echo'<tr> <td height="30"  bgcolor="#FEF4EB" class="texto" align="center">&nbsp;'.code(nl2br(stripslashes(htmlspecialchars($texto)))).'
		</td></tr></table>';
		
		echo'<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$idcooltaf.'" />
		  <input name="typeth" type="hidden" value="texto" />
	      <input type="submit" value="Commenter" /></form>';
		
		break;
		
		case "cooltof":
		 $vide="";
	    $query=$db->prepare('SELECT 
        utilisateur_id, id_cool, cooltafs,cool_time
		FROM mm_textocooltaf WHERE utilisateur_id=:idtemp AND  texto=:vide ORDER BY id_cool
		 DESC LIMIT 0,1');
		$query->bindValue(':idtemp',$idtemp,PDO::PARAM_INT);  
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		$data = $query->fetch();
		$query->CloseCursor();
		
	    $cooltaf=$data['cooltafs'];
	     $idcooltaf=$data['id_cool'];
		 $cooltime=$data['cool_time'];
		 
		 echo' <table width="100%" cellspacing="0" cellpadding="2"  >
   
         <tr><td width="275">&nbsp;</td>     </tr>';
	    
         echo' <tr><td width="275"><span class="textotitre">&nbsp;&nbsp;Cooltof</span></td></tr>';
        echo'<tr> <td height="30" bgcolor="#EBFBFC"  align="center"> &nbsp;
		<img src="../images/cooltafs/'.$cooltaf.'"       width="'.$lewidthcool.'"/></td>
		</tr></table>';
		
		echo'<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$idcooltaf.'" />
		  <input name="typeth" type="hidden" value="cooltof" />
	      <input type="submit" value="Commenter" /></form>';
		
		}
		
		include("sendcommentcool.php");
		
	
	}
	else
	{
       $vide='';
	  if (isset($_POST['idthemetocomment']) ){
	  $idthemetocomment=$_POST['idthemetocomment'];
	  }
	  else
	  {
	  $idthemetocomment=$_GET['idthemetocomment'];
	  }
	  
	   
       $query=$db->prepare('SELECT id_blog,blog_titre, blog_text, blog_image, 
	   blog_imgcomment, blog_time FROM mm_blogs WHERE id_blog=:idthemetocomment ' );
       $query->bindValue(':idthemetocomment',$idthemetocomment,PDO::PARAM_INT);
       $query->execute();
       	  
	  
	  
	  echo'<p><table  width="100%" height="10"  cellspacing="1" border="0" cellpadding="0"  bgcolor="#FFFFFF"> ';
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
		   (htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>&nbsp;&nbsp;&nbsp;&nbsp;';
		  
		   
		  echo ' </td></tr>';
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
		   " width="'.$lewidthb.'"/>
		   </td></tr>';
		   echo' <tr><td bgcolor="#FFFFFF">'.stripslashes(htmlspecialchars
		   ($data['blog_imgcomment'])).'</td></tr>';
		   echo' <tr><td bgcolor="#EDEBE7"><span class="titreblogtime">'.stripslashes(htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>&nbsp;&nbsp;&nbsp;&nbsp;';
		   
		$blogtime=$data['blog_time'];
        $idblog=$data['id_blog'];
		   
		    echo'</td></tr>';
		   echo' <tr><td >&nbsp;</td></tr>';
		   
	       }
        $nomblreligne++;
	   }
        echo'</table>';
	    $query->CloseCursor();
		
		include("sendcomment.php");
		
		
	}	
		
}
else{

       include("affbcooltofs.php");
	   
	   
       $vide='';
       $query=$db->prepare('SELECT id_blog,blog_titre, blog_text, blog_image, 
	   blog_imgcomment, blog_time FROM mm_blogs WHERE utilisateur_id=:idtemp ' );
       $query->bindValue(':idtemp',$idtemp,PDO::PARAM_INT);
       $query->execute();
       	  
	  
	  
	  echo'<p><table  width="100%" height="10"  cellspacing="1" border="0" cellpadding="0"  bgcolor="#FFFFFF"> ';
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
		   (htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>&nbsp;&nbsp;&nbsp;&nbsp;';
		   
		   $tempcid= $idtemp.'_'.$data['id_blog'].'_blog_'.$data['blog_time'];
		   echo'<a href="allblogs.php?ii='.md5($idtemp."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$data['id_blog'].'">
		   Lire les Commentaires  </a>';
		   
		   echo '<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$data['id_blog'].'" />
	      <input type="submit" value="Laisser un Commentaire" /></form>';
		   
		   
		  echo ' </td></tr>';
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
		   " width="'.$lewidthb.'"/>
		   </td></tr>';
		   echo' <tr><td bgcolor="#FFFFFF">'.stripslashes(htmlspecialchars
		   ($data['blog_imgcomment'])).'</td></tr>';
		   echo' <tr><td bgcolor="#EDEBE7"><span class="titreblogtime">'.stripslashes(htmlspecialchars(date('H\hi \l\e d M y',$data['blog_time']))).'</span>&nbsp;&nbsp;&nbsp;&nbsp;';
		   
		   $tempcid= $idtemp.'_'.$data['id_blog'].'_blog_'.$data['blog_time'];
		   echo'<a href="allblogs.php?ii='.md5($idtemp."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$data['id_blog'].'">
		   Lire les Commentaires  </a>';
		   
		   echo '<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$data['id_blog'].'" />
	      <input type="submit" value="Laisser un Commentaire" /></form>';
		   
		   
		    echo'</td></tr>';
		   echo' <tr><td >&nbsp;</td></tr>';
		   
	       }
        $nomblreligne++;
	   }
        echo'</table>';
	    $query->CloseCursor();

}
?>
