<?php // C'est cette page qui est utilisée pour le projet

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
                            $return = "Votre compte a bien été créé !";
                        }else $return = "Votre adresse email est déjà utilisée.";
                    }else $return="Problème ! Votre nom dépasse 50 caractères";
                }else $return="Le genre est invalide";
            }else $return="Les deux mots de passe ne correspondent pas.";
        }else $return="L'email est invalide";
    }else $return="Un ou plusieurs champs manquant ! Veuillez à bien tout remplir.";
}

?>
 

<!-- ok  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<!-- ok  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<!-- ok  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->


<!DOCTYPE html>
<html lang="fr">
    <!--viens d'un exemple-->
<head><script nonce="43943661-0d5a-4400-affa-4a5e8b4b9c18">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]},a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script>
<title>Inscription</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v13/images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/css/util.css">
<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v13/css/main.css">
<!--Bibliothèque bootstrap pour le design-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<meta name="robots" content="noindex, follow">
</head>

<body style="background-color: #999999;">
<div class="limiter">
<div class="container-login100">
<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

<form action="#" method="POST" class="login100-form validate-form">
    <!--  Si le formulaire d'inscription est validé et s'il y a un message alors on affiche le message -->
<span class="login100-form-title p-b-30" style="color:#c47acf">
<?php if(isset($_POST['inscription']) AND isset($return)) echo $return;
 ?> 
 <span class="login100-form-title p-b-30 p-t-15" style="color:#c47acf">
 <a href="#" onclick="history.go(-1)" class="dis-block txt3 hov1 p-r-15 p-t-10 p-b-10 p-l-30" style="float:left">
<i class="fa fa-long-arrow-left m-r-5"></i>
Retour
</a>
 <a href="PageConnexion.php" class="dis-block txt3 hov1 p-r-15 p-t-10 p-b-10 p-l-25" style="float:left">
Se connecter
<i class="fa fa-long-arrow-right m-l-5"></i>
</a>
<button type="button" class="btn btn-outline-dark" href="index.php" style="float:right" onclick="window.location.href='index.php';">
<i class="bi bi-house-fill"></i>
                Accueil
</button>
</span>

</span>

<span class="login100-form-title p-b-59">
Inscription
</span>
<div class="wrap-input100 validate-input" data-validate="Le nom est requis">
<span class="label-input100">Nom</span>
<input type="text" name="nom" placeholder="Votre nom" class="input100">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Le prénom est requis">
<span class="label-input100">Prénom</span>
<input type="text" name="prenom" placeholder="Votre prénom" class="input100">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Un email valide est requis: ex@abc.xyz">
<span class="label-input100">Email</span>
<input type="email" name="email" placeholder="Votre adresse e-mail" class="input100">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Le mot de passe est requis">
<span class="label-input100">Mot de passe</span>
<input type="password" name="mdp" placeholder="*************" class="input100">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="La confirmation du mot de passe est requis">
 <span class="label-input100">Confirmation mot de passe</span>
 <input type="password" name="mdp2" placeholder="*************" class="input100">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Le genre est requis">
 <span class="label-input100">Genre</span> </br>
 <select name="genre">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>  
<span class="focus-input100"></span>
</div>
<div class="flex-m w-full p-b-33 validate-input" data-validate="terms are required">
<div class="contact100-form-checkbox">
<input class="input-checkbox100" id="ckb1" type="checkbox"  name="remember-me">
<label class="label-checkbox100" for="ckb1">
<span class="txt1">
J'accepte les termes de la
<a href="Charte.html" target="_blank" class="txt2 hov1">
Charte utilisateur
</a>
</span>
</label>
</div>
</div>
<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button type="submit" name="inscription" class="login100-form-btn">
S'inscrire
</button>

</div>
<a href="PageConnexion.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
Sign In
<i class="fa fa-long-arrow-right m-l-5"></i>
</a>
</div>
</form>




</div>
</div>
</div>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/animsition/js/animsition.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/bootstrap/js/popper.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v13/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/select2/select2.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/daterangepicker/moment.min.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v13/vendor/daterangepicker/daterangepicker.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/vendor/countdowntime/countdowntime.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v13/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6eee8477ff3e9990","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>

</body>
</html>


