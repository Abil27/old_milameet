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
	
	
if (isset($_GET['ex']))
{
 $_SESSION['exposantid'] =$_GET['ex'];

}

/* include("ajoutesupermarche.php"); */
$idexposant=$_SESSION['exposantid']; 
        $query=$db->prepare('SELECT groupe_name, baniere
        FROM campus       WHERE id_campus=:idexposant');
		$query->bindValue(':idexposant', $idexposant,PDO::PARAM_INT);
        $query->execute();
		$data=$query->fetch();
        $query->CloseCursor();
echo'<table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr >
    <td   align="center" background="../campusexpo/'.stripslashes(htmlspecialchars($data['baniere'])).'"><span style="font-size:30px; color:#3366CC; font-family:Tahoma, Geneva, sans-serif ;    font-weight:bold">'.stripslashes(htmlspecialchars($data['groupe_name'])).'</span>&nbsp;<br />&nbsp;
    </td >
     </tr>
</table>';
		
		
echo'<table width="100%" border="0" cellspacing="0" cellpadding="6">';
		
		
$query=$db->prepare('SELECT letexte, img, temps FROM campusexpo 
		WHERE groupe_id=:idexposant');
		$query->bindValue(':idexposant', $idexposant,PDO::PARAM_STR);
        $query->execute();
        
echo'<table width="100%" border="0" cellspacing="0" cellpadding="6">';
		
while($data=$query->fetch())
{

 echo' 
  <tr>
    <td >
	
	<table width="500" border="0" cellspacing="0" cellpadding="0">
     <tr>
      ';
	  echo '<td width="400"><span class="expo">'.code(nl2br(stripslashes(htmlspecialchars($data['letexte'])))).'&nbsp;</span></td>';
	  if  (!empty($data['img']))
	  {
	  echo'<td align="right"><img src="../campusexpo/'.$data['img'].'" width="200" /></td>';
	  
	  }
     
     echo'</tr>
    </table>';

	
	
	echo'</td>
  </tr>
  <tr>
    <td  align="right"  bgcolor="#E1F5FB" >&nbsp;
	</td>
  </tr>';


}
echo'</table>';
$query->CloseCursor();
?><td  bgcolor="#FFFFFF" bgcolor="#000000" style=" background-image:url(images/arsuputili.jpg); background-repeat:no-repeat" >