$(document).ready(function(){

    $("#log_button").click(function(){

        $.post(
            'login.php' , // Un script PHP que l'on va créer juste après
            {
                login : $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val()
            },

            function(data){
                console.log(data)
                if(data == 'Success'){
                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                     window.location = "http://localhost:8080/camagru"
                }
                else{
                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }

            }
         );

    });

$("#signin").click(function(){
//    $("#sign").submit(function(){

        $.post(
          'signin.php', // Un script PHP que l'on va créer juste après
            {
                login : $("#new_log").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#new_pwd").val(),
                check : $("#check").val(),
                mail : $("#mail").val()
            },
            function(data){
                console.log(data)
                if(data == 'Success')
                     $("#resultat").html("<h1>Un mail de confirmation vous a ete envoyer</h1>");
                else if (data == 'Login already Taken')
                     $("#resultat").html("<h1>Ce login est deja pris</h1>");
                else if (data == 'Mail Already Taken')
                      $("#resultat").html("<h1>Ce mail est deja utiliser</h1>");
                else {
                      $("#resultat").html("<h1>Erreur lors de la creation du compte</h1>");
                }
            }
         );

    });
});
