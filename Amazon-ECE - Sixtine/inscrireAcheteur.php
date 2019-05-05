<?php
    //recuperer les données venant de la page HTML
    //le parametre de $_POST = "name" de <input> de votre page HTML
    $nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
    $prenom  = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";
    $identifiant   = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
    $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
    $mdp   = isset($_POST["MDP"]) ? $_POST["MDP"] : "";

    //identifier votre BDD
    $database  = "AMAZON";

    //connectez-vous dans votre BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

    if (isset($_POST["Create"])) {
    
        if ($db_found) {
    		$sql = "SELECT * FROM Acheteur";
            if ($identifiant != "") {
                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Identifiant LIKE '%$identifiant%'";
            }
            
            $result = mysqli_query($db_handle, $sql);
            
            //regarder s'il y a de résultat
            if (mysqli_num_rows($result) == 0){ 
                
                $sql  = "INSERT INTO Acheteur (Nom, Prenom, Identifiant, Email, MDP, Ville, CP,Adress,TypeC,NumeroCarte, NomCarte,DateExpiration, CodeSecu, Connecte)
                VALUES ('$nom','$prenom', '$identifiant','$email','$mdp','Ville','CP','Adresse','TypeC','NumeroCarte','NomCarte','DateExpiratione','CodeSecu', 'oui') ";
                $result = mysqli_query($db_handle, $sql);
                header('Location: connectPageA.php');
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
                <h2>Identifiant déjà utilisé !</h2>
                <div><a href="mainPage.html">Retour</a></div>
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