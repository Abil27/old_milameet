<br />
<div align="left"  style="position:relative; width:100%;" >
<?php 

	$vide="";
	$query=$db->prepare('SELECT 
        utilisateur_id, id_cool,texto, cool_time
		FROM mm_textocooltaf WHERE utilisateur_id=:idtemp AND  cooltafs=:vide ORDER BY id_cool DESC LIMIT 0,1');
		$query->bindValue(':idtemp',$idtemp,PDO::PARAM_INT);
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		$data = $query->fetch();
		$query->CloseCursor();
		
	   $texto=$data['texto'];
       $idtexto=$data['id_cool'];
	   $cooltime1=$data['cool_time'];
	   
	   
	   $vide="";
	 $query=$db->prepare('SELECT 
        utilisateur_id, id_cool, cooltafs, cool_time
		FROM mm_textocooltaf WHERE utilisateur_id=:idtemp AND  texto=:vide ORDER BY id_cool DESC LIMIT 0,1');
		$query->bindValue(':idtemp',$idtemp,PDO::PARAM_INT);  
		$query->bindValue(':vide', $vide, PDO::PARAM_STR); 
        $query->execute();
		$data = $query->fetch();
		$query->CloseCursor();
		
	    $cooltaf=$data['cooltafs'];
	     $idcooltaf=$data['id_cool'];
		 $cooltime2=$data['cool_time'];
	
	?>

<table width="100%" cellspacing="0" cellpadding="2" align="left"  >
 
   <?php
   
   echo' <tr><td width="50%">&nbsp;</td>     <td width="50%"></td></tr>';
	
    
  echo' <tr><td width="50%"><span class="textotitre">&nbsp;&nbsp;Flashy</span><br/></td>
     <td width="50%"><span class="textotitre">&nbsp;&nbsp;Cooltof</span></td></tr>';
	?>
    
        
    
    <?php echo'<tr>
	<td height="30"  bgcolor="#FEF4EB" class="texto" align="center">&nbsp;'.code(nl2br(stripslashes(htmlspecialchars($texto)))).'</td>
	<td height="30" bgcolor="#EBFBFC"  align="center"> &nbsp;<img src="../images/cooltafs/'.$cooltaf.'"       width="'.$lewidthcool.'"/></td></tr>';?>
    
  
   
    <?php
	
	
	 echo' <tr><td width="50%">';
	 if (!empty($texto)){
	    echo'<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$idtexto.'" />
		  <input name="typeth" type="hidden" value="texto" />
	      <input type="submit" value="Commenter" /></form>';
		  
		  
		   $tempcid= $idtemp.'_'.$idtexto.'_cooltof_'.$cooltime1;
		   echo'<a href="allblogs.php?ii='.md5($idtemp."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idtexto.'&amp;typeth=texto">
		   Lire les Commentaires  </a>';
		   
	}  
		  
		  
		 echo'</td>
		 
		  <td width="50%">';
		 if (!empty($cooltaf)){
	echo'<form method="post" action="allblogs.php?ii='.md5($idtemp."blog").
	   '" enctype="multipart/form-data">
		  <input name="idthemetocomment" type="hidden" value="'.$idcooltaf.'" />
		  <input name="typeth" type="hidden" value="cooltof" />
	      <input type="submit" value="Commenter" /></form>';
		  
		   $tempcid= $idtemp.'_'.$idcooltaf.'_cooltof_'.$cooltime2;
		   echo'<a href="allblogs.php?ii='.md5($idtemp."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idcooltaf.'&amp;typeth=cooltof">
		   Lire les Commentaires  </a>';
		   
		  }
		  
		  
		echo'  </td>
		  
		 </tr> ';?>
	
     
  
</table>



</div>
<br />