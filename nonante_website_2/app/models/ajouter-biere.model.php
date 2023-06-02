<?php
require_once('config/config.php');
require_once('app/models/db-connect.model.php');

function ajouterBiere($nom, $description, $prix, $quantite, $imageName) {
    global $dbUser, $dbPass;

    $connexion = connectDB($dbUser, $dbPass);

    try {
        $requete = $connexion->prepare('INSERT INTO bieres (nom, description, prix, quantite, image) VALUES (?, ?, ?, ?, ?)');
        $requete->execute([$nom, $description, $prix, $quantite, $imageName]);
        return true;
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de l'ajout de la bière : " . $e->getMessage();
        return false;
    } finally {
        $connexion = null;
    }
}
?>