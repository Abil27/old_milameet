<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head xmlns="http://www.w3.org/1999/xhtml">
<meta content="application/xhtml+xml; charset=UTF-8" http-equiv="Content-Type" />


<?php   

$balises=(isset($balises))?$balises:0;
if($balises)
{

 echo'

<script>
function bbcode(bbdebut, bbfin)
{
var input = window.document.formulaire.message;
input.focus();
if(typeof document.selection != \'undefined\')
{
var range = document.selection.createRange();
var insText = range.text;
range.text = bbdebut + insText + bbfin;
range = document.selection.createRange();
if (insText.length == 0)
{
range.move(\'character\', -bbfin.length);
}
else
{
range.moveStart(\'character\', bbdebut.length + insText.length + bbfin.length);
}
range.select();
}
else if(typeof input.selectionStart != \'undefined\')
{
var start = input.selectionStart;
var end = input.selectionEnd;
var insText = input.value.substring(start, end);
input.value = input.value.substr(0, start) + bbdebut + insText + bbfin + input.value.substr(end);
var pos;
if (insText.length == 0)
{
pos = start + bbdebut.length;
}
else
{
pos = start + bbdebut.length + insText.length + bbfin.length;
}
input.selectionStart = pos;
input.selectionEnd = pos;
}
 
else
{
var pos;
var re = new RegExp(\'^[0-9]{0,3}$\');
while(!re.test(pos))
{
pos = prompt("insertion (0.." + input.value.length + "):", "0");
}
if(pos > input.value.length)
{
pos = input.value.length;
}
var insText = prompt("Veuillez taper le texte");
input.value = input.value.substr(0, pos) + bbdebut + insText + bbfin + input.value.substr(pos);
}
}
function smilies(img)
{
window.document.formulaire.message.value += \'\' + img + \'\';
}
</script>';

}

?>


<?php 
echo'
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>';


?>



<?php 

$messagelimite=(isset($messagelimite))?$messagelimite:0;
if($messagelimite)
{
echo'<script LANGUAGE="JavaScript">



var max=2500; 


function compter(f) {

var txt=f.message.value;

var nb=txt.length;

if (nb>max) {

alert("Pas plus de "+max+" caractères dans ce champ");

f.message.value=txt.substring(0,max);

nb=max;

}

f.nbcar.value=nb;

}



function timer() {

compter(document.forms["formulaire"]);

setTimeout("timer()",100);

}



</SCRIPT>

';
}
?>



<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Forum </title>';
?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<link rel="stylesheet" media="screen" type="text/css" title="Design" href="./css/mmcss.css" />
</head>
<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclue les 2 pages restantes
include("./forum/functions.php");
include("./forum/constants.php");
?>
