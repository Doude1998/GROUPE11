<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$prenom  = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";
$pseudo   = isset($_POST["Pseudo"]) ? $_POST["Pseudo"] : "";
$email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$mdp   = isset($_POST["MDP"]) ? $_POST["MDP"] : "";
$ville   = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$cp   = isset($_POST["CP"]) ? $_POST["CP"] : "";
$adresse   = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$bic   = isset($_POST["BIC"]) ? $_POST["BIC"] : "";
$iban   = isset($_POST["IBAN"]) ? $_POST["IBAN"] : "";

//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


		if (isset($_POST["button2"])) {

    
    if ($db_found) {

    		$sql = "SELECT * FROM Vendeur";
    		if ($pseudo != "") {

//on cherche le livre avec les paramètres titre et auteur
$sql .= " WHERE Pseudo LIKE '%$pseudo%'";

}

$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
if (mysqli_num_rows($result) != 0){ 
//le livre est déjà dans la BDD
echo "Identifiant déja utilisé, veuillez en choisir un autres";
 
 } 
 else { 

  
            $sql  = "INSERT INTO Vendeur (Nom, Prenom, Pseudo, Email, MDP, Ville, CP,Adresse, BIC, IBAN)
			VALUES ('$nom','$prenom', '$pseudo','$email','$mdp','$ville','$cp','$adresse', '$bic','$iban') ";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful." . "<br>";

            //on affiche le livre ajouté
$sql = "SELECT * FROM Vendeur";
if ($identifiant != "") {
//on cherche le livre avec les paramètres titre et auteur
$sql .= " WHERE Pseudo LIKE '%$pseudo%'";

}


$result = mysqli_query($db_handle, $sql);
while ($data = mysqli_fetch_assoc($result)) {
echo "Voici vos informations:" . "<br>";
echo "Nom: " . $data['Nom'] . "<br>";
echo "Prenom: " . $data['Prenom'] . "<br>";
echo "Pseudo: " . $data['Pseudo'] . "<br>";
echo "Email: " . $data['Email'] . "<br>";
echo "MDP: " . $data['MDP'] . "<br>";
echo "Ville: " . $data['Ville'] . "<br>";
echo "Code postale : " . $data['CP'] . "<br>";
echo "Adresse : " . $data['Adresse'] . "<br>";
echo "RIB : " . $data['RIB'] . "<br>";
echo "IBAN : " . $data['IBAN'] . "<br>";


echo "<br>";
}
        }
        
        }
        
    else {

        echo "Database not found";
    }
}
		echo "formulaire valide";
	






//fermer la connexion
mysqli_close($db_handle); 
?>