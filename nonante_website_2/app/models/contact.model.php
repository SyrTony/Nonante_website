<?php
class contact
{
    private ?string $nom= null;
    private ?string $prenom= null;
    private ?string $email = null;
    private ?int $tel= null;
    private ?string $adresse = null;
    private ?string $message = null;
    


    public function __construct($nom, $prenom, $email, $tel,$adresse,$message)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
         $this->adresse = $adresse;
        $this->message = $message;
    }

    
    public function getnom()
    {
        return $this->nom;
    }

    
    public function getprenom()
    {
        return $this->prenom;
    }


    public function getemail()
    {
        return $this->email;
    }
public function gettel()
    {
        return $this->tel;
    }
    public function getadresse()
    {
        return $this->adresse;
    }

public function getmessage()
    {
        return $this->message;
    }
  

    
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function settel($tel)
    {
        $this->tel = $tel;

        return $this;
    }
    public function setadresse($ad)
    {
        $this->adresse = $ad;

        return $this;
    }
    public function setmessage($b)
    {
        $this->message = $b;

        return $this;
    }
   
}
?>