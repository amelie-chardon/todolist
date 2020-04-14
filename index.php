<?php 
require 'class/bdd.php';
require 'class/user.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user']))
{
  $_SESSION['user'] = new user();
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>EasyList - Accueil</title>

</head>

<body>
  
<?php include "include/header.php" ?>

  <main id="index">
  <h1>Avec EasyList, collaborez simplement avec votre équipe</h1>
  <section class="section_wrap">
    <section class="panneau">
      <img src="img/img_index">
    </section>
    <section class="panneau">
        <section class="text">
            <ul>
              <li>La gestion de projet 2.0</li>
              <li>Des "to-do list" dynamiques</li>
              <li>Des tableaux visuels</li>
              <li>Facilité d'utilisation</li>
            </ul>
        </section>
        <section id="resultat"></section>
        <section class="formulaire"></section>
    </section>
  </section>
  </main>

  <?php include "include/footer.php" ?>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="script.js"></script>

