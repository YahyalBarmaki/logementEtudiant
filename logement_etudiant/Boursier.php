<?php
    class Boursier extends Etudiant
        {
            //private $id_etu;
            //private $id_typ; 

            public function __construct($matricule,$nom,$prenom,$mail,$telephone,$date_naissance)
            {
                parent::__construct($matricule,$nom,$prenom,$mail,$telephone,$date_naissance);

            }
        }



?>