<?php
//Database Connection
include('../../connexion/connexion.php');
if (isset($_POST['submit'])) {



        // mise à jour
        $eid = $_GET['editid'];
        //Getting Post Values
        $nom_theme = $_POST['nom_theme'];

        //Query for data updation
        $query = mysqli_query($conn, "update  theme set nom_theme='$nom_theme' where ID='$eid'");

        if ($query) {
                echo "<script>alert('You have successfully update the data');</script>";
                echo "<script type='text/javascript'> document.location ='liste_theme.php'; </script>";
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
                <h1>Modification Theme</h1>
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
                $ret = mysqli_query($conn, "select * from theme where ID='$eid'");
                while ($row = mysqli_fetch_array($ret)) {

                ?>
                        <div>
                                <label> Theme :</label>
                                <input type="text" name="nom_theme" value="<?php echo $row['nom_theme']; ?>" required="true">

                        </div>

                <?php
                } ?>
                <div>
                        <input type="submit" name="submit" value="Modifier">
                </div>

        </form>

</body>

</html>