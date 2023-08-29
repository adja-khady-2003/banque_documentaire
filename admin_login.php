<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Vérification des informations de connexion de l'administrateur
    $valid_admin_username = "admin"; // Nom d'utilisateur de l'administrateur
    $valid_admin_password = "admin123"; // Mot de passe de l'administrateur
    
    if ($username === $valid_admin_username && $password === $valid_admin_password) {
        session_start();
        $_SESSION['admin_username'] = $username;
        header("Location: ajout_doc.php"); // Redirige vers le tableau de bord de l'administrateur
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect pour l'administrateur.";
    }
}
?>
