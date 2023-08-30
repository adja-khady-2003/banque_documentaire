<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="./styles/style_index.css">
    <header>
        <h1>Bienvenue dans votre Banque Documentaire !</h1>

        <!-- <script src="script.js"></script> -->
        <a href="conn_admin.php" class="header-button">Connexion</a>

    </header>
</head>

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