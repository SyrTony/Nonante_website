<?php
        session_start();
        include('config/config.php');
        include('app/views/includes/header.php');
        require_once('app/models/valider-commade.model.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Validation de commande</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
    <main>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numeroCommande = $_POST['numero_commande'];
            $totalCommande = $_POST['total_commande'];
            $identifiantClient = isset($_POST['identifiant_client']) ? $_POST['identifiant_client'] : '';
            $nomClient = $_POST['nom_client'];
            $emailClient = $_POST['email_client'];

            // Vérifier si l'adresse e-mail existe déjà dans la base de données
            $resultat = checkExistingEmail($emailClient);

            if ($resultat && isset($resultat['identifiant_client'])) {
                // L'adresse e-mail existe déjà, récupérer l'identifiant client existant
                $identifiantClient = $resultat['identifiant_client'];
            } else {
                // L'adresse e-mail n'existe pas, générer un nouvel identifiant client
                if (empty($identifiantClient)) {
                    $identifiantClient = generateIdentifiantClient();
                }

                // Enregistrer le nouvel identifiant client dans la base de données
                saveClient($nomClient, $emailClient, $identifiantClient);
            }

            // Afficher les informations de la commande
            echo "<h3>Commande validée</h3>";
            echo "<p>Numéro de commande : $numeroCommande</p>";
            echo "<p>Total de la commande : $totalCommande €</p>";
            echo "<p>Identifiant numéro client : $identifiantClient</p>";
            echo "<p>Nom du client : $nomClient</p>";
            echo "<p>Adresse email du client : $emailClient</p>";

            // Réinitialiser la session pour une nouvelle commande
            session_destroy();
        } else {
            echo "<p>Méthode non autorisée.</p>";
        }

        ?>
    </main>
</body>

</html>
<?php
include('app/views/includes/footer.php');
?>