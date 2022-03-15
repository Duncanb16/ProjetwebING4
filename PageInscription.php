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


//Formulaire d'inscription
if(isset($_POST['inscription'])){
    $nom = Securise($_POST['nom']);
    $prenom = Securise($_POST['prenom']);
    $email = Securise($_POST['email']);
    $mdp = Securise($_POST['mdp']);
    $mdp2 = Securise($_POST['mdp2']);
    $genre = Securise($_POST['genre']);
    $date = date('d/m/Y à H:i:s'); // on affiche l'heure dans la bdd en d/m/y à telle heure
    // s'il ne manque pas les champs ci-dessous alors on execute
    if(!empty($nom) AND !empty($prenom) AND !empty($email) AND !empty($mdp) AND !empty($mdp2) AND !empty($genre)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //On vérifie si l'email est valide
            
            if($mdp==$mdp2){ //On vérifie mtn que le mdp==mdp2
                if($genre == "homme" OR $genre == "femme"){ //On vérifie si le genre est valide (mais ça n'arrivera pas tant que le code HTML n'est pas changé)
                    if(strlen($nom)<=50){ //On vérifie que les champs rentrés ne dépassent pas 50 caractères
                        // dans QUERY, les requêtes sont en language SQL
                        $TestEmail = $bdd->query('SELECT id FROM users WHERE email ="'.$email.'"'); // On teste l'email voir s'il existe ou pas. On Selectionne l'id de la table users ou "l'email" est égal ici à celui qui est rentré dans le formulaire
                        if($TestEmail->rowCount() < 1){ // Si cette requête nous retourne au moins une valeur, alors ça veut dire que l'utilisateur à rentré une adresse email déjà existante
                            $mdp = PasswordHash($mdp);// le mot de passe de l'utilisateur est crypté à partir d'ici
                            $bdd -> query('INSERT INTO users (nom, prenom, email, mdp, genre, date) VALUES ("'.$nom.'","'.$prenom.'","'.$email.'","'.$mdp.'","'.$genre.'","'.$date.'")');
                            $return = "Utilisateur créé !";
                        }else $return = "Votre adresse email est déjà utilisée.";
                    }else $return="Problème ! Votre nom dépasse 50 caractères";
                }else $return="Le genre est invalide";
            }else $return="Les deux mots de passe ne correspondent pas.";
        }else $return="L'email est invalide";
    }else $return="Un ou plusieurs champs manquant ! Veuillez à bien tout remplir.";
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
            header('location:EspaceMembre.php'); // Renvoie sur la page espace membre si tout est bon et qu'il se connecte bien (donc compte existant)
        }else $return = "Les identifiants sont invalides.";
    
    }else $return = "Un ou plusieurs champs est manquant.";
}

?>


<!DOCTYPE html> 
<html lang="fr"> 
<head>
    <meta charset="utf-8">
    <title>Inscription</title>

    <!--Bibliothèque bootstrap pour le design-->
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
-->
</head>
</body> 

<!--  Si le formulaire d'inscription est validé et s'il y a un message alors on affiche le message -->
<?php if(isset($_POST['inscription']) AND isset($return)) echo $return; ?> 

<form action="#" method="POST">
    <input type="text" name="nom" placeholder="Votre nom">
    <input type="text" name="prenom" placeholder="Votre prénom">
    <input type="email" name="email" placeholder="Votre adresse e-mail">
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <input type="password" name="mdp2" placeholder="Confirmer votre mot de passe">
    <select name="genre">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>  
    <input type="submit" name="inscription" value="M'inscrire">
</form>
<hr>

<!--  Si le formulaire de connexion est validé et s'il y a un message alors on affiche le message -->
<?php if(isset($_POST['connexion']) AND isset($return)) echo $return; ?> 

<form action="#" method="POST">
    <input type="email" name="email" placeholder="Votre adresse e-mail">
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <input type="submit" name="connexion" value="Se connecter">
</form>

<!--
<hr>
<button type="button" class="btn btn-outline-dark" href="PageConnexion.php">Retour</button>
-->
</body>

</html>