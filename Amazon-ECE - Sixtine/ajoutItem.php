    <?php

        //recuperer les données venant du formulaire de la page HTML
    
    $titre   = isset($_POST["Titre"]) ? $_POST["Titre"] : "";
    $description  = isset($_POST["Description"]) ? $_POST["Description"] : "";
    $prix   = isset($_POST["Prix"]) ? $_POST["Prix"] : "";
    $stock = isset($_POST["Stock"]) ? $_POST["Stock"] : "";
    $categorie   = isset($_POST["Categorie"]) ? $_POST["Categorie"] : "";
    $image1   = isset($_POST["image1"]) ? $_POST["image1"] : "";
    $image2   = isset($_POST["image2"]) ? $_POST["image2"] : "";
    $image3   = isset($_POST["image3"]) ? $_POST["image3"] : "";

        //identification BDD
    $database  = "AMAZON";

        //connection BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

        //Si l'utilisateur presse le bouton create
    if (isset($_POST["Create"])) {

            // Verification que la BDD a bien était trouvé
        if ($db_found) {

          $sql = "SELECT * FROM Item";

            //on cherche si le produit existe dans la BDD
          if ($titre != "") {
            $sql .= " WHERE Titre LIKE '%$titre%'";
        }
        
        $result = mysqli_query($db_handle, $sql);
        
                //Boucle d'ajout, si le livre n'esxiste pas encore, alors on l'ajoute dans la table Item avec les données récupéré au clavier sur le formulaire dela page HTML
        if (mysqli_num_rows($result) == 0){

         $sql  = "INSERT INTO Item (Categorie, Vendeur, Titre, Description, Photo1, Photo2, Photo3, Taille, Couleur, Prix, Stock)
         VALUES ('$categorie','$vendeur', '$titre','$description','$image1','$image2','$image3','$taille','$couleur','$prix', '$stock')";
         $result = mysqli_query($db_handle, $sql);      

                   //on regarde si c'est un aministrateur ou un vendeur qui est connecté et on récupère le nom de la personne connecté pour l'ajouter à la fiche produit en cours d'ajout

         $sql = "SELECT * FROM Vendeur";
         $sql .= " WHERE Connecte LIKE '%oui%'";
         $result = mysqli_query($db_handle, $sql);

         while ($data = mysqli_fetch_assoc($result)) {
            $vendeur = $data['Prenom'] . " " . $data['Nom'];

            $sql = "SELECT * FROM Item";
            $sql = "UPDATE Item SET Vendeur='$vendeur' WHERE Vendeur=''";
            $result = mysqli_query($db_handle, $sql);
            // Zone CSS gérant le style de la page
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
                    margin-left: 30px;
                }
                div{
                    width: 100%;
                    margin-left: 43%;
                }
            </style>

            <?php //on renvois l'utilisateur vers la page principale du vendeur aprés l'ajout réussis du produit  ?>
            <h2>Produit ajouté.</h2>
            <div><a href="connectPageV.php">Continuer</a></div>
            
            <?php
        }//end while

        $sql = "SELECT * FROM Admin";
        $sql .= " WHERE Connecte LIKE '%oui%'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $vendeur = "Admin " . $data['Prenom'] . " " . $data['Nom'];

            $sql = "SELECT * FROM Item";
            $sql = "UPDATE Item SET Vendeur='$vendeur' WHERE Vendeur=''";
            $result = mysqli_query($db_handle, $sql);
            ?>

            <?php // Zone CSS gérant le style de la page ?>
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
                    margin-left: 30px;
                }
                div{
                    width: 100%;
                    margin-left: 43%;
                }
            </style>

            <?php //on renvois l'utilisateur vers la page principale d'administrateur aprés l'ajout réussis du produit  ?>
            <h2>Produit ajouté.</h2>
            <div><a href="connectPageAdmin.php">Continuer</a></div>
            
            <?php
        }//end while
    }//end if

    //Si le produit existe déja, on envois un message d'erreur et on renvoiT l'utilisateur vers la page principale

    else {

        ?>
        <style type="text/css">
            h2{
                text-align: center;
                color: grey;
                margin-top: 100px;
                background: #C8D8EA;
                font-size: 50px;
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
                margin-left: 45%; 
            }
            div{
                width: 100%;
            }
        </style>
        <h2>Ce produit est déjà en vente !</h2>
        <div><a href="connectPageV.php">Retour</a></div>
        <?php
    }//end else
}//end deuxième if

// message d'erreur si la database n'a pas été trouvé
else {
    echo "Database not found";
}
}//end premier if


    //fermer la connexion
mysqli_close($db_handle);

?>