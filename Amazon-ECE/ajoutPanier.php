<?php

$id = $_GET ['Id'] ;

$database = "AMAZON";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

		$sql = "SELECT * FROM Item WHERE Id LIKE '%$id%'";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
 
			?>

				<div class="col-lg-7">
					<div class="row" id="titre"> Nom :
						<?php echo $id; ?>
						<?php echo  $data['Titre'] . '<br>';?>
						<?php $nom =  $data['Titre'];?>
					</div>
					<div class="col">

					<div class="row">
						<p id="vendeur"></p>
						<div class="col">Prix :
							<?php echo  $data['Prix'] . '<br>';?>
							<?php $prix =  $data['Prix'];?>
						</div>
					</div>
				</div>
			</div>


			<?php

		}//end while

	}//end if
	
	//si le BDD n'existe pas
	else {
		echo "Database not found";
	}//end else

	//fermer la connection
	mysqli_close($db_handle);

?>




<?php

    //identifier votre BDD
    $database  = "AMAZON";

    //connectez-vous dans votre BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

$requete = "SELECT * FROM Panier2";
   
       	 $result = mysqli_query($db_handle, $requete);
            //regarder s'il y a de résultat
echo $nom;
echo $id;
echo $prix;

                $requete = "INSERT INTO Panier (ID, Nom, Prix) VALUES ('$id','$nom', '$prix')" ;
               
         $result = mysqli_query($db_handle, $requete);
          

?>