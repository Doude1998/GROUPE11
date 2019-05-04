<?php
  $database = "AMAZON";
  
  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found  = mysqli_select_db($db_handle, $database);

  if($db_found){
    $sql = "SELECT * FROM Acheteur";
    $sql = "UPDATE Acheteur SET Connecte='non' WHERE Connecte='oui'";
    $result = mysqli_query($db_handle, $sql);

    $sql = "SELECT * FROM Vendeur";
    $sql = "UPDATE Vendeur SET Connecte='non' WHERE Connecte='oui'";
    $result = mysqli_query($db_handle, $sql);

    $sql = "SELECT * FROM Admin";
    $sql = "UPDATE Admin SET Connecte='non' WHERE Connecte='oui'";
    $result = mysqli_query($db_handle, $sql);

    header('Location: mainPage.html');
  }
?>