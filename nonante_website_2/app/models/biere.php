<?php
class Biere {
  public static function getAll() {
    $connexion = new PDO('sqlite:db.sqlite');
    $requete = $connexion->prepare('SELECT * FROM bieres ORDER BY nom ASC');
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
