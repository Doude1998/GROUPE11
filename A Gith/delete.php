<?php

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
$database = "AMAZON";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);



if ($db_found) {

		$sql = "SELECT * FROM contact WHERE Id LIKE '%$id%'";
		$result = mysqli_query($db_handle, $sql);

	$data = mysqli_fetch_assoc($result); 
 

		$quantite = $data['Quantite'];

		$nbvente = $nbvente - 1;
  		$sql2 = "UPDATE Item SET NombreVente = '$nbvente' WHERE Id = '$id' ";
  		$result = mysqli_query($db_handle, $sql2);


		if($quantite > 1)
		{
			$quantite = $quantite - 1;
			echo $quantite;

			$sql1 = "UPDATE contact SET Quantite = '$quantite' WHERE Id = '$id' ";
  			$result = mysqli_query($db_handle, $sql1);
		}
		else { 
			
				$sql = "DELETE FROM contact WHERE Id LIKE '$id'";


		}

		$result = mysqli_query($db_handle, $sql);

		
		$stock = $stock + 1;
		$sql1 = "UPDATE Item SET Stock = '$stock' WHERE Id = '$id' ";
  		$result = mysqli_query($db_handle, $sql1);

  header('location: panier.php');

	}//end if
	
	//si le BDD n'existe pas
	else {
		echo "Database not found";
	}//end else

	//fermer la connection
	mysqli_close($db_handle);
?>
