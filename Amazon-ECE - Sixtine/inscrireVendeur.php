<?php
    //recuperer les données venant de la page HTML
    //le parametre de $_POST = "name" de <input> de votre page HTML
    $nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
    $prenom  = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";
    $pseudo  = isset($_POST["Pseudo"]) ? $_POST["Pseudo"] : "";
    $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
    $mdp   = isset($_POST["MDP"]) ? $_POST["MDP"] : "";
    $ville   = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
    $cp   = isset($_POST["CP"]) ? $_POST["CP"] : "";
    $adresse   = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
    $bic   = isset($_POST["BIC"]) ? $_POST["BIC"] : "";
    $iban   = isset($_POST["IBAN"]) ? $_POST["IBAN"] : "";

    //identifier votre BDD
    $database  = "amazon";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

	if (isset($_POST["Create"])) {

        if ($db_found) {
    		$sql = "SELECT * FROM Vendeur";
    		
            if ($pseudo != "") {
                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Pseudo LIKE '%$pseudo%'";
            }

            $result = mysqli_query($db_handle, $sql);

            //regarder s'il y a un résultat
            if (mysqli_num_rows($result) == 0){
                $sql  = "INSERT INTO Vendeur (Nom, Prenom, Pseudo, Email, MDP, Ville, CP, Adresse, BIC, IBAN, Connecte)
                VALUES ('$nom','$prenom', '$pseudo','$email','$mdp','$ville','$cp','$adresse', '$bic','$iban', 'oui') ";
                $result = mysqli_query($db_handle, $sql);
                header('Location: connectPageV.php');
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