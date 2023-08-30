<?php
//appel du fichier de connexion
require_once('../connexion/connexion.php');

//definition de la requete
$sql_part = "select * from documents";
//execution
$query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_liste_doc.css">
    <a href="PROJET_PHP/pages/ajout_liste.php"></a>

    <header>
        <h1>Voici la fiche de lecture des documents !</h1>
        <div>
        <a href="../index.php" class="header-button">Accueil</a> 
        <a href="ajout_doc.php" class="header-button">Ajouter</a> 
    </div>
    </header>
</head>

<body>

    <table border="1">
        <tr>
            <!-- <th>Modification</th>
            <th>Suppression</th> -->
            <th>theme</th>
            <th>titre</th>
            <th>auteur</th>
            <th>resume</th>
            <th>mots_cles</th>
            <th>fichier</th>
            <th>Action</th>

        </tr>
                
            <?php
            while ($part = mysqli_fetch_array($query_part)) {
                //tant qu'on extrait des lignes sous forme de table  executif
                extract($part);
                echo "<tr>

                <td>$theme</td>
                <td>$titre</td>
                <td>$auteurs</td>
                <td>$resume</td>
                <td>$mots_cles</td>
                <td></td>
                <td>
                <a href='edit_doc.php?editid=$id'>Editer</a>
                <a href='supprim_doc.php?delid=$id'
                    onclick=\"return confirm('Voulez vous supprimer $titre ? oui ou non?');\"> Supprimer </a>
                </td>

                
             </tr>";
            }
            ?>
        </table>