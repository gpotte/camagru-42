
    var streaming = false,
       video        = document.querySelector('#video'),
       canvas       = document.querySelector('#canvas'),
       startbutton  = document.querySelector('#startbutton'),
       upload       = document.querySelector('#fileupload'),
       finish       = document.querySelector('#finish'),
       canvasData   = null,
       width = 320,
       height = 240;


   navigator.getMedia = ( navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia);

   navigator.getMedia(
     {
       video: true,
       audio: false
     },
     function(stream) {
       if (navigator.mozGetUserMedia) {
         video.mozSrcObject = stream;
       } else {
         var vendorURL = window.URL || window.webkitURL;
         video.src = vendorURL.createObjectURL(stream);
       }
       video.play();
     },
     function(err) {
       console.log("An error occured! " + err);
     }
   );

   video.addEventListener('canplay', function(ev){
     if (!streaming) {
       video.setAttribute('width', width);
       video.setAttribute('height', height);
       canvas.setAttribute('width', width);
       canvas.setAttribute('height', height);
       streaming = true;
     }
   }, false);

   upload.addEventListener('change', handleFiles);

   function handleFiles(e) {
   canvas.width = width;
   canvas.height = height;
    var img = new Image;
    img.src = URL.createObjectURL(e.target.files[0]);
    img.onload = function() {
        canvas.getContext('2d').drawImage(img, 0, 0, width, height);
        canvasData = canvas.toDataURL("image/png");
        console.log(canvasData);
      }
   }
   function takepicture() {
     canvas.width = width;
     canvas.height = height;
     canvas.getContext('2d').drawImage(video, 0, 0, width, height);
     canvasData = canvas.toDataURL("image/png");
}

  finish.addEventListener('click', function(e)
  {
    console.log(canvasData);
    if (!canvasData)
      console.log("there is no pic");
    else {
      $.post(
          'testSave.php' , // Un script PHP que l'on va créer juste après
          {
              data : canvasData,  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
          },

          function(data){
              console.log(data)
              if(data == 'Success'){
                   $("#resultat").html("<p>Pix Uploaded !</p>");
              }
              else{
                   $("#resultat").html("<p>Pix Uploaded...</p>");
              }

          }
       );
      }
  }, false);
