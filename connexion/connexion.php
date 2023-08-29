<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            //nom de la base de donnees
            $db="banque_documentaire";
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$db);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            // echo 'Connexion réussie';
