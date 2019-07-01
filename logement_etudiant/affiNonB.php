<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Index2.php">Gestion logement</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="base.php"><button class="btn btn-outline-primary" type="button">Ajouter</button></a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allEtu.php"><button class="btn btn-outline-primary" type="button">Tous les étudiants</button></a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="affB.php"><button class="btn btn-outline-primary" type="button">Les étudiants boursiés</button></a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="affiNonB.php"><button class="btn btn-outline-primary" type="button">Les étudiants non boursiés</button></a>
      </li>
    </ul>
  </div>
</nav>
    <?php
        function ChargeClasse($classe)
            {
                require $classe.'.php';
            }
            spl_autoload_register("ChargeClasse");

        $db = new PDO('mysql:host=localhost;dbname=logementEtu', 'yaya', 'yaya');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $etudiant = new EtudiantService($db);
    ?> 
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        
        <thead>
            <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date de naissance</th>
            </tr>
        </thead>
        <tbody>
                <?php
                   $etudiant->findNonBoursier(); 
                ?>
        </tbody> 

     </table>    

</body>
</html>
<script type="text/javascript">
                $(document).ready( function () {
                        $('#example').DataTable(
                            {
    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
        "<'row'<'col-sm-12'tr>>"+
        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
    "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
    }],
    "oLanguage": {
        "oPaginate": {
            "sFirst": "Premier",
            "sLast": "Dérnier",
            "sNext": "Suivant",
            "sPrevious": "Précedent",
        },
        "sSearch": "Recherche:",
        "sEmptyTable": "Aucune donnée disponible",
        "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
        "sInfoEmpty": "Aucune donnée disponible",
        "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
        "infoPostFix": "",
        "thousands": ",",
        "sLengthMenu": "Afficher par _MENU_ éléments",
        "loadingRecords": "Chargement...",
        "processing": "procéssus...",
        "sZeroRecords": "Aucun résultat trouvé",
    },
    "iDisplayLength": 10,
    "lengthChange": false,
    "info": false,
    responsive:false
}
                        );
                    } );
</script>