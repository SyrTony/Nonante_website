<?php
require_once('config/config.php');
require_once('app/models/db-connect.model.php');

function checkExistingEmail($emailClient) {
    try {
        $connexion = connectDB();

        $requete = $connexion->prepare('SELECT identifiant_client FROM clients WHERE email = :email');
        $requete->bindParam(':email', $emailClient);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification de l'adresse e-mail : " . $e->getMessage();
        exit();
    }
}

function saveClient($nomClient, $emailClient, $identifiantClient) {
    try {
        $connexion = connectDB();

        $requete = $connexion->prepare('INSERT INTO clients (nom, email, identifiant_client) VALUES (:nom, :email, :identifiant_client)');
        $requete->bindParam(':nom', $nomClient);
        $requete->bindParam(':email', $emailClient);
        $requete->bindParam(':identifiant_client', $identifiantClient);
        $requete->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement du client : " . $e->getMessage();
        exit();
    }
}

function generateIdentifiantClient() {
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $identifiant = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $identifiant .= $characters[$index];
    }

    return $identifiant;
}
?>