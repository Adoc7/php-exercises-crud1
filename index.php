<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>index</title>
  </head>
  <body>
    <?php include("connect.php"); ?>


    <h1>## Exercice 7 <br>

    Afficher tous les clients comme ceci : <br>
    Nom : *Nom de famille du client* <br>
    Prénom : *Prénom du client* <br>
    Date de naissance : *Date de naissance du client* <br>
    Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)* <br>
    Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*</h1>


    <h1>## Exercice 6 >  Afficher le titre de tous les spectacles <br>
      ainsi que l'artiste, la date et l'heure. <br>
      Trier les titres par ordre alphabétique. <br>
       Afficher les résultat comme ceci : *Spectacle* par *artiste*, <br>
       le *date* à *heure*.</h1>
       <?php
      $reponse = $pdo->query('SELECT title,performer,startTime FROM shows ORDER BY title ASC');
           $reponse1 = $reponse->fetchAll();
          foreach ($reponse1 as $value) {
        ?>
        <p><span>Titre de spectacle : </span><?= $value->title ?></p>
        <p><span>Artiste : </span><?= $value->performer ?></p>
        <p><span>Heure : </span><?= $value->startTime ?></p>
        <?php
       }
       ?>
        <hr>

    <h1>## Exercice 5 > Afficher uniquement le nom et le prénom <br/>
      de tous les clients dont le nom commence par la lettre "M". <br/>
    Les afficher comme ceci : <br/>
    Nom : *Nom du client*<br/>
    Prénom : *Prénom du client*<br/>
    Trier les noms par ordre alphabétique.</h1>

    <!-- SELECT nom_auteur FROM auteur WHERE nom_auteur LIKE 'A%' ORDER BY nom_auteur; -->
    <?php
    $reponse=$pdo->query("SELECT lastName,firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC");
    $reponse1=$reponse->fetchall();
    // var_dump($reponse1);
    foreach($reponse1 as $value){
     ?>
     <p><span>Nom : </span><?= $value->lastName ?></p>
     <p><span>Prénom : </span><?= $value->firstName ?></p>
     <?php
    }
    ?>
     <hr>

    <h1> Exercice 4 </h1>
         <?php
        $reponse = $pdo->query('SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardTypes ON cards.cardTypesId = cardTypes.id WHERE cardTypes.id = 1');
             $reponse1 = $reponse->fetchAll();
            foreach ($reponse1 as $value) {
               echo '<p> ID : ' .$value->id. '</p><p> Last Name : '.$value->lastName. '</p><p> First Name : ' .$value->firstName.'</p><p> Birth Date : '.$value->birthDate. '</p><p> Card : ' .$value->card.'</p><p> Card Number :' .$value->cardNumber. '</p><hr>';
             }
          ?>
          <hr>

    <h1>## Exercice 4 > N'afficher que les clients possédant une carte de fidélité</h1>

    <h1> Exercice 4 </h1>
         <?php
        $reponse = $pdo->query('SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardTypes ON cards.cardTypesId = cardTypes.id WHERE cardTypes.id = 1');
             $reponse1 = $reponse->fetchAll();
            foreach ($reponse1 as $value) {
               echo '<p> ID : ' .$value->id. '</p><p> Last Name : '.$value->lastName. '</p><p> First Name : ' .$value->firstName.'</p><p> Birth Date : '.$value->birthDate. '</p><p> Card : ' .$value->card.'</p><p> Card Number :' .$value->cardNumber. '</p><hr>';
             }
          ?>
          <hr>

    <h1>## Exercice 3 > Afficher les 20 premiers clients</h1>
    <?php
    $reponse=$pdo->query('SELECT * FROM clients LIMIT 0,20');
    $reponse1=$reponse->fetchall();
    // var_dump($reponse1);
    foreach($reponse1 as $value){
     ?>
     <p><span>Nom : </span><?= $value->lastName ?></p>
     <p><span>Prénom : </span><?= $value->firstName ?></p>
     <?php
    }
    ?>

<hr>


    <h1>EXERCICE 02 > Afficher tous les types de spectacles possibles</h1>

    <?php

    $reponse=$pdo->query('SELECT * FROM showTypes');
    $reponse1=$reponse->fetchall();
    // var_dump($reponse1);
    foreach($reponse1 as $value){
     ?>
     <p><span>Type de concert : </span><?= $value->type?></p>
     <?php
    }
    ?>

       <hr>


<h1>EXERCICE 01 > Afficher tous les clients</h1>

    <?php
    $reponse=$pdo->query('SELECT * FROM clients');

    $reponse1=$reponse->fetchall();
    // var_dump($reponse1);
    foreach($reponse1 as $value){
     ?>
     <p><span>Nom : </span><?= $value->lastName ?></p>
     <p><span>Prénom : </span><?= $value->firstName ?></p>
       <?php
   }
   ?>

   <hr>

<h1>TOUT AFFICHER</h1>

    <?php
    $reponse=$pdo->query('SELECT * FROM bookings');
    $reponse1=$reponse->fetchall();
    // var_dump($reponse1);
    foreach($reponse1 as $value){
     ?>
     <p><span>clientId : </span><?= $value->clientId ?></p>
     <?php
   }

   ?>
   <?php
   $reponse=$pdo->query('SELECT * FROM cards');
   $reponse1=$reponse->fetchall();
   // var_dump($reponse1);
   foreach($reponse1 as $value){
    ?>
    <p><span>cardNumber : </span><?= $value->cardNumber ?></p>
    <p><span>cardTypesId : </span><?= $value->cardTypesId ?></p>
    <?php
  }
  ?>

  <?php
  $reponse=$pdo->query('SELECT * FROM cardTypes');
  $reponse1=$reponse->fetchall();
  // var_dump($reponse1);
  foreach($reponse1 as $value){
   ?>
   <p><span>cardTypes type : </span><?= $value->type ?></p>
   <p><span>cardTypes discount : </span><?= $value->discount ?></p>
   <?php
 }
 ?>

 <?php
 $reponse=$pdo->query('SELECT * FROM clients,genres');
 $reponse1=$reponse->fetchall();
 // var_dump($reponse1);
 foreach($reponse1 as $value){
  ?>
  <p><span>Nom : </span><?= $value->lastName ?></p>
  <p><span>Prénom : </span><?= $value->firstName ?></p>
  <p><span>Date de naissance : </span><?= $value->birthDate ?></p>
  <p><span>Carte : </span><?= $value->card ?></p>
  <p><span>Numero de carte : </span><?= $value->cardNumber ?></p>

  <p><span>Genre : </span><?= $value->genre ?></p>
  <p><span>Type : </span><?= $value->showTypesId ?></p>
  <?php
}
?>

<?php
$reponse=$pdo->query('SELECT * FROM shows');
$reponse1=$reponse->fetchall();
// var_dump($reponse1);
foreach($reponse1 as $value){
 ?>
 <p><span>Titre : </span><?= $value->title?></p>
 <p><span>Artiste : </span><?= $value->performer ?></p>
 <p><span>Date : </span><?= $value->date ?></p>
 <p><span>Type de show : </span><?= $value->showTypesId ?></p>

 <p><span>Premier genre : </span><?= $value->firstGenresId?></p>
 <p><span>Deuxieme genre : </span><?= $value->secondGenreId ?></p>
 <p><span>Durée : </span><?= $value->duration ?></p>
 <p><span>Start time : </span><?= $value->startTime ?></p>
 <?php
}
?>

<?php
$reponse=$pdo->query('SELECT * FROM showTypes,tickets');
$reponse1=$reponse->fetchall();
// var_dump($reponse1);
foreach($reponse1 as $value){
 ?>
 <p><span>Prix : </span><?= $value->price?></p>

  <p><span>booking ID : </span><?= $value->bookingsId?></p>
 <?php
}
?>



  </body>
</html>
