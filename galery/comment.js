var com_submit = document.getElementById("com_form");
var like_btn = document.getElementById("like");

com_submit.onsubmit = function(ev){
  ev.preventDefault();
  var param = {
    "comment" : document.getElementById('new_com').value,
    "id" : document.getElementById('id').value
  };
  var single_param = create_param(param);
  var xmlhttp = new XMLHttpRequest();
  /* AJAX WITHOUT JQUERY */
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
       if (xmlhttp.status == 200 || xmlhttp.status == 201) {
         var data = xmlhttp.responseText;
         document.getElementById("comment").innerHTML = xmlhttp.responseText;
       }
       else
          alert('Something Went Wrong');
    }
}

xmlhttp.open("POST", "comment.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send(single_param);
/* AJAX WITHOUT JQUERY */
}

like_btn.onclick = function(){
  var param = {
    "like" : document.getElementById('like').value,
    "id" : document.getElementById('id').value
  };
  var single_param = create_param(param);
  var xmlhttp = new XMLHttpRequest();
  /* AJAX WITHOUT JQUERY */
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
       if (xmlhttp.status == 200 || xmlhttp.status == 201) {
         var data = xmlhttp.responseText;
         document.getElementById("comment").innerHTML = xmlhttp.responseText;
       }
       else
          alert('Something Went Wrong');
    }
}

xmlhttp.open("POST", "like.php", true);
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
