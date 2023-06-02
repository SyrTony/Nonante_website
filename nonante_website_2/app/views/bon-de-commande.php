<?php
session_start();
include('C:/wamp/www/nonante_website/config/config.php');
include('C:/wamp/www/nonante_website/app/views/includes/header.php');

// Génération d'un numéro de commande unique
$numeroCommande = uniqid();

if (isset($_POST['biere_id']) && isset($_POST['quantite'])) {
    $bieres = $_POST['biere_id'];
    $quantites = $_POST['quantite'];
    $commande = array();

    // Parcourir les bières sélectionnées et leurs quantités
    for ($i = 0; $i < count($bieres); $i++) {
        $biere_id = $bieres[$i];
        $quantite = $quantites[$i];

        // Vérifier si la quantité est supérieure à 0
        if ($quantite > 0) {
            // Récupérer les informations de la bière depuis la base de données
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=nonante_website;charset=utf8', $dbUser, $dbPass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

    if (!empty($commande)) {
        $totalCommande = 0; // Variable pour calculer le total de la commande
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <title>Bon de commande</title>
            <link rel="stylesheet" type="text/css" href="/nonante_website/public/css/style.css">
        </head>
        <body>
        <h3>Bon de commande - Numéro de commande : <?php echo $numeroCommande; ?></h3>
        <h4>Récapitulatif de la commande :</h4>
        <ul>
            <?php foreach ($commande as $biere): ?>
                <?php
                $prixTotal = $biere['prix'] * $biere['quantite']; // Calculer le prix total pour chaque bière
                $totalCommande += $prixTotal; // Ajouter le prix total à la commande totale
                ?>
                <li>
                    <?php echo $biere['nom']; ?> (Quantité : <?php echo $biere['quantite']; ?>)
                    - Prix unitaire : <?php echo $biere['prix']; ?> €
                    - Prix total : <?php echo $prixTotal; ?> €
                </li>
            <?php endforeach; ?>
        </ul>

        <h4>Prix total de la commande : <?php echo $totalCommande; ?> €</h4>

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
        <?php
    } else {
        echo "<p>Aucun article sélectionné dans le bon de commande.</p>";
    }
} else {
    echo "<p>Aucun article sélectionné dans le bon de commande.</p>";
}

include('C:/wamp/www/nonante_website/app/views/includes/footer.php');
?>
</body>
</html>
