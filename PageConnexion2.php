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



<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->


<!DOCTYPE html>
<html lang="fr">

<head>
    <script nonce="e7f95579-635a-4064-bac3-25d166f70dba">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.track = (e, t) => {
                    for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                    a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                }, a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
    <title>Connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v4/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/css/util.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/css/main.css">

    <!--Bibliothèque bootstrap pour le design-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <meta name="robots" content="noindex, follow">
</head>

<body style="background-color:#c47acf">
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form">


                    <span class="login100-form-title p-b-49 ">
                        <a href="#" onclick="history.go(-1)" class="dis-block txt3 hov1 p-r-15 p-t-10 p-b-10 p-l-30" style="float:left">
                            <i class="fa fa-long-arrow-left m-r-5"></i>
                            Retour
                        </a>

                        <span style="float:center">
                            Login
                        </span>

                        <button type="button" class="btn btn-outline-dark" href="index.php" onclick="window.location.href='index.php';" style="float:right">
                            <i class="bi bi-house-fill"></i>
                            Accueil
                        </button>

                    </span>


                    <span class="login100-form-title p-b-15" style="color:#c47acf">
                        <!--  Si le formulaire de connexion est validé et s'il y a un message alors on affiche le message -->
                        <?php if (isset($_POST['connexion']) and isset($return)) echo $return; ?>
                    </span>

                    <form action="#" method="POST">



                        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                            <span class="label-input100">Email</span>
                            <input type="email" name="email" placeholder="Votre adresse e-mail" class="input100">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input type="password" name="mdp" placeholder="Votre mot de passe" class="input100">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        <div class="text-right p-t-8 p-b-31">
                            <a href="#">
                                Forgot password?
                            </a>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit" name="connexion">
                                    Se connecter
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="flex-col-c p-t-40">
                        <span class="txt1 p-b-17">
                            Vous n'avez pas de compte ?
                        </span>
                        <a href="PageInscription2.php" class="txt2">
                            Inscrivez vous ici !
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>


    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/animsition/js/animsition.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/bootstrap/js/popper.js"></script>
    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/select2/select2.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/daterangepicker/moment.min.js"></script>
    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/daterangepicker/daterangepicker.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/vendor/countdowntime/countdowntime.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v4/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6eefb19f281c4063","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>