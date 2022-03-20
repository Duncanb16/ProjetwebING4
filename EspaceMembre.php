<?php
session_start();

if (!isset($_SESSION['login'])) { // Si tu n'as pas de compte, alors pas de session membre pour toi et tu reste sur la page d'inscription
    header('location:PageInscription2.php');
}
?>

<!-- Page espace membre -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Espace Membre</title>
    <!--Bibliothèque bootstrap pour le design-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css%22%3E">
</head>

<body>
    <h1>ESPACE MEMBRE</h1>
    <button type=" button" class="btn btn-outline-dark" href="index.php" style="float:left" onclick="window.location.href='index.php';">
        <i class="bi bi-house-fill"></i>
        Accueil
    </button>
</body>

</html>