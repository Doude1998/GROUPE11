<?php
//On envoie par Id afin de pouvoir se placer dans la correct ligne de notre tablel
$id = $_GET ['id'] ;
$database = "AMAZON";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);


//$sql = "SELECT * Item WHERE Id LIKE '%$id%'";
//echo "TiTre est " . $data['Titre'] . '<br>';

if ($db_found) {

		$sql = "SELECT * FROM Item WHERE Id LIKE '%$id%'";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
 //On jongle entre PHP et Html pour generer un affichage correct de nos tables
			?>
			<div class="row" id="test">
				<div class="col-lg-3">
					<div>
						
						<?php $pic =  $data['Photo1'];?>
					</div>
					<div class="col-lg-7">
					<div class="row" id="titre">
					
						<?php $nom =  $data['Titre'];?>
					</div>
					<div class="col">
						<p id="description"> </p>
						<div class="row">
					
							<?php $desc =  $data['Description'];?>
						</div>
					</div>
					<div class="row">
						<p id="vendeur"> </p>
						<div class="col">
							
							<?php $vend =  $data['Vendeur'];?>
						</div>
						<div class="col">
							
							<?php $stock =  $data['Stock'];?>
						

						</div>
					</div>
					<div class="col">
						
							<?php $prix =  $data['Prix'];?>
						</div>

					<div class="col">
							
						<?php $nbvente =  $data['NombreVente'];?>
						

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
//On ouvre un deuxieme php pour travailler sur l'autre table
$database = "AMAZON";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);



if ($db_found) {

		//On se place dans la ligne du tableau qu'il faut
		$sql = "SELECT * FROM contact WHERE Id LIKE '%$id%'";
		$result = mysqli_query($db_handle, $sql);

	$data = mysqli_fetch_assoc($result); 
 

		$quantite = $data['Quantite'];

		$nbvente = $nbvente - 1;
  		$sql2 = "UPDATE Item SET NombreVente = '$nbvente' WHERE Id = '$id' ";
  		$result = mysqli_query($db_handle, $sql2);

  		//Boucle afin de decrementer les quantites
		if($quantite > 1)
		{
			$quantite = $quantite - 1;

			$sql1 = "UPDATE contact SET Quantite = '$quantite' WHERE Id = '$id' ";
  			$result = mysqli_query($db_handle, $sql1);
		}
		else { 
				//suppression du produit quand il est plus dans le panier
				$sql = "DELETE FROM contact WHERE Id LIKE '$id'";


		}

		$result = mysqli_query($db_handle, $sql);

		//variable de stocks avec update en temps réel		
		$stock = $stock + 1;
		$sql1 = "UPDATE Item SET Stock = '$stock' WHERE Id = '$id' ";
  		$result = mysqli_query($db_handle, $sql1);


                $sql = "SELECT * FROM Acheteur";
                $sql .= " WHERE Connecte LIKE '%oui%'";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) == 0){
                    header('location: panier.php');
                }else{
                	header('Location: panierConnect.php');
                }

  		

	}//end if
	
	//si le BDD n'existe pas
	else {
		echo "Database not found";
	}//end else

	//fermer la connection
	mysqli_close($db_handle);
?>
