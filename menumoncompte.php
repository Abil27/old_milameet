<?php 

	  
?>



<?php 
 
	  
	   echo'<table width="'.$lewidthmenug.'" border="0" cellspacing="0" cellpadding="5" align="left"  class="bl3">
	   
        <tr><td  align="left"> <a href="monprofil.php?m='.$id.'&amp;action='.md5($id."consulter").'"  target="maine">
		 <img src="images/profil.png"   width="'.$icow.'"   border="none"/></a> </td>
		 <td  align="left"> <a href="monprofil.php?m='.$id.'&amp;action='.md5($id."consulter").'"  target="maine">
		 Mon profil</a> </td>
		 </tr>
		 
         <tr><td align="left"><a href="blog.php"  target="maine">
		 <img src="images/bl.png" width="'.$icow.'"  border="none"/></a> </td>
		 <td align="left"><a href="blog.php"  target="maine"> Mon blog
		 </a> </td></tr>
		 
	 <tr ><td  align="left"> 
		 <a href="boiterecep.php?not=notification.php" title="notifications" >
		 <img src="images/noti.png"  width="'.$icow.'"    border="none"/></a>  </td>
		 <td  align="left">   '.$_SESSION['totalnoti'].'
		 <a href="boiterecep.php?not=notification.php" title="notifications" >
		Notifications</a>  </td>
		 </tr>
	
	
	    <tr>
        <td align="left"><a href="boiterecep.php?p=1" > <img src="images/msg.jpg" alt="mp"  width="'.$icow.'"  border="none" /></a></td>
        <td align="left"> <a href="boiterecep.php?p=1" >  '.$t.' Messages
		  non lu</a> 
		</td>
        </tr>
		
        <tr>
        <td  align="left"><a href="boiterecep.php?p=1" ><img src="images/msgr.jpg" alt="inbox" width="'.$icow.'"  border="none"/></a></td>
        <td align="left"> '.$ttotal.'  <a href="boiterecep.php?p=1" >  Messages
		</a> 
		</td>
        </tr>
		
		
    	 
		
		
    	 <tr><td>&nbsp;</td></tr>
		</table>';
	  



?>