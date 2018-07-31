<?php 

function expo_photo($expoimg)
{
    $extension_upload = strtolower(substr(  strrchr($expoimg['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "../campusexpo/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($expoimg['tmp_name'],$name);
    return $nomavatar;
}


function supm_article($articleimg)
{
    $extension_upload = strtolower(substr(  strrchr($articleimg['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "../supermarche/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($articleimg['tmp_name'],$name);
    return $nomavatar;
}

function move_avatar($avatar)
{
    $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "../images/avatars/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($avatar['tmp_name'],$name);
    return $nomavatar;
}


function move_cooltaf($cooltaf)
{
    $extension_upload = strtolower(substr(  strrchr($cooltaf['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "../images/cooltafs/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($cooltaf['tmp_name'],$name);
    return $nomavatar;
}


function move_blogimg($blogimg)
{
    $extension_upload = strtolower(substr(  strrchr($blogimg['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "../images/blogimgs/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($blogimg['tmp_name'],$name);
    return $nomavatar;
}
?>

<?php
function erreur($err='')
{
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<p>'.$mess.'</p>
   <p>Cliquez <a href="./index.php" target="_parent">ici</a> pour aller &agrave; la page d\'accueil</p></div></body></html>');
}
?>

<?php
function code($texte)
{
//Smileys
$texte = str_replace(':D ', '<img src="./images/smileys/heureux.gif" title="heureux" alt="heureux"   border="none"/>', $texte);
$texte = str_replace(':lol: ', '<img src="./images/smileys/lol.gif" title="lol" alt="lol"   border="none"/>', $texte);
$texte = str_replace(':triste:', '<img src="./images/smileys/triste.gif" title="triste" alt="triste"   border="none"/>', $texte);
$texte = str_replace(':frime:', '<img src="./images/smileys/cool.gif" title="cool" alt="cool"   border="none"/>', $texte);
$texte = str_replace('XD', '<img src="./images/smileys/rire.gif" title="rire" alt="rire"   border="none"/>', $texte);
$texte = str_replace(':s', '<img src="./images/smileys/confus.gif" title="confus" alt="confus"   border="none"/>', $texte);
$texte = str_replace(':o', '<img src="./images/smileys/choc.gif" title="choc" alt="choc"   border="none"/>', $texte);
$texte = str_replace(':interrogation:', '<img src="./images/smileys/question.gif" title="?" alt="?"   border="none"/>', $texte);
$texte = str_replace(':exclamation:', '<img src="./images/smileys/exclamation.gif" title="!" alt="!"   border="none"/>', $texte);

//Mise en forme du texte
//gras
$texte = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $texte); 
//italique
$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $texte);
//souligné
$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $texte);
//lien
$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
//etc., etc.

//On retourne la variable texte
return $texte;
}
?>



<?php 
function fctaffichimage($img_Src, $W_max, $H_max) {
 if (file_exists($img_Src)) {
   // ----------------------------------------------------
   // Lit les dimensions de l'image source
   $img_size = GetImageSize($img_Src);  
   $W_Src = $img_size[0]; // largeur source
   $H_Src = $img_size[1]; // hauteur source
   // ----------------------------------------------------
   if(!$W_max) { $W_max = 0; }
   if(!$H_max) { $H_max = 0; }
   // ----------------------------------------------------
   // Teste les dimensions tenant dans la zone
   $W_test = round($W_Src * ($H_max / $H_Src));
   $H_test = round($H_Src * ($W_max / $W_Src));
   // ----------------------------------------------------
   // si l image est plus petite que la zone
   if($W_Src<$W_max && $H_Src<$H_max) {
      $W = $W_Src;
      $H = $H_Src; 
   // sinon si $W_max et $H_max non definis
   } elseif($W_max==0 && $H_max==0) { 
      $W = $W_Src;
      $H = $H_Src; 
   // sinon si $W_max libre
   } elseif($W_max==0) {
      $W = $W_test;
      $H = $H_max;
   // sinon si $H_max libre
   } elseif($H_max==0) {
      $W = $W_max;
      $H = $H_test;
   // sinon les dimensions qui tiennent dans la zone
   } elseif($H_test > $H_max) {
      $W = $W_test; 
      $H = $H_max;
   } else {
      $W = $W_max;
      $H = $H_test;
   }
   // ----------------------------------------------------
 } else { // si le fichier image n existe pas
      $W = 0;
      $H = 0;
 }
 // ----------------------------------------------------
 // AFFICHE les dimensions optimales
 echo ' src="'.$img_Src.'" width="'.$W.'" height="'.$H.'"';
}
// Affiche :  src="..." width="..." height="..." pour la balise img
// ---------------------------------------------------------------------------------------

?>



<?php 
 $couleur_x="#C4EBF7";
$couleur_z="#FFFFFF"; 


function permitcoul($couleur_x, $couleur_z){
$tempo=$couleur_x;
$couleur_x=$couleur_z;
$couleur_z=$tempo;

return $couleur_x;
}

    function ftdate($iDate){
      if (ereg("^([0-9]{2})/([0-9]{2})/([0-9]{4})$", $iDate, $date) && checkdate( $date[2], $date[1], $date[3] ) && $date[3]>=1900 ){
        return true;
      }
      return false;
    }
   

?>