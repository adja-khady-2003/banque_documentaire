<?php
//appel du fichier de connexion
require_once('../../connexion/connexion.php');

//definition de la requete
$sql_part = "select * from documents";
//execution
$query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="../../styles/liste_page.css">
     <link rel="stylesheet" href="../../styles/accueil.css">
     <link rel="stylesheet" href="../../styles/bootstrap.css">
    <style type="text/css">
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }
    </style>
    
</head>

<body>
    <div class="topnav">
        <a href="../accueil.php">Home</a>
        <a class="active" href="./liste_doc.php">Document</a>
        <a href="../themes/liste_theme.php">Theme</a>
        <a href="../../index.php">Voir Site</a>

    </div>

    <div class="container" style="margin-top: 25px;">
        <div class="">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2> <b>Documents</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-info add-new" href='ajout_doc.php'>
                            <i class="fa fa-plus"></i>
                            Ajouter document
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Thème</th>
                        <th>Titre</th>
                        <th>Auteur(s)</th>
                        <th>Resume</th>
                        <th>Mots clés</th>
                        <th>Fichier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($part = mysqli_fetch_array($query_part)) {
                        //tant qu'on extrait des lignes sous forme de table  executif
                        extract($part);
                        echo "<tr>

                                <td>$nom_theme</td>
                                <td>$titre</td>
                                <td>$auteurs</td>
                                <td>$resume</td>
                                <td>$mots_cles</td>
                                <td>$fichier</td>
                                <td>
                                <a href='edit_doc.php?editid=$id' class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>
                                <a href='supprim_doc.php?delid=$id'
                                onclick=\"return confirm('Voulez vous supprimer $titre ? oui ou non?');\" class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>
                                                                
                            </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>