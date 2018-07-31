<?php 

$nmsgparpage = 8;
$nombreDePages = ceil($totalmsg/ $nmsgparpage);


//Nombre de pages
$page = (isset($_GET['p']))?intval($_GET['p']):1;

//On affiche les pages 1-2-3 etc...
echo '<p>Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
    if ($i == $page) //On affiche pas la page actuelle en lien
    {
    echo $i;
    }
    else
    {
    echo $lien.$i.'">
    ' . $i . '   </a> ';
    }
}
echo'</p>';
 
$premierMessageAafficher = ($page - 1) * $nmsgparpage;



?>