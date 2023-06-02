<?php
include('C:/wamp/www/nonante_website/config/config.php');
include('C:/wamp/www/nonante_website/app/views/includes/header.php'); // Inclure le header

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

    // Connexion à la base de données
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=nonante_website;charset=utf8', $dbUser, $db_password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit();
    }

    // Préparation de la requête d'insertion
    $requete = $connexion->prepare('INSERT INTO bieres (nom, description, prix, quantite) VALUES (?, ?, ?, ?)');

    // Exécution de la requête avec les données du formulaire
    try {
        $requete->execute([$nom, $description, $prix, $quantite]);
        echo "La bière a été ajoutée avec succès.";
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de l'ajout de la bière : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $connexion = null;

    // Redirection vers la page d'accueil
    header('Location: accueil.php');
    exit();
}
?>
<link rel="stylesheet" type="text/css" href="public/css/style.css">

<div class="container">
    <h1>Ajouter une bière</h1>
    <form action="ajouter-biere.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <input type="submit" value="Ajouter la bière">
    </form>
</div>

<?php include('C:/wamp/www/nonante_website/app/views/includes/footer.php'); // Inclure le footer ?>