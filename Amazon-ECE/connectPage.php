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
    <link href="connectPage.css" rel="stylesheet">
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="connectPage.php">ECE Amazon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav ml-5">
          <li class="nav-item ml-4">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="livres.html">Livres</a>
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
                <a class="dropdown-item" href="livresConnect.html">Livres</a>
                <a class="dropdown-item" href="musiqueConnect.html">Musique</a>
                <a class="dropdown-item" href="vetConnect.html">Vêtements</a>
                <a class="dropdown-item" href="sportConnect.html">Sports et loisirs</a>
              </div>
            </div>
          </li>

          <li>
            <div id="UtilisateurConnecte">
            <?php
              $database = "AMAZON";
  
              $db_handle = mysqli_connect('localhost', 'root', 'root');
              $db_found  = mysqli_select_db($db_handle, $database);

              if($db_found){
                $sql = "SELECT * FROM Acheteur";

                //on cherche le livre avec les paramètres titre et auteur
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);
                
                //regarder s'il y a de résultat
                if (mysqli_num_rows($result) == 0) {
                  $sql = "SELECT * FROM Vendeur";

                  //on cherche le livre avec les paramètres titre et auteur
                  $sql .= " WHERE Connecte LIKE '%oui%'";

                  $result = mysqli_query($db_handle, $sql);

                  while ($data = mysqli_fetch_assoc($result)) {
                    echo "Bienvenu(e)  " . $data['Pseudo'] . " !";
                  }
                }
                else {
                  while ($data = mysqli_fetch_assoc($result)) {
                    echo "Bienvenu(e)  " . $data['Identifiant'] . " !";
                  }
                }
              }
            ?>
            </div>
          </li>

          </ul>
          <ul class="navbar-nav float-right">
            <li class="nav-item ml-4">
              <a href="deconnexion.php" class="btn btn-lg btn-info">Déconnexion  <span class="glyphicon glyphicon-log-out"></span></a>
            </li>
            <li class="nav-item ml-4">
              <a href="#" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a>
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
          <a href="livresConnect.html">
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
          <a href="musiqueConnect.html">
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
          <a href="vetConnect.html">
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
          <a href="sportConnect.html">
            <img class="ronds" src="img/sport.jpg" alt="Sport">
            <div class="hover col-lg-6">
              <div class="text">Matériel de sport et loisir</div>
            </div>
          </a>
        </div>        
          <h2>Sports et loisir</h2>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!--/END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>