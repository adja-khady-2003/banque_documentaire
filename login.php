<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Vérification des informations de connexion de l'administrateur
    $valid_admin_username = "admin"; // Nom d'utilisateur de l'administrateur
    $valid_admin_password = "admin123"; // Mot de passe de l'administrateur
    echo "test";
    if ($username === $valid_admin_username && $password === $valid_admin_password) {
        session_start();
        $_SESSION['admin_username'] = $username;
        header("Location: ./pages/liste_doc.php"); // Redirige vers le tableau de bord de l'administrateur
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect pour l'administrateur.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="./styles/x.css">
    <link rel="stylesheet" type="text/css" href="./styles/w3.css">
</head>

<body>
    <form method="POST" autocomplete='off' class='form'>
        <div class='control'>
            <h1>
                Page de connexion
            </h1>
        </div>
        <div class='control block-cube block-input'>
            <input name='username' placeholder='Username' type='text'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input name='password' placeholder='Password' type='password'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <button class='btn block-cube block-cube-hover' type='button'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
            <div class='text'>
                <input class="w3-button w3-bar-item w3-padding-large" type="submit" value="Se connecter">
            </div>
        </button>
        <div class='credits'>
            <a href='https://codepen.io/marko-zub/' target='_blank'>
                My other codepens
            </a>
        </div>
    </form>
</body>

</html>