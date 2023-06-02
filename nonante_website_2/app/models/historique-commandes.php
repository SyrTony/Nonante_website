<?php
session_start();

// Vérifier si le numéro de client est défini dans la variable de session
if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
} else {
    // Rediriger vers une page d'erreur ou une autre page appropriée
    header("Location: erreur.php");
    exit();
}

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérification de la connexion...

// Récupérer l'historique des commandes du client à partir de la base de données
$sql = "SELECT * FROM table_commandes WHERE client_id = '$client_id' ORDER BY date_commande DESC";
$result = $conn->query($sql);
// ... (gérer les éventuelles erreurs et récupérer les données)

// Afficher l'historique des commandes
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Afficher les détails de chaque commande (par exemple, numéro de commande, date, prix total, etc.)
        // ...
    }
} else {
    // Afficher un message indiquant qu'il n'y a pas d'historique de commandes pour ce client
    // ...
}

// Fermer la connexion à la base de données
$conn->close();
?>
