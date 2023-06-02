<?php
session_start();
include('C:/wamp64/www/nonante_website/config/config.php');
include('C:/wamp64/www/nonante_website/app/views/includes/header.php'); //Ajouter le header a l'emplacement prévu
?>


    <link rel="stylesheet" href="public/css/style_festival.css">

    
    <main>
        <div class="titre">
        <h1>MMI Festival de la bière 2023</h1>
    </div>
        <div class="titre2">
            <h2>Le festival</h2>
        </div>
        <div class="description-festival">
            <p>Retrouvez nous au MMI festival de la bière en juin 2023: un festival qui est dédié aux bières brassées maison !</p>
            <p>Nous nous aventurons dans l'inconnu avec cette première édition du festival Enzyme. C'est pour nous notre toute première participation à un festival et le moment de vous faire connaître notre univers.</p>
            <p>Nous vous connaissons jeunes buveurs, buveurs aguerris et buveurs fous ??? Nous vous avons concocté des bières spéciales années 90 avec un max de saveurs. Alors venez goûté au passé ! </p>
            <p>Pour les soucieux de l'environnement et de leur santé ne vous inquiétez pas nos bières sont 100% locales et BIO, donc pas besoin de vous retenir.</p>
            <p>Bien sûr, nous ne serions pas Nonante si nous ne vous proposions pas quelques animations : bornes d'arcades, musique et les meilleurs dessins animés des années 90.</p>
            <p>Pour ce festival, nous posons nos valises à l'IUT de Sénart à Lieusaint dans un univers étudiants pour encore plus de convivialité.</p>
            <p>Les entrées sont gratuites et libre, vous payez uniquement pour ce que vous consommez, sympa non ?</p>
        </div>
            <div class="titre2">
            <h2>Programme</h2>
        </div>
        <div >
            <p class="titre4">DÉGUSTATION DE BIÈRE</p>
                <br>
                <br>
                <p class="stand">Stand où vous aurez l'occasion de déguster nos bières et discuter avec nous.</p>
            
            </div>
            <div class="photos">
                <img src="public/images/1-1.jpg">
                <img src="public/images/Fête-de-la-bière.jpg">
            </div>
            <a href="#">
                <button class="bouton">Nos bières</button></a>
            <p class="activite">Vous aurez aussi le droit à des activités externes présentes sur le stand tel que :</p>
            <div class="titre3">
            <h3>Bornes d'arcades</h3>
        </div>
            <div class="photos">
            <img src="public/images/tekken_arcade.jpg">
        </div>
        <p class="desc">Pour y faire vos plus belles parties de Tekken comme dans les années 90</p>
        <div class="titre3">
             <h3>Musique années 90</h3>
        </div>
             <div class="photos">
                <img src="public/images/jukebox.jpg">
            </div>
        <p class="mia">Pour vous faire danser le Mia de manière endiablée</p>
    </main>
 <?php include('app/views/includes/footer.php') ?>
