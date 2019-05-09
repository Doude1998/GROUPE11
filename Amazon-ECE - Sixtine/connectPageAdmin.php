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
    
    #UtilisateurConnecte {
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
      <a class="navbar-brand" href="connectPageAdmin.php">ECE Amazon</a>
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
                <a class="dropdown-item" href="livresConnectA.php">Livres</a>
                <a class="dropdown-item" href="musiqueConnectA.php">Musique</a>
                <a class="dropdown-item" href="vetConnectA.php">Vêtements</a>
                <a class="dropdown-item" href="sportConnectA.php">Sports et loisirs</a>
              </div>
            </div>
          </li>
          
          <li class="nav-item ml-4">
            <!-- ventes flash -->
            <a class="btn btn-secondary" href="ventesFadmin.php" role="button">Ventes Flash</a>
          </li>

          <li>
            <div id="UtilisateurConnecte">
              <!-- code php -->
              <?php
              $database = "AMAZON";
              
              $db_handle = mysqli_connect('localhost', 'root', 'root');
              $db_found  = mysqli_select_db($db_handle, $database);

              //si on trouve la base de données
              if($db_found){
                //on cherche dans la table admin
                $sql = "SELECT * FROM Admin";

                //on cherche l'utilisateur connecté
                $sql .= " WHERE Connecte LIKE '%oui%'";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                  //on affiche le pseudo de l'utilisateur connecté
                  echo "Bienvenue  " . $data['Pseudo'] . " !";
                }
              }
              ?>
              <p style="font-size: 14px;" >Connecté(e) en tant qu'admin</p>
            </div>
          </li>

        </ul>
        <ul class="navbar-nav float-right">
          <li class="nav-item ml-4">
            <!-- bouton pour se deconnecter -->
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
            <!-- image ronde lien pour ajouter un item sur le site -->
            <a onclick="document.getElementById('id01').style.display='block'">
              <img class="ronds" src="img/ajout.png" alt="ajout">
              <div class="hover col-lg-6">
                <div class="text">Ajouter un produit</div>
              </div>
            </a>
          </div>        
          <h2>Ajouter un produit</h2>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-lg-6">
          <div class="overlay-image">
            <!-- image ronde lien pour supprimer un vendeur site -->
            <a onclick="document.getElementById('id02').style.display='block'">
              <img class="ronds" src="img/sup.png" alt="sup">
              <div class="hover col-lg-6">
                <div class="text">Supprimer un compte vendeur</div>
              </div>
            </a>
          </div>        
          <h2>Supprimer un compte vendeur</h2>
        </div><!-- /.col-lg-4 -->
      </div>  
    </div>
  </main>


  <!--FORMULAIRE D'AJOUT ITEM-->
  <div class="modal" id="id01">
  	<form class="modal-content animate" action="ajoutItem.php." method="POST">

  		<div class="imgcontainer">
        <!-- fermer le formulaire -->
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <!-- icone en haut du formulaire -->
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

       <label for="images">Ajoutez au moins une image</label><br>
       <input type="file" name="image1" required>
       <input type="file" name="image2" required>
       <input type="file" name="image3" required><br><br>
       
       <!-- soumettre les infos au formulaire -->
       <button class="submit" name="Create" type="submit">Ajouter mon produit</button><br><br>
     </div>
   </form>
 </div>

 <!--FORMULAIRE DE SUPPRESSION VENDEUR-->
 <div class="modal" id="id02">
  <form class="modal-content animate" action="deleteVendeur.php." method="POST">

    <div class="imgcontainer">
      <!-- fermer le formulaire -->
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- icone en haut du formulaire -->
      <img src="img/sup.png" alt="Avatar" id="avatar">
    </div>

    <!-- code php -->
    <?php
    $database  = "AMAZON";

        //connectez-vous dans votre BDD
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found  = mysqli_select_db($db_handle, $database);

        //on cherche dans la table vendeur
    $sql = "SELECT * FROM Vendeur";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
          //on affiche tous les vendeurs existants dans la table vendeur
      echo $data['Nom'] . " " . $data['Prenom'] . " (Pseudo : " . $data['Pseudo'] . ")<br>";
    }

    ?>

    <div class="container">
      <label for="Pseudo"><b>Entrez le Pseudo</b></label><br>
      <input type="text" placeholder="Prenom Nom" name="Pseudo" required><br><br>
      
      <!-- soumettre les infos au formulaire -->
      <button class="submit" name="Create" type="submit">Supprimer le vendeur</button><br><br>
    </div>
  </form>
</div>

<hr>

<!-- FOOTER -->
<footer class="container">
  <p class="float-right"><a href="#">Back to top</a></p>
  <!-- pas encore codé -->
  <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
</body>
</html>