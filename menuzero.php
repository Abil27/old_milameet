<?php 

if ($id!=0) {
/* <td></td>
  <td><a href="contact.php" title="Nous ecrire">Contact</a></td>
  <td></td> */
?>

<table  border="0" cellspacing="5" cellpadding="0" align="right"  class="menuzero">
  <tr align="right">
  
  <td><a href="faq.php" title="aide mila meet">Aides et FAQ</a></td>
  <td></td>
  <td><a href="deconnexion.php" title="deconnexion">Deconnexion</a></td>
  </tr>
</table>

<?php 
}
else
{
echo'<table  border="0" cellspacing="5" cellpadding="0" align="right" >
  <tr align="right">
  <td></td>

  <td><a href="faq.php" title="aide mila meet">Aides et FAQ</a></td>
  </tr>
</table>';
}
?>