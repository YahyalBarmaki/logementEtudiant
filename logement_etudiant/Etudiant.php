 <?php
   abstract class Etudiant
    {
       private $id; 
       private $matricule;
       private $nom;
       private $prenom;
       private $mail;
       private $telephone;
       private $date_naissance;
       /*
        *Methode de construction 
        */

       /*public function __construct($donnee = array())
       {
           if (!empty($donnee)) {
               $this->hydrate($donnee);
           }
       }*/
       /*
       *hydratation de l'objet par méthode
       */
     /* public function hydrate(array $donnee)
       {
           foreach ($donnee as $key => $value) {
               $methode = 'set'.ucfirst($key);
               if (method_exists($this,$methode)) {
                   $this->$methode($value);
               }
           }
       }*/
       public function __construct($matricule,$nom,$prenom,$mail,$telephone,$date_naissance)
              {
                     $this->matricule = $matricule;
                     $this->nom =$nom;
                     $this->prenom =$prenom;
                     $this->mail =$mail;
                     $this->telephone =$telephone;
                     $this->date_naissance =$date_naissance;

              }
       /**
        * Get the value of matricule
        */ 
       public function getMatricule()
       {
              return $this->matricule;
       }

       /**
        * Set the value of matricule
        *
        * @return  self
        */ 
       public function setMatricule($matricule)
       {
              $this->matricule = $matricule;

              return $this;
       }

       /**
        * Get the value of nom
        */ 
       public function getNom()
       {
              return $this->nom;
       }

       /**
        * Set the value of nom
        *
        * @return  self
        */ 
       public function setNom($nom)
       {
              $this->nom = $nom;

              return $this;
       }

       /**
        * Get the value of prenom
        */ 
       public function getPrenom()
       {
              return $this->prenom;
       }

       /**
        * Set the value of prenom
        *
        * @return  self
        */ 
       public function setPrenom($prenom)
       {
              $this->prenom = $prenom;

              return $this;
       }

       /**
        * Get the value of mail
        */ 
       public function getMail()
       {
              return $this->mail;
       }

       /**
        * Set the value of mail
        *
        * @return  self
        */ 
       public function setMail($mail)
       {
              $this->mail = $mail;

              return $this;
       }

       /**
        * Get the value of telephone
        */ 
       public function getTelephone()
       {
              return $this->telephone;
       }

       /**
        * Set the value of telephone
        *
        * @return  self
        */ 
       public function setTelephone($telephone)
       {
              $this->telephone = $telephone;

              return $this;
       }

       /**
        * Get the value of datedenaissance
        */ 
       public function getDate_naissance()
       {
              return $this->date_naissance;
       }

       /**
        * Set the value of datedenaissance
        *
        * @return  self
        */ 
       public function setDate_naissance($date_naissance)
       {
              $this->date_naissance = $date_naissance;

              return $this;
       }

       /**
        * Get the value of id
        */ 
       public function getId()
       {
              return $this->id;
       }

       /**
        * Set the value of id
        *
        * @return  self
        */ 
       public function setId($id)
       {
              $this->id = $id;

              return $this;
       }
    }


?>