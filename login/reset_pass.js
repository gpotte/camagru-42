function reset_pass(ev){
  ev.preventDefault();
  var param = {
    "password" : document.getElementById('password').value,
    "confirmation" : document.getElementById('confirmation').value,
    "id" : document.getElementById('id').value,
    "log" : document.getElementById('log').value
  };
  var single_param = create_param(param);
  var xmlhttp = new XMLHttpRequest();
  /* AJAX WITHOUT JQUERY */
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
       if (xmlhttp.status == 200 || xmlhttp.status == 201) {
         var data = xmlhttp.responseText;
         document.getElementById("resultat").innerHTML = data;
         if (data == "Success")
          window.location = "http://localhost:8080/camagru";
       }
       else
          alert('Something Went Wrong');
    }
};

xmlhttp.open("POST", "reset_pass2.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send(single_param);
/* AJAX WITHOUT JQUERY */
}

function password_strength(){
  var param = {
    "password" : document.getElementById('password').value,
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
