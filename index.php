<?php
//appel du fichier de connexion
require_once('./connexion/connexion.php');

//definition de la requete
$sql_part = "select * from documents";
//execution
$query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

// recherche suivant les critères définis
if (isset($_POST['search_query']) && isset($_POST['search_mode']) && $_POST['search_mode'] == 'theme') {
  $query = $_POST['search_query'];
  $sql_part = "select * from documents where nom_theme like '%$query%'";
  $query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

  echo "<script type='text/javascript'> document.location ='index.php#tour'; </script>";
} else if (isset($_POST['search_query']) && isset($_POST['search_mode']) && $_POST['search_mode'] == 'auteur') {
  $query = $_POST['search_query'];
  $sql_part = "select * from documents where auteurs like '%$query%'";
  $query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

  echo "<script type='text/javascript'> document.location ='index.php#tour'; </script>";
} else if (isset($_POST['search_query']) && isset($_POST['search_mode']) && $_POST['search_mode'] == 'mot_cle') {
  $query = $_POST['search_query'];
  $sql_part = "select * from documents where mots_cles like '%$query%'";
  $query_part = mysqli_query($conn, $sql_part) or die(mysqli_error($conn));

  echo "<script type='text/javascript'> document.location ='index.php#tour'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>W3.CSS Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./styles/w3.css">
  <link rel="stylesheet" href="./styles/lato.css">
  <link rel="stylesheet" href="./styles/fontawesome.css">
  <link rel="stylesheet" href="./styles/search.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: "Lato", sans-serif
    }

    .mySlides {
      display: none
    }


    .search-container {
      width: 300px;
      margin: auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

    /* // */
  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-black w3-card">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">ACCUEIL</a>
      <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PUBLICATIONS</a>
      <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">A PROPOS</a>
      <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
      <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right">SE CONNECTER</a>
      <!-- <a href="conn_admin.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i>Se connecter</a> -->
    </div>
  </div>

  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
  <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="#band" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">BAND</a>
    <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">TOUR</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a>
  </div>

  <!-- Page content -->
  <div class="w3-content" style="max-width:2000px;margin-top:46px">

    <!-- Automatic Slideshow Images -->
    <div class="mySlides w3-display-container w3-center w3-round">
      <img src="./images/film-1668918_640.jpg" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <h3>Los Angeles</h3>
        <p><b>We had the best time playing at Venice Beach!</b></p>
      </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
      <img src="./images/camera-1130731_640.jpg" style="width:70%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <h3>New York</h3>
        <p><b>The atmosphere in New York is lorem ipsum.</b></p>
      </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
      <img src="./images/a-book-3088775_640.jpg" style="width:70%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <h3>New York</h3>
        <p><b>The atmosphere in New York is lorem ipsum.</b></p>
      </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
      <img src="./images/books-2596809_1280.jpg" style="width:70%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <h3>Chicago</h3>
        <p><b>Thank you, Chicago - A night we won't forget.</b></p>
      </div>
    </div>

    <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
      <h2 class="w3-wide">BANQUE DOCUMENTAIRE</h2>
      <p class="w3-opacity"><i>à savoir</i></p>
      <p class="w3-justify"> Cette base de documents recueille des descriptions de livres de tout genre.
        Une banque documentaire comporte une base de données et un logiciel, assurant la création de nouvelles données,
        la mise à jour des informations déjà existantes et la possibilité d'interrogation.
        Ainsi,la base de données est concrètement le programme informatique qui est donc "le contenant".
        La banque de données est le "contenu" de la base et dans une base de données il peut y avoir plusieurs banques.
      </p>
    </div>



    <!-- The Tour Section -->
    <div class="w3-black" id="tour">

      <!-- bloc de recherche -->
      <div class="w3-container w3-content w3-padding-30" style="padding-top: 10px;">
        <form action="" method="POST">
          <div class="w3-row">
            <!-- <label for="search_mode">Mode de Recherche :</label> -->

            <div class="w3-col l4" style="padding-right: 20px;">
              <select id="search_mode" name="search_mode" required>
                <option value="" selected disabled> <b>Veuillez choisir un mode de recherche</b></option>
                <option value="theme">Par Thème</option>
                <option value="auteur">Par Auteur</option>
                <option value="mot_cle">Par Mots Clés</option>
              </select>
            </div>

            <div class="w3-col l6">
              <input type="text" class="w3-input w3-ripple" required name="search_query" placeholder="Recherche...">
            </div>

            <div class="w3-col l2">
              <button type="submit" class='w3-button w3-ripple w3-blue w3-margin-bottom'>
                Voir
                <i class="fa fa-search"></i>
              </button>
            </div>

          </div>

        </form>
      </div>

      <!-- liste documents publiés -->
      <div class="w3-container w3-content w3-padding-30" style="max-width:800px">
        <h2 class="w3-wide w3-center">PUBLICATION</h2>
        <p class="w3-opacity w3-center"><i>articles publiés!</i></p><br>

        <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
          <?php
          while ($part = mysqli_fetch_array($query_part)) {
            //tant qu'on extrait des lignes sous forme de table  executif
            extract($part);
            echo "
                <div class='w3-third w3-margin-bottom'>
                  <div class='w3-container w3-white'>
                    <p><b>Thème : $nom_theme</b></p>
                    <p><b>Titre : $titre</b></p>
                    <p><b>Auteur(s) : $auteurs</b></p>
                    <p class='w3-opacity'>Sun 29 Nov 2016 (A renseigner aussi)</p>
                    <p>$resume.</p>
                    <button class='w3-button w3-black w3-margin-bottom'>
                    <a class='w3-button' href=\"./download.php?path=./files/$fichier\">Téléchager</a>
                    </button>
                  </div>
              </div>
                  ";
          }
          ?>

        </div>
      </div>
    </div>

    <!-- Ticket Modal -->
    <div id="ticketModal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-teal w3-center w3-padding-32">
          <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
          <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
        </header>
        <div class="w3-container">
          <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
          <input class="w3-input w3-border" type="text" placeholder="How many?">
          <p><label><i class="fa fa-user"></i> Send To</label></p>
          <input class="w3-input w3-border" type="text" placeholder="Enter email">
          <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
          <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
          <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
        </div>
      </div>
    </div>

    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
      <h2 class="w3-wide w3-center">CONTACT</h2>
      <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
      <div class="w3-row w3-padding-32">
        <div class="w3-col m6 w3-large w3-margin-bottom">
          <i class="fa fa-map-marker" style="width:30px"></i> Dakar Plateau, SN<br>
          <i class="fa fa-phone" style="width:30px"></i> Phone: +77 777 77 77<br>
          <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
        </div>
        <div class="w3-col m6">
          <form action="/action_page.php" target="_blank">
            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
              <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
              </div>
              <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
              </div>
            </div>
            <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
            <button class="w3-button w3-black w3-section w3-right" type="submit">ENVOYER</button>
          </form>
        </div>
      </div>
    </div>

    <!-- End Page Content -->
  </div>

  <!-- Image of location/map -->
  <img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Copyright / Adja Khady Poulméra Ndiaye</p>
  </footer>

  <script>
    // Automatic Slideshow - change image every 4 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 2000);
    }

    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }

    // When the user clicks anywhere outside of the modal, close it
    var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>