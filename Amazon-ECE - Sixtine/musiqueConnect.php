<!doctype html>
<html lang="fr">
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
    <link href="mainPage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="item.css">

    <style type="text/css">
      #utilisateurconnecte{
        margin-left: 100px;
        font-size: 20px;
        font-style: oblique;
        color: white;
        background-color: rgba(0, 0, 0, 0);
      }
    </style>

</head>

<body>

	<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="connectPageA.php">ECE Amazon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav ml-5">
          <li class="nav-item ml-4">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="livresConnect.php">Livres</a>
                <a class="dropdown-item" href="musiqueConnect.php">Musique</a>
                <a class="dropdown-item" href="vetConnect.php">Vêtements</a>
                <a class="dropdown-item" href="sportConnect.php">Sports et loisirs</a>
              </div>
            </div>
          </li>
            
          <li class="nav-item ml-4">
              <a class="btn btn-secondary" href="ventesFconnect.php" role="button">Ventes Flash</a>
          </li>

          <li>
            <div id="utilisateurconnecte">
            <?php
              $database = "AMAZON";
  
              $db_handle = mysqli_connect('localhost', 'root', 'root');
              $db_found  = mysqli_select_db($db_handle, $database);

              if($db_found){
                $sql = "SELECT * FROM Acheteur";

                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Bienvenu(e)  " . $data['Identifiant'] . " !";
                }
              }
            ?>
            <p style="font-size: 14px;" >Connecté(e) en tant que client(e)</p>
            </div>
          </li>

          </ul>
          <ul class="navbar-nav float-right">
            <li class="nav-item ml-4">
              <a href="deconnexion.php" class="btn btn-lg btn-info">Déconnexion  <span class="glyphicon glyphicon-log-out"></span></a>
            </li>
            <li class="nav-item ml-4">
              <a href="panierConnect.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a>
            </li>
          </ul>
      </div>
    </nav>
</header>

<h1 id="livres">Musique</h1>
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
		$sql = "SELECT * FROM Item WHERE Categorie LIKE '%Musique%'";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
 
			?>

			<div class="row">
        <div class="col-lg-4">
          <div class="zoom">
              <div class="image">
                <img src="img/<?php echo  $data['Photo1'];?>" >
                <img src="img/<?php echo  $data['Photo2'];?>" >
              </div>          
          
            <div class="image">
              <img src="img/<?php echo  $data['Photo3'];?>" >
            </div>
          </div>
        </div>

        <div class="col-lg-6">
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
           <div class="col">
                     <?php echo  "Stock: " .$data ['Stock'] .'<br>';?>
                  </div>
        </div>
        <div class="col-lg-2" id="droite">
          <div class="row" id="prix"><?php echo  $data['Prix'] . " €" . '<br>';?></div>
          
          <div class="row"><a class="btnPanier" href="ajoutPanier.php?id=<?php echo $data['Id']; ?>">Ajouter au panier</a></div>
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


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>

</html>