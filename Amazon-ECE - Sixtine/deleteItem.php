<?php

$id = $_GET ['id'] ;
$database = "AMAZON";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

			$sql = "SELECT * FROM Item WHERE Id LIKE '%$id%'";
			$result = mysqli_query($db_handle, $sql);

			if (mysqli_num_rows($result) == 0){
				echo "Ce produit n'existe pas";
			}
			else{

				$sql = "DELETE FROM Item WHERE Id LIKE '$id'";
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
                <h2>Produit supprimé.</h2>

                
                <div><a href="connectPageAdmin.php">Continuer</a></div>
                
                <?php
			}

		}//end if
	
		//si le BDD n'existe pas
		else {
			echo "Database not found";
		}//end else

	//fermer la connection
	mysqli_close($db_handle);
?>