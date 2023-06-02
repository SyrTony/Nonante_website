<?php
include('config/config.php');

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête pour récupérer les images de la base de données
$sql = "SELECT * FROM biereimg ORDER BY RAND() LIMIT 3";
$result = $conn->query($sql);

// Fermer la connexion à la base de données
$conn->close();
?>