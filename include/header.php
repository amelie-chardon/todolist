<header>
  <div class="logo">
    <img id="logo-top" src="img/logo.png">
  </div>
  <div>
    <button type="submit"><a href="index.php">Accueil</a></button>
  <?php
  if ($_SESSION["user"]->isConnected()==false)
  {
    ?>
    <button type="submit" id="formconnexion">Connexion</button>
    <button type="submit" id="forminscription">Inscription</button>
    <?php
  }
  else
  {
    ?>
    <button type="submit"><a href="todolist.php">Mon tableau</a></button>
    <button type="submit" name="deconnexion"><a href="deconnexion.php">Se déconnecter</a></button>
    <?php
  }
    ?>
  </div>
</header>
