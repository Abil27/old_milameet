<?php 
session_start();
$titre='Mon credit';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>
<?php // Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);?>

<?php 

echo'<p>EN CONSTRUCTION</p>';




 include("queue.php");

?>