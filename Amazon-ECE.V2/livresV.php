
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
						    <a class="dropdown-item" href="#">Livres</a>
			    			<a class="dropdown-item" href="#">Musiques</a>
    						<a class="dropdown-item" href="#">Vêtements</a>
    						<a class="dropdown-item" href="#">Sports et loisirs</a>
  						</div>
					</div>
        		</li>
        		
        		<li class="nav-item ml-4">
        			<div class="dropdown">
  						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventes flash</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="#">Livres</a>
			    			<a class="dropdown-item" href="#">Musiques</a>
    						<a class="dropdown-item" href="#">Vêtements</a>
    						<a class="dropdown-item" href="#">Sports et loisirs</a>
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
        			<a href="#" class="btn btn-lg btn-info">Admin <span class="glyphicon glyphicon-user"></span></a>
        		</li>
        		<li class="nav-item ml-4">
        			<a href="appelCaddie.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a>
        		</li>
        	</ul>
    	</div>
  	</nav>
</header>

<h3>Livres</h3>



<!--le code PHP --------->


 

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
           


 	<tr>
		   <td>
        <br><br><br><br>
            
          <img id = "<?php echo $var;?>" src = " <?php echo  $data['Photo1'];?>">  
           <td class =" titre">
              <?php echo  $data['Titre'] . '<br>';?> <br>
            </td>

            <td class="vendeur"> Vendeur: 
             <?php echo  $data['Vendeur'] . '<br>';?>  <br>
            </td>  

            <td class = "prix">Prix: 
             <?php echo  $data['Prix'] . '<br>';?> <br>
            </td>       
            <td> <a href="delete.php?id=<?php echo $data['NumProd']; ?>" > Suppprimer</a> </td>
            <td>
             <br><br><br><br><br><br><br><br><br><br><br>
            </td>     
	   </tr>


<?php

 }//end while
?>
<?php
}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>









  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>







