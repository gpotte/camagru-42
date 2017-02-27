var log_form = document.getElementById('log_field'),
    sign_form = document.getElementById('sign_field');

    log_form.onsubmit = function(ev){
      ev.preventDefault();
      var param = {
        "login" : document.getElementById('login').value,
        "password" : document.getElementById('password').value
      };
      var single_param = create_param(param);
      var xmlhttp = new XMLHttpRequest();
      /* AJAX WITHOUT JQUERY */
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200 || xmlhttp.status == 201) {
             if (xmlhttp.responseText == 'Success')
             {
               document.getElementById("resultat").innerHTML = "Vous avez été connecté avec succès !";
               window.location = "http://localhost:8080/camagru";
             }
             else
                document.getElementById("resultat").innerHTML = "Erreur lors de la connexion...";
           }
           else
              alert('Something Went Wrong');
        }
    };

    xmlhttp.open("POST", "login.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(single_param);
    /* AJAX WITHOUT JQUERY */
  }

  sign_form.onsubmit = function(ev){
    ev.preventDefault();
    var param = {
      "login" : document.getElementById('new_log').value,
      "password" : document.getElementById('new_pwd').value,
      "check" : document.getElementById('check').value,
      "mail" : document.getElementById('mail').value
    };
    var single_param = create_param(param);
    var xmlhttp = new XMLHttpRequest();
    /* AJAX WITHOUT JQUERY */
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
         if (xmlhttp.status == 200 || xmlhttp.status == 201) {
           var data = xmlhttp.responseText;
           if (xmlhttp.responseText == 'Success')
             document.getElementById("resultat").innerHTML = "Un mail de confirmation vous a ete envoyer";
          else if (data == 'Login already Taken')
              document.getElementById("resultat").innerHTML = "Ce login est deja pris";
          else if (data == 'Mail Already Taken')
            document.getElementById("resultat").innerHTML = "Ce mail est deja utiliser";
          else
            document.getElementById("resultat").innerHTML = "Erreur lors de la creation du compte";
         }
         else
            alert('Something Went Wrong');
      }
  };

  xmlhttp.open("POST", "signin.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(single_param);
  /* AJAX WITHOUT JQUERY */
  }


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
