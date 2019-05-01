<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$nom   = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$prenom  = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";
$identifiant   = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
$email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$mdp   = isset($_POST["MDP"]) ? $_POST["MDP"] : "";
$villeu   = isset($_POST["VilleU"]) ? $_POST["VilleU"] : "";
$cpu   = isset($_POST["CPU"]) ? $_POST["CPU"] : "";
$adresseu   = isset($_POST["AdresseU"]) ? $_POST["AdresseU"] : "";
//identifier votre BDD
$database  = "amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
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
if (mysqli_num_rows($result) != 0){ 
//le livre est déjà dans la BDD
echo "Identifiant déja utilisé, veuillez en choisir un autres";
 
 } 
 else { 
  
            $sql  = "INSERT INTO Acheteur (Nom, Prenom, Identifiant, Email, MDP, VilleU, CPU,AdressU,VilleL,CPL, AdresseL,TypeC,NumeroCarte, NomCarte,DateExpiration, CodeSecu, Connecte)
			VALUES ('$nom','$prenom', '$identifiant','$email','$mdp','$villeu','$cpu','$adresseu','VilleL','CPL','AdresseL','TypeC','NumeroCarte','NomCarte','DateExpiratione','CodeSecu', 'oui') ";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful." . "<br>";
        }
        
        //on affiche le livre ajouté
$sql = "SELECT * FROM Acheteur";
if ($identifiant != "") {
//on cherche le livre avec les paramètres titre et auteur
$sql .= " WHERE Identifiant LIKE '%$identifiant%'";
}
$result = mysqli_query($db_handle, $sql);
while ($data = mysqli_fetch_assoc($result)) {
    header('Location: connectPage.php');
    /*echo "Voici vos informations:" . "<br>";
    echo "Nom: " . $data['Nom'] . "<br>";
    echo "Prenom: " . $data['Prenom'] . "<br>";
    echo "Identifiant: " . $data['Identifiant'] . "<br>";
    echo "Email: " . $data['Email'] . "<br>";
    echo "MDP: " . $data['MDP'] . "<br>";
    echo "VilleU: " . $data['VilleU'] . "<br>";
    echo "Code postale utilisateur: " . $data['CPU'] . "<br>";
    echo "Adresse utilisateur: " . $data['AdressU'] . "<br>";
    echo "Connecté(e) ? :" . $data['Connecte'] . "<br>";
    echo "<br>";*/
}
        }
        
    else {
        echo "Database not found";
    }
}
//fermer la connexion
mysqli_close($db_handle); 
?>