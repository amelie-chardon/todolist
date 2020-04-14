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

if(isset($_POST['mail'])){
    ?>
    <div id="result"><?php echo ($_SESSION["user"]->inscription($_POST['prenom'],$_POST['nom'],$_POST["password"],$_POST['password_conf'],$_POST['mail']));?></div>
    <?php
}
?>
