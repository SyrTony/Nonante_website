<?php
require_once('config/config.php');
require_once('app/models/db-connect.model.php');
require_once('app/models/get-bieres.model.php');

// Connexion à la base de données
$connexion = connectDB($dbUser, $dbPass);

// Récupération des bières depuis la base de données
$bieres = getBieresFromDatabase($dbUser, $dbPass);

$connexion = null;

// Afficher les bières ou un message s'il n'y en a pas
if (!empty($bieres)) {
    include('app/views/accueil.view.php');
} else {
    echo "<p>Aucune bière disponible pour le moment.</p>";
}
?>