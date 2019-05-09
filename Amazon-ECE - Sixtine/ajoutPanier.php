	<?php

	// On récupère l'ID de l'Item a ajouté qui est envoyé directement dans le lien renvoyant vers cette page sur les pages de produits
	$id = $_GET ['id'] ;

	 //identification BDD
	$database = "AMAZON";

	 //connection BDD
	$db_handle = mysqli_connect('localhost', 'root', 'root' );
	$db_found = mysqli_select_db($db_handle, $database);

	// Verification que la BDD a bien était trouvé
	if ($db_found) {

			//On se place dans la base de données des produits au niveau du produit correspondant à l'ID récupéré en paramètre
			$sql = "SELECT * FROM Item WHERE Id LIKE '%$id%'";
			$result = mysqli_query($db_handle, $sql);

			//On sotck toutes données récupéré de la BDD dans des variables
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
							<div class="col">
								
								<?php $nbvente =  $data['NombreVente'];?>

							</div>
						</div>
						<div class="col">
							
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

	//identification BDD
	$database = "AMAZON";

	//connection BDD
	$db_handle = mysqli_connect('localhost', 'root', 'root' );
	$db_found = mysqli_select_db($db_handle, $database);


	    // Verification que la BDD a bien était trouvé
	if ($db_found) {



			//On se place dans la base de données dU PANIER (CONTACT) au niveau du produit correspondant à l'ID récupéré en paramètre
			$sql = "SELECT * FROM contact WHERE Id LIKE '%$id%'";
			$result = mysqli_query($db_handle, $sql);

		$data = mysqli_fetch_assoc($result); 
	 


			$quantite = $data['Quantite'];

			$nbvente = $nbvente + 1;
	  		$sql2 = "UPDATE Item SET NombreVente = '$nbvente' WHERE Id = '$id' ";
	  		$result = mysqli_query($db_handle, $sql2);

	  		//Si le produit en question existe déjà on incrémente juste ca quantité 

			if($quantite > 0)
			{
				$quantite = $quantite + 1;
				echo $quantite;

				$sql1 = "UPDATE contact SET Quantite = '$quantite' WHERE Id = '$id' ";
	  			$result = mysqli_query($db_handle, $sql1);


				// On diminue le stock lorque qu'un produit est ajouté au panier
	  			$stock = $stock - 1;

	  			
	  			// Si le stock vaut 0, alors le produit est supprimé de la base de données ITEM
				if($stock == 0)
	  			{
	  			$sql = "SELECT * FROM Item WHERE Stock ='1' ";
	  			$sql  = "DELETE FROM Item WHERE Stock = '1' " ;
	  
				$result = mysqli_query($db_handle, $sql);
	  			
	  			}


	  			// Si le stock est superieur à 0, alors sa valeur est décrémenté est mise à jour dans la BDD
	  			else{
	  			$sql1 = "UPDATE Item SET Stock = '$stock' WHERE Id = '$id' ";}
	  			$result = mysqli_query($db_handle, $sql1);


			}

			//Si le produit en question n'exista pas encore la BDD panier alors on l'ajoute
			else { 

				// On diminue le stock lorque qu'un produit est ajouté au panier
				$stock = $stock - 1;
			

	  			$sql1 = "UPDATE Item SET Stock = '$stock' WHERE Id = '$id' ";
	  			$result = mysqli_query($db_handle, $sql1);



				$sql = "INSERT INTO contact (Id, Nom, Prix, Photo, Description, Vendeur) VALUES ('$id','$nom', '$prix', '$pic','$desc','$vend') ";
				$result = mysqli_query($db_handle, $sql);


				

				$sql = "SELECT * FROM Item WHERE Stock ='1'";
				$result = mysqli_query($db_handle, $sql);
			}
		

			$result = mysqli_query($db_handle, $sql);

			// Si l'utilisateur est connecté en tant que acheteur, alors on le redirige vers son panier directement, sinon, on le renvois vers la page de connection tout en gardant son panier de côté
			$sql = "SELECT * FROM Acheteur WHERE Connecte LIKE 'oui'";
	        $result = mysqli_query($db_handle, $sql);
	            
	        //regarder s'il y a de résultat
	        if (mysqli_num_rows($result) == 0){                 
	            header('location: panier.php');
	        }
	        else {         
				header('location: panierConnect.php');
	        }

			}//end if
		
		//si le BDD n'existe pas
		else {
			echo "Database not found";
		}//end else

	//fermer la connection
	mysqli_close($db_handle);
	?>

