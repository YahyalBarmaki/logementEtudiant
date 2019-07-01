<?php
class EtudiantService
{
    private $db;
    /*
            *La methode constructeur
            */
    public function __construct($db)

    {
        $this->setDB($db);
    }
    /*
             * Utilisation des méthodes
             */
    /**
     * Méthode insertion
     */

    public function add(Etudiant $etudiant)
    {
        $id=0;
        $requette = $this->_db->prepare('INSERT INTO etudiant 
                                     SET 
                                         matricule  =:matricule,
                                         nom        =:nom,
                                         prenom     =:prenom,
                                         mail       =:mail,
                                         telephone  =:telephone,
                                         date_naissance=:date_naissance
                                                          ');

        $requette->bindValue(':matricule',   $etudiant->getMatricule(),  PDO::PARAM_STR);
        $requette->bindValue(':nom',         $etudiant->getNom(),  PDO::PARAM_STR);
        $requette->bindValue(':prenom',    $etudiant->getPrenom(), PDO::PARAM_STR);
        $requette->bindValue(':mail',      $etudiant->getMail(), PDO::PARAM_STR);
        $requette->bindValue(':telephone',  $etudiant->getTelephone(), PDO::PARAM_INT);
        $requette->bindValue(':date_naissance', $etudiant->getDate_naissance(), PDO::PARAM_STR);

        $requette->execute();
        $requette->closeCursor();

        /**
         * Recupération du clé primaire
         */


        $recup = $this->_db->query('SELECT MAX(id) as id FROM etudiant');
        while ($row = $recup->fetch()) {
            $id = $row["id"];
            //var_dump($id);
            break;
        }
        $recup2 = $this->_db->query('SELECT MAX(id_ty) as idd FROM pension');
        while ($row = $recup2->fetch()) {
            $idd= $row["idd"];
            //var_dump($id);
            break;
        }
        if (get_class($etudiant) == 'NonBoursier') {
            $adresse = $etudiant->getAdresse();
            $req = $this->_db->prepare('INSERT INTO etudiantNonBoursier
                                                SET     id_etu=:id_etu,
                                                        adresse=:adresse
                    ');
            $req->bindValue(':id_etu', $id, PDO::PARAM_INT);
            $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
        }
        if (get_class($etudiant) == 'Boursier') {
           // $idd = $etudiant->getId_typ();
            $req = $this->_db->prepare('INSERT INTO etudiantBoursier
                                            SET     id_etu=:id_etu,             
                                                    id_typ=:id_typ
                ');
            $req->bindValue(':id_etu', $id, PDO::PARAM_INT);
            $req->bindValue(':id_typ', $idd, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
        }
    }
    /*
        */
    /**
     * Méthode affichage des etudiants
     */

    /**
     * Ajout Batiments
     */
    public function addBatiment(Batiment $batiment)
    {
        $id=0;
        $rqt = $this->_db->prepare('INSERT INTO baitments 
                                    SET nom =:nom,
                                        num_bat=:num_bat');

        $rqt->bindValue(':nom', $batiment->getNom(), PDO::PARAM_STR);
        $rqt->bindValue(':num_bat', $batiment->getNum_bat(), PDO::PARAM_INT);
        // var_dump($rqt);
        // die(); 
        $rqt->execute();
        $rqt->closeCursor();

        $recup = $this->_db->query('SELECT MAX(id) as id FROM baitments');
        while ($row = $recup->fetch()) {
            $id = $row['id'];
            break;
        }
        if (get_class($batiment) == 'Chambre')
           // $id = $batiment->getId();
            $nom_chambre = $batiment->getNom_chambre();
        $rqt = $this->_db->prepare('INSERT INTO chambre
                SET 
                id_bat=:id,
                nom_chambre=:nom_chambre');
        $rqt->bindValue(':id', $id, PDO::PARAM_INT);
        $rqt->bindValue(':nom_chambre',$nom_chambre, PDO::PARAM_STR);
        $rqt->execute();
        $rqt->closeCursor();
    }
/*
*Recherche étudiant non boursié 
*/
public function findNonBoursier()
    {
        $rqt=$this->_db->query("SELECT * FROM etudiant,etudiantNonBoursier WHERE 
        etudiantNonBoursier.id_etu = etudiant.id");
        while ($row = $rqt->fetch()) {             
            ?>
             <tr>
                 <td><?php echo $row['matricule']?></td>
                 <td><?php echo $row['nom']?></td>
                 <td><?php echo $row['prenom']?></td>
                 <td><?php echo $row['mail'] ?></td>
                 <td><?php echo $row['telephone']?></td>
                 <td><?php echo $row['date_naissance']?></td>
             </tr>
            <?php 
            }
    }
    public function findBoursier()
    {
        $rqt=$this->_db->query("SELECT * FROM etudiant,etudiantBoursier,pension WHERE 
        etudiantBoursier.id_etu = etudiant.id AND etudiantBoursier.id_typ = pension.id_ty");
        while ($row = $rqt->fetch()) {             
            ?>
             <tr>
                 <td><?php echo $row['matricule']?></td>
                 <td><?php echo $row['nom']?></td>
                 <td><?php echo $row['prenom']?></td>
                 <td><?php echo $row['mail'] ?></td>
                 <td><?php echo $row['telephone']?></td>
                 <td><?php echo $row['date_naissance']?></td>
             </tr>
            <?php 
            }
    }
    public function checkStatut()
    {
        $rqt=$this->_db->query("SELECT * FROM etudiant,etudiantBoursier,pension WHERE 
        etudiantBoursier.id_etu = etudiant.id AND etudiantBoursier.id_typ = pension.id_ty");
        while ($row = $rqt->fetch()) {             
            ?>
             <tr>
                 <td><?php echo $row['matricule']?></td>
                 <td><?php echo $row['nom']?></td>
                 <td><?php echo $row['prenom']?></td>
                 <td><?php echo $row['mail'] ?></td>
                 <td><?php echo $row['telephone']?></td>
                 <td><?php echo $row['date_naissance']?></td>
             </tr>
            <?php 
            }
    }    
    

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
