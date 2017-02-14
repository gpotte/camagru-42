$(document).ready(function(){

    $("#log_button").click(function(){

        $.post(
            'new_log.php' , // Un script PHP que l'on va créer juste après
            {
                login : $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                id : $("#id").val(),
            },

            function(data){
                console.log(data)
                if(data == 'Success'){
                     $("#current_login").html(login);
                     $("#resultat").html("<p>Login changé avec succès !</p>");
                }
                else if (data="used")
                     $("#resultat").html("<p>Ce login est deja pris...</p>");
                else if (data == "invalid")
                     $("#resultat").html("<p>Ce login est invalide...</p>");
                else
                      $("#resultat").html("<p>erreur...</p>");
                }
         );

    });

    $("#mail_button").click(function(){

        $.post(
            'new_mail.php' , // Un script PHP que l'on va créer juste après
            {
                mail : $("#mail").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },

            function(data){
                console.log(data)
                if(data == 'Success')
                {
                     $("#current_mail").html(mail);
                     $("#resultat").html("<p>Mail changé avec succès ! veuillez le confirmez avant votre prochaine connexion</p>");
                }
                else if (data == "used")
                     $("#resultat").html("<p>Ce mail est deja pris...</p>");
                else if (data == "invalid")
                    $("#resultat").html("<p>Ce mail est invalide...</p>");
                else
                  $("#resultat").html("<p>erreur...</p>");
            }
         );

    });

    $("#pwd_button").click(function(){

        $.post(
            'new_pwd.php' , // Un script PHP que l'on va créer juste après
            {
                pwd : $("#pwd").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                check : $("#check").val(),
            },

            function(data){
                console.log(data)
                if(data == 'Success'){
                     $("#resultat").html("<p>Mot de passe changé avec succès !</p>");
                }
                else if (data == "invalid")
                     $("#resultat").html("<p>Ce mot de passe est invalide...</p>");
                else
                     $("#resultat").html("<p>erreur...</p>");                  
            }
         );

    });
  });
