  <?php
  session_start();
  include('config/config.php');
  include('app/views/includes/header.php');
  ?>

  <link rel="stylesheet" href="public/css/presentation.css">

  <main>
    <div class="container">
      <h1>Nonante</h1>
      <img class="logo" src="public/images/LOGO_90.png" alt="Bière des années 90">
      <div class="text">
        <p>
          Bienvenue chez Nonante ! Nous sommes une marque de bière unique en son genre qui célèbre l'époque des années 90. Nous ciblons les étudiants et plus généralement les jeunes adultes.
        </p>
        <p>La marque propose des bières très fortes idéales pour les fêtes, les festivals et autres évènements, en s'appuyant sur une stratégie de domination par les coûts, tout en mettant en valeur la nature bio et respect de l'environnement de ses produits.
          Nonante se différencie par rapport à ses concurrents au-delà de sa stratégie grâce à deux éléments clés concernant ses produits :</p>
        <p>- Le fond : des saveurs originales basées sur la mixologie en revisitant des recettes pour les adapter sous forme de bière cocktail.</p>
        <p>- La forme : tous les produits sont mis en avant sous un style rétro avec tout un tas de références esthétique et culturelles des années 90.</p>
        <p>Tous ces choix ont été opté dans la logique d'approche à notre public cible.</p>
        <p>Notre site est dédié à la vente de produits de qualité pour répondre aux besoins de nos clients. Nous nous engageons à fournir des produits durables et à offrir un excellent service clientèle.</p>
        <p>
          Nos recettes sont donc inspirées par cette époque emblématiques et inoubliable !
        </p>
        <p>
          Rejoignez-nous pour un voyage nostalgique à travers le temps et découvrez nos bières authentiques et pleines de caractère. Que vous soyez un amateur de bière passionné ou simplement curieux, il y a une bière des années qui vous correspond.
        </p>
        <a class="button" href="../../catalogue.php">Découvrez nos bières</a>
      </div>
    </div>
  </main>

  <?php
  include('app/views/includes/footer.php');
  ?>