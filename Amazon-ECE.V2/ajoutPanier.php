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


//identifier votre BDD
$database  = "AMAZON";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found  = mysqli_select_db($db_handle, $database);


    
    if ($db_found) {




// Génération de la requête SQL

 $count = "SELECT COUNT(*) AS total FROM contact WHERE Id = '$id'";

  $result = mysqli_query($db_handle,$count);

  $donnees = mysqli_fetch_assoc($result);
    // Affichage du résultat


  if( $donnees['total'] > 0  ) 
	{

		$tot = $donnees['total'] + 1;
		echo $tot;
// Génération de la requête SQL 

		
  		$sql1 = "UPDATE contact SET Quantite = '$tot' WHERE Id = '$id' ";
  		$result = mysqli_query($db_handle, $sql1);
  		$sql = "INSERT INTO contact (Id, Nom, Prix, Photo, Description, Vendeur, Quantite) VALUES ('$id','$nom', '$prix', '$pic','$desc','$vend','$tot') ";
  		//$sql5 .= "DELETE FROM contact WHERE Quantite ='1' ";
  		

		
		
  ;}



 else {
  			$sql = "INSERT INTO contact (Id, Nom, Prix, Photo, Description, Vendeur) VALUES ('$id','$nom', '$prix', '$pic','$desc','$vend') ";
           
      }

  $result = mysqli_query($db_handle, $sql);
  $result5 = mysqli_query($db_handle, $sql5);

      header('location: panier.php');

        }

    else {

        echo "Database not found"; }
//fermer la connexion

mysqli_close($db_handle); 



?>