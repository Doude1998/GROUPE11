<?php
$identifiant   = isset($_POST["Identifiant"]) ? $_POST["Identifiant"] : "";
$mdp = isset($_POST["MDP"]) ? $_POST["MDP"] : "";

//connexion à la base de données
//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


if(isset($_POST["Button1"])){


  if($db_found){

    $sql = "SELECT * FROM Acheteur";
      
      if ($identifiant != "") {
        //on cherche le livre avec les paramètres titre et auteur
        $sql .= " WHERE Identifiant LIKE '%$identifiant%'";}
      if ($mdp != "") {
        $sql .= " AND MDP LIKE '%$mdp%'";}
    
    $result = mysqli_query($db_handle, $sql);

      //regarder s'il y a de résultat
      if (mysqli_num_rows($result) == 0) {
      header('Location: login.php?erreur=1');      } 
      
      else {
      //on trouve le livre recherché
         while ($data = mysqli_fetch_assoc($result)) {
          header('Location: principale.php');

        }

      }
  }
  else {echo "Not found!";}

}



           
          // header('Location: principale.php');
   
         //  header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect

    //   header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    
//  header('Location: login.php');

?>