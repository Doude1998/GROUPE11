<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Amazon ECE</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="item.css" rel="stylesheet">


</head>

<body>

	<header>
  	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    	<a class="navbar-brand" href="mainPage.html">ECE Amazon</a>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>

	    <div class="collapse navbar-collapse" id="navbarCollapse">

    		<ul class="navbar-nav ml-5">
				<li class="nav-item ml-4">
        			<div class="dropdown">
  						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="livres.php">Livres</a>
			    			<a class="dropdown-item" href="musique.php">Musiques</a>
    						<a class="dropdown-item" href="vet.php">Vêtements</a>
    						<a class="dropdown-item" href="sport.php">Sports et loisirs</a>
  						</div>
					</div>
        		</li>
        		
        		<li class="nav-item ml-4">
        			<div class="dropdown">
  						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventes flash</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="livresF.php">Livres</a>
			    			<a class="dropdown-item" href="musiqueF.php">Musiques</a>
    						<a class="dropdown-item" href="vetF.php">Vêtements</a>
    						<a class="dropdown-item" href="sportF.php">Sports et loisirs</a>
  						</div>
					</div>
        		</li>

        		<li class="nav-item ml-4">
        			<div class="dropdown">
  						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vendre</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <button onclick="document.getElementById('id01').style.display='block'" type="button" class="dropdown-item">Se connecter</a>
			    			<button onclick="document.getElementById('id04').style.display='block'" type="button" class="dropdown-item">S'inscrire</a>
  						</div>
					</div>
        		</li>
        		<li class="nav-item ml-4">
        			<div class="dropdown">
  						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Votre compte</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <button onclick="document.getElementById('id01').style.display='block'" type="button" class="dropdown-item">Se connecter</a>
			    			<button onclick="document.getElementById('id02').style.display='block'" type="button" class="dropdown-item">S'inscrire</a>
  						</div>
					</div>
        		</li>
        	</ul>
        	<ul class="navbar-nav float-right">
        		<li class="nav-item">
        			<a href="admin.php" class="btn btn-lg btn-info">Admin <span class="glyphicon glyphicon-user"></span></a>
        		</li>
        		<li class="nav-item ml-4">
        			<a href="panier.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a>
        		</li>
        	</ul>
    	</div>
  	</nav>
</header>

<h1 id="livres">Livres</h1>
<hr>

<!--le code PHP --------->
<table>
 	
<?php
	//identifier le nom de base de données
	$database = "AMAZON";
	
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
	$db_handle = mysqli_connect('localhost', 'root', 'root' );
	$db_found = mysqli_select_db($db_handle, $database);

	//si le BDD existe, faire le traitement
	if ($db_found) {
		$sql = "SELECT * FROM Item WHERE Categorie LIKE '%Livres%'";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
 
			?>

			<div class="row" id="test">
				<div class="col-lg-3">
					<div>
						<img src="<?php echo  $data['Photo1'];?>" >
					</div>

				</div>
				<div class="col-lg-7">
					<div class="row" id="titre">
						<?php echo  $data['Titre'] . '<br>';?>
					</div>
					<div class="col">
						<p id="description">Description : </p>
						<div class="row">
							<?php echo  $data['Description'] . '<br>';?>
						</div>
					</div>
					<div class="row">
						<p id="vendeur">Vendeur : </p>
						<div class="col">
							<?php echo  $data['Vendeur'] . '<br>';?>
						</div>
					</div>
				</div>
				<div class="col-lg-2" id="droite">
					<div class="row" id="prix"><?php echo  $data['Prix'] . '<br>';?></div>
					<div class="row"><a class="btnPanier" href="ajoutPanierV2.php?id=<?php echo $data['Id']; ?>">Ajouter au panier</a></div>


				</div>
			</div>

			<hr>

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

</table>

<!--FORMULAIRE DE CONNECTION ACHETEUR-->
<div id="id01" class="modal">
  	<form class="modal-content animate" action="loginAcheteur.php" method="POST">

  		<div class="imgcontainer">
      		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      		<img src="img/icone.png" alt="Avatar" class="avatar">
    	</div>

    	<div class="container">
    		<label for="Identifiant"><b>Nom d'utilisateur</b></label><br>
      		<input type="text" placeholder="Nom d'utilisateur" name="Identifiant" required><br><br>

      		<label for="MDP"><b>Mot de passe</b></label><br>
      		<input type="password" placeholder="Mot de passe" name="MDP" required><br><br>
        
      		<button class="submit" name="Login" type="submit">Se connecter</button><br><br>
    		<label>
        		<input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
      		</label><br>
    	</div>
    	<span><a href="#">Mot de passe oublié ?</a></span>
    </form>
</div>

<!--FORMULAIRE DE CONNECTION VENDEUR-->
<div id="id03" class="modal">
  	<form class="modal-content animate" action="loginVendeur.php" method="POST">

  		<div class="imgcontainer">
      		<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      		<img src="img/icone.png" alt="Avatar" class="avatar">
    	</div>

    	<div class="container">
    		<label for="Pseudo"><b>Nom d'utilisateur</b></label><br>
      		<input type="text" placeholder="Nom d'utilisateur" name="Pseudo" required><br><br>

      		<label for="MDP"><b>Mot de passe</b></label><br>
      		<input type="password" placeholder="Mot de passe" name="MDP" required><br><br>
        
      		<button class="submit" name="Login" type="submit">Se connecter</button><br><br>
    		<label>
        		<input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
      		</label><br>
    	</div>
    	<span><a href="#">Mot de passe oublié ?</a></span>
    </form>
</div>

<!--FORMULAIRE D'INSCRIPTION ACHETEUR-->
<div id="id02" class="modal">
  	<form class="modal-content animate" action="inscrireAcheteur.php" method="POST">

  		<div class="imgcontainer">
      		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      		<img src="img/icone.png" alt="Avatar" class="avatar">
    	</div>

    	<div class="container">
    		<label for="Nom"><b>Nom</b></label><br>
      		<input type="text" placeholder="Nom" name="Nom" required><br>

      		<label for="Prenom"><b>Prénom</b></label><br>
      		<input type="text" placeholder="Prénom" name="Prenom" required><br><br>

      		<label for="Identifiant"><b>Identifiant</b></label><br>
      		<input type="text" placeholder="Identifiant" name="Identifiant" required><br><br>

      		<label for="Email"><b>E-mail</b></label><br>
      		<input type="text" placeholder="example@truc.fr/com" name="Email" required><br><br>
      		
      		<label for="MDP"><b>Mot de passe</b></label><br>
      		<input type="password" placeholder="Mot de passe" name="MDP" required><br><br>
      		
      		<label for="VilleU"><b>Ville</b></label><br>
      		<input type="text" placeholder="Ville" name="VilleU" required><br><br>
      		
      		<label for="CPU"><b>Code Postal</b></label><br>
      		<input type="text" placeholder="XX XXX" name="CPU" required><br><br>
      		
      		<label for="AdresseU"><b>Adresse</b></label><br>
      		<input type="text" placeholder="N° et rue" name="AdresseU" required><br><br>
        
      		<button class="submit" name="Create" type="submit">Créer un compte</button><br><br>
    	</div>
    </form>
</div>

<!--FORMULAIRE D'INSCRIPTION VENDEUR-->
<div id="id04" class="modal">
  	<form class="modal-content animate" action="inscrireVendeur.php" method="POST">

  		<div class="imgcontainer">
      		<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      		<img src="img/icone.png" alt="Avatar" class="avatar">
    	</div>

    	<div class="container">
    		<label for="Nom"><b>Nom</b></label><br>
      		<input type="text" placeholder="Nom" name="Nom" required><br>

      		<label for="Prenom"><b>Prénom</b></label><br>
      		<input type="text" placeholder="Prénom" name="Prenom" required><br><br>

      		<label for="Pseudo"><b>Identifiant</b></label><br>
      		<input type="text" placeholder="Identifiant" name="Pseudo" required><br><br>

      		<label for="Email"><b>E-mail</b></label><br>
      		<input type="text" placeholder="example@truc.fr/com" name="Email" required><br><br>
      		
      		<label for="MDP"><b>Mot de passe</b></label><br>
      		<input type="password" placeholder="Mot de passe" name="MDP" required><br><br>
      		
      		<label for="Ville"><b>Ville</b></label><br>
      		<input type="text" placeholder="Ville" name="Ville" required><br><br>
      		
      		<label for="CP"><b>Code Postal</b></label><br>
      		<input type="text" placeholder="XX XXX" name="CP" required><br><br>
      		
      		<label for="Adresse"><b>Adresse</b></label><br>
      		<input type="text" placeholder="N° et rue" name="Adresse" required><br><br>

      		<label for="BIC"><b>RIB :</b></label><br>
      		<input type="text" placeholder="RIB" name="BIC" required><br><br>
      		
      		<label for="IBAN"><b>IBAN :</b></label><br>
      		<input type="text" placeholder="IBAN" name="IBAN" required><br><br>
        
      		<button class="submit" name="Create" type="submit">Créer un compte</button><br><br>
    	</div>
    </form>
</div>

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>

</html>