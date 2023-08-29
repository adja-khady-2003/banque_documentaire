
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <header>
    <h1>Bienvenue dans votre Banque Documentaire !</h1>

    <script src="script.js"></script>
    <a href="conn_admin.php" class="header-button">Connexion</a> 
    
    </header>
</head>
<style>
header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;

}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
header {
    overflow: auto; /* Pour gérer le flottement du bouton */
}
h1 {
    color: #FFFFFF; /* Couleur de texte blanche */

}
.header-button {
    background-color:  #FFFFFF;
    color: #000000;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    float: right; /* Aligne le bouton à droite de l'en-tête */
    margin-top: 10px;
    margin-right: 20px;
}

.header-button:hover {
    background-color: #555;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.search-container {
    width: 300px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2{
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

select,
input[type="text"],
button {
    display: block;
    margin-bottom: 10px;
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 3px;
    color: #333;
    background-color: #fff;
}

button {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

#search-results {
    margin-top: 20px;
}




</style>

<body>
    <div class="search-container">
        <h2>Recherche de Documents</h2>
        
        <form id="search-form">
            <label for="search_mode">Mode de Recherche :</label>
            <select id="search_mode" name="search_mode">
                <option value="themes">Par Thème</option>
                <option value="authors">Par Auteur</option>
                <option value="keywords">Par Mots Clés</option>
            </select>
            
            <input type="text" id="search_query" name="search_query" placeholder="Recherche...">
            <button type="button" onclick="performSearch()">Rechercher</button>
        </form>
        
        <div id="search-results">
            <!-- Résultats de la recherche seront affichés ici -->
        </div>
    </div>

</body>
</html>

   
</body>

</html>