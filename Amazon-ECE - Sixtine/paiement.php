    <?php
    //recuperer les données venant du formulaire de la page HTML
    $carte   = isset($_POST["Carte"]) ? $_POST["Carte"] : "";
    $numero  = isset($_POST["Numero"]) ? $_POST["Numero"] : "";
    $nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
    $date = isset($_POST["Mois"]) ? $_POST["Mois"] : "";
    $crypto   = isset($_POST["Crypto"]) ? $_POST["Crypto"] : "";
    $ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
    $adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
    $code = isset($_POST["Code"]) ? $_POST["Code"] : "";

       //identification BDD
    $database  = "AMAZON";
    
    //connection BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

    //Si l'utilisateur presse le bouton login
    if (isset($_POST["Login"])) {


        // Verification que la BDD a bien était trouvé
        if ($db_found) {


            //On met à jour les données de paiment et de livraiosn de l'acheteteur dans la base de données à l'aide des élèments récupérés du formulaire HTML
          $sql ="UPDATE Acheteur SET TypeC='$carte', NumeroCarte='$numero', NomCarte='$nom', DateExpiration='$date', CodeSecu='$crypto', Ville='$ville', CP='$code', Adresse='$adresse' WHERE Connecte='oui'";
          $result = mysqli_query($db_handle, $sql);

          //On vide la base données panier
          $sql = "DELETE FROM `contact`";
          $result = mysqli_query($db_handle, $sql);
          ?>
                    <style type="text/css">
                        h2{
                            text-align: center;
                            color: grey;
                            margin-top: 100px;
                            background: #C8D8EA;
                            font-size: 30px;
                        }
                        body{
                            background: #C8D8EA;
                            font-family: Arial, Helvetica, sans-serif;
                        }
                        a{
                            text-decoration: none;
                            text-align: center;
                            border: solid 1px black;
                            border-radius: 5px;
                            padding: 10px;
                            cursor: pointer;
                            background-color: grey;
                        }
                        div{
                            width: 100%;
                            margin-left: 40%;
                        }
                    </style>
                    <h2>Commande validée ! Merci de votre achat !</h2>
                    <?php  //on renvois l'acheteur vers la page principale?>
                    <div><a href="connectPageA.php">Revenir à la page principale</a></div>
                    
                    <?php
        }
        // message d'erreur si la database n'a pas été trouvé
        else{
              echo "Database not found";
          header('Location: panierConnect.php');
        }
    }
    	
    //fermer la connexion
    mysqli_close($db_handle); 
    ?>