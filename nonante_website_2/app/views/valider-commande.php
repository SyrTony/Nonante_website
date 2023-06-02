<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="/nonante_website/public/css/style.css">
</html>

<?php
session_start();
include('C:/wamp/www/nonante_website/config/config.php');
include('C:/wamp/www/nonante_website/app/views/includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $numeroCommande = $_POST['numero_commande'];
    $totalCommande = $_POST['total_commande'];
    $identifiantClient = isset($_POST['identifiant_client']) ? $_POST['identifiant_client'] : '';
    $nomClient = $_POST['nom_client'];
    $emailClient = $_POST['email_client'];

    // Vérifier si l'adresse e-mail existe déjà dans la base de données
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=nonante_website;charset=utf8', $dbUser, $dbPass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $connexion->prepare('SELECT identifiant_client FROM clients WHERE email = :email');
        $requete->bindParam(':email', $emailClient);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($resultat && isset($resultat['identifiant_client'])) {
            // L'adresse e-mail existe déjà, récupérer l'identifiant client existant
            $identifiantClient = $resultat['identifiant_client'];
        } else {
            // L'adresse e-mail n'existe pas, générer un nouvel identifiant client
            if (empty($identifiantClient)) {
                $identifiantClient = generateIdentifiantClient();
            }

            // Enregistrer le nouvel identifiant client dans la base de données
            $requete = $connexion->prepare('INSERT INTO clients (nom, email, identifiant_client) VALUES (:nom, :email, :identifiant_client)');
            $requete->bindParam(':nom', $nomClient);
            $requete->bindParam(':email', $emailClient);
            $requete->bindParam(':identifiant_client', $identifiantClient);
            $requete->execute();
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification de l'adresse e-mail : " . $e->getMessage();
        exit();
    }

    // Enregistrer les informations de la commande dans la base de données ou effectuer d'autres traitements

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

include('C:/wamp/www/nonante_website/app/views/includes/footer.php');

// Fonction pour générer un identifiant client aléatoire
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
