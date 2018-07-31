<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage3.php");


?>

<?php 
$lewidth=50;
 $icow=30;
 ?>

<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);
?>
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
	
  echo'<p><table  width="100%" height="10"  cellspacing="0" border="0" cellpadding="2"  bgcolor="#DBF3FB"> ';


$couleur_x=' background="images/araffmsga.jpg ';
$couleur_z=' background="images/araffmsgb.jpg ';

if (isset($_GET['ss'])) /* si sup */
{
$msgid=$_GET['ss'];
include("sm.php");

}
else
{


if (isset($_GET['t']) AND  isset($_GET['c']))
{
$idcontact=stripslashes(htmlspecialchars($_GET['c']))/6243456;


$query=$db->prepare('SELECT msg_id, msg_titre,msg_texte, msg_time,msg_createur,msg_destinatair,msg_vu,
Mb.membre_pseudo AS pseudo_msg_createur,Mb.membre_avatar AS avatar_msg_createur,
Mb.sexe AS sexe_msg_createur
FROM msg_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = msg_envoyer.msg_createur
WHERE msg_destinatair =:idcontact  OR msg_createur =:idcontact  AND supp_destinatair=0
ORDER BY msg_id DESC');
$query->bindValue(':idcontact', $idcontact, PDO::PARAM_INT);   
$query->execute();


           $idmessage='';
	       $msv='';
  while($data = $query->fetch())
  {
	if ($data['msg_destinatair'] ==$id  OR $data['msg_createur'] ==$id) 
	{
  /*  
   if ($_GET['t']==$data['msg_time'])
   { */
   echo'<tr><td bgcolor="#ECF9FD" align="left" width="100%"><br/>Envoyé par<br/>
   <img src="../images/avatars/'.$data['avatar_msg_createur'].'"
       alt="Ce membre n a pas d avatar"   width="'.$lewidth.'" />  <br/>';  
	   
	   echo (strtolower($data['sexe_msg_createur'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo'&nbsp;'.$data['pseudo_msg_createur'].'&nbsp;</span> <br/> 
	   
	   '.nl2br(stripslashes(htmlspecialchars($data['msg_titre']))).'<br/>
	   '.code(nl2br(stripslashes(htmlspecialchars($data['msg_texte'])))).'</td><td  bgcolor="#FDE9D5"></td></tr>';
	   echo'<tr bgcolor="#999999" ><td >&nbsp;</td> <td ></td></tr>';
	   echo'<tr><td><a href="ecriremsg.php?ac=nouveaumsg&ic='.$data['msg_createur'].'">
	   Répondre</a>
	   <br/></td> <td bgcolor="#FDE9D5"></td></tr>';
	   
	   
	   if ($data['msg_time']==$_GET['t']){
	    /* if (empty($idmessage) AND empty($msv)){ */
	  	   $idmessage=$data['msg_id'];
	       $msv=$data['msg_vu'];
		}
	   
    /* }   */ 
	}
  }   //FIN de la boucle

$query->CloseCursor();

       if($msv!="oui")
       {
	   $query=$db->prepare('UPDATE msg_envoyer
       SET  msg_vu="oui" WHERE msg_id=:idmessage' );
       $query->bindValue(':idmessage', $idmessage, PDO::PARAM_INT);   
       $query->execute();
	   
	   $_SESSION['totalc'] = $_SESSION['totalc'] + $_SESSION['cre_msgrecu'];
	   include("cupdat.php");
	   }
       

}

else
{
$lien='<a href="affichemsg.php?p=';
$totalmsg=$_SESSION['totalmsg']; 
include("affnpage.php");

$query=$db->prepare('SELECT msg_id, msg_titre,msg_texte, msg_time,msg_createur,msg_vu,
Mb.membre_pseudo AS pseudo_msg_createur,Mb.membre_avatar AS avatar_msg_createur,
Mb.sexe AS sexe_msg_createur
FROM msg_envoyer 
LEFT JOIN forum_membres Mb ON Mb.membre_id = msg_envoyer.msg_createur
WHERE msg_destinatair =:id AND supp_destinatair=0
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
   $_SESSION['msg_createur']=stripslashes(htmlspecialchars($data['msg_createur']))*6243456; 
  
   echo'<tr><td '.$couleur_x.'" align="center" width="70">&nbsp;<br /><img src="../images/avatars/'.$data[  'avatar_msg_createur'].'"
       alt="Ce membre n a pas d avatar"  width="'.$lewidth.'"/>  <br/> ';
	   echo'<a href="./profil.php?m='.stripslashes(htmlspecialchars($data['msg_createur'])).'&amp;action=consulter">  ';
	    echo (strtolower($data['sexe_msg_createur'])=="feminin")?'<span class="recherchePseudof">':
	   '<span class="recherchePseudom">';
	   echo'&nbsp;'.$data['pseudo_msg_createur'].'</span></a> </td>
	   <td '.$couleur_x.'"  >&nbsp;<a href="./affichemsg.php?t='.$data['msg_time'].'&amp;c='.$_SESSION['msg_createur'].'">';
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
	   	   <span class="tchatTime">'.date('H\hi \l\e d M y',($data['msg_time']- $_SESSION['gmt'])).'</span> <br/> </td>
	   
	   <td '.$couleur_x.'">
	   <a href="affichemsg.php?p=1&amp;ss='.$data['msg_id'].'">Supp</a>
	   </td>
	   
	   <td '.$couleur_x.'"  >&nbsp;<a href="./affichemsg.php?t='.$data['msg_time'].'">';
	    if($data["msg_vu"]=="oui")
        {
         echo'<img src="images/msgl.png" alt="non lu"  border="0"/>';
        }
		else
		{
		echo'<img src="images/msgnl.png" alt="lu"  border="0" />';
        }
		echo'</a> </td>
	   
	   </tr>';
	   
  }   //FIN de la boucle

$query->CloseCursor();



} //FIN de if de is set

} //FIN de if de is set ss



 echo'</table> <br /></p>';

?>