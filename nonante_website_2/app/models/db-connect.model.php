<?php
function connectDB() {
    $dbHost = 'localhost';
    $dbName = 'nonante_website';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $connexion = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit();
    }
}
?>