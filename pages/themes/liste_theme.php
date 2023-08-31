<?php
//appel du fichier de connexion
require_once('../../connexion/connexion.php');

//definition de la requete
$sql_part = "select * from theme";
//execution
$query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style_liste_doc.css">
    <a href="PROJET_PHP/pages/themes"></a>

    <header>
        <h1>liste de theme !</h1>
        <div>
            <a href="ajout_theme.php" class="header-button">Ajouter</a>
            <a href="../accueil.php" class="header-button">Retour</a>
        </div>
    </header>
</head>

<body>

    <table border="1">
        <tr>
            <!-- <th>Modification</th>
            <th>Suppression</th> -->
            <th>theme</th>
            <th>Action</th>

        </tr>

        <?php
        while ($part = mysqli_fetch_array($query_part)) {
            //tant qu'on extrait des lignes sous forme de table  executif
            extract($part);
            echo "<tr>

                <td>$nom_theme</td>
                <td>
                <a href='edit_theme.php?editid=$id'>Editer</a>
                <a href='supprim_theme.php?delid=$id'
                    onclick=\"return confirm('Voulez vous supprimer $nom_theme ? oui ou non?');\"> Supprimer </a>
                </td>

                
             </tr>";
        }
        ?>
    </table>