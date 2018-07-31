<?php 
session_start();
$titre='publicite';
include("identifiants.php");
include("hautdepage3.php");
include("menu2.php");

?>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="200"  height="500" border="0" cellspacing="0" cellpadding="0" bgcolor="#D1DFE7" vspace="0">
  <tr>
    <td valign="top" >
     <?php
	  if(isset($_SESSION['pmoov']) AND isset($_SESSION['ptogocell']))
         
	{	
     $temppub= $_SESSION['pmoov'];
	 
     $_SESSION['pmoov']=$_SESSION['ptogocell'];
     $_SESSION['ptogocell']= $_SESSION['publicite3'];
	 $_SESSION['publicite3']=$temppub;
   
  
     echo $_SESSION['pmoov']  ;
	 }
	 else
	 {
	  $_SESSION['pmoov']='<img src="pub/dinainfoweb.gif" alt="dina infomobile" width="100%"/> ';
      $_SESSION['ptogocell']='<img src="pub/egomweb.gif" alt="egom" width="100%"/>';
	  $_SESSION['publicite3']='<img src="pub/publicite3.gif" alt="egom" width="100%"/>';
    } ?>
      </td>
  </tr>
</table>
