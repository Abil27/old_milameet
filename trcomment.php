<?php 
session_start();
$titre='Accueil';
include("identifiants.php");




//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';



if ($id==0) erreur(ERR_IS_CO);

 
  
     if (isset($_POST['message']))
     {
	 $idblogowner=$_POST['idblogowner'];
	 $letemp=$_POST['letemps'];
	 $idblog=$_POST['idblog'];
	 $message=$_POST['message'];
	 $typeth=$_POST['typeth'];
	  
	 $coid = $idblogowner.'_'.$idblog.'_'.$typeth.'_'.$letemp;
	 $temps=time();
	 
	 
		$query=$db->prepare('INSERT INTO mm_blogcomments
        (cid, id_commenter, bcomment, btime)
        VALUES(:coid,:id,:message,:temps)');
		$query->bindValue(':coid', $coid, PDO::PARAM_STR);    
		$query->bindValue(':id', $id, PDO::PARAM_INT); 
        $query->bindValue(':message', $message, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
		$query->execute();
        $query->CloseCursor(); 
		 
			
     }
	 
	   $_SESSION['totalc'] = $_SESSION['totalc'] + $_SESSION['cre_chqcomment'];
	   include("cupdat.php"); 
	  
	  header('Location: allblogs.php?ii='.md5($idblogowner."blog").''); 
	  
?>