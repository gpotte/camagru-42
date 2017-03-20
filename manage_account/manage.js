var mail_button = document.getElementById('mail_button'),
    pwd_button = document.getElementById('pwd_button');

    function change_mail(ev){
      ev.preventDefault();
      var param = {
        "mail" : document.getElementById('mail').value,
      };
      var single_param = create_param(param);
      var xmlhttp = new XMLHttpRequest();
      /* AJAX WITHOUT JQUERY */
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200 || xmlhttp.status == 201) {
             var data = xmlhttp.responseText;
             if (data == 'Success')
             {
               document.getElementById("resultat").innerHTML = "Mail changé avec succès ! veuillez le confirmez avant votre prochaine connexion";
               document.getElementById("current_mail").innerHTML = document.getElementById('mail').value;
             }
             else if (data == "used")
                document.getElementById("resultat").innerHTML = "Ce mail est deja pris";
            else if (data == "invalid")
                document.getElementById("resultat").innerHTML = "Ce mail est invalide";
            else
                document.getElementById("resultat").innerHTML = "Erreur";
           }
           else
              alert('Something Went Wrong');
        }
    }

    xmlhttp.open("POST", "new_mail.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(single_param);
    /* AJAX WITHOUT JQUERY */
    }


     function change_pwd(){
      var param = {
        "pwd" : document.getElementById('pwd').value,
        "check" : document.getElementById('check').value
      };
      var single_param = create_param(param);
      var xmlhttp = new XMLHttpRequest();
      /* AJAX WITHOUT JQUERY */
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200 || xmlhttp.status == 201) {
             var data = xmlhttp.responseText;
             if (data == 'Success')
             {
               document.getElementById("resultat").innerHTML = "Mot de passe changez avec succes";
             }
            else if (data == "invalid")
                document.getElementById("resultat").innerHTML = "Ce mot de passe est invalide";
            else
                document.getElementById("resultat").innerHTML = "Erreur";
           }
           else
              alert('Something Went Wrong');
        }
    };

    xmlhttp.open("POST", "new_pwd.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(single_param);
    /* AJAX WITHOUT JQUERY */
    }

    function password_strength(){
      var param = {
        "password" : document.getElementById('pwd').value,
      };
      var single_param = create_param(param);
      var xmlhttp = new XMLHttpRequest();
      /* AJAX WITHOUT JQUERY */
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
          if (xmlhttp.status == 200 || xmlhttp.status == 201) {
            var data = xmlhttp.responseText;
            if (data == 'Success')
              document.getElementById("resultat").innerHTML = "password valid";
            else if (data == 'allchar' || data == 'allnum')
              document.getElementById("resultat").innerHTML = "le password doit contenir des chiffres et des lettres";
            else if (data == 'Too Short')
              document.getElementById("resultat").innerHTML = "password Too Short";
        }
         else
            alert('Something Went Wrong');
          }
        };

      xmlhttp.open("POST", "../login/passwd.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send(single_param);
        /* AJAX WITHOUT JQUERY */
      }


/* PUT EVERYTHING ON A SINGLE PARAM FOR POST WITHOUT JQUERY */
  function create_param(param){
      var parameterString = "";
      var isFirst = true;
      for(var index in param) {
        if(!isFirst) {
          parameterString += "&";
        }
        parameterString += encodeURIComponent(index) + "=" + encodeURIComponent(param[index]);
        isFirst = false;
      }
      return (parameterString);
  }
