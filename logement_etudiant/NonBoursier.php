<?php

class NonBoursier extends Etudiant
    {
            //private $id_etu;
            private $adresse; 

            public function __construct($matricule="",$nom="",$prenom="",$mail="",$telephone="",$date_naissance="",$adresse="")
            {
                parent::__construct($matricule,$nom,$prenom,$mail,$telephone,$date_naissance);
                //$this->id_etu = $id_etu;
                $this->adresse = $adresse;
            }

            /**
             * Get the value of id_etu
             */ 
           

            /**
             * Get the value of adresse
             */ 
            public function getAdresse()
            {
                        return $this->adresse;
            }

            /**
             * Set the value of adresse
             *
             * @return  self
             */ 
            public function setAdresse($adresse)
            {
                        $this->adresse = $adresse;

                        return $this;
            }
    }


?>