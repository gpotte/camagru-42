var canvasFilter = document.querySelector('#filter'),
    filterCtx = canvasFilter.getContext('2d'),
    filterX = 480,
    filterY = 360
    filterImg = null;

function use_filter(){
  if (filter)
  {
    reset_filter();
    filterCtx.drawImage(filterImg, filterX - 100, filterY - 100, 200, 200);
  }
}

  function reset_filter(){
    filterCtx.clearRect(0, 0, width, height);
  }

  function reset_canvas(){
    canvas.getContext('2d').clearRect(0, 0, width, height);
    canvasData = null;
    uploadbutton.value = "";
  }

  function myDown(e){
  if (e.pageX < filterX + 100 + canvasFilter.offsetLeft && e.pageX > filterX - 100 +
  canvasFilter.offsetLeft && e.pageY < filterY + 100 + canvasFilter.offsetTop &&
  e.pageY > filterY - 100 + canvasFilter.offsetTop){
    filterX = e.pageX - canvasFilter.offsetLeft;
    filterY = e.pageY - canvasFilter.offsetTop;
    dragok = true;
    canvasFilter.onmousemove = myMove;
    }
  }

  function myMove(e){
   if (dragok){
    filterX = e.pageX - canvasFilter.offsetLeft;
    filterY = e.pageY - canvasFilter.offsetTop;
   }
  }

  function myUp(){
  dragok = false;
  canvas.onmousemove = null;
  }

var rfrsh =   setInterval(use_filter, 10);
canvasFilter.onmousedown = myDown;
canvasFilter.onmouseup = myUp;
