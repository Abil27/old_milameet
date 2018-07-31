<?php 
session_start();
$balises = true;
include("identifiants.php");
include("hautdepage.php");
include("menu.php");


// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);

?>

<?php 

if($id==9){
	echo'<a href="campusnewexposant.php?t=article"  target="_parent">AJOUTER UN EXPOSANT</a><br />
	<a href="campusajtexpoinfo.php?t=article" target="_parent">AJOUTER INFORMATION</a><br />';
	
	}

?>
 <table width="200" border="0" align="center">
  <tr>
    <td><img src="images/campusbani1.jpg" alt="MILA MEET le campus universitaire di"></td>
  </tr>
</table>

 <br/>
<table width="530" border="0" cellpadding="10">
  <tr style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">
    <td>LUNDI 14 MAI</td>
  </tr></table>
  
  
 <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td  width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td   bgcolor="#FFD9D9"  align="left">     
     <p>7h - 10h : <strong>FDD PROPRE</strong></p>
    <p>10h - 11h :<strong> JURIS QUIZ</strong> ( Amphi 20ans)</p>
    <p>15h - 18h : <strong>MATCH PRIVEE / PUBLIO</strong></p>
    </td>
    <td  width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>

 
 <br/>
 <table width="530" border="0" cellpadding="10" >
  <tr >
  <td width="260">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right" style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">MARDI 15 MAI</td>
    
  </tr></table>
  
  
 <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td     bgcolor="#FFFFD7"  >     
     <p>7h - 11h : <strong> CERMONIE D'OUVERTURE </strong> </p>
     <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<strong> + CONFERENCE(auditorium)</strong></p>
     <p>12h30 - 14h :<strong> DICTEE JURIDIQUE</strong> ( Amphi 20ans)</p>
    <p>14h - 19h : <strong>   CONCERT SPIRITUEL (amphi 600)</strong></p>
    </td>
    <td   width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>

 
 <br/>
<table width="530" border="0" cellpadding="10">
  <tr style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">
    <td>MERCREDI 16 MAI</td>
  </tr></table>
   <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td  width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td   bgcolor="#FFD9D9"  align="left">     
     <p>7h - 11h : <strong>JOURNEE CARRIERES </strong>(amphi 600)</p>
    <p>14h - 17h :<strong> PROCES FICTIF  </strong>(amphi 600) </p>
    
    </td>
    <td  width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>


 <br/>
 <table width="530" border="0" cellpadding="10" >
  <tr >
  <td width="260">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right" style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">JEUDI 17 MAI</td>
    
  </tr></table>
  <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td     bgcolor="#FFFFD7"  >     
     <p>8h - 12h : <strong> JOURNEE TOGOLAISE </strong> </p>
     
    </td>
    <td   width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>


 <br/>
 <table width="530" border="0" cellpadding="10" >
  <tr >
  <td width="260">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right" style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">VENDREDI 18 MAI</td>
    
  </tr></table>
   <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td     bgcolor="#FFFFD7"  >     
     <p>7h - 11h : <strong> JURIS PODIUM </strong> </p>
     <p>18 - 21h :<strong> JUS IN PUCRA</strong> MISS FDD</p>
    
    </td>
    <td   width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>




 <br/>
<table width="530" border="0" cellpadding="10">
  <tr style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">
    <td>SAMEDI 19 MAI</td>
  </tr></table>
   <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td  width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td   bgcolor="#FFD9D9"  align="left">     
     <p>8h - 11h : <strong>MATCH ETUDIANTS/PROFS </strong></p>
    <p>18h - 21h :<strong> SOIREE D'INTEGRATION  </strong> </p>
    
    </td>
    <td  width="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>


<br/>
<table width="530" border="0" cellpadding="10">
  <tr style=" background-image:url(images/campjar1.jpg); background-repeat:no-repeat; color:#D70000; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif">
    <td>DIMACHE 20 MAI</td>
  </tr></table>
   <!-- style="background-image:url(images/camparprog1.jpg); background-repeat:repeat-y" -->
   <table width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td  width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
     <td   bgcolor="#FFD9D9"  align="left">     
     <strong>SORTIE PIQUE-NIQUE A KPESSI </strong>
   
    
    </td>
    <td  width="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
   </table>
