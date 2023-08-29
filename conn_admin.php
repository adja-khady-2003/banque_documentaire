
<!DOCTYPE html>
<html>
<head>
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <header>
    <h1>Connexion Administrateur</h1>
    
    </header

</head>
<style>
    header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}
/* Styles pour le bouton dans l'en-tête */

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
    width: 70%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.admin-button {
    background-color:  #FFFFFF;
    color: #000000;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    margin-top: 10px;
    margin-right: 20px;
}

.admin-button:hover {
    background-color: #555;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #808080;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
.button {
    display: inline-block;
    background-color: #000000;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #333;
}



</style>
<body>
    <div class="container">
        <form action="process_admin_login.php" method="post">
            
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required><br>
            
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>
            <a href="./pages/liste_doc.php" class="button">Connexion</a> 
            
        </form>
    </div>
</body>
</html>
