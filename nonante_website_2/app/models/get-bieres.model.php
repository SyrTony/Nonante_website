<?php
require_once('config/config.php');
require_once('app/models/db-connect.model.php');

function getBieresFromDatabase($dbUser, $dbPass) {
    $connexion = connectDB($dbUser, $dbPass);

    try {
        $requete = $connexion->prepare('SELECT id, nom, description, prix, quantite, image FROM bieres');
        $requete->execute();
        $bieres = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $bieres;
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de la récupération des bières : " . $e->getMessage();
        return false;
    } finally {
        $connexion = null;
    }
}

?>