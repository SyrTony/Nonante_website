<?php
include('config/config.php');
include('app/views/includes/header.php');

require_once('app/models/ajouter-biere.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];


    $image = $_FILES['image'];
    $imagePath = 'public/images';
    $imageName = $image['name'];
    $imageTmpPath = $image['tmp_name'];
    $imageDestination = $imagePath . $imageName;

    if (move_uploaded_file($imageTmpPath, $imageDestination)) {
        if (ajouterBiere($nom, $description, $prix, $quantite, $imageName)) {
            echo "La bière a été ajoutée avec succès.";
            header('Location: accueil.php');
            exit();
        } else {
            echo "Une erreur s'est produite lors de l'ajout de la bière.";
        }
    } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image.";
    }
}
?>

<link rel="stylesheet" type="text/css" href="public/css/style.css">
<main>
<div class="container">
    <h1>Ajouter une bière</h1>
    <form action="ajouter-biere.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>

        <input type="submit" value="Ajouter la bière">
    </form>
</div>
</main>
<?php include('app/views/includes/footer.php');?>