

<?php 
 
	  
	   echo'<table width="'.$lewidthmenug.'" border="0" cellspacing="0" cellpadding="5" align="left"  class="bl3">
	  
		
	    <tr>
        <td align="left"><a href="affichemsg.php"  target="maine">
		 <img src="images/msg.jpg" alt="mp"  width="'.$icow.'"  border="none" /></a>
		</td>
        <td align="left"> <a href="affichemsg.php"  target="maine">  Boite de recep..  '.$t.' </a> 
		</td>
        </tr>
		 
		 <tr>
        <td align="left"><a href="contact.php"  target="maine">
		 <img src="images/msg.jpg" alt="mp"  width="'.$icow.'"  border="none" /></a>
		</td>
        <td align="left"> <a href="contact.php"  target="maine">Envoyer un msg</a> 
		</td>
        </tr>
		 
	 <tr ><td  align="left"> 
		 <a href="notification.php" title="notifications"  target="maine">
		 <img src="images/noti.png"   width="'.$icow.'"  border="none"/></a>  </td>
		 <td  align="left">   '.$_SESSION['totalnoti'].'
		 <a href="notification.php" title="notifications"  target="maine" >
		Notifications</a>  </td>
		 </tr>
	
	
        <tr>
        <td  align="left"><a  target="maine" href="benvoi.php">
		<img src="images/msgr.jpg" alt="inbox" width="'.$icow.'"  border="none"/></a></td>
        <td align="left">  <a  target="maine" href="benvoi.php" > Boite d\'envoi
		</a> 
		</td>
        </tr>
		
		
    	 
		
		
    	 <tr><td>&nbsp;</td></tr>
		</table>';
	  



?>