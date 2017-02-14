$(document).ready(function(){

    $("#send").click(function(){

        $.post(
            'lost_pwd.php' , // Un script PHP que l'on va créer juste après
            {
                login : $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                mail : $("#mail").val()
            },

            function(data){
                console.log(data)
                if(data == 'Success'){
                     $("#resultat").html("<p>Un mail vous a ete envoyer</p>");
                }
                else{
                     $("#resultat").html("<p>Erreur</p>");
                }
            }
         );

    });
  });
