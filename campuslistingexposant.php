
<?php 
$idexposant=$_SESSION['exposantid']; 
       $query=$db->prepare('SELECT id_campus,groupe_name, baniere
        FROM campus ');
		$query->execute();
        
echo'<table width="200" border="0" cellspacing="1" cellpadding="5">';
echo'
  <tr>
    <td   bgcolor="#FFFFFF"  ><a href="maincampus.php" target="maine"><span style="font-size:16px; color:#0066CC; text-align:left; font-weight:bold">PROGRAMME DE LA SEMAINE</span></a>
    </td>
     </tr>
	 <tr>
    <td    bgcolor="#FFEAEA" ><span style="font-size:16px; color:#990000; text-align:left; font-weight:bold"><strong>LISTE DES EXPOSANTS</strong></span>
    </td>
     </tr>';
		
while($data=$query->fetch())
{
 /* bgcolor="#FDFECF" */
echo'
  <tr>
    <td    style="background-image:url(images/arexposant.jpg); background-repeat:no-repeat" >&nbsp;&nbsp;<a href="vitrineexposant.php?ex='.stripslashes(htmlspecialchars($data['id_campus'])).'" target="maine" ><span style="font-size:13px; color:#FF0000; text-align:left; font-weight:bold">'.stripslashes(htmlspecialchars($data['groupe_name'])).'</span></a>&nbsp;&nbsp;&nbsp;';
	if($id==9)
    {
	echo'<a href="supexpo.php?ssss='.stripslashes(htmlspecialchars($data['id_campus'])).'">Suppr</a>';
	}
    echo'</td>
     </tr>';
		

}
echo'</table>';
$query->CloseCursor();

?>

 <td   style="background-image:url(images/arexposant.jpg); background-repeat:no-repeat"