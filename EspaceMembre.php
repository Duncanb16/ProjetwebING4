<?php
session_start(); 

if(!isset($_SESSION['login'])){ // Si tu n'as pas de compte, alors pas de session membre pour toi et tu reste sur la page d'inscription
    header('location:PageInscription.php');
}
?>

<!-- Page espace membre -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Espace Membre</title>
</head>
<body>
    <h1>ESPACE MEMBRE</h1>
</body>
</html>