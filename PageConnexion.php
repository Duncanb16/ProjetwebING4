<?php

session_start(); // Demarrage de session

//Connexion base de donnée
try {
  $bdd = new PDO('mysql:host=localhost:3308; dbname=windsell; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  echo "Erreur: " . $e;
}

//Fonctions
//Sécurisation des données (prise d'internet)
function Securise($string)
{
  //On regarde si le type de string est un nombre entier (int)
  if (ctype_digit($string)) {
    $string = intval($string);
  } else {
    //Pour tous les autres types
    $string = strip_tags($string);
    $string = addcslashes($string, '%_');
  }
  return $string;
}

//Fonction qui crypte le mot de passe l'utilisateur
function PasswordHash($pass)
{
  $pass = sha1(md5($pass)); // on utilise ici deux méthode de cryptage "sha1" et "md5"
  return $pass;
}


//Formulaire de Connexion
if (isset($_POST['connexion'])) {
  $email = Securise($_POST['email']);
  $mdp = Securise($_POST['mdp']);

  if (!empty($email) and !empty($mdp)) {
    $mdp = PasswordHash($mdp); // ICI, si c'est le même mot de passe qui est entré que quand il a été créé, alors ça va le crypter de la même façon et il pourra se connecter
    $VerifUser = $bdd->query(' SELECT id FROM users WHERE email = "' . $email . '" AND mdp= "' . $mdp . '" '); // On cherche si dans la BDD l'email et mdp rentrés existent bien pour un utilisateur
    $UserData = $VerifUser->fetch(); // la fonction fetch retourne un tableau de valeur
    if ($VerifUser->rowCount() == 1) { // rowCount retourne le nombre d'entrée que la requête retourne ET ICI on vérifie s'il existe bien un utilisateur
      $_SESSION['login'] = $UserData['id']; // Ici on créé la session de l'utilisateur
      header('location:EspaceMembre.php'); // Renvoie sur la page espace membre si tout est bon et qu'il se connecte bien ou s'inscris bien (donc compte existant)
    } else $return = "Les identifiants sont invalides.";
  } else $return = "Un ou plusieurs champs sont manquant.";
}

?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <title>Inscription</title>
  <!--Bibliothèque bootstrap pour le design-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>






  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="PageConnexion.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="text-center">


  <main class="form-signin">

    <form action="#" method="POST">
      <h1 class="h3 mb-3 fw-normal">Connexion</h1>

      <div class="form-floating">
        <input type="email" name="email" placeholder="Votre adresse e-mail" class="form-control" id="floatingInput">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" name="mdp" placeholder="Votre mot de passe" class="form-control" id="floatingPassword">
        <label for="floatingPassword">Mot de passe</label>
      </div>

      <div>
        <a href="PageInscription2.php"> Vous n'avez pas de compte ? Inscription </a>
      </div>
      <hr>
      <input type="submit" name="connexion" value="Se connecter" class="w-100 btn btn-lg btn-outline-dark">
      <!--  Si le formulaire de connexion est validé et s'il y a un message alors on affiche le message -->
      <?php if (isset($_POST['connexion']) and isset($return)) echo $return; ?>
      <div>
        <hr>
        <form>
          <!--Bouton retour sur la page précédente-->
          <input class="w-100 btn btn-lg btn-outline-dark" type="button" value="Retour" onclick="history.go(-1)">
        </form>
      </div>

    </form>
  </main>



</body>

</html>