<?php
    session_start();
    include ('config/config.php');
    include ('app/views/includes/header.php'); 
    ?>

    <link rel="stylesheet" href="public/css/actu.css">

    <main>
        <div class="background">
            <div class="blur"></div>
        </div>
        <div class="text">
            <h2>Replongez dans les années 90's en animée !</h2>


            <div class="video_container">
                <video controls class="video">
                    <source src="public/images/Nonante_Beer_Animation.mp4" type="video/mp4">


                </video>
            </div>
        </div>
        <p>
            Nonante vous propose une courte vidéo d'animation qui met en avant notre bière phare la Nonante dans un
            univers qui ne vous sera sûrement pas inconnu.
        </p>
        <h2> Retrouvez nous au festival de la bière !</h2>

        <div class="img-canva">
            <img src="public/images/festival.png">
            
            <?php
            // Date de l'événement
            $dateEvenement = new DateTime('2023-06-07');

            // Date actuelle
            $dateActuelle = new DateTime('2023-06-02');

            // Calcul de la différence entre les deux dates
            $diff = $dateActuelle->diff($dateEvenement);

            // Récupération du nombre de jours restants
            $joursRestants = $diff->format('%a');

            // Affichage du compte à rebours
            echo "<p>Le festival aura lieu dans $joursRestants jours.</p>";
           
                        ?>
            

            <a href="festival.php">
                <button type="button" class="btn_festival">Clique ici pour rejoindre directement la page festival</button>
              </a>



        </div>
    </main>

    <?php include('app/views/includes/footer.php'); ?>
