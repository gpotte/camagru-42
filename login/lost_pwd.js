var send = document.getElementById('send');

  send.onsubmit = function(ev){
    ev.preventDefault();
    var param = {
      "login" : document.getElementById('login').value,
      "mail" : document.getElementById('mail').value
    };
    var single_param = create_param(param);
    var xmlhttp = new XMLHttpRequest();
    /* AJAX WITHOUT JQUERY */
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
         if (xmlhttp.status == 200 || xmlhttp.status == 201) {
           if (xmlhttp.responseText == 'Success')
           {
             document.getElementById("resultat").innerHTML = "Un mail vous a ete envoyer";
           }
           else
              document.getElementById("resultat").innerHTML = "Erreur";
         }
         else
            alert('Something Went Wrong');
      }
  };

  xmlhttp.open("POST", "lost_pwd.php", true);
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
