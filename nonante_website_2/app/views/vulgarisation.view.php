<?php
session_start();
include('C:/wamp64/www/nonante_website/config/config.php');
include('C:/wamp64/www/nonante_website/app/views/includes/header.php'); //Ajouter le header en début de page
?>


    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="public/css/processus.css">
    
    <div class="bground">
        <h1>Le processus de création de nos bières</h1>
    </div>

    <div class="info">
       
    </div>

    <div class="paragraphs">
        <div class="block">
            <h3 class="txtblock">Recherche et création de la recette</h3>
            <p>Premièrement, les élèves se sont attelés à la confection d'une recette originale avec des aliments qui pourraient bien fonctionner ensembles. Après de nombreuses recherches ils sont parvenus à se mettre d'accord sur cette recette : Fraise, Citron, Poivron, Basilic.
            </p>
            <img src="public/images/ingredients.png" alt="ingredients">
        </div>
        <div class="block">
            <h3>Confection de la bière</h3>
            <p>Après avoir validé les ingrédients de la bière, les élèves ont commencé l'étape de brassage de la bière. Le brassage commence par le concassage du malt, ensuite on passe à l'étape de l'empâtage qui consiste à faire bouillir le malt dans des cuves d'eau. Ensuite on ajoute le houblon et on attend !</p>
            <img class ="etapes" src="public/images/concassage.jpg" alt="Concassage">
            <img class ="etapes" src="public/images/empatage.jpg" alt="Empatage">
            <img class ="etapes" src="public/images/brassage.jpg" alt="Brassage">
            <img class ="etapes" src="public/images/ebullition.jpg" alt="Ébullition">
            <img class ="etapes" src="public/images/fermentation.jpg" alt="Fermentation">
        </div>
        <div class="block">
            <h3>La mise en bouteille</h3>
            <p>Dernière étape du processus, une fois notre bière obtenue, on la met dans les bouteilles prévues à cet effet, on y ajoute ensuite l'étiquette réalisée par notre groupe de SAÉ, et voilà la dégustation peut commencer !</p>
            
            <?php
            include('imagesbiere.php');
            ?>

        </div>
    </div>

    <?php include('app/views/includes/footer.php'); ?>
