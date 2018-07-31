    <?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php  $icow=20;
if ($id!=0 ){
  include("comptnewmsg.php");
   if ($t!=0 ){
 echo '<a href="boiterecep.php?p=1"> <span class="nmsgentete"> Messages  ( '.$t.' )</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  }
}?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<!--<a href="campus.php" class="style1">JOURNEE CULTURELLE DE L'UNIVERSITE DE LOME 2012</a> -->

<?php  //On récupère les infos du membre
       $membre=$id;
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	    $query->CloseCursor();
	   
	   $pseudomembre=$data['membre_pseudo'];
	   $avatarmembre=$data['membre_avatar'];
	   
	   
//On récupère texto

       $vide='';
       $query=$db->prepare('SELECT utilisateur_id, id_cool, texto, cool_time,
	   Mb.membre_pseudo AS tpseudo, Mb.sexe AS tsexe
       FROM mm_textocooltaf 
       LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_textocooltaf.utilisateur_id
      
	   
	   WHERE cooltafs=:vide 
	   ORDER BY rand() LIMIT 0,1' );
	   
       $query->bindValue(':vide',$vide, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();	  
	   $query->CloseCursor();
	    
	   $texto=$data['texto'];
       $pseudotexto=$data['tpseudo'];
	   $idtexto=$data['id_cool'];
	   $textotime=$data['cool_time'];
	   $idtemptexto=$data['utilisateur_id'];
	   
//On récupère cool taf

       $vide='';
       $query=$db->prepare('SELECT utilisateur_id, id_cool, cooltafs,cooltof_cmt, cool_time, Mb.membre_pseudo as acool,
	   Mb.sexe as sexeacool
	   FROM mm_textocooltaf
	   LEFT JOIN forum_membres Mb ON Mb.membre_id = mm_textocooltaf.utilisateur_id
	   WHERE texto=:vide AND cooltafs!=:vide
	   ORDER BY rand()  LIMIT 0,4' );
       $query->bindValue(':vide',$vide, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();	
	   $data2=$query->fetch();  
	   $data3=$query->fetch();	
	   $data4=$query->fetch();
	   $query->CloseCursor();
	    
	   
	   $cooltaf=$data['cooltafs'];
	   $idcooltaf1=$data['id_cool'];
	   $cooltime1=$data['cool_time'];
	   $idtempcool1=$data['utilisateur_id'];
	   $cmt1= $data['cooltof_cmt'];
	   $ps1= $data['acool'];
	   $sexeps1= $data['sexeacool'];
	   
	   $cooltaf2=$data2['cooltafs'];
	   $idcooltaf2=$data2['id_cool'];
	   $cooltime2=$data2['cool_time'];
	   $idtempcool2=$data2['utilisateur_id']; 
	   $cmt2= $data2['cooltof_cmt'];  
	   $ps2= $data2['acool'];
	   $sexeps2= $data2['sexeacool'];
	   
	   $cooltaf3=$data3['cooltafs'];
	   $idcooltaf3=$data3['id_cool'];
	   $cooltime3=$data3['cool_time'];
	   $idtempcool3=$data3['utilisateur_id']; 
	   $cmt3= $data3['cooltof_cmt'];
	   $ps3= $data3['acool'];
	   $sexeps3= $data3['sexeacool'];
	   
		 
	   $cooltaf4=$data4['cooltafs'];
	   $idcooltaf4=$data4['id_cool'];
	   $cooltime4=$data4['cool_time'];
	   $idtempcool4=$data4['utilisateur_id'];
	   $cmt4= $data4['cooltof_cmt']; 
	   $ps4= $data4['acool'];
	   $sexeps4= $data4['sexeacool'];
	      
?>
