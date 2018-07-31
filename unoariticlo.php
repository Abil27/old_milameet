<table width="200" border="0">

<?php $atiway='../supermarche/'.$data['photoarticle'];?>
  <tr>
    <td><?php if  (empty($data['photoarticle']) )
	  {
	    echo'<img src="../supermarche/pasdephoto.jpg" width="100" />';
	  }
	   else
	  {
	    echo'<img src="../supermarche/'.$data['photoarticle'].'" width="100" />';
	  }?>
    </td>
  </tr>
  
  
  <tr>
    <td> 
    <?php 
	echo'Posté par <a href="./supmprofil.php?m='.stripslashes(htmlspecialchars($data['utilisateur_id'])).'&amp;action=consulter">  ';
	echo (strtolower($data['lesexe'])=="feminin")?
	'<span class="recherchePseudof">':'<span class="recherchePseudom">';
	   echo'&nbsp;'.nl2br(stripslashes(htmlspecialchars($data['lepseudo']))).'&nbsp;</span>
	   </a>  <br/>'; 
	
	 echo '<span class="supm">'.code(nl2br(stripslashes(htmlspecialchars($data['articlecomment'])))).'&nbsp;</span> <br/>';
	 
	 echo'Plus d\'info...<br/>';
	 
	 echo'<span class="tchatTime">'.date('H\hi \l\e d M y',($data['temps']- $_SESSION['gmt'])).'</span>';
	?>
    </td>
  </tr>
  
  
</table>
