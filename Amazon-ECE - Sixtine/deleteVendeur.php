<?php

 $pseudo   = isset($_POST["Pseudo"]) ? $_POST["Pseudo"] : "";

    //identifier votre BDD
    $database  = "amazon";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

	if (isset($_POST["Create"])) {

		if ($db_found) {
            //On se place sur la ligne du vendeur en question
			$sql = "SELECT * FROM Vendeur WHERE Pseudo LIKE '%$pseudo%'";
			$result = mysqli_query($db_handle, $sql);

			if (mysqli_num_rows($result) == 0){
				echo "Ce vendeur n'existe pas";
			}
			else{
                //On supprime le vendeur
				$sql = "DELETE FROM Vendeur WHERE Pseudo LIKE '$pseudo'";
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
                        margin-left: 30px;
                    }
                    div{
                        width: 100%;
                        margin-left: 43%;
                    }
                </style>
                <h2>Compte vendeur supprimé.</h2>
                <div><a href="connectPageAdmin.php">Continuer</a></div>
                
                <?php
			}

		}//end if
	
		//si le BDD n'existe pas
		else {
			echo "Database not found";
		}//end else
	}

	//fermer la connection
	mysqli_close($db_handle);
?>