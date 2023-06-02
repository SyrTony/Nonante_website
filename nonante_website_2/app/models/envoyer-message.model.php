<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Ici, tu peux ajouter le code pour envoyer l'email ou effectuer toute autre action souhaitée avec les données du formulaire

  // Rediriger vers une page de confirmation
  header('Location: confirmation.php');
  exit();
}

?>