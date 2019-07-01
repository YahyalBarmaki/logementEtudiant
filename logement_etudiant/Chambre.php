<?php
    class Chambre extends Batiment
        {
            private $nom_chambre;
            public function __construct($nom,$num_bat,$nom_chambre)
                {
                    parent::__construct($nom,$num_bat);
                    $this->nom_chambre = $nom_chambre;
                }


            /**
             * Get the value of nom_chambre
             */ 
            public function getNom_chambre()
            {
                        return $this->nom_chambre;
            }

            /**
             * Set the value of nom_chambre
             *
             * @return  self
             */ 
            public function setNom_chambre($nom_chambre)
            {
                        $this->nom_chambre = $nom_chambre;

                        return $this;
            }
        } 
?>