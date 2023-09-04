<?php
//Database Connection
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

                $extensions = array("pdf", "txt", "docx");

                if (in_array($file_ext, $extensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 8097152) {
                        $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                        move_uploaded_file($file_tmp, "../../files/" . $file_name);
                        echo "Success";
                } else {
                        print_r($errors);
                }
        }

        // mise à jour
        $eid = $_GET['editid'];
        //Getting Post Values
        $nom_theme = $_POST['theme'];
        $titre = $_POST['titre'];
        $auteurs = $_POST['auteurs'];
        $resume = $_POST['resume'];
        $mots_cles = $_POST['mots_cles'];
        $fichier = $file_name;

        //Query for data updation
        $query = mysqli_query($conn, "update  documents set nom_theme='$nom_theme',titre='$titre', 
     auteurs='$auteurs', resume='$resume', mots_cles='$mots_cles', fichier='$fichier' where ID='$eid'");

        if ($query) {
                echo "<script>alert('You have successfully update the data');</script>";
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
                <h1>Modification</h1>
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
</head>


<body>
        <form method="POST" enctype="multipart/form-data">
                <?php
                //appel du fichier de connexion
                require_once('../../connexion/connexion.php');
                $eid = $_GET['editid'];
                $ret = mysqli_query($conn, "select * from documents where ID='$eid'");
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                        <div>
                                <label>Theme :</label>
                                <select name='theme' value=<?php echo $row['nom_theme']; ?> required>
                                        <option value='' selected disabled>--- Selectionner un thème ---</option>
                                        <?php
                                        while ($part = mysqli_fetch_array($query_part_theme)) {
                                                //tant qu'on extrait des lignes sous forme de table  executif
                                                extract($part);
                                                if ($nom_theme == $row['nom_theme']) {
                                                        echo "<option value='$nom_theme' selected>$nom_theme</option>";
                                                } else {
                                                        echo "<option value='$nom_theme'>$nom_theme</option>";
                                                }
                                        }
                                        ?>
                                </select>
                        </div>

                        <div>
                                <label>Titre :</label>
                                <input type="text" placeholder="Titre" name="titre" value="<?php echo $row['titre']; ?>" required="true">
                        </div>

                        <div>
                                <label>Auteur (s) :</label>
                                <input type="text" placeholder="Auteur" name="auteurs" value="<?php echo $row['auteurs']; ?>" required="true">
                        </div>

                        <div>
                                <label>Résumé :</label>
                                <textarea name="resume" required="true"><?php echo $row['resume']; ?></textarea>
                        </div>

                        <div>
                                <label> Mots clés :</label>
                                <input type="text" name="mots_cles" value="<?php echo $row['mots_cles']; ?>" required="true">

                        </div>
                        <div>
                                <label> Fichier :</label>
                                <input type="file" name="files" value="<?php echo $row['fichier']; ?>"/>

                        </div>
                <?php
                } ?>
                <div>
                        <input type="submit" name="submit" value="Modifier">
                </div>
        </form>

</body>

</html>