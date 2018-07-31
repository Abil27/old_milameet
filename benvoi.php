<?php 
session_start();
$titre="Boite d\'envoi";
include("identifiants.php");
include("hautdepage3.php");


?>

<?php 
$lewidth=50;
 $icow=30;
 ?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php 

//On récupère les infos du membre
       $membre=$id;
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	   $pseudo=$data['membre_pseudo'];
	   $query->CloseCursor();



/* $TotalDesMembres = $db->query('SELECT COUNT(*) FROM forum_membres')->fetchColumn();
$query->CloseCursor();	
 */
 echo'<span class="nomutili">'.$pseudo.'</span>';
	 
  echo'<p><table  width="100%" height="10"  cellspacing="1" border="0" cellpadding="4"  bgcolor="#FFFFFF"> ';


$couleur_x=' bgcolor="#F1D2BC" ';
$couleur_z=' bgcolor="#FFFFFF" ';

if (isset($_GET['ss'])) /* si sup */
{
$msgid=$_GET['ss'];
include("smenvoi.php");

}
else
{


if (isset($_GET['t']))/* t pour consulter et rien pour aff pages */
{

$query=$db->prepare('SELECT msg_id, msg_titre,msg_texte, msg_time,msg_destinatair,
Mb.membre_pseudo AS pseudo_msg_destinatair,Mb.membre_avatar AS avatar_msg_destinatair,
Mb.sexe AS sexe_msg_destinatair
FROM msg_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = msg_envoyer.msg_destinatair
WHERE msg_createur =:id AND supp_createur=0
ORDER BY msg_id DESC');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->execute();


  //Début de la boucle
  while($data = $query->fetch())
  {
   //ON affiche que celui dont le time est identique
   if ($_GET['t']==$data['msg_time'])
   {
   echo'<tr><td bgcolor="#ECF9FD" align="left" width="100%"><br/>Envoyé à <br/>
   <img src="../images/avatars/'.$data['avatar_msg_destinatair'].'"
       alt="Ce membre n a pas d avatar"   width="'.$lewidth.'" />  <br/>';  
	   
	   echo ($data['sexe_msg_destinatair']=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo'&nbsp;'.$data['pseudo_msg_destinatair'].'&nbsp;</span> <br/> 
	   
	   '.nl2br(stripslashes(htmlspecialchars($data['msg_titre']))).'<br/>
	   '.code(nl2br(stripslashes(htmlspecialchars($data['msg_texte'])))).'</td><td  bgcolor="#FDE9D5"></td></tr>';
	   echo'<tr bgcolor="#999999" ><td >&nbsp;</td> <td ></td></tr>';
	   echo'<tr><td><a href="ecriremsg.php?ac=nouveaumsg&ic='.$data['msg_destinatair'].'">
	   Lui ecrire</a>
	   <br/></td> <td bgcolor="#FDE9D5"></td></tr>';
	   
	   $idmessage=$data['msg_id'];
	   
	   
    }   
  }   //FIN de la boucle

$query->CloseCursor();


}

else
{
$lien='<a href="benvoi.php?p=';
$query=$db->prepare('SELECT COUNT(*) FROM msg_envoyer WHERE msg_createur =:id AND supp_createur=0');
$query->bindValue(':id', $id, PDO::PARAM_INT);  
$query->execute();
 //Début de la boucle 
 $totalmsg=0;
 while($data = $query->fetch())
  {
  $totalmsg++;
  }
  $query->CloseCursor();

include("affnpageenvoi.php");

$query=$db->prepare('SELECT msg_id, msg_titre,msg_texte, msg_time,msg_destinatair,msg_vu,
Mb.membre_pseudo AS pseudo_msg_destinatair,Mb.membre_avatar AS avatar_msg_destinatair,
Mb.sexe AS sexe_msg_destinatair
FROM msg_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = msg_envoyer.msg_destinatair
WHERE msg_createur =:id AND supp_createur=0
ORDER BY msg_id DESC 
LIMIT :premier, :nombre');
$query->bindValue(':id', $id, PDO::PARAM_INT);   
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nmsgparpage,PDO::PARAM_INT);
$query->execute();


 //Début de la boucle 
 while($data = $query->fetch())
  {

   $tempo=$couleur_x;
   $couleur_x=$couleur_z;
   $couleur_z=$tempo;
   
   echo'<tr><td '.$couleur_x.'" align="left">  ';
	   echo'Envoyé à &nbsp;<a href="./profil.php?m='.stripslashes(htmlspecialchars($data['msg_destinatair'])).'&amp;action=consulter">  ';
	    echo ($data['sexe_msg_destinatair']=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo''.$data['pseudo_msg_destinatair'].'</span></a>
	   
	    </td>
	   <td '.$couleur_x.'"  >&nbsp;<a href="./benvoi.php?t='.$data['msg_time'].'">';
	    if($data["msg_vu"]=="oui")
        {
         echo'<span class="msgtitre">
	   '.nl2br(stripslashes(htmlspecialchars($data['msg_titre']))).'</span>';
        }
		else
		{
		echo'<span class="msgtitrelu">
	   '.nl2br(stripslashes(htmlspecialchars($data['msg_titre']))).'</span>';
        }
		
		
	   echo'</a> </td>
	   
	   <td '.$couleur_x.'">
	   <span class="tchatTime">'.date('H\hi \l\e d M y',($data['msg_time']- $_SESSION['gmt'])).'</span></td>
	   
	   <td '.$couleur_x.'"> 
	   <a href="benvoi.php?p=1&amp;ss='.$data['msg_id'].'">Supp</a>
	   </td></tr>';
	   
  }   //FIN de la boucle

$query->CloseCursor();



} //FIN de if de is set

} //FIN de if de is set ss



 echo'</table> <br /></p>';

?>