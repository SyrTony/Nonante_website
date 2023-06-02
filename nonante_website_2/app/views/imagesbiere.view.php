<?php
include('config/config.php');
include('app/models/imagesbiere.model.php');

if ($result->num_rows > 0) {
    // Afficher l'image
    while ($row = $result->fetch_assoc()) {
        $imagePath = $row['Image'];
        echo '<img src="public/images/' . $imagePath . '" alt="Bière aléatoire">';
    }
} else {
    echo "Aucune image trouvée dans la base de données.";
}

?>
