<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.ico">

  <title>Amazon ECE</title>

  <!-- bibliothèque et pages reliées -->

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

  <!-- mise en page -->
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

  <!-- en tête du site -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <!-- lien retour vers la page principale -->
      <a class="navbar-brand" href="connectPageA.php">ECE Amazon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav ml-5">
          <li class="nav-item ml-4">
            <!-- bouton déroulant -->
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
            <!-- ventes flash -->
            <a class="btn btn-secondary" href="ventesFconnect.php" role="button">Ventes Flash</a>
          </li>

          <li>
            <div id="utilisateurconnecte">
              <!-- code php -->
              <?php
              $database = "AMAZON";
              
              $db_handle = mysqli_connect('localhost', 'root', 'root');
              $db_found  = mysqli_select_db($db_handle, $database);

              //si on trouve la base de données
              if($db_found){
                //on cherche dans la table acheteur
                $sql = "SELECT * FROM Acheteur";

                //on cherche l'utilisateur connecté
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                  //on affiche le pseudo de l'utilisateur connecté
                  echo "Bienvenue  " . $data['Identifiant'] . " !";
                }
              }
              ?>
              <p style="font-size: 14px;" >Connecté(e) en tant que client(e)</p>
            </div>
          </li>

        </ul>
        <ul class="navbar-nav float-right">
          <li class="nav-item ml-4">
            <!-- bouton pour se deconnecter -->
            <a href="deconnexion.php" class="btn btn-lg btn-info">Déconnexion  <span class="glyphicon glyphicon-log-out"></span></a>
          </li>
          <li class="nav-item ml-4">
            <!-- bouton lien vers le panier -->
            <a href="panierConnect.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a>
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
            <!-- image ronde lien vers la catégorie livres -->
            <a href="livresConnect.php">
              <img class="ronds" src="img/livres.jpg" alt="livres">
              <div class="hover col-lg-6">
                <div class="text">Acheter des livres</div>
              </div>
            </a>
          </div>        
          <h2>Livres</h2>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-lg-6">
          <div class="overlay-image">
            <!-- image ronde lien vers la catégorie musique -->
            <a href="musiqueConnect.php">
              <img class="ronds" src="img/musique.jpg" alt="Musique">
              <div class="hover col-lg-6">
                <div class="text">Matériel audio</div>
              </div>
            </a>
          </div>        
          <h2>Musique</h2>
        </div><!-- /.col-lg-4 -->
      </div>  

      <div class="row">   
        <div class="col-lg-6">
          <div class="overlay-image">
            <!-- image ronde lien vers la catégorie vetements -->
            <a href="vetConnect.php">
              <img class="ronds" src="img/vet.jpg" alt="vêtements">
              <div class="hover col-lg-6">
                <div class="text">Acheter des vêtements</div>
              </div>
            </a>
          </div>        
          <h2>Vêtements</h2>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-6">
          <div class="overlay-image">
            <!-- image ronde lien vers la catégorie sport et loisir -->
            <a href="sportConnect.php">
              <img class="ronds" src="img/sport.jpg" alt="Sport">
              <div class="hover col-lg-6">
                <div class="text">Matériel de sport et loisir</div>
              </div>
            </a>
          </div>        
          <h2>Sports et loisir</h2>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <!-- pas encore codé -->
        <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </body>
    </html>