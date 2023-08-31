<?php
//Databse Connection file
include('../../connexion/connexion.php');
if (isset($_POST['submit'])) {

    

    //getting the post values
    $theme = $_POST['theme'];


    // Query for data insertion
    $query = mysqli_query($conn, "insert into theme (nom_theme) 
    value('$theme' )");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
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
        <h1>Ajouter un theme</h1>
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



</head>


<body>
    <form method="POST" enctype="multipart/form-data">

        <div>
            <label>Theme :</label>
            <input type="text" name="theme" required>
            
        </div>
        
        <div>
                <input type="submit" name="submit" value="Ajouter ">
            

        </div>
    </form>

</body>

</html>