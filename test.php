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
      $i=0;
      $connect=mysqli_connect('localhost', 'root', '','tdl');
      $select="SELECT id, titre,date_creation,description,etat FROM taches WHERE etat = 'todo' ";
      $query=mysqli_query($connect,$select);
      $fetch=mysqli_fetch_all($query);
      
      if($fetch==true){

        foreach ($fetch as list($id_taches,$titre,$date,$description,$etat)){
      
     /* $select="SELECT id,etat FROM taches WHERE  `taches`.`id` = $id_taches";
      $query=mysqli_query($connect,$select);
      $fetch=mysqli_fetch_all($query);

      var_dump($fetch);
      if($etat=="todo"){
          $update="UPDATE `taches` SET `etat` = 'done' WHERE `taches`.`id` = $id_taches";
          $query=mysqli_query($connect,$update);
     
      */
      ?>
      <section class="tache">
      
      <div class="info_tache">
            <p><?php echo $titre;?></p>
            <p class="etat"><img class="icone" src="img/non.png"></p>
          </div>
          <div class="descr_tache">
            <p class="date_creation">Créée le :<?php echo $date;?></p>
            <p class="etat_txt">Etat : <?php echo $etat;?></p>
            <p class="description">Description : <?php echo $description;?></p>
          
          
   
      
      <?php 
      }
    }
    
    else
    {
     
    ?>
      <h1>Pas de tache en cours !</h1>
      <?php
     }
    
    $i++;
  
     ?>
     </div>
     </div>
        </section>
     
    </section> 
<?php
    $connect=mysqli_connect('localhost', 'root', '','tdl');
      $select="SELECT etat FROM taches WHERE  `taches`.`id` = $id_taches";
      $query=mysqli_query($connect,$select);
      $fetch=mysqli_fetch_all($query);
      var_dump($fetch);

    ?>
    
    <section class="colonne" id="done">
      <h2>Done</h2>
      <?php
      $i=0;
      $connect=mysqli_connect('localhost', 'root', '','tdl');
      $select="SELECT titre,date_creation,description,etat FROM taches WHERE etat = 'done' ";
      $query=mysqli_query($connect,$select);
      $fetch=mysqli_fetch_all($query);
      
      if($fetch==true){

        foreach ($fetch as list($titre,$date,$description,$etat)){
      
      ?>

      <section class="tache">
        
          <div class="info_tache">
          <?php 
      
      ?>
            <p><?php echo $titre;?></p>
            <p class="etat"><img class="icone" src="img/oui.png"></p>
          </div>
          <div class="descr_tache">
            <p class="date_creation">Créée le :<?php echo $date;?></p>
            <p class="etat_txt">Etat : <?php echo $etat;?></p>
            <p class="description">Description : <?php echo $description;?></p>
          </div>
 
          <?php 
      }
      
    }
    else
    {
     
    ?>
      <h1>Pas de tache terminer !</h1>
      <?php
     }
    
    $i++;
  
     ?>
          
      </section>
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

