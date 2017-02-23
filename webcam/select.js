var filter = null,
    filter_container = document.querySelector('#filter_container'),
    reset_button = document.querySelector("#reset"),
    filter_list = document.querySelector('#filter_container').getElementsByTagName('img');


startbutton.addEventListener('click', function(ev){
  if (filter != null)
  {
    takePicture();
    ev.preventDefault();
  }
  else
    alert("FILTER IS NULL");
}, false);

reset_button.addEventListener('click', function(ev){
  reset_filter();
  reset_canvas();
}, false);

finishbutton.addEventListener('click', function(ev){
  if (filter != null)
  {
    filterData = canvasFilter.toDataURL("image/png");
    uploadPicture();
    ev.preventDefault();
  }
  else
    alert("FILTER IS NULL");
}, false);

  filter_container.addEventListener('click',  function(e){
  if (e.target.id != "filter_container")
  {
    if (filter != null)
      filter.style.border = "none";

    if (e.target == filter)
    {
      filter = null;
      reset_filter();
    }
    else
    {
      e.target.style.border = "5px solid black";
      filter = e.target
      canvasFilter.width = canvas.width;
      canvasFilter.height = canvas.height;
      filterImg = new Image();
      filterImg.src = filter.src;
      use_filter();
    }
  }
  });
