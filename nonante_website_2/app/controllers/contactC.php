<?php
include ('C:/wamp64/www/nonante_website_2/config/config.php');
include ('C:/wamp64/www/nonante_website_2/app/models/contact.model.php');

class contactC
{
    public function affichercontact()
    {
        $sql = "SELECT * FROM contact";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function ajouterContact($c)
    {
        $sql = "INSERT INTO `contact`
        VALUES (:n,:p,:e,:t,:a,:m)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $c->getnom(),
                'p' => $c->getprenom(),
                'e' => $c->getemail(),
                't' => $c->gettel(),
                'a' => $c->getadresse(),
                'm' => $c->getmessage(),
                

                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    

}
    ?>