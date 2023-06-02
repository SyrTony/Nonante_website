<?php

include ('C:/wamp64/www/nonante_website_2/app/controllers/contactC.php');
include('C:/wamp64/www/nonante_website_2/app/views/includes/header.php');

$error = "";


// Créer une instance du contrôleur
$contactC = new contactC();





if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["message"]) 
    
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["message"]) 
        
    ) {
        $contact = new contact(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            intval( $_POST['tel']),
            $_POST['adresse'],
            $_POST['message'] ,
            

        );
        $contactC->ajouterContact($contact);
        echo '<div class="message">Votre message a été envoyé avec succès !</div>';
        exit();
    } else {
        $error = "Missing information";
        
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="public\css\style.css">
<style>

                form {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                form label {
                display: block;
                margin-bottom: 10px;
                }
                form input[type="text"],
                form textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                resize: vertical;

                }

       </style>
       
    
    </head>
    <body>
     <main>
     <div class="ins">
     <h1>Contact</h1>
    
    <form id="contact-form" actio="" method="POST">
   
    <div class="par">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom" required />
          
    </div>
    <div class="par">
          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" name="prenom" required />
    </div>
    <div class="par">       
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required />
          
        
     </div> 
     <div class="par">          
          <label for="tel">Numéro téléphone</label>
          <input type="text" id="tel" name="tel" required />
          
     </div>
     <div class="par">          
        <label for="adresse"> Adresse</label>
        <input type="text" id='adresse'name="adresse" required>
    </div>
    <div class="par">          
    <label for="message"> Message</label>
    <textarea id="message" name="message" required></textarea>
     </div>
        <div class="par">
     <input type="submit" value="contacter">
        </div>
       </form>  
     </div>
     </main>
    </body>
    </html>    
    <?php include('../views/includes/footer.php');?>
