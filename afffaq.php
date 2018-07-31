<?php 


if (isset($_GET['fa']))
{
$n='faq/'.$_GET['fa'].'.html';

echo'<table width="750" border="0" cellspacing="0" cellpadding="10">
   <tr>
  <td width="750" valign="top" align="left" >';
  
include($n);
echo'<a href=faq.php>retour</a>';

echo'</td> </tr></table>';
}
else
{
include("faq/faq.php");
}
?>