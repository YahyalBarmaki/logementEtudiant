<?php
if (isset($_POST['val'])) {
    /**
     * Recupération des champs
     */
    // var_dump($_POST);
    /**
     * Vérification des champs
     */
    $mat = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel  = $_POST['tel'];
    $date = $_POST['datedenaissance'];
    $adresse = $_POST['adresse'];
    $id = $_POST['typbourse'];
    /**
     * Vérification des champs
     */
   /* if ((empty($mat))) {
        echo "error";
        exit;
    } elseif ((empty($nom))) {
        echo "error";
        exit;
    } elseif ((empty($prenom))) {
        echo "error";
        exit;
    } elseif ((empty($mail))) {
        echo "error";
        exit;
    } elseif ((empty($tel))) {
        echo "error";
        exit;
    } elseif ((empty($datedenaissance))) {
        echo "error";
        exit;
    }
*/

    /**
     * La fonction autoload qui charge les classes
     */
    function chargerClasse($classe)
    {
        require $classe . ".php";
    }

    spl_autoload_register("chargerClasse");

    /**
     * Connection à la base de donnée
     */
    $db = new PDO('mysql:host=localhost;dbname=logementEtu', 'yaya', 'yaya');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $option = $db->query("SELECT * FROM pension");
    // var_dump($option);
    // die();
    $test = new EtudiantService($db);

    // var_dump($_POST);
    if ($db) {
        echo 'good' . '</br>';
    }
    /**
     * Création d'objet 
     */

    if ($_POST['optradio'] == 'Boursier')

        $etudiant  = new Boursier(
            $_POST['matricule'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['mail'],
            $_POST['tel'],
            $_POST['datedenaissance']
        );

    else {
        $etudiant  = new NonBoursier(
            $_POST['matricule'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['mail'],
            $_POST['tel'],
            $_POST['datedenaissance'],
            $adresse
        );
    }
    $test->add($etudiant);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="formR">

        <?php
        $db = new PDO('mysql:host=localhost;dbname=logementEtu', 'yaya', 'yaya');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $option = $db->query("SELECT * FROM pension");
        $loge = $db->query("SELECT * FROM baitments");
        $chambre = $db->query("SELECT * FROM chambre");
        // var_dump($option);
        // die();
        ?>
        <h1 id="txt1">Ajout étudiants</h1>
        <form action="base.php" method="post" id="FormR">
            <div id="forme1">
                <fieldset>
                    <Legend>Informations étudiant</Legend>
                    <label for="">Matricule:</label>
                    <input type="text" name="matricule" placeholder="Entrer le matricule"><br><br>
                    <label for="">Nom:</label>
                    <input type="text" name="nom" placeholder="Entrer le nom"><br><br>
                    <label for="">Prenom:</label>
                    <input type="text" name="prenom" placeholder="Entrer le prenom"><br><br>
                    <label for="">Mail:</label>
                    <input type="mail" name="mail" placeholder="Entrer votre mail"><br><br>
                    <label for="">Téléphone:</label>
                    <input type="number" name="tel" placeholder="Entrer votre téléphone"><br><br>
                    <label for="">Date de naissance:</label>
                    <input type="date" name="datedenaissance" placeholder="Entrer votre Date de naissance">
                </fieldset>
            </div>
            <div id="forme2">
                <fieldset>
                    <Legend>Etes vous boursiers</Legend>
                    <label for="check1">Boursier</label>
                    <input type="radio" name="optradio" id="check1" value="Boursier">
                    <label for="check2">Non_boursier</label>
                    <input type="radio" name="optradio" id="check2" value="NonBoursier" default>
                </fieldset>
            </div>

            <div id="adr">
                <fieldset>
                    <label for="">Adresse:</label>
                    <input type="text" name="adresse" placeholder="Entrer votre adresse">
                </fieldset>
            </div>

            <div id="form3">
                <fieldset>
                    <label for="typbourse">Type de bourse</label>
                    <select name="typbourse" id="typbourse">
                        <?php
                        while ($row = $option->fetch()) {
                            echo "<option value='$row[id]'>$row[type]</option>";
                        }
                        ?>
                    </select>
        
                    <Legend>Etes vous logés</Legend>
                    <label for="check1_2">Logé</label>
                    <input type="radio" name="loge" id="check1_2">
                </fieldset>

                <div id="btn4">
                    <fieldset>
                        <Legend>Batiment et chambre</Legend>
                        <label for="">Batiment</label>
                        <select name="" id="idbat">
                            <?php
                            while ($row = $loge->fetch()) {
                                echo "<option value='$row[id]' id='idlog'>$row[nom]</option>";
                            }
                            ?>
                        </select>
                        <label for="">Chambre</label>
                        <div id="idchamb">
                            <select name="">
                                <?php
                                while ($row = $chambre->fetch()) {
                                    echo "<option value='$row[id]'>$row[nom_chambre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </fieldset>
                </div>
            </div>

            <input type="submit" name="val" value="valider">
            <a href="Index2.php"><input type="button" value="précédent"></a>
        </form>
    </div>

    <script src="pagejs.js"></script>
</body>

</html>