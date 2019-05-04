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

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="mainPage.css" rel="stylesheet">

  <style type="text/css">
  
    #UtilisateurConnecte {
      margin-left: 100px;
      font-size: 20px;
      font-style: oblique;
      color: white;
      background-color: rgba(0, 0, 0, 0);
    }

    #profil{
      width: 58px;
      height: 58px;
      border-radius: 50%;
      border: solid 2px grey;
      margin-left: 20px;
    }

    .poupou{
      text-shadow: black 1px 1px, black -1px 1px, black -1px -1px, black 1px -1px;
      color: white;

    }
    <?php
      $database = "AMAZON";
  
      $db_handle = mysqli_connect('localhost', 'root', 'root');
      $db_found  = mysqli_select_db($db_handle, $database);

      if($db_found){
        $sql = "SELECT * FROM Vendeur";

        //on cherche le livre avec les paramètres titre et auteur
        $sql .= " WHERE Connecte LIKE '%oui%'";

        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
          $fond = $data['Fond'];
        }
      }
    ?>

    body{
      background-image: url("img/<?php echo  $fond;?>");
    }
  
  </style>

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="connectPageV.php">ECE Amazon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav ml-5">
          <li>
            <div id="UtilisateurConnecte">
            <?php
              $database = "AMAZON";
  
              $db_handle = mysqli_connect('localhost', 'root', 'root');
              $db_found  = mysqli_select_db($db_handle, $database);

              if($db_found){
                $sql = "SELECT * FROM Vendeur";

                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                  $profil = $data['Profil'];
                    echo "Bienvenu(e)  " . $data['Pseudo'] . " !";
                }
              }
            ?>
            <p style="font-size: 14px;" >Connecté(e) en tant que  Vendeur/euse</p>
            </div>
          </li>
          <li>
            <img id="profil" src="img/<?php echo  $profil;?>" >
          </li>

          </ul>
          <ul class="navbar-nav float-right">
            <li class="nav-item ml-4">
              <a href="deconnexion.php" class="btn btn-lg btn-info">Déconnexion  <span class="glyphicon glyphicon-log-out"></span></a>
            </li>
          </ul>
      </div>
    </nav>
</header>

<main role="main">
  <div class="container marketing">
    <div class="row">
      <div class="col-lg-6">
        <div class="overlay-image">
          <a onclick="document.getElementById('id01').style.display='block'">
            <img class="ronds" src="img/ajout.png" alt="ajout">
            <div class="hover col-lg-6">
              <div class="text">Vendre un produit</div>
            </div>
          </a>
        </div>        
          <h2 class="poupou" >Vendre un produit</h2>
      </div><!-- /.col-lg-4 -->
      
      <div class="col-lg-6">
        <div class="overlay-image">
          <a onclick="document.getElementById('id02').style.display='block'">
            <img class="ronds" src="img/sup.png" alt="sup">
            <div class="hover col-lg-6">
              <div class="text">Supprimer un produit</div>
            </div>
          </a>
        </div>        
          <h2 class="poupou" >Supprimer un produit</h2>
      </div><!-- /.col-lg-4 -->
    </div>  
  </div>
</main>

<!--FORMULAIRE D'AJOUT ITEM-->
<div class="modal" id="id01">
  	<form class="modal-content animate" action="ajoutItem.php." method="POST">

  		<div class="imgcontainer">
      		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      		<img src="img/ajout.png" alt="Avatar" id="avatar">
    	</div>

    	<div class="container">
    		  <label for="Titre"><b>Titre</b></label><br>
      		<input type="text" placeholder="Titre" name="Titre" required><br>

      		<label for="Description"><b>Description</b></label><br>
      		<textarea rows="5" name="Description" required></textarea><br><br>

      		<label for="Prix"><b>Prix</b></label><br>
      		<input type="number" placeholder="Prix" name="Prix" required> €<br><br>

          <label for="Stock"><b>Quantité</b></label><br>
          <input type="number" placeholder="Stock" name="Stock" required><br><br>

      		<label for="Categorie"><b>Catégorie</b></label><br>
      		<select size="1" name="Categorie" required>
      			<option value="">Choisir</option>
  				<option value="Livres">Livre</option>
  				<option value="Musique">Musique</option>
  				<option value="Vetement">Vêtement</option>
  				<option value="Sport">Sport et Loisir</option>
			</select><br><br>

			<label for="images">Ajoutez des images</label><br>
			<input type="file" name="image1" required>
			<input type="file" name="image2" required>
			<input type="file" name="image3" required><br><br>
        
      		<button class="submit" name="Create" type="submit">Ajouter mon produit</button><br><br>
    	</div>
    </form>
</div>

<!--FORMULAIRE DE SUPPRESSION ITEM-->
<div class="modal" id="id02">
    <form class="modal-content animate" action="deleteItem.php.">
      <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <h4>Vos articles en vente :</h4><br><br>
      <?php
        $database  = "AMAZON";

        //connectez-vous dans votre BDD
        $db_handle = mysqli_connect('localhost', 'root', 'root');
        $db_found  = mysqli_select_db($db_handle, $database);

        $sql = "SELECT * FROM Vendeur";

        //on cherche le livre avec les paramètres titre et auteur
        $sql .= " WHERE Connecte LIKE '%oui%'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
          $vendeur = $data['Prenom'] . " " . $data['Nom'];

          $sql = "SELECT * FROM Item WHERE Vendeur LIKE '%$vendeur%'";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_assoc($result)) {
            echo $data['Titre'] . "<br> Catégorie : " . $data['Categorie'];
            ?>
              <a class="btn" href="deleteItem.php?id=<?php echo $data['Id']; ?>" role="button">Sup</a>
              <br><br>
            <?php
          }
        }
      ?>
    </form>
</div>
<hr>

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>