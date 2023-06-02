<?php
session_start();
include('config/config.php');
include('app/views/includes/header.php');
include('app/models/bon-de-commande.model.php');

// Génération d'un numéro de commande unique
$numeroCommande = uniqid();

if (isset($_POST['biere_id']) && isset($_POST['quantite'])) {
    $bieres = $_POST['biere_id'];
    $quantites = $_POST['quantite'];

    $commande = createCommande($bieres, $quantites);

    if (!empty($commande)) {
        $totalCommande = 0; // Variable pour calculer le total de la commande
        ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <title>Bon de commande</title>
            <link rel="stylesheet" type="text/css" href="public/css/style.css">
        </head>

        <body>
            <main>
                <h3>Bon de commande - Numéro de commande :
                    <?php echo $numeroCommande; ?>
                </h3>
                <h4>Récapitulatif de la commande :</h4>
                <ul>
                    <?php foreach ($commande as $biere):
                        $prixTotal = $biere['prix'] * $biere['quantite']; // Calculer le prix total pour chaque bière
                        $totalCommande += $prixTotal; // Ajouter le prix total à la commande totale
                        ?>
                        <li>
                            <?php echo $biere['nom']; ?> (Quantité :
                            <?php echo $biere['quantite']; ?>)
                            - Prix unitaire :
                            <?php echo $biere['prix']; ?> €
                            - Prix total :
                            <?php echo $prixTotal; ?> €
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h4>Prix total de la commande :
                    <?php echo $totalCommande; ?> €
                </h4>

                <!-- Formulaire pour entrer les informations du client -->
                <form action="valider-commande.php" method="post">
                    <input type="hidden" name="numero_commande" value="<?php echo $numeroCommande; ?>">
                    <input type="hidden" name="total_commande" value="<?php echo $totalCommande; ?>">

                    <label for="identifiant_client">Identifiant numéro client (facultatif) :</label>
                    <input type="text" name="identifiant_client" id="identifiant_client">

                    <label for="nom_client">Nom du client (obligatoire) :</label>
                    <input type="text" name="nom_client" id="nom_client" required>

                    <label for="email_client">Adresse email du client (obligatoire) :</label>
                    <input type="email" name="email_client" id="email_client" required>

                    <input type="submit" value="Valider la commande">
                </form>
            </main>
            <?php
    } else {
        echo "<p>Aucun article sélectionné dans le bon de commande.</p>";
    }
} else {
    echo "<p>Aucun article sélectionné dans le bon de commande.</p>";
}

include('app/views/includes/footer.php');
?>