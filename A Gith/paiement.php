<!DOCTYPE html>
<html>
   <head>
      <title>Créer un compte V</title>
      <meta charset="utf-8">
   </head>
   <body>
      <h2>Paiement</h2>
      <form  method="post">

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


//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


		if (isset($_POST["button2"])) {

    
    if ($db_found) {

    $sql = "SELECT * FROM  contact";
		$result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result); 

           
     $sql  = "DELETE FROM contact " ;
     $result = mysqli_query($db_handle, $sql);


header('location: panier.php');
  
        }
        
    else {

        echo "Database not found";
    }
}
	
//fermer la connexion
mysqli_close($db_handle); 
?>


