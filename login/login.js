    function ft_login(ev){
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
    }

    xmlhttp.open("POST", "login.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(single_param);
    /* AJAX WITHOUT JQUERY */
  }

  function signin(ev){
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
           if (data == 'Success')
             document.getElementById("resultat").innerHTML = "Un mail de confirmation vous a ete envoyer";
           else
              document.getElementById("resultat").innerHTML = data;
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

  function password_strength(){
    var param = {
      "password" : document.getElementById('new_pwd').value,
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

    xmlhttp.open("POST", "passwd.php", true);
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
