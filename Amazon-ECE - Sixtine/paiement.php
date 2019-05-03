<!DOCTYPE html>
<html>
   <head>
      <title>Créer un compte V</title>
      <meta charset="utf-8">
   </head>
   <body>
      <h2>Paiement</h2>
      <form action="DataBaseV.php" method="post">

         <table>
            
            <tr>
               <td>Type Carte:</td>
               <td><input type="text" name="TypeC" required></td>
            </tr>
            <tr>
               <td>Numero Carte:</td>
               <td><input type="text" name="NumeroCarte" required></td>
            </tr>
            <tr>
               <td>Nom Carte:</td>
               <td><input type="text" name="NomCarte" required></td>
            </tr>
            <tr>
               <td>Date Expiration:</td>
               <td><input type="text" name="DateExpiration" required></td>
            </tr>
            <tr>
               <td>Code Securité:</td>
               <td><input type="password" name="CodeSecu" required></td>
               
            </tr>

       		 <tr>
               <td colspan="2" align="center">
                  <input type="submit" name="button2" value="Ajouter">
               </td>
            </tr>
         </table>
      </form>
   </body>
</html>


<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$typec   = isset($_POST["TypeC"]) ? $_POST["TypeC"] : "";
$numc  = isset($_POST["NumeroCarte"]) ? $_POST["NumeroCarte"] : "";
$nomc   = isset($_POST["NomCarte"]) ? $_POST["NomCarte"] : "";
$dateexp = isset($_POST["DateExpiration"]) ? $_POST["DateExpiration"] : "";
$codesecu   = isset($_POST["CodeSecu"]) ? $_POST["CodeSecu"] : "";

//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


		if (isset($_POST["button2"])) {

    
    if ($db_found) {
    	$sql = "SELECT * FROM Acheteur WHERE Connecte LIKE 'oui'";
		$result = mysqli_query($db_handle, $sql);

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

  
            $sql  = "INSERT INTO Vendeur (TypeC, NumeroCarte, NomCarte, DateExpiration, CodeSecu)
			VALUES ('$typec','$numc', '$nomc','$dateexp','$codesecu') ";
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
	
//fermer la connexion
mysqli_close($db_handle); 
?>
