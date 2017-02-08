$(document).ready(function(){

    $("#log_button").click(function{

        $.post(
            'login.php', // Un script PHP que l'on va créer juste après
            {
                login : $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val()
            },

            function(data){

                if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")

                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }

            },

            'text'
         );

    });



    $("#signin").click(function{

        $.post(
            'signin.php', // Un script PHP que l'on va créer juste après
            {
                login : $("#new_log").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#new_pwd").val(),
                check : $("#check").val()
                email : $("#mail").val()
            },

            function(data){

                if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")

                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }

            },

            'text'
         );

    });
});
