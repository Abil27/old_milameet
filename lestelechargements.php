<?php 
session_start();
$titre='telechargements';
$balises = true;
include("identifiants.php");


//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';



?>

<?php 
$lewidth=50;
 $icow=30;
 ?>

<?php 
if ($id==0) erreur(ERR_IS_CO);?>




<?php 

 echo'<p><table  width="100%" height="10"  cellspacing="0" border="0" cellpadding="0" >   ';
 
 echo'<tr><td  >
 </td>   </tr>';

	echo'<tr><td  style="background:url(images/artele.jpg); background-repeat:repeat-y">';




if(isset($_GET['iii'])){

if($_GET['iii']==md5('amour-romance'))
{
$dimg=$_GET['iii'];

echo'<span class="nommm" style="font-size:28px; color:#FF0033; text-decoration:underline">&nbsp;&nbsp;&nbsp;Amour et Romance<br/></span>';

$nb_fichier = 0;
echo '<ul>';
if($dossier = opendir('./telechargements/amour-romance'))
 {
 while(false !== ($fichier = readdir($dossier)))
  {
  if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db' )
   {
   $nb_fichier++; 
   echo '<a href="down.php?f=./telechargements/amour-romance/' . $fichier . '"><img src="./telechargements/amour-romance/' . $fichier . '" width="200" border="none"/><br />' . $fichier . '</a><br /><br />';
   } 
 
  } 
 echo '</ul><br />';
 
 
 closedir($dossier);
 
}
 
else
 {   echo 'Acces au telechargment echoue.';

}
}
}


if(isset($_GET['iii'])){

if($_GET['iii']==md5('jv'))
{
$dimg=$_GET['iii'];

echo'<span class="nommm" style="font-size:28px; color:#FF0033; text-decoration:underline">&nbsp;&nbsp;&nbsp;Jeux Video<br/></span>';

$nb_fichier = 0;
echo '<ul>';
if($dossier = opendir('./telechargements/jv'))
 {
 while(false !== ($fichier = readdir($dossier)))
  {
  if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db' )
   {
   $nb_fichier++; 
   echo '<a href="down.php?f=./telechargements/jv/' . $fichier . '"><img src="./telechargements/jv/' . $fichier . '" width="200" border="none"/><br />' . $fichier . '</a><br /><br />';
   } 
 
  } 
 echo '</ul><br />';
 
 
 closedir($dossier);
 
}
 
else
 {   echo 'Acces au telechargment echoue.';

}
}
}


if(isset($_GET['iii'])){

if($_GET['iii']==md5('mobiles'))
{
$dimg=$_GET['iii'];

echo'<span class="nommm" style="font-size:28px; color:#FF0033; text-decoration:underline">&nbsp;&nbsp;&nbsp;MOBILES<br/></span>';

$nb_fichier = 0;
echo '<ul>';
if($dossier = opendir('./telechargements/mobiles'))
 {
 while(false !== ($fichier = readdir($dossier)))
  {
  if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db' )
   {
   $nb_fichier++; 
   echo '<a href="down.php?f=./telechargements/mobiles/' . $fichier . '"><img src="./telechargements/mobiles/' . $fichier . '" width="200" border="none"/><br />' . $fichier . '</a><br /><br />';
   } 
 
  } 
 echo '</ul><br />';

 
 closedir($dossier);
 
}
 
else
 {   echo 'Acces au telechargment echoue.';

}
}
}


if(isset($_GET['iii'])){

if($_GET['iii']==md5('humour_insolite'))
{
$dimg=$_GET['iii'];

echo'<span class="nommm" style="font-size:28px; color:#FF0033; text-decoration:underline">&nbsp;&nbsp;&nbsp;Humour et Insolite<br/></span>';

$nb_fichier = 0;
echo '<ul>';
if($dossier = opendir('./telechargements/humour_insolite'))
 {
 while(false !== ($fichier = readdir($dossier)))
  {
  if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db' )
   {
   $nb_fichier++; 
   echo '<a href="down.php?f=./telechargements/humour_insolite/' . $fichier . '"><img src="./telechargements/humour_insolite/' . $fichier . '" width="200" border="none"/><br />' . $fichier . '</a><br /><br />';
   } 
 
  } 
 echo '</ul><br />';
 
 
 closedir($dossier);
 
}
 
else
 {   echo 'Acces au telechargment echoue.';

}
}
}


if(isset($_GET['iii'])){

if($_GET['iii']==md5('architecture_nature_paysage'))
{
$dimg=$_GET['iii'];

echo'<span class="nommm" style="font-size:28px; color:#FF0033; text-decoration:underline">&nbsp;&nbsp;&nbsp;Architecture, Nature et Paysage<br/></span>';

$nb_fichier = 0;
echo '<ul>';
if($dossier = opendir('./telechargements/architecture_nature_paysage'))
 {
 while(false !== ($fichier = readdir($dossier)))
  {
  if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db' )
   {
   $nb_fichier++; 
   echo '<a href="down.php?f=./telechargements/architecture_nature_paysage/' . $fichier . '"><img src="./telechargements/architecture_nature_paysage/' . $fichier . '" width="200" border="none"/><br />' . $fichier . '</a><br /><br />';
   } 
 
  } 
 echo '</ul><br />';

 
 closedir($dossier);
 
}
 
else
 {   echo 'Acces au telechargment echoue.';

}
}
}


echo'</td>   </tr>     </table>';

?>

