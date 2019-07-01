<?php
   abstract class Batiment
    {
        private $id;
        private $nom;
        private $num_bat;


        public function __construct($nom,$num_bat)
        {
            $this->nom = $nom;
            $this->num_bat=$num_bat;
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
         * Get the value of num_bat
         */ 
        public function getNum_bat()
        {
                return $this->num_bat;
        }

        /**
         * Set the value of num_bat
         *
         * @return  self
         */ 
        public function setNum_bat($num_bat)
        {
                $this->num_bat = $num_bat;

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