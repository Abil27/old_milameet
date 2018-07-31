<?php 

if ($id!=0) {
?>





<!--<body onLoad="MM_preloadImages('images/rechb.jpg','images/inboxb.jpg','images/tchatb.jpg','images/forumb.jpg','images/compteb.jpg','images/teleb.jpg','images/accueilb.jpg')"> -->
      
<?php if ($titre=='Accueil') { ?>
 <td ><img src="images/accueilb.jpg" width="100" height="26"></td>
<?php } else { ?>
<td ><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','images/accueilb.jpg',1)"><img src="images/accueila.jpg" alt="bienvenue" name="Image10" width="100" height="26" border="0"></a></td>
<?php } ?>

      
<?php if ($titre=='Ma messagerie') { ?>
 <td ><img src="images/inboxb.jpg" width="120" height="26"></td>
<?php } else { ?>
<td  >	<a href="boiterecep.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/inboxb.jpg',1)"><img src="images/inboxa.jpg" alt="inbox" name="Image3" width="120" height="26" border="0" id="Image3" /></a> </td>	
<?php } ?>      
      
      
<?php if ($titre=='Mon compte') { ?>
 <td ><img src="images/compteb.jpg" width="120" height="26"></td>
<?php } else { ?>
 <td ><a href="moncompte.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/compteb.jpg',1)"><img src="images/comptea.jpg" alt="mon compte" name="Image6" width="120" height="26" border="0" id="Image6" /></a></td>
<?php } ?>
    
            
<?php if ($titre=='Forum milameet') { ?>
 <td ><img src="images/forumb.jpg" width="120" height="26"></td>
<?php } else { ?>
 <td >	<a href="forum.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/forumb.jpg',1)"><img src="images/foruma.jpg" alt="forums" name="Image5" width="120" height="26" border="0" id="Image5" /></a> </td>
<?php } ?>
      
      
<?php if ($titre=='Tchat milameet') { ?>
 <td ><img src="images/tchatb.jpg" width="120" height="26"></td>
<?php } else { ?>
 <td ><a href="tchat.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/tchatb.jpg',1)"><img src="images/tchata.jpg" alt="tchat" name="Image4" width="120" height="26" border="0" id="Image4" /></a></td>
<?php } ?>
         
     
       
<?php if ($titre=='Rechercher') { ?>
 <td ><img src="images/rechb.jpg" width="120" height="26"></td>
<?php } else { ?>     
      <td ><a href="rechercher.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','images/rechb.jpg',1)"><img src="images/recha.jpg" alt="Rechercher des amies" name="Image8" width="120" height="26" border="0" id="Image8" /></a></td>
<?php } ?>

      
<?php if ($titre== "Telechargement") { ?>
 <td ><img src="images/teleb.jpg" width="125" height="26"></td>
<?php } else { ?>      
     <td ><a href="telechargement.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/teleb.jpg',1)"><img src="images/telea.jpg" alt="telechargement" name="Image7" width="125" height="26" border="0" id="Image7" /></a></td>
<?php } ?>


<?php if ($titre== "supermarche") { ?>
 <td ><img src="images/supermarcherb.jpg" width="125" height="26"></td>
<?php } else { ?>      
<td ><a href="supermarche.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image20','','images/supermarcherb.jpg',1)"><img src="images/supermarchera.jpg" alt="supermarche" name="Image20" width="125" height="26" border="0" id="Image20" /></a></td>
<?php } ?>


<?php /* <td ><img src="images/queuemenuh.jpg" width="98" height="26"></td> */
}
else
{
?>
      
<?php if ($titre=='Accueil') { ?>
 <td ><img src="images/accueilb.jpg" width="100" height="26"></td>
<?php } else { ?>
<td ><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','images/accueilb.jpg',1)"><img src="images/accueila.jpg" alt="bienvenue" name="Image10" width="100" height="26" border="0"></a></td>
 <?php } ?>
 
      
<?php if ($titre=='Forum milameet') { 
/*  echo'<td ><img src="images/contactb.jpg" width="142" height="26"></td>'; */
 } else { 
/* echo'<td ><a href="contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','images/contactb.jpg',1)"><img src="images/contacta.jpg" alt="nous contacter" name="Image9" width="142" height="26" border="0"></a></td>'; */
} ?>


 <td ><img src="images/queuemenuh.jpg" width="850" height="26"></td>

<?php
}
?>
