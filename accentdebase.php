<table width="750" border="0" align="left" cellpadding="5" >
  <tr>
  
    <td width="200" valign="top" >
	<?php 
	echo' Bonjour <span class="nomutili">'.$pseudomembre.'<br/></span>
	<img src="../images/avatars/'.$avatarmembre.'" alt="Ce membre n\'a pas d\'avatar"  width="150"/>';
	echo'<br/> <small>(credits '.$_SESSION['totalc'].')	</small>';?>
    </td>
    
    <td valign="top">
    
      <table width="100%" border="0" cellpadding="4">
           <tr>
                     <td align="right" bgcolor="#D2E9FF"><form action="ttcontact.php" method="get" name="recherche"  target="maine">
      Rechercher:
      <input name="chainerech" type="text" size="15" maxlength="100" />
      <input name="GO" type="submit" value="GO" /></td> 
      
      <td align="right" bgcolor="#D2E9FF" style="font-size:12px">
              <?php if ($nol!=0){
	   echo'<a href="rechercher.php?u=ttcontact.php?ol=in&amp;p=1"><font color="green">&nbsp;Il y a <span class="nomutili">'.$nol.'</span> milameets en ligne</font><img src="images/onl.png"   width="20"   border="none"/></a>';
	   }?>
              </td>
             </tr>
       </table>

      <table width="100%" height="100%" border="0" cellpadding="0"  bgcolor="#F3FAFE">
           
              <tr>   <td align="left" bgcolor="#FFFFFF">
              <?php $tempcid= $idtemptexto.'_'.$idtexto.'_cooltof_'.$textotime;
		   $urltexto='allblogs.php?ii='.md5($idtemptexto."blog").'&amp;cmt=y&amp;cid='.$tempcid.'&amp;idthemetocomment='.$idtexto.'&amp;typeth=texto';
		   echo'&nbsp;<span class="texto"><a href="rechercher.php?u='.$urltexto.'">
		      '.code(nl2br(stripslashes(htmlspecialchars($texto)))).'</a></span >'; ?>
              </td></tr>
             
             <tr><td align="right" bgcolor="#FFFFFF"><a href="ajcooltaf.php?t=texto"   class="textoajouter">Exprimez-vous! </a>
             &nbsp;&nbsp;&nbsp; <br/>  </td></tr>
             
       </table>
    
    
    
    </td>
    
    </tr>
</table>
