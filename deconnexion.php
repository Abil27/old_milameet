<?php
session_start();
session_destroy();
$titre="Déconnexion";
include("identifiants.php");
$id=0;
header('Location: index.php'); 
?>