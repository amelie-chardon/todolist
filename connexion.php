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

if(isset($_POST["mail"]) && isset($_POST["password"])){
    ?>
    <div id="result"><?php echo ($_SESSION["user"]->connexion($_POST["mail"],$_POST["password"]));?></div>
    <?php
}

?>
