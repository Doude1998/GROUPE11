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
$villel   = isset($_POST["VilleL"]) ? $_POST["VilleL"] : "";
$cpl   = isset($_POST["CPL"]) ? $_POST["CPL"] : "";
$adressel   = isset($_POST["AdresseL"]) ? $_POST["AdresseL"] : "";
$typecarte   = isset($_POST["TypeC"]) ? $_POST["TypeC"] : "";
$numcarte   = isset($_POST["NumeroCarte"]) ? $_POST["NumeroCarte"] : "";
$nomcarte   = isset($_POST["NomCarte"]) ? $_POST["NomCarte"] : "";
$dateexpi   = isset($_POST["DateExpiration"]) ? $_POST["DateExpiration"] : "";
$codesecu   = isset($_POST["CodeSecu"]) ? $_POST["CodeSecu"] : "";

//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);

$error ="";

	if($nom ==""){$error .= "Nom vide<br/>";}
	if($prenom ==""){$error .= "Prenom vide<br/>";}
	if($identifiant ==""){$error .= "identifiant vide<br/>";}
	if($email ==""){$error .= "email vide<br/>";}
	if($mdp ==""){$error .= "mdp vide<br/>";}
	if($villeu ==""){$error .= "villeu vide<br/>";}
	if($cpu ==""){$error .= "cpu vide<br/>";}
	if($adresseu ==""){$error .= "adresseu vide<br/>";}
	if($villel ==""){$error .= "Ville L vide<br/>";}
	if($cpl ==""){$error .= "cpl vide <br/>";}
	if($adressel ==""){$error .= "adresse L vide<br/>";}
	if($typecarte ==""){$error .= "Type carte vide <br/>";}
	if($numcarte ==""){$error .= "Num carte vide<br/>";}
	if($nomcarte ==""){$error .= "Nom carte vide<br/>";}
	if($dateexpi ==""){$error .= "Date Expi vide<br/>";}
	if($codesecu ==""){$error .= "Code secu vide<br/>";}

	if($error ==""){

		if (isset($_POST["button2"])) {

    
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

  
            $sql  = "INSERT INTO Acheteur (Nom, Prenom, Identifiant, Email, MDP, VilleU, CPU,AdressU,VilleL,CPL, AdresseL,TypeC,NumeroCarte, NomCarte,DateExpiration, CodeSecu)
			VALUES ('$nom','$prenom', '$identifiant','$email','$mdp','$villeu','$cpu','$adresseu','$villel','$cpl','$adressel','$typecarte','$numcarte','$nomcarte','$dateexpi','$codesecu') ";
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
echo "Voici vos informations:" . "<br>";
echo "Nom: " . $data['Nom'] . "<br>";
echo "Prenom: " . $data['Prenom'] . "<br>";
echo "Identifiant: " . $data['Identifiant'] . "<br>";
echo "Email: " . $data['Email'] . "<br>";
echo "MDP: " . $data['MDP'] . "<br>";
echo "VilleU: " . $data['VilleU'] . "<br>";
echo "Code postale utilisateur: " . $data['CPU'] . "<br>";
echo "Adresse utilisateur: " . $data['AdressU'] . "<br>";
echo "Ville livraiso: " . $data['VilleL'] . "<br>";
echo "Code postale livraison: " . $data['CPL'] . "<br>";
echo "Adresse livraison: " . $data['AdresseL'] . "<br>";
echo "Type carte: " . $data['TypeC'] . "<br>";
echo "Numero carte: " . $data['NumeroCarte'] . "<br>";
echo "Nom carte: " . $data['NomCarte'] . "<br>";
echo "Date expiration: " . $data['DateExpiration'] . "<br>";
echo "Code securite: " . $data['CodeSecu'] . "<br>";
echo "<br>";
}


        }
        
    else {

        echo "Database not found";
    }
}
		echo "formulaire valide";
	}
	else{
		echo "Erreur : $error";
	}






//fermer la connexion
mysqli_close($db_handle); 
?>