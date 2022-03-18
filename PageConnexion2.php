<?php

session_start(); // Demarrage de session

//Connexion base de donnée
try{
    $bdd = new PDO('mysql:host=localhost; dbname=windsell; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e){
    echo "Erreur: " .$e;
}

//Fonctions
//Sécurisation des données (prise d'internet)
function Securise($string){
    //On regarde si le type de string est un nombre entier (int)
    if(ctype_digit($string)){
        $string = intval($string);
    }else{
        //Pour tous les autres types
        $string = strip_tags($string);
        $string = addcslashes($string, '%_');
    }
    return $string;
}

//Fonction qui crypte le mot de passe l'utilisateur
function PasswordHash($pass){
    $pass = sha1(md5($pass)); // on utilise ici deux méthode de cryptage "sha1" et "md5"
    return $pass;
}


//Formulaire de Connexion
if(isset($_POST['connexion'])){
    $email = Securise($_POST['email']);
    $mdp = Securise($_POST['mdp']);

    if(!empty($email) AND !empty($mdp)){
        $mdp = PasswordHash($mdp);// ICI, si c'est le même mot de passe qui est entré que quand il a été créé, alors ça va le crypter de la même façon et il pourra se connecter
        $VerifUser = $bdd -> query(' SELECT id FROM users WHERE email = "'.$email.'" AND mdp= "'.$mdp.'" '); // On cherche si dans la BDD l'email et mdp rentrés existent bien pour un utilisateur
        $UserData = $VerifUser -> fetch(); // la fonction fetch retourne un tableau de valeur
        if ($VerifUser -> rowCount() == 1){ // rowCount retourne le nombre d'entrée que la requête retourne ET ICI on vérifie s'il existe bien un utilisateur
            $_SESSION['login'] = $UserData['id']; // Ici on créé la session de l'utilisateur
            header('location:EspaceMembre.php'); // Renvoie sur la page espace membre si tout est bon et qu'il se connecte bien ou s'inscris bien (donc compte existant)
        }else $return = "Les identifiants sont invalides.";
    }else $return = "Un ou plusieurs champs sont manquant.";
}

?>
 





<!doctype html>
<html>
    <head>
    <link href="PageConnexion2.css" rel="stylesheet">

</head>
    <body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <form action="#" method="POST">
      <div class="form">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="mdp" id="password">
        <input type="submit" name="connexion" value="Se connecter" id="submit">
      </div>
    </form>
    <form> <!--Bouton retour sur la page précédente-->
    <input class="w-100 btn btn-lg btn-outline-dark" type="button" value="Retour" onclick="history.go(-1)">
</form>
    </div>
  </div>
</div>
<script src="PageConnexion2.js"></script>

    </body>
</html>
