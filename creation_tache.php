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

if(isset($_POST['titre'])){
    ?>
    <div id="result"><?php echo ($_SESSION["user"]->creation_tache($_POST['titre'],$_POST['description']));?></div>
    <?php
}
?>
