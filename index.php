<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>


<?php 
if (isset($_GET['mb']))                         
  {
  $msgaccueil= '';
  }
else                              
  {
  
  $msgaccueil= '<table width="950" colums="1" cellspacing="0" border="0" cellpadding="10"        class="bivenu"    bgcolor="#FFFFFF"  width="176">
  <tr>
  <td align="left" valign="0"><H1>Bienvenue </H1> sur <span class="nommm">Milameet.com</span>, de loin le site qui nous rapproche.</td>
  </tr>
</table>';
  }
  
  
   $msgaccueil2= '<table width="930" colums="1" cellspacing="0" border="0" cellpadding="3"        class="bivenu"    bgcolor="#FFFFFF" >
  <tr>
  <td align="left" valign="0"><span  style="font-size:36px">Bienvenue</span><br/> sur <span class="nommm">Milameet.com</span>, de loin le site qui nous rapproche.</td>
  </tr>
</table>';
?>


<?php
	  
	 
if ($id!=0)                         /* Connecte */
  {
   
   include("debuindex.php");
   include("mainepage.php");
   
    echo'<td width="200" valign="top" bgcolor="#E3EEFB">
	
      <iframe src="pub.php" name="cpub" width="200" marginwidth="2" height="500" marginheight="2"      align="left" scrolling="no" frameborder="0"></iframe>
      </td>';
   
   
   echo'</tr>
     </table>';
 
   
?>
    
<?php
 
  }

else                              /* Non Connecté */
  {
  
 
 
    
  
    
    include("connexion2.php");


 echo'</td> 
      </tr>
     </table>';
 
 }
	 
	  ?>
      
     
     

    </td>
  </tr>
  
  <tr>
    <td><?php include("bpage.php"); ?></td>
  </tr>
  
</table>

