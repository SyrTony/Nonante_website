<?php
require_once('config/config.php');
require_once('app/models/db-connect.model.php');

function createCommande($bieres, $quantites) {
    $commande = array();

    // Parcourir les bières sélectionnées et leurs quantités
    for ($i = 0; $i < count($bieres); $i++) {
        $biere_id = $bieres[$i];
        $quantite = $quantites[$i];

        // Vérifier si la quantité est supérieure à 0
        if ($quantite > 0) {
            // Récupérer les informations de la bière depuis la base de données
            try {
                $connexion = connectDB();

                $requete = $connexion->prepare('SELECT * FROM bieres WHERE id = :biere_id');
                $requete->bindParam(':biere_id', $biere_id);
                $requete->execute();

                $biere = $requete->fetch(PDO::FETCH_ASSOC);

                // Ajouter la bière et sa quantité à la commande
                $biere['quantite'] = $quantite;
                $commande[] = $biere;

                $connexion = null;
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                exit();
            }
        }
    }

    return $commande;
}
?>
