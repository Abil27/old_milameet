<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=milameet_mmdb', 'milameet', 'tnpG01e78C');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
