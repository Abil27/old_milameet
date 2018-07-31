
<?php              // le javascript recharge la page
                 // avec wid= screen.width : largeur de l'écran
                  //      hei= screen.height : hauteur de l'écran

                  // Puis le code est executé.

  
if(empty($_GET['res'] ) )  
{  
echo '<script language="JavaScript">  
<!-- debut  
document.location="index.php?res=1&w="+screen.width+"&h="+screen.height;  
// fin -->  
</script>';  
}  

  
 $wi=$_GET['w'];
 $minw=800;
echo $wi;
   
   if ($wi < $minw ) 
   {
   header('Location: model3/index.php?s=m');
   }
   else
   {
   header('Location: webmodel3/index.php?s=w');
   }
 
   
?>
