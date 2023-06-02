<?php
session_start();
include('C:/wamp/www/nonante_website/config/config.php');
include('C:/wamp/www/nonante_website/app/views/includes/header.php'); // Inclure le header
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="public/css/style.css">

<body>
    <main>
        <h1>Bienvenue chez Nonante !</h1>

        <p>Voici notre sélection de bières :</p>

        <!-- Vitrine des bières -->
        <div class="vitrine">
            <?php // Connexion à la base de données
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=nonante_website;charset=utf8', $dbUser, $dbPass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                exit();
            }

            // Récupération des bières depuis la base de données
            $requete = $connexion->query('SELECT * FROM bieres');
            $bieres = $requete->fetchAll(PDO::FETCH_ASSOC);

            // Fermer la connexion à la base de données
            $connexion = null; ?>

            <?php
            // Vérifier si la variable $bieres est définie et non vide
            if (!empty($bieres)) {
                ?>
                <form action="bon-de-commande.php" method="post">
                    <div class="biere">
                        <?php foreach ($bieres as $biere): ?>
                            <h3>
                                <?php echo $biere['nom']; ?>
                            </h3>
                            <p>Description :
                                <?php echo $biere['description']; ?>
                            </p>
                            <p>Prix :
                                <?php echo $biere['prix']; ?> €
                            </p>
                            <p>Quantité disponible :
                                <?php echo $biere['quantite']; ?>
                            </p>

                            <input type="hidden" name="biere_id[]" value="<?php echo $biere['id']; ?>">
                            <input type="number" name="quantite[]" min="0" max="<?php echo $biere['quantite']; ?>" value="0"
                                required>
                        <?php endforeach; ?>
                    </div>
                    <input type="submit" value="Valider la commande">
                </form>
            <?php } else {
                // Afficher un message s'il n'y a pas de bières disponibles
                echo "<p>Aucune bière disponible pour le moment.</p>";
            }
            ?>
        </div>
    </main>


</body>
<?php include('C:/wamp/www/nonante_website/app/views/includes/footer.php');
 ?>

</html>