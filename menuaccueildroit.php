


<!--<iframe 
      
      name="maine2"  width="200"  frameborder="0" onresize=reSize() id=ifrm  src="affmcontactacc.php">
      </iframe> -->



 <?php 
 


$query = $db->prepare('SELECT contact_id,Mb.membre_enligne AS menligne FROM mm_contact
LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_contact.contact_id
 WHERE utilisateur_id =:id');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();
$TotalDesMembres=0;
 while($data = $query->fetch())
  {
  if ($data['menligne']=="oui"){
   /*if ($id!=$data['membre_id'])  si ce n'est pas moi 
   {
  
   }*/ $TotalDesMembres++;
  }
  }
  $query->CloseCursor();


$lien='<a   class="load" href="affmcontactacc3.php?p=';
echo '<table width="100%" border="0" bgcolor="#C9F0FC">
  <tr>
    <td>Amis en Ligne</td>
    <td style="font-weight:bold;color:#F00" >'.$TotalDesMembres.'</td>
  </tr>
</table>';
$totalmsg=$TotalDesMembres; 
include("affnpageB.php");
 
 
 
 echo'<div id="myid" > ';
 include("affmcontactacc2.php");
 echo'</div>';
echo' <br />';

 echo'<table border="0" cellspacing="0" cellpadding="2"  bordercolor="#0000CC" width="150" style="font-size:10px">
 <tr>
 <td style="border:hidden" >&nbsp </td>
 <td style="border:hidden" >&nbsp </td>
 </tr>
 
 <tr><td style="border:hidden" >';
 $tempcid= $idtempcool1.'_'.$idcooltaf1.'_cooltof_'.$cooltime1;
		   $urlcool1='allblogs.php?ii='.md5($idtempcool1."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idcooltaf1.'&amp;typeth=texto';
		   echo'&nbsp;
		      <img src="../images/cooltafs/'.$cooltaf.'" width="'.$lewidthcool.'"  border="none"/>&nbsp;';
echo'</td><td style="border:hidden" >'.$cmt1.'<br /> par  <a href="rechercher.php?u='.$urlcool1.'">';
echo (strtolower($data['sexeps1'])=="feminin")?'<span class="Pseudof">':
	   '<span class="Pseudom">';
		  echo $ps1.'</a> </span></td></tr>';
		  
		   
echo '<tr><td style="border:hidden" > ';		  
			  $tempcid= $idtempcool2.'_'.$idcooltaf2.'_cooltof_'.$cooltime2;
		   $urlcool2='allblogs.php?ii='.md5($idtempcool2."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idcooltaf2.'&amp;typeth=texto';
		   echo'&nbsp;<a href="rechercher.php?u='.$urlcool2.'">
		      <img src="../images/cooltafs/'.$cooltaf2.'" width="'.$lewidthcool.'" border="none"/></a>&nbsp;';
echo'</td><td style="border:hidden" >'.$cmt2.'<br /> par  ';
echo (strtolower($data['sexeps2'])=="feminin")?'<span class="Pseudof">':
	   '<span class="Pseudom">';
		  echo $ps2.' </span></td></tr>';
		   
echo'<tr><td style="border:hidden" > ';				  
		  $tempcid= $idtempcool3.'_'.$idcooltaf3.'_cooltof_'.$cooltime3;
		   $urlcool3='allblogs.php?ii='.md5($idtempcool3."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idcooltaf3.'&amp;typeth=texto';
		   echo'&nbsp;<a href="rechercher.php?u='.$urlcool3.'">
		      <img src="../images/cooltafs/'.$cooltaf3.'" width="'.$lewidthcool.'" border="none"/></a>&nbsp;'; 
echo'</td><td style="border:hidden" >'.$cmt3.'<br /> par  ';
echo (strtolower($data['sexeps3'])=="feminin")?'<span class="Pseudof">':
	   '<span class="Pseudom">';
		  echo $ps3.' </span></td></tr>';
		   
echo'<tr><td style="border:hidden" > ';			     
			  $tempcid= $idtempcool4.'_'.$idcooltaf4.'_cooltof_'.$cooltime4;
		   $urlcool4='allblogs.php?ii='.md5($idtempcool4."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idcooltaf4.'&amp;typeth=texto';
		   echo'&nbsp;<a href="rechercher.php?u='.$urlcool4.'">
		      <img src="../images/cooltafs/'.$cooltaf4.'" width="'.$lewidthcool.'" border="none"/></a>&nbsp;';
echo'</td><td style="border:hidden" >'.$cmt4.'<br /> par  ';
echo (strtolower($data['sexeps4'])=="feminin")?'<span class="Pseudof">':
	   '<span class="Pseudom">';
		  echo $ps4.' </span></td></tr>';
		   
			  
	  echo'</td></tr>
	  <tr><td style="border:hidden"  > </td><td style="border:hidden" > </td></tr>';
	  
	  echo'</table>
	   <a href="ajcooltaf.php?t=cooltaf"  class="textoajouter"> Mettre ta photo dans "les cool Tofs" </a>
	  <br /></p>';
	  
	  ?>