<?php 
require 'class/bdd.php';
require 'class/user.php';

session_start();

if(!isset($_SESSION['bdd']))
{
  $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
  $_SESSION['user'] = new user();
}

if($_SESSION['user']->isConnected()!==true)
{
  header("location:index.php");
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>EasyList - Tableau</title>

</head>

<body>
  
<?php include "include/header.php" ?>

  <main id="todolist">
  <h1>Votre tableau</h1>

  <section class="section_wrap_col">
    <section class="colonne" id="todo">
      <h2>To-Do</h2>

      <?php
      $fetch=$_SESSION["user"]->recup_tache_todo();

      if($fetch!==null){
        foreach ($fetch as list($id_taches,$titre,$date,$description,$etat))
        {
        ?>
        <section class="tache" id="<?php echo $id_taches; ?>">
          <div class="info_tache">
            <p><?php echo $titre;?></p>
            <p class="etat"><img class="icone" id="suppr" src="img/suppr.png"><img class="icone" id="modify" src="img/non.png"></p>
          </div>
          <div class="descr_tache">
            <p class="date_creation">Créée le : <?php echo $date;?></p>
            <p class="etat_txt">Etat : <?php echo $etat;?></p>
            <p class="description">Description : <?php echo $description;?></p>
          </div>
        </section>
        <?php 
        }
      }
      else
      {
      ?>
        <p>Pas de tache en cours !</p>
      <?php
     }
     ?>
    </section> 

    
    <section class="colonne" id="done">
      <h2>Done</h2>
      <?php
      $fetch2=$_SESSION["user"]->recup_tache_done();

      if($fetch2!==null){
        foreach ($fetch2 as list($id_taches,$titre,$date,$description,$etat))
        {
        ?>
        <section class="tache" id="<?php echo $id_taches; ?>">
          <div class="info_tache">
            <p><?php echo $titre;?></p>
            <p class="etat"><img class="icone" id="suppr" src="img/suppr.png"><img class="icone" id="modify" src="img/oui.png"></p>
          </div>
          <div class="descr_tache">
            <p class="date_creation">Créée le : <?php echo $date;?></p>
            <p class="etat_txt">Etat : <?php echo $etat;?></p>
            <p class="description">Description : <?php echo $description;?></p>
          </div>
        </section>
        <?php 
        } 
      }
      else
      {
      ?>
        <p>Aucune tâche terminée !</p>
      <?php
      }  
      ?>
    </section>
  </section>

  <section class="boutons">
    <!--<button type="submit" id="formliste">Nouvelle liste</button>-->
    <button type="submit" id="formtache">Nouvelle tâche</button>
  </section>
  </main>

  <?php include "include/footer.php" ?>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="script.js"></script>

