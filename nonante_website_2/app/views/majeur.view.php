<?php
session_start();
include('C:/wamp64/www/nonante_website/config/config.php');  //ici on n'a pas besoin de header car c'est la page qui vérifie si on est majeur
?>


    <link rel="stylesheet" href="public/css/majeur.css">
    <title>Vérification de l'âge</title>

    <img src="public/images/LOGO_90.png" alt="Logo Nonante">
    <h1>Êtes-vous majeur ?</h1>
    <h2>Bienvenue sur le site de Nonante</h2>
    <h3>Pour rentrer sur le site vous devez être majeur.</h3>
    <a href="accueil.php"><span>Oui</span></a>
    <a href="public/images/rick.gif"><span>Non</span></a>
    
    <?php include('app/views/includes/footer.php'); ?>
