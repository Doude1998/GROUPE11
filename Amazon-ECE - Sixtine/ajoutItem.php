<?php

    //recuperer les données venant de la page HTML
    //le parametre de $_POST = "name" de <input> de votre page HTML
    $titre   = isset($_POST["Titre"]) ? $_POST["Titre"] : "";
    $description  = isset($_POST["Description"]) ? $_POST["Description"] : "";
    $prix   = isset($_POST["Prix"]) ? $_POST["Prix"] : "";
    $stock = isset($_POST["Stock"]) ? $_POST["Stock"] : "";
    $categorie   = isset($_POST["Categorie"]) ? $_POST["Categorie"] : "";
    $image1   = isset($_POST["image1"]) ? $_POST["image1"] : "";
    $image2   = isset($_POST["image2"]) ? $_POST["image2"] : "";
    $image3   = isset($_POST["image3"]) ? $_POST["image3"] : "";

    //identifier votre BDD
    $database  = "AMAZON";

    //connectez-vous dans votre BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

    if (isset($_POST["Create"])) {
    
        if ($db_found) {
    		$sql = "SELECT * FROM Item";
            if ($titre != "") {
                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Titre LIKE '%$titre%'";                
            }
            
            $result = mysqli_query($db_handle, $sql);
            
            //regarder s'il y a de résultat
            if (mysqli_num_rows($result) == 0){

            	$sql  = "INSERT INTO Item (Categorie, Vendeur, Titre, Description, Photo1, Photo2, Photo3, Taille, Couleur, Prix, Stock)
                VALUES ('$categorie','$vendeur', '$titre','$description','$image1','$image2','$image3','$taille','$couleur','$prix', '$stock')";
                $result = mysqli_query($db_handle, $sql);           	

            	$sql = "SELECT * FROM Vendeur";

                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    $vendeur = $data['Prenom'] . " " . $data['Nom'];

                    $sql = "SELECT * FROM Item";
    				$sql = "UPDATE Item SET Vendeur='$vendeur' WHERE Vendeur=''";
    				$result = mysqli_query($db_handle, $sql);
    				header('Location: connectPageV.php');
                }

                $sql = "SELECT * FROM Admin";

                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    $vendeur = "Admin " . $data['Prenom'] . " " . $data['Nom'];

                    $sql = "SELECT * FROM Item";
                    $sql = "UPDATE Item SET Vendeur='$vendeur' WHERE Vendeur=''";
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
                        margin-left: 30px;
                    }
                    div{
                        width: 100%;
                        margin-left: 43%;
                    }
                </style>
                <h2>Produit ajouté.</h2>
                <div><a href="connectPageAdmin.php">Continuer</a></div>
                
                <?php
                }
            }
            else {
                //le livre est déjà dans la BDD
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
                <h2>Ce livre est déjà en vente !</h2>
                <div><a href="connectPageV.php">Retour</a></div>
                <?php
            }
        }
        else {
            echo "Database not found";
        }
    }

//fermer la connexion
mysqli_close($db_handle);

?>