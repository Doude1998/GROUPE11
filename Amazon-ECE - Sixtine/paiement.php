<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$carte   = isset($_POST["Carte"]) ? $_POST["Carte"] : "";
$numero  = isset($_POST["Numero"]) ? $_POST["Numero"] : "";
$nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$date = isset($_POST["Mois"]) ? $_POST["Mois"] : "";
$crypto   = isset($_POST["CodeSecu"]) ? $_POST["CodeSecu"] : "";
$ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$code = isset($_POST["Code"]) ? $_POST["Code"] : "";

//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


if (isset($_POST["Login"])) {
    
    if ($db_found) {
    	$sql = "SELECT * FROM Acheteur WHERE Connecte LIKE 'oui'";
		  $result = mysqli_query($db_handle, $sql);

      $sql  = "INSERT INTO Vendeur (TypeC, NumeroCarte, NomCarte, DateExpiration, CodeSecu, Ville, CP, Adresse)
      VALUES ('$carte','$numero', '$nom','$date','$crypto', '$ville', '$code', '$adresse') ";
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
                <div><a href="connectPageA.php">Revenir à la page principale</a></div>
                
                <?php
    }
    else{
      echo "Database not found";
      header('Location: panierConnect.php');
    }
}
	
//fermer la connexion
mysqli_close($db_handle); 
?>