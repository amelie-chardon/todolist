//--INDEX--//

//Action de cliquer sur le bouton "connexion"
$("#formconnexion").click(function(){

  //Suppression du panneau "text"
  $(".text").empty();

  //Ajout du formulaire de connexion
  $("h1").html("Connexion");
  var formconnexion = '<input type="email" name="mail" id="mail" placeholder="Mail" required><br><input type="password" name="password" id="password" placeholder="Mot de passe" required><br><button type="submit" name="connexion" id="connexion">Valider</button>';
  $(".formulaire").html(formconnexion);

  //Quand on valide le formulaire
  $("#connexion").click(function(){

    $.post(
      //Page vers laquelle est envoyée la requête
      'connexion.php',
      {
        //Récupération des inputs du formulaires
        mail : $("#mail").val(),
        password : $("#password").val()
      },

      function(data){
        //On récupère le résultat de la connexion et le prénom depuis connexion.php
        result=$(data).filter("div#result").html();

        //TODO : ajouter conditions messages erreur

        if(result=="Succes"){
          $(".formulaire").empty();
          $("#resultat").empty();
          document.location.href="todolist.php"
          //$("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
        }
        else if(result=="Echec"){
          $(".text").empty();
          $("#resultat").html("<p>Erreur lors de la connexion...</p>");
        }
      },
   );
  });
});

//Action de cliquer sur le bouton "inscription"
$("#forminscription").click(function(){

  //Suppression du panneau "text"
  $(".text").empty();

//Ajout du formulaire d'inscription
$("h1").html("Inscription");
var forminscription = '<input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br><input type="text" name="nom" id="nom" placeholder="Nom" required><br><input type="email" name="mail"id="mail" placeholder="Mail" required><br><input type="password" name="password" id="password" placeholder="Mot de passe" required><br><input type="password" name="password_conf" id="password_conf" placeholder="Confirmation du mot de passe" required><br><button type="submit" name="inscription" id="inscription">Valider</button>';
$(".formulaire").html(forminscription);

  //Quand on valide le formulaire
  $("#inscription").click(function(){
    $.post(
      //Page vers laquelle est envoyée la requête
      'inscription.php',
      {
        //Récupération des inputs du formulaires
        prenom : $("#prenom").val(),
        nom : $("#nom").val(),
        mail : $("#mail").val(),
        password : $("#password").val(),
        password_conf : $("#password_conf").val()
      },

      function(data){
        //On récupère le résultat de la connexion et le prénom depuis connexion.php
        result=$(data).filter("div#result").html();

        if(result=="log"){
          $("#resultat").html("<p>L'email choisi est déjà pris.</p>");
        }
        else if(result=="mdp"){
          $("#resultat").html("<p>Les deux mots de passe ne sont pas identiques.</p>");
        }
        else if(result=="empty"){
          $("#resultat").html("<p>Veuillez remplir tous les champs du formulaire.</p>");
        }
        else if(result=="ok"){
          //Le formulaire de connexion s'affiche
          $("#formconnexion").click();
        }
      },
   );
  });
});

//--TODOLIST--//

/*
//Action de cliquer sur le bouton "nouvelle liste"
$("#formliste").click(function new_liste(){
  //On demande à l'utilisateur d'entrer le nom de la liste à créer
  var nom = prompt("Nom de la liste", "Nouvelle liste");
  var titre="<h2>"+nom+"</h2>"
  $(".section_wrap_col").append($("<section>",{class:"colonne"}));
  $(".section_wrap_col .colonne:last-child" ).append(titre);
});
*/

//Action de cliquer sur le bouton "nouvelle tâche"
$("#formtache").click(function new_tache(){
  
  //On masque le tableau
  $(".section_wrap_col").hide();
  $(".boutons").hide();


  //Ajout du formulaire de création de tâche
  $("h1").html("Nouvelle tâche");
  $("h1").after($("<section>",{class:"new_tache"}));
  var formtache = '<input type="text" name="titre" id="titre" placeholder="Titre" required><br><input type="textarea" name="description" id="description" placeholder="Description" required><br><button type="submit" name="new_tache" id="new_tache">Valider</button>';
  $(".new_tache").append(formtache);

  //Quand on valide le formulaire
  $("#new_tache").click(function(){

    $.post(
      //Page vers laquelle est envoyée la requête
      'creation_tache.php',
      {
        //Récupération des inputs du formulaires
        titre : $("#titre").val(),
        description : $("#description").val()
      },

      function(data){
        //On récupère le résultat de la connexion et le prénom depuis connexion.php
        result=$(data).filter("div#result").html();
        //TODO : ajouter conditions messages erreur

        date=new Date();
        jour=date.getDate();
        mois=date.getMonth()+1;
        date=date.toLocaleDateString();
        tit=$("#titre").val();
        descr=$("#description").val()


        if(result=="ok"){
          //On ajoute la tâche au tableau
          $("#todo").append("<section class='tache'><div class='info_tache'><p>"+date+" : "+tit+"</p><p class='etat'><img class='icone' src='img/non.png'></p></div><p class='description' style>"+descr+"</p></section>");
          
          //$(".description").hide();
          //$("#todo").append($("<section>",{class:"tache"}));
          //$("#todo:last-child").append($("<div>",{class:"info_tache"}));
          //$(".tache").append($("<div>",{class:"info_tache"}));
          //$(".info_tache").last().append($("<p>",{class:"date", text:date}));
          //$(".info_tache").append($("<p>",{class:"date"}));
          //$(".info_tache").append($("<p>:</p>"));
          //$(".info_tache").append($("<p>",{class:"nom_tache"}));
          //$(".tache").append($("<p>",{class:"etat"}));
          //$(".etat").append($("<img>",{class:"icone",src:"img/non.png"}));

          //On masque le formulaire et on affiche le tableau
          $("h1").html("Mon tableau");
          $(".new_tache").hide();
          $(".section_wrap_col").show();
          $(".boutons").show();
    
        }
        else if(result=="empty"){
          $(".new_tache").prepend("<p>Veuillez remplir tous les champs.</p>");
        }
      },
   );
  });
  });

//Quand on clique sur une tâche
$('.section_wrap_col').on("click", ".tache", function(){
  $(this).children(".description").toggle();
  });

/*$(".tache").on("click", function(){
  $(this).children(".description").toggle();
});

/*$(".tache").click(function(){
  $(this).children(".description").toggle();
});
*/


//Quand on clique sur une tâche
$('.section_wrap_col').on("click", ".icone",function(){
  //On récupère la source de l'image
  var src = ($(this).attr('src'))
  //Si la tache est 'to do'
  if (src=== 'img/non.png')
  {
    //Si l'utilisateur veut la marquer 'done'
    if(confirm("Marquer cette tâche comme 'done' ?"))
    {
      //On change l'icone et on la change de colonne
      $(this).attr('src','img/oui.png');
      $(this).parent().parent().parent().appendTo($("#done"));
    }
  }
  //Si la tache est 'done'
  else if(src=== 'img/oui.png')
  {
    //Si l'utilisateur veut la marquer 'todo'
    if(confirm("Marquer cette tâche comme 'to do' ?"))
    {
      //On change l'icone et on la change de colonne
      $(this).attr('src','img/non.png');
      $(this).parent().parent().parent().appendTo($("#todo"));
    }
  }
});
