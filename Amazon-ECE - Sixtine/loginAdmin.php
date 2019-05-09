<?php
//Recuperation des donnees saisies
	$pseudo   = isset($_POST["Pseudo"]) ? $_POST["Pseudo"] : "";
	$mdp = isset($_POST["MDP"]) ? $_POST["MDP"] : "";

  //connexion à la base de données
  //identifier votre BDD
  $database  = "AMAZON";
  
  //connectez-vous dans votre BDD
  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found  = mysqli_select_db($db_handle, $database);


  if(isset($_POST["Login"])){

    if($db_found){
    	$sql = "SELECT * FROM Admin";
      
	    if ($pseudo != "") {
        
        	//on cherche le livre avec les paramètres titre et auteur
        	$sql .= " WHERE Pseudo LIKE '%$pseudo%'";
      	}
      	
      	if ($mdp != "") {
        	$sql .= " AND MDP LIKE '%$mdp%'";
      	}
    
      	$result = mysqli_query($db_handle, $sql);

      	//regarder s'il y a de résultat
      	if (mysqli_num_rows($result) == 0) {
        //le livre est déjà dans la BDD
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
                <h2>Vous n'êtes pas administrateur chez nous !</h2>
                <div><a href="mainPage.html">Retour</a></div>
                
                <?php 
      }
      else {

         while ($data = mysqli_fetch_assoc($result)) {
          $sql ="UPDATE Admin SET Connecte='oui' WHERE Pseudo='$pseudo'";
          $result = mysqli_query($db_handle, $sql);
          header('Location: connectPageAdmin.php');
        }
      }
    }
    else {
      echo "Not found!";
    }
  }
?>