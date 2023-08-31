<?php
//Databse Connection file
include('../../connexion/connexion.php');
if (isset($_POST['submit'])) {

    // upload file
    if (isset($_FILES['files'])) {
        $errors = array();
        $file_name = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $file_tmp = $_FILES['files']['tmp_name'];
        $file_type = $_FILES['files']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));

        $extensions = array("jpeg", "jpg", "png", "pdf", "txt");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../files/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }


    //getting the post values
    $theme = $_POST['theme'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $resume = $_POST['resume'];
    $mots_cles = $_POST['mots_cles'];
    $fichier = $file_name;


    // Query for data insertion
    $query = mysqli_query($conn, "insert into documents (nom_theme,titre, auteurs, resume, mots_cles, fichier) 
    value('$theme','$titre', '$auteur', '$resume', '$mots_cles', '$fichier' )");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='liste_doc.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

//liste theme
$sql_part_theme = "select * from theme";
//execution
$query_part_theme = mysqli_query($conn, $sql_part_theme) or die(mysqli_error($conn));

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <header>
        <h1>Banque de Documentation</h1>
    </header>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="textarea"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        textarea {
            height: 200px;
            /* Augmentez la hauteur pour plus de marge d'écriture */
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Styles pour la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #808080;
        }

        input[type="button"] {
            background-color: #0b437e;
            color: white;
            border-bottom: #333;
            border-radius: 7px;
            padding: 10px 20px;
            cursor: pointer;
            width: 50%;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>


    <head>
        <title> Banque de Documentation</title>

    </head>
</head>


<body>
    <form method="POST" enctype="multipart/form-data">

        <?php

            echo "
            <div>
                <label>Theme :</label>
                <select name='theme' required> ";
            echo "<option>Selectionner un theme</option>";
        while ($part = mysqli_fetch_array($query_part_theme)) {
            //tant qu'on extrait des lignes sous forme de table  executif
            extract($part);
            echo "<option value='$nom_theme'>$nom_theme</option>";
        }
            echo "</select>
                 </div>";

        ?>


        <div>
            <label>Titre :</label>
            <input type="text" name="titre">
        </div>
        <div>
            <label>Auteur(s): </label>
            <input type="text" name="auteur">
        </div>
        <div>
            <label>Résumé :</label>
            <textarea name="resume" rows="6"></textarea>
        </div>
        <div>
            <label>Mots clés :</label>
            <input type="text" name="mots_cles">
        </div>
        <div>
            <label>Fichier :</label>
            <input type="file" name="files" />
            <div>
                <input type="submit" name="submit" value="Ajouter le Document">
            </div>

        </div>
    </form>

</body>

</html>