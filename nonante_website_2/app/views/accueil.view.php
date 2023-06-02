<?php
include('config/config.php');
include('app/views/includes/header.php');
?>

<link rel="stylesheet" type="text/css" href="public/css/style.css">

<main>
    <h1>Bienvenue chez Nonante !</h1>
    <section class="entrée">
        <?php
        echo '<div class="paragraphs-container">';
        echo '<p class="centered-paragraph">Chez Nonante, la qualité est notre priorité.
    Nos bières artisanales sont brassées avec soin, en utilisant des ingrédients de première qualité.</p>';
        echo '<p class="centered-paragraph">Chez Nonante, qualité rime avec environnement. Des bières durables et respectueuses de la planète pour une meilleur exploitation.</p>';
        echo "<p class='centered-paragraph'>Chez Nonante, le goût c'est aussi primordial.
    Les bières que nous proposons ont toutes des goûts capable de vous faire découvrir de nouvelles saveurs.</p>";
        echo '</div>';
        ?>
    </section>

    <p>Voici notre sélection de bières :</p>
    <section class="vitrine">
        <?php
        if (!empty($bieres)) {
            // Ouvrir le formulaire avec l'action pointant vers la page bon-de-commande
            echo '<form action="bon-de-commande.php" method="POST">';
            echo '<div class="vitrine">';
            $counter = 0;
            foreach ($bieres as $biere) {
                if ($counter % 3 === 0 && $counter !== 0) {
                    echo '</div><div class="vitrine">';
                }
                echo '<div class="biere">';
                echo '<h3>' . $biere['nom'] . '</h3>';
                echo '<p>Description : ' . $biere['description'] . '</p>';
                echo '<p>Prix : ' . $biere['prix'] . ' €</p>';
                echo '<p>Quantité disponible : ' . $biere['quantite'] . '</p>';
                echo '<img src="public/images/' . $biere['image'] . '" alt="' . $biere['nom'] . '">';
                echo '<input type="hidden" name="biere_id[]" value="' . $biere['id'] . '">';
                echo '<input type="number" name="quantite[]" min="0" max="' . $biere['quantite'] . '" value="0" required>';
                echo '</div>';
                $counter++;
            }
            echo '</div>';

            // Ajouter le bouton de validation à l'intérieur du formulaire
            echo '<input type="submit" value="Valider la commande">';
            // Fermer le formulaire
            echo '</form>';
        } else {
            // Afficher un message s'il n'y a pas de bières disponibles
            echo "<p>Aucune bière disponible pour le moment.</p>";
        }
        ?>
    </section>

</main>

<?php include('app/views/includes/footer.php'); ?>