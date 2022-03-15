<?php
session_start();
session_destroy();
header('location:PageInscription'); // La fonction header en PHP sert à rediriger sur une page souhaitée : ici on redirige sur la page d'inscription si l'utilisateur n'a pas de session donc pas de compte
?>