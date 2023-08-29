<?php
//Database Connection
include('../connexion/connexion.php');
if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
        //Getting Post Values
        $theme = $_POST['theme'];
        $titre = $_POST['titre'];
        $auteurs = $_POST['auteurs'];
        $resume = $_POST['resume'];
        $mots_cles = $_POST['mots_cles'];

        //Query for data updation
        $query = mysqli_query($conn, "update  documents set theme='$theme',titre='$titre', 
     auteurs='$auteurs', resume='$resume', mots_cles='$mots_cles' where ID='$eid'");

        if ($query) {
                echo "<script>alert('You have successfully update the data');</script>";
                echo "<script type='text/javascript'> document.location ='liste_doc.php'; </script>";
        } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
}
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
        <form method="POST">
                <?php
                //appel du fichier de connexion
                require_once('../connexion/connexion.php');
                $eid = $_GET['editid'];
                $ret = mysqli_query($conn, "select * from documents where ID='$eid'");
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                        <h2>Modification </h2>
                        <p class="hint-text">Veuillez modifier votre document</p>
                        <div>
                                <div class="row">
                                        <div class="col"><input type="text" placeholder="Theme" name="theme" value="<?php echo $row['theme']; ?>"></div>
                                </div>
                        </div>

                        <div>
                                <input type="text" placeholder="Titre" name="titre" value="<?php echo $row['titre']; ?>" required="true">
                        </div>

                        <div>
                                <input type="text" placeholder="Auteur" name="auteurs" value="<?php echo $row['auteurs']; ?>" required="true">
                        </div>

                        <div>
                                <textarea name="resume" required="true"><?php echo $row['resume']; ?></textarea>
                        </div>

                        <div>
                                <input type="text" name="mots_cles" value="<?php echo $row['mots_cles']; ?>" required="true">

                        </div>
                <?php
                } ?>
                <div>
                        <input type="submit" name="submit" value="Modifier">
                </div>
        </form>

</body>

</html>