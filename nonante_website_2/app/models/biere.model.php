<?php

class BiereController {
  // Autres méthodes existantes du contrôleur

  public function ajouterBiere() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Récupérer les données du formulaire
      $nom = $_POST['nom'];
      $description = $_POST['description'];
      $prix = $_POST['prix'];
      $quantite = $_POST['quantite'];

      // Créer un nouvel objet Biere avec les données du formulaire
      $biere = new Biere($nom, $description, $prix, $quantite);

      // Ajouter la bière à la base de données
      $biere->ajouterBiere();

      // Rediriger vers la page d'accueil
      header('app/views/accueil.php');
      exit();
    }
  }
}

?>
